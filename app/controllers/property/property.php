<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Property extends CI_Controller {
	
	protected $thead;
	protected $idfield;
	protected $searchrow;	
	function __construct(){
		parent::__construct();
		//$this->lang->load('stock', 'english');
		$this->load->model("property/modproperty","pro");			
		$this->thead=array("No"=>'no',
							"Date"=>"Date",
							"User Name"=>'User Name',
							"Pro_Number"=>'Pro_Number',
							"Property Name"=>'Property Name',
							"Category"=> "Category",
							"Location"=> "Location",
							"Level" => "Level",
							"Owner" => "Owner",
							"Hit" => "Hit",
							"Property Type" => "Property Type",
							"Visibled"=>'visibled',
							"Action"=>'Action'							 	
							);
		$this->idfield="categoryid";
		
	}
	
	function index()
	{
		$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead;
		$data['page_header']="List Property";

		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('property/property/view',$data);
		$this->parser->parse('greenadmin/footer', $data);
    }
    function add()
    {
		$data['page_header']="New Property";			
		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('property/property/form_add',$data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function save()
	{
		$pro_id=$this->input->post('pro_id');
		$title=$this->input->post('property_name');

		$data = array(
			'address'=> $this->input->post('address'),
			'advantage'=> $this->input->post('advantage'),
			'add_date'=> $this->input->post('start_date'),
			'end_date'=> $this->input->post('end_date'),
			'agent_id'=> $this->input->post('angent'),
			'air_conditional'=> $this->input->post('aircond'),
			'balcony'=> $this->input->post('balcony'),
			'bathroom'=> $this->input->post('bathroom'),
			'bedroom'=> $this->input->post('bedroom'),
			'commision'=> $this->input->post('commission'),
			'urgent' => $this->input->post('urgent'),
			'contact_owner'=> $this->input->post('contact_owner'),
			'contract'=> $this->input->post('contract'),
			'description'=> $this->input->post('content'),
			'description_kh'=> $this->input->post('content_kh'),
			'dinning_room'=> $this->input->post('dining_room'),
			'direction'=> $this->input->post('direction'),
			'elevator'=> $this->input->post('elevator'),
			'email_owner'=> $this->input->post('mail_owner'),
			'floor'=> $this->input->post('floor'),
			'furniture'=> $this->input->post('funiture'),
			'garden'=> $this->input->post('garden'),
			'gym'=> $this->input->post('gym'),
			'housesize'=> $this->input->post('house_size'),
			'kitchen'=> $this->input->post('kitchen'),
			'landsize'=> $this->input->post('land_size'),
			'livingroom'=> $this->input->post('livingroom'),
			'lp_id'=> $this->input->post('location'),
			'ownername'=> $this->input->post('owner_name'),
			'parking'=> $this->input->post('parking'),
			'pool'=> $this->input->post('pool'),
			'price'=> $this->input->post('price'),
			'property_name'=> $this->input->post('property_name'),
			'p_status'=> 1,
			'available' => $this->input->post('available'),
			'p_type'=> $this->input->post('type'),
			'service_provided'=> $this->input->post('service_pro'),
			'stairs'=> $this->input->post('stair'),
			'steamandsouna'=> $this->input->post('stam_suana'),
			'story'=> $this->input->post('story'),
			'terrace'=> $this->input->post('terrace'),
			'title'=> $this->input->post('title'),
			'type_id'=> $this->input->post('category'),
			'latitude'=> $this->input->post('latitude'),
			'longtitude'=> $this->input->post('longtitude'),
			'pro_level' => $this->input->post('level'),
			'relative_owner' => $this->input->post('relative_owner')
		);

		
		$data1 = array(
			'create_date'=> date('Y-m-d')
		);

		$msg='';
		$count = $this->pro->vaidate($title,$pro_id);

		if($pro_id > 0){
			$this->db->where('pid',$pro_id)->update('tblproperty', $data);
			$msg = "Property Has Update...!";
		}else{ 

			if($count > 0) {
				$msg = "Property Is already Exist...!";
			} else {
				$pro_id = $this->pro->save(array_merge($data,$data1), $pro_id);
				$msg="Property Has Created...!";
			}

		}
		$arr=array('msg'=>$msg,'pid'=>$pro_id);
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function upload($pid)
	{       
	    $this->load->library('upload');
	    $orders=$this->input->post('order');
	    $updimg=$this->input->post('updimg');
	    $files = $_FILES;
	    $cpt = count($_FILES['userfile']['name']);
	    for($i=0; $i<$cpt; $i++)
	    {         
	    	$extends = pathinfo($files["userfile"]["name"][$i], PATHINFO_EXTENSION);
	        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	        $_FILES['userfile']['size']= $files['userfile']['size'][$i];

	        if($extends == "mp4" || $extends == "movie" || $extends == "mpe" || $extends == "qt" || $extends == "mov" || $extends == "avi" || $extends == "mpg" || $extends == "mpeg")
	        {
	        	$this->upload->initialize($this->set_upload_options_video($pid,$_FILES['userfile']['name']));
	        	if ( ! $this->upload->do_upload()){
					$error = array('error' => $this->upload->display_errors());			
				}else{
					$this->saveimg($pid,$_FILES['userfile']['name']);
				}
	        }else{
	        	$this->upload->initialize($this->set_upload_options($pid,$_FILES['userfile']['name']));
		        if ( ! $this->upload->do_upload()){
					$error = array('error' => $this->upload->display_errors());			
				}else{	
					$this->creatthumb($pid,$_FILES['userfile']['name'],$orders[$i]);
				}
	        }
	    }
	}
	
	function creatthumb($pid,$imagename,$order){
		$data = array('upload_data' => $this->upload->data());
	 	$config2['image_library'] = 'gd2';
        $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
        $config2['new_image'] = './assets/upload/property/thumb';
        $config2['maintain_ratio'] = false;
        $config2['create_thumb'] = "$pid".'_'."$imagename";
        $config2['thumb_marker'] = false;
        $config2['height'] = 564;
		$config2['width'] = 848;
		$config2['quality'] = 100;
        $this->load->library('image_lib');
        $this->image_lib->initialize($config2); 
        if ( ! $this->image_lib->resize()){
        	echo $this->image_lib->display_errors();
		}else{
			$this->saveimg($pid,$imagename);
		}
		
	}

	private function set_upload_options($pid,$imagename)
	{   
	    if(!file_exists('./assets/upload/property/')){
		    if(mkdir('./assets/upload/property/',0755,true)){
		        return true;
		    }
	    	if(mkdir('./assets/upload/property/thumb',0755,true)){
		        return true;
		    }
		}
	    $config = array();
	    $config['upload_path'] = './assets/upload/property/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|mpeg|mpg|mp4|mpe|qt|avi|mov';
	    $config['max_size']      = '0';
	    $config['file_name']  	 = "$pid".'_'."$imagename";
		$config['overwrite']	 = true;

	    return $config;
	}
	private function set_upload_options_video($pid,$imagename)
	{   
	    if(!file_exists('./assets/upload/property/')){
		    if(mkdir('./assets/upload/property/',0755,true)){
		        return true;
		    }
	    	if(mkdir('./assets/upload/property/thumb',0755,true)){
		        return true;
		    }
		}
	    $config = array();
	    $config['upload_path'] = './assets/upload/property/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|mpeg|mpg|mp4|mpe|qt|avi|mov';
	    $config['max_size']      = '0';
	    $config['file_name']  	 = "$pid".'_'."$imagename";
		$config['overwrite']	 = true;

	    return $config;
	}
	function saveimg($pid,$imagename){
		$date=date('Y-m-d H:i:s');
		$user=$this->session->userdata('user_name');
		$count=$this->db->query("SELECT count(*) as count FROM tblgallery where pid='$pid' AND url='$imagename'")->row()->count;
		if($count==0){
			$data=array('pid'=>$pid,
						'url'=>$imagename,
						'gallery_type'=>'0');
			$this->db->insert('tblgallery',$data);
		}
	}
	function getdata(){
		$perpage=$this->input->post('perpage');
		$s_name=$this->input->post('s_name');
		$s_id=$this->input->post('s_id');
		$p_type = $this->input->post('p_type');
		$user_add = $this->input->post('user_add');
		$p_status = $this->input->post('p_status');
		$pro_loc = $this->input->post('pro_loc');
		$sdate = $this->input->post('date');
		$levels = $this->input->post('level');
		$owner = $this->input->post('owner');

		$where = "";
		$var = $this->session->all_userdata();
		$user = $var['userid'];

		if($user == 4)
			$where.= "";
		else
			$where.= " AND pl.agent_id = '$user' ";
		if($p_type !="")
			$where.= " AND pt.typeid = '$p_type' ";
		if($s_id !="")
			$where.= " AND pl.pid = '$s_id' ";
		if($user_add !="")
			$where.= " AND u.user_name LIKE '%$user_add%' ";
		if($p_status !="")
			$where.= " AND pl.p_type = '$p_status' ";
		if($pro_loc !="")
			$where.= " AND l.lineage LIKE '%$pro_loc%' ";
		if($sdate !="")
			$where.= " AND pl.create_date = '$sdate' ";
		if($levels != 0)
			$where.= " AND pl.pro_level = '$levels' ";
		if($owner != 0)
			$where .= " AND pl.relative_owner = '$owner' ";

		$sql="SELECT *
		FROM tblproperty pl
		left join tblpropertytype pt
		on pl.type_id = pt.typeid
		left join admin_user as u
		on u.userid = pl.agent_id
		left join tblpropertylocation l 
		on pl.lp_id = l.propertylocationid
		WHERE pl.p_status=1 {$where} AND pl.property_name LIKE '%$s_name%'  order by pl.create_date DESC";
		$table='';
		$pagina='';
		$paging=$this->green->ajax_pagination(count($this->db->query($sql)->result()),site_url("menu/getdata"),$perpage);
		$i=1;
		$lim = $paging['limit'] + 10;
		$limit=" LIMIT {$paging['start']}, {$lim}";
		$sql.=" {$limit}";
		$this->green->setActiveRole($this->session->userdata('roleid'));
        $this->green->setActiveModule($this->input->post('m'));
        $this->green->setActivePage($this->input->post('p')); 
		foreach($this->db->query($sql)->result() as $row){
			$visibled='No';
			$typ='';
			$lay='';
			$level ="";
			$owner ="";
			$property_type ="";
			if($row->p_status==1)
				$visibled="Yes";
			if($row->p_type == 1)
				$property_type = "Sale";
			if($row->p_type == 2)
				$property_type = "Rent";
			if($row->p_status == 3)
				$property_type = "Rent & Sale";
			if($row->pro_level == 1)
				$level = "Hot";
			if($row->pro_level == 2)
				$level = "Sponsored";
			if($row->pro_level == 3)
				$level = "Free";

			if($row->relative_owner == 1)
				$owner = "I am the owner";
			if($row->relative_owner == 2)
				$owner = "I know owner directly";
			if($row->relative_owner == 3)
				$owner = "I do not know owner";
				
			if($row->lp_id != 0)
			{
				//$locs = $this->pro->getPropertyLocation($row->lp_id);
				$arr = ""; $lineage = "";
				//$row_id = $this->db->query("select * from tblpropertylocation where propertylocationid = '$row->lp_id")->row()->lineage;
				$lineage = $row->lineage;
				$lineage = trim($lineage, '-');
				$arr = explode('-', $lineage);
				$num = count($arr);
				$a = 1; $main_id = "";;
				foreach($arr as $l)
				{
					if($a == 1)
					{
						$main_id.= $l;
					}
					$a++;
				}
				$result = $this->db->query("select * from tblpropertylocation where propertylocationid = '$main_id' ")->row();

				if($result)
					$loc = $result->locationname;
				else
					$loc = "";
			}else{
				$loc = "";
			}
			$table.= "<tr>
				 <td class='no'>".$i."</td>
				 <td class='no'>".$row->create_date."</td>
				 <td class='user'>".$row->user_name."</td>
				 <td class='id'>P".$row->pid."</td>	
				 <td class='name'>".$row->property_name."</td>	
				 <td class='name'>".$row->typename."</td>	
				 <td class='name'>".$loc."</td>
				 <td class='name'>".$level."</td>	
				 <td class='name'>".$owner."</td>
				 <td class='hit'>".$row->hit."</td>
				 <td class='name'>".$property_type."</td>		
				 <td class='type'>".$visibled."</td>
				 <td class='remove_tag no_wrap'>";
				 
				 if($this->green->gAction("D")){
					$table.= "<a style='padding:0px 10px;'><img rel=".$row->pid." onclick='deletestore(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
				 }

				 if($this->green->gAction("U")){
					$table.= "<a style='padding:0px 10px;'><img rel=".$row->pid." onclick='update(event);' src='".base_url('assets/images/icons/edit.png')."'/></a>";
				 }
				 if($this->green->gAction("U")){
					$table.= "<a style='padding:0px 10px;'><img rel=".$row->pid." onclick='renew(event);' src='".base_url('assets/images/icons/reload.png')."'/></a>";
				 }
			$table.= " </td>
				 </tr>
				 ";										 
			$i++;	 
		}
		$arr['data']=$table;
		$arr['pagina']=$paging;
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function edit($pid)
	{
		$datas['id'] = $pid;
		$data['page_header']="New Property Type";			
		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('property/property/form_add',$datas);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function renew($pid)
	{
		$date = date('Y-m-d');
		$this->db->query("UPDATE tblproperty SET create_date = '$date' WHERE pid='$pid'");
		
		$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead;
		$data['page_header']="List Property";

		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('property/property/view',$data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function delete($pid)
	{
		$data = array(
			'p_status' => 0,
		);
		$this->db->where('pid',$pid)->update('tblproperty',$data);
	}
	function removeimg()
	{
		$id = $this->input->post('id');
		$row=$this->db->where('gallery_id',$id)->get('tblgallery')->row();
		unlink("./assets/upload/property/thumb/".$row->pid.'_'.$row->url);
		unlink("./assets/upload/property/".$row->pid.'_'.$row->url);
		$this->db->where('gallery_id',$id)->delete('tblgallery');
	}
	function getdata_inactive()
	{
		$perpage=$this->input->post('perpage');
		$s_name=$this->input->post('s_name');
		$s_id=$this->input->post('s_id');
		$p_type = $this->input->post('p_type');
		$user_add = $this->input->post('user_add');
		$p_status = $this->input->post('p_status');
		$pro_loc = $this->input->post('pro_loc');

		$where = "";
		$var = $this->session->all_userdata();
		$user = $var['userid'];

		if($user == 4)
			$where.= "";
		else
			$where.= " AND pl.agent_id = '$user' ";
		if($p_type !="")
			$where.= " AND pt.typeid = '$p_type' ";
		if($s_id !="")
			$where.= " AND pl.pid = '$s_id' ";
		if($user_add !="")
			$where.= " AND u.user_name LIKE '%$user_add%' ";
		if($p_status !="")
			$where.= " AND pl.p_type = '$p_status' ";
		if($pro_loc !="")
			$where.= " AND l.lineage LIKE '%$pro_loc%' ";

		$sql="SELECT *
		FROM tblproperty pl
		inner join tblpropertytype pt
		on pl.type_id = pt.typeid
		inner join admin_user as u
		on u.userid = pl.agent_id
		inner join tblpropertylocation l 
		on pl.lp_id = l.propertylocationid
		WHERE pl.p_status= 0 and u.is_active = 0 AND u.type_post IS NOT NULL {$where} AND pl.property_name LIKE '%$s_name%'  order by pl.create_date DESC";

		$table='';
		$pagina='';
		$paging=$this->green->ajax_pagination(count($this->db->query($sql)->result()),site_url("menu/getdata"),$perpage);
		$i=1;
		$limit=" LIMIT {$paging['start']}, {$paging['limit']}";
		$sql.=" {$limit}";
		$this->green->setActiveRole($this->session->userdata('roleid'));
        $this->green->setActiveModule($this->input->post('m'));
        $this->green->setActivePage($this->input->post('p')); 
		foreach($this->db->query($sql)->result() as $row){
			$visibled='No';
			$typ='';
			$lay='';
			$property_type ="";
			if($row->p_status==1)
				$visibled="Yes";
			if($row->p_type == 1)
				$property_type = "Sale";
			if($row->p_type == 2)
				$property_type = "Rent";
			if($row->p_status == 3)
				$property_type = "Rent & Sale";
				
			if($row->lp_id != 0)
			{
				//$locs = $this->pro->getPropertyLocation($row->lp_id);
				$arr = ""; $lineage = "";
				//$row_id = $this->db->query("select * from tblpropertylocation where propertylocationid = '$row->lp_id")->row()->lineage;
				$lineage = $row->lineage;
				$lineage = trim($lineage, '-');
				$arr = explode('-', $lineage);
				$num = count($arr);
				$a = 1; $main_id = "";;
				foreach($arr as $l)
				{
					if($a == 1)
					{
						$main_id.= $l;
					}
					$a++;
				}
				$result = $this->db->query("select * from tblpropertylocation where propertylocationid = '$main_id' ")->row();

				if($result)
					$loc = $result->locationname;
				else
					$loc = "";
			}else{
				$loc = "";
			}
			$table.= "<tr>
				 <td class='no'>".$i."</td>
				 <td class='no'>".$row->create_date."</td>
				 <td class='user'>".$row->user_name."</td>
				 <td class='id'>P".$row->pid."</td>	
				 <td class='name'>".$row->property_name."</td>	
				 <td class='name'>".$row->typename."</td>	
				 <td class='name'>".$loc."</td>
				 <td class='hit'>".$row->hit."</td>
				 <td class='name'>".$property_type."</td>		
				 <td class='type'>".$visibled."</td>
				 <td class='remove_tag no_wrap'>";
				 
				 if($this->green->gAction("D")){
					$table.= "<a style='padding:0px 10px;'><img rel=".$row->pid." onclick='deletestore(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
				 }
				 if($this->green->gAction("U")){
					$table.= "<a style='padding:0px 10px;'><img rel=".$row->pid." onclick='update(event);' src='".base_url('assets/images/icons/edit.png')."'/></a>";
				 }
				 if($this->green->gAction("U")){
					$table.= "<a style='padding:0px 10px;'><img rel=".$row->pid." onclick='approve(event);' src='".base_url('assets/images/icons/checked.png')."'/></a>";
				 }
			$table.= " </td>
				 </tr>
				 ";										 
			$i++;	 
		}
		$arr['data']=$table;
		$arr['pagina']=$paging;
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function active_property($pid)
	{
		$data = array(
			'p_status' => 1,
			'create_date'=> date('Y-m-d'),
		);
		$this->db->where('pid',$pid)->update('tblproperty',$data);
	}
	function delete_pro($pid)
	{
		$this->db->where('pid',$pid)->delete('tblproperty');
	}
}