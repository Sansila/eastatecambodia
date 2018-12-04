<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('setting/usermodel','user');
		$this->load->model('setting/rolemodel','role');
		$this->load->library('pagination');	
		$this->load->helper(array('form', 'url'));	
	}
	public function index()
	{	
		$data['query']=$this->user->getuser();
		$this->load->view('greenadmin/header');
		$this->load->view('setting/user/add');
		$this->load->view('setting/user/view',$data);
		$this->load->view('greenadmin/footer');
	}
	function userprofile(){
		$userid=$this->session->userdata('userid');
		$data['user']=$this->db->query("SELECT * FROM admin_user adm 
										INNER JOIN z_role r 
										ON(adm.roleid=r.roleid)
										WHERE adm.userid='$userid'")->row();
		$this->load->view('greenadmin/header');
		$this->load->view('setting/user/user_profile',$data);
		$this->load->view('greenadmin/footer');
	}
	function saveprofile(){
		$last_name=$this->input->post('last_name');
		$first_name=$this->input->post('first_name');
		$email=$this->input->post('email');
		$old_pwd=$this->input->post('old_pwd');
		$new_pwd=$this->input->post('new_pwd');
		$is_pwd=$this->input->post('is_pwd');
		$userid=$this->session->userdata('userid');
		$msg='';
		$data=array('last_name'=>$last_name,
					'first_name'=>$first_name,
					'email'=>$email);
		if($is_pwd!=''){
			$row=$this->db->where('userid',$userid)->get('admin_user')->row();
			if(md5($old_pwd)==$row->password){
				$data2=array('password'=>md5($new_pwd));
				$this->db->where('userid',$userid)->update('admin_user',array_merge($data,$data2));
				$msg="Your Password and data has been change successful";
			}else{
				$msg="Your Old password is incorrect.!";
			}
		}else{
			$this->db->where('userid',$userid)->update('admin_user',$data);
			$msg="Your data has been Update successful";
		}
		header("Content-type:text/x-json");
		echo json_encode($msg);
	}
	function do_upload($id='')
	{
		if($id=='')
			$id=$this->session->userdata('userid');
		if(!file_exists('./assets/upload/adminuser/')){
		    if(mkdir('./assets/upload/adminuser/',0755,true)){
		        return true;
		    }
		}
		$config['upload_path'] ='./assets/upload/adminuser/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name']  = "$id.png";
		$config['overwrite']=true;
		$config['file_type']='image/png';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());			
		}
		else
		{				
		
			
		}
	}
	function edit($id){
		$data1['query']=$this->user->getuserrow($id);
		$this->load->view('greenadmin/header');
		$this->load->view('setting/user/edit',$data1);
		$data['query']=$this->user->getuser();
		$this->load->view('setting/user/view',$data);
		$this->load->view('greenadmin/footer');
	}
	function search(){
		
		if(isset($_GET['f_name'])){
			$f_name=$_GET['f_name'];
			$l_name=$_GET['l_name'];
			$u_name=$_GET['u_name'];
			$email=$_GET['email'];
			$roleid=$_GET['roleid'];
			$schoolid=$_GET['schoolid'];
			$year=$_GET['year'];
			$data['query']=$this->user->searchuser($f_name,$l_name,$u_name,$email,$roleid,$schoolid,$year);
			$this->load->view('header');
			$this->load->view('setting/user/add');
			$this->load->view('setting/user/view',$data);
			$this->load->view('footer');
		}
		if(!isset($_GET['f_name'])){
			$f_name=$this->input->post('f_name');
			$l_name=$this->input->post('l_name');
			$u_name=$this->input->post('u_name');
			$email=$this->input->post('email');
			$roleid=$this->input->post('roleid');
		
			$query=$this->user->searchuser($f_name,$l_name,$u_name,$email,$roleid);
				
				 $i=1;
				foreach ($query as $row) {
					echo "
									<tr>
										<td align='center'>$i</td>
										<td>$row->first_name</td>
										<td>$row->last_name</td>
										<td>$row->user_name</td>
										<td>$row->email</td>
										<td>$row->role</td>
										<td>".date("d-m-Y", strtotime($row->last_visit))."</td>
										<td>".date("d-m-Y", strtotime($row->created_date))."</td>";
										if($row->is_admin!='1')
											echo "<td align='center'><a><img rel='$row->userid' onclick='deleteuser(event);' src='".base_url('assets/images/icons/delete.png')."'/></a> <a><img  rel='$row->userid' onclick='updateuser(event);' src='".base_url('assets/images/icons/edit.png')."'/></a></td>";
										else
											echo "<td></td>";
									echo "</tr>";# code...
								$i++;
				}
				echo "<tr>
					<td colspan='12' id='pgt'><div style='text-align:center'><ul class='pagination' style='text-align:center'>".$this->pagination->create_links()."</ul></div></td>
				</tr>";
		}
	}
	function saveuser(){

		$creat_date=date('Y-m-d H:i:s');
		$f_name=$this->input->post('txtf_name');
		$l_name=$this->input->post('txtl_name');
		$username=$this->input->post('txtu_name');
		$pwd=md5($this->input->post('txtpwd'));
		$email=$this->input->post('txtemail');
		$role=$this->input->post('cborole');
		$schlevel=$this->input->post('schlevelid');
		$count=$this->user->getuservalidate($username,$email);
		$store=$this->input->post('cbostore');
		//print_r($store);
		if($count!=0){
			$data1['error']='This username and your email has been created before Please choose other username ';
			$this->load->view('greenadmin/header');
			$this->load->view('setting/user/add',$data1);
			$data['query']=$this->user->getuser();
			$this->load->view('setting/user/view',$data);
			$this->load->view('greenadmin/footer');
		}else{
			if($role==1)
				$admin=1;
			else
				$admin=0;
			$data=array(
					'first_name'=>$f_name,
					'last_name'=>$l_name,
					'user_name'=>$username,
					'password'=>$pwd,
					'email'=>$email,
					
					'roleid'=>$role,
					'created_date'=>$creat_date,
					'is_admin'=>$admin,
					'is_active'=>1
				);
			$this->db->insert('admin_user',$data);
			$id=$this->db->insert_id();			
			$this->do_upload($id);
			
			redirect('setting/user/');
		}
		
	}
	function savestore($userid,$storeid){
		$data=array('userid'=>$userid,
					'storeid'=>$storeid);
		$this->db->insert('rela_adminuser_store_detail',$data);
	}
	
	
	function update(){
		$userid=$this->input->post('txtuserid');
		$f_name=$this->input->post('txtf_name');
		$l_name=$this->input->post('txtl_name');
		$username=$this->input->post('txtu_name');
		$pwd=md5($this->input->post('txtpwd'));
		$email=$this->input->post('txtemail');
		$role=$this->input->post('cborole');
		$store=$this->input->post('cbostore');
		$count=$this->user->getuservalidateup($username,$email,$userid);
		if($count!=0){
			$data1['query']=$this->user->getuserrow($userid);
			$data1['error']=(object) array('error'=>"<div style='text-align:center; color:red;'>This username and your email has been created before Please choose other username </div>");
			$this->load->view('greenadmin/header');
			$data['query']=$this->user->getuser();
			$this->load->view('setting/user/edit',$data1);
			$data['query']=$this->user->getuser();
			$this->load->view('setting/user/view');
			$this->load->view('greenadmin/footer');
		}else{
			if($role==1)
			$admin=1;
			else
				$admin=0;
			$u_row=$this->user->getuserrow($userid);
			if($u_row->password!=$this->input->post('txtpwd')){
				$data=array(
					'first_name'=>$f_name,
					'last_name'=>$l_name,
					'user_name'=>$username,
					'email'=>$email,
					'password'=>$pwd,
					'roleid'=>$role,
					'is_admin'=>$admin,
					'is_active'=>1
				);
			}else{
					$data=array(
					'first_name'=>$f_name,
					'last_name'=>$l_name,
					'user_name'=>$username,
					'email'=>$email,
					'roleid'=>$role,
					'is_admin'=>$admin,
					'is_active'=>1
				);
			}
			
			$this->db->where('userid',$userid);
			$this->db->update('admin_user',$data);
			$this->do_upload($userid);
			
			redirect('setting/user/');
			}
		
	}
	
	function delete($id){
		$data=array('is_active'=>0);
		$this->db->where('userid',$id);
		$this->db->update('admin_user',$data);
		unlink('./assets/upload/'.$id.'.png');
		redirect('setting/user/');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */