<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usermodel extends CI_Model {

	public function getuser()
	{	
		$per_page='';
		if(isset($_GET['per_page']))
		$per_page=$_GET['per_page'];
		$config['base_url']=site_url("setting/user/index?");
		$config['per_page']=20;
		$config['full_tag_open'] = '<li>';
		$config['full_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<a><u>';
		$config['cur_tag_close'] = '</u></a>';
		$config['page_query_string']=TRUE;
		$config['num_link']=3;
		$this->db->where('is_active',1);
		$config['total_rows']=$this->db->get('admin_user')->num_rows();
		$this->pagination->initialize($config);
		$this->db->select('*');
		$this->db->from('admin_user u');
		$this->db->join('z_role r','u.roleid=r.roleid','inner');
		$this->db->where('u.is_active',1);
		$this->db->order_by("u.userid", "desc"); 
		$this->db->limit($config['per_page'],$per_page);
		$query=$this->db->get();
		return $query->result();
		
	}

	function getuser_inactive()
	{	
		$per_page='';
		if(isset($_GET['per_page']))
		$per_page=$_GET['per_page'];
		$config['base_url']=site_url("setting/user/index?");
		$config['per_page']=10;
		$config['full_tag_open'] = '<li>';
		$config['full_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<a><u>';
		$config['cur_tag_close'] = '</u></a>';
		$config['page_query_string']=TRUE;
		$config['num_link']=3;
		//$this->db->where('is_active',0);
		$config['total_rows']=$this->db->where('is_active',2)->get('admin_user')->num_rows();
		$this->pagination->initialize($config);
		$this->db->select('*');
		$this->db->from('admin_user u');
		$this->db->join('z_role r','u.roleid=r.roleid','left');
		$this->db->where('u.is_active',2);
		$this->db->where('u.type_post IS NOT NULL', NULL, FALSE);
		$this->db->order_by("u.userid", "desc"); 
		$this->db->limit($config['per_page'],$per_page);
		$query=$this->db->get();
		return $query->result();
		
	}
	
	function getLocalIp(){
	    $output = shell_exec('/sbin/ifconfig');        
	    preg_match("/inet?[[:space:]]?addr:([0-9.]+)/", $output, $matches);
	    if(isset($matches[1]))
	        $ip = $matches[1];
	    else
	        $ip = 0;
	    return $ip;
	}
	function getuserstor($userid){
		return $this->db->query("SELECT * FROM rela_adminuser_store_detail sd 
								INNER JOIN set_store s 
								ON(sd.storeid=s.storeid)
								WHERE sd.userid='$userid'")->result();
	}
	function getuservalidate($username,$email){
		// $this->db->select('count(*)');
		// $this->db->from('admin_user');
		// $this->db->where('is_active',1);
		// $where = '(user_name = '.$username.' OR email = '.$email.')';
		// $this->db->where($where);
		// return $this->db->count_all_results();
		$count = $this->db->query("SELECT count(*) as us FROM admin_user WHERE user_name = '$username' AND email = '$email' AND is_active = 1")->row();
		if($count->us > 0){
			return $count->us;
		}
		else
		{
			$counts = $this->db->query("SELECT count(*) as us FROM admin_user WHERE email = '$email' AND is_active = 1")->row();
			return $counts->us;
		}
	}
	function getuservalidateup($username,$email,$userid){
		// $this->db->select('count(*)');
		// $this->db->from('admin_user');
		// $this->db->where('user_name',$username);
		// $this->db->where('email',$email);
		// $this->db->where_not_in('userid',$userid);
		// $this->db->where('is_active',1);
		// return $this->db->count_all_results();
		$count = $this->db->query("SELECT count(*) as us FROM admin_user WHERE user_name = '$username' AND email = '$email' AND is_active = 1 AND userid <> '$userid' ")->row();
		if($count->us > 0){
			return $count->us;
		}
		else
		{
			$counts = $this->db->query("SELECT count(*) as us FROM admin_user WHERE email = '$email' AND is_active = 1 AND userid <> '$userid' ")->row();
			return $counts->us;
		}
	}
	function getuserstore($userid){
		$data= $this->db->query("SELECT storeid FROM rela_adminuser_store_detail WHERE userid='$userid'")->result();
		$arr=array();
		foreach ($data as $s) {
			$arr[$s->storeid]=$s->storeid;
			# code...
		}
		return $arr;
	}
	function getstore(){
		return $this->db->query("SELECT * FROM set_store Where is_active='1'")->result();
	}
	function getuserrow($id){
		$this->db->select('*');
		$this->db->from('admin_user u');
		$this->db->join('z_role r','u.roleid=r.roleid','inner');
		$this->db->where('u.is_active',1);
		$this->db->where('u.userid',$id);
		$this->db->order_by("u.userid", "desc"); 
		$query=$this->db->get();
		
		return $query->row();
	}
	function getuserrowinactive($id){
		$this->db->select('*');
		$this->db->from('admin_user u');
		$this->db->join('z_role r','u.roleid=r.roleid','left');
		$this->db->where('u.is_active',2);
		$this->db->where('u.userid',$id);
		$this->db->order_by("u.userid", "desc"); 
		$query=$this->db->get();
		
		return $query->row();
	}
	function searchuser($f_name,$l_name,$u_name,$email,$roleid,$phone,$require){
		$per_page='';
		if(isset($_GET['per_page']))
		$per_page=$_GET['per_page'];
		$config['base_url']=site_url("setting/user/search?f_name=$f_name&l_name=$l_name&u_name=$u_name&email=$email&roleid=$roleid&phone=$phone&require=$require");
		$config['per_page']=20;
		$config['full_tag_open'] = '<li>';
		$config['full_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<a><u>';
		$config['cur_tag_close'] = '</u></a>';
		$config['page_query_string']=TRUE;
		$config['num_link']=3;
		$this->db->like('first_name',$f_name);
		$this->db->like('last_name',$l_name);
		$this->db->like('user_name',$u_name);
		$this->db->like('email',$email);
		$this->db->like('phone',$phone);
		if($roleid !=0)
			$this->db->where('roleid',$roleid);
		if($require == 0)
			$this->db->where('(get_requirement = 0 OR get_requirement IS NULL )',NULL, FALSE);
		if($require == 1)
			$this->db->where('get_requirement',$require);	
		$this->db->where('is_active',1);
		$config['total_rows']=$this->db->get('admin_user')->num_rows();
		$this->pagination->initialize($config);
		$this->db->select('*');
		$this->db->from('admin_user u');
		$this->db->join('z_role r','u.roleid=r.roleid','inner');
		$this->db->like('u.first_name',$f_name);
		$this->db->like('u.last_name',$l_name);
		$this->db->like('u.user_name',$u_name);
		$this->db->like('u.email',$email);
		$this->db->like('u.phone',$phone);
		//$this->db->like('u.schoolid',$school);
		//$this->db->like('u.year',$year);	
		if($roleid !=0)
			$this->db->where('u.roleid',$roleid);	
		if($require == 0)
			$this->db->where('(u.get_requirement = 0 OR u.get_requirement IS NULL )',NULL, FALSE);
		if($require == 1)
			$this->db->where('u.get_requirement',$require);
		$this->db->where('u.is_active',1);
		$this->db->order_by("u.userid", "desc"); 
		$this->db->limit($config['per_page'],$per_page);
		$query=$this->db->get();
		return $query->result();
	}
	function search_inactive($f_name,$l_name,$u_name,$email,$roleid){
		$per_page='';
		if(isset($_GET['per_page']))
		$per_page=$_GET['per_page'];
		 $config['base_url']=site_url("setting/user/search?f_name=$f_name&l_name=$l_name&u_name=$u_name&email=$email&roleid=$roleid");
		 $config['per_page']=10;
		 $config['full_tag_open'] = '<li>';
		 $config['full_tag_close'] = '</li>';
		 $config['cur_tag_open'] = '<a><u>';
		 $config['cur_tag_close'] = '</u></a>';
		 $config['page_query_string']=TRUE;
		 $config['num_link']=3;
		 $this->db->like('first_name',$f_name);
		 $this->db->like('last_name',$l_name);
		 $this->db->like('user_name',$u_name);
		 $this->db->like('email',$email);
		 if($roleid!=0)
		 	$this->db->where('roleid',$roleid);	
		 $this->db->where('is_active',1);
		 $config['total_rows']=$this->db->get('admin_user')->num_rows();
		 $this->pagination->initialize($config);
		$this->db->select('*');
		$this->db->from('admin_user u');
		$this->db->join('z_role r','u.roleid=r.roleid','left');
		if($f_name !="")
			$this->db->like('u.first_name',$f_name);
		if($l_name !="")
			$this->db->like('u.last_name',$l_name);
		if($u_name !="")
			$this->db->like('u.user_name',$u_name);
		if($email !="")
			$this->db->like('u.email',$email);
		//$this->db->like('u.schoolid',$school);
		//$this->db->like('u.year',$year);	
		if($roleid!=0)
			$this->db->where('u.roleid',$roleid);	
		$this->db->where('u.is_active',0);
		$this->db->where('u.type_post IS NOT NULL', NULL, FALSE);
		$this->db->order_by("u.userid", "desc"); 
		$this->db->limit($config['per_page'],$per_page);
		$query=$this->db->get();
		return $query->result();
	}
}