<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Property extends CI_Controller {
	
	protected $thead;
	protected $theadkh;
	protected $idfield;
	protected $searchrow;	
	function __construct(){
		parent::__construct();
		//$this->lang->load('stock', 'english');
		$this->load->model("property/modproperty","pro");
		$this->load->library('mylibrary');

		$this->thead=array("No"=>'no',
							// "Date"=>"Date",
							"Action"=>'Action',
							"Property Name"=>'Property Name',
							"Price"=>'Price',
							"Category"=> "Category",
							"Location"=> "Location",
							// "Hit" => "Hit",
							"Property Type" => "Property Type",
							"Visibled"=>'visibled',
							"User Name"=>'User Name',
							"Level" => "Level",
							"Owner" => "Owner",
							"Project Name"=>'Project Name',					 	
							);
		$this->theadkh=array("លេខរាង"=>'លេខរាង',
							// "ថ្ងៃខែ"=>"ថ្ងៃខែ",
							"កំណត់"=>'កំណត់',
							"ឈ្មោះអចនទ្រព្យ"=>'ឈ្មោះអចនទ្រព្យ',
							"តម្លៃ"=>'តម្លៃ',
							"ប្រភេទអចនទ្រព្យ"=> "ប្រភេទអចនទ្រព្យ",
							"ទីតាំង"=> "ទីតាំង",
							// "មើល" => "មើល",
							"ប្រភេទ" => "ប្រភេទ",
							"បង្ហាញ"=>'បង្ហាញ',
							"ឈ្មោះអ្នកប្រើ" => 'ឈ្មោះអ្នកប្រើ',	
							"កម្រិត" => "កម្រិត",
							"ម្ចាស់អចលនៈទ្រព្យ" => "ម្ចាស់អចលនៈទ្រព្យ",
							"ឈ្មោះគម្រោង"=>'ឈ្មោះគម្រោង',					 	
							);
		$this->idfield="categoryid";
		
	}
	
	function index()
	{
		$data['idfield']=$this->idfield;
		if($this->session->userdata('site_lang')=="khmer")
			$data['thead']=	$this->theadkh;
		else	
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
		$location = $this->input->post('location');
		$p_category = $this->input->post('category');
		$p_status = $this->input->post('type');
		$property_tag = $this->input->post('property_tag');
		// $array = $this->input->post('arr');

		//print_r($array); die();

		$row = $this->db->query("SELECT * FROM tblpropertylocation where status = 1 AND propertylocationid = $location ")->row();

		$mp = trim($row->lineage, '-');
        $mp = explode('-', $row->lineage);
        $i=1;
        $store = "";
        foreach ($mp as $m) {
        	if($i == 1)
        		$store.= $m;
        	$i++;
        }

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
			'p_status'=> $this->input->post('available'),
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
			'relative_owner' => $this->input->post('relative_owner'),
			'p_parent' => $store,
			'direct_sale' => $this->input->post('directly'),
			'internal_remark' => $this->input->post('internal_remark'),
			'property_tag' => $this->input->post('property_tag'),
			'projectid' => $this->input->post('projectid'),
			'ccemail' => $this->input->post('verifyemail'),
			'match_property' => $this->input->post('match'),
		);
		$data_modify = array(
			'modify_date' => date('Y-m-d H:i:s'),
			'modify_person' => $this->session->userdata('userid')
		);
		$data1 = array(
			'create_date'=> date('Y-m-d'),
			'validate' => 1,
		);

		$msg='';
		$action = '';
		$count = $this->pro->vaidate($title,$pro_id);

		if($pro_id > 0){
			$this->db->where('pid',$pro_id)->update('tblproperty', array_merge($data, $data_modify));
			$this->db->query("UPDATE `tblproperty` SET `validate_date` = DATE_ADD(CURDATE(), INTERVAL 15 DAY) WHERE `pid` = $pro_id");
			$msg = "Property Has Update...!";
			$action = 'update';
		}else{ 
			$pro_id = $this->pro->save(array_merge($data,$data1), $pro_id);
			$msg="Property Has Created...!";
			$action = 'insert';

			$url = site_url('property/property/checkcustomerfindproperty');
			$param = array(
							'pid' => $pro_id,
							'location' => $this->input->post('location'),
							'p_category' => $this->input->post('category'),
							'p_status' => $this->input->post('type'),
						  );
			$this->mylibrary->do_in_background($url, $param);
		}
		
		$arr=array('msg'=>$msg,'pid'=>$pro_id, 'location'=>$location, 'cate'=> $p_category, 'types'=> $p_status, 'status' => $action, 'tag' => $property_tag);
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function checkcustomerfindproperty()
	{

		require('phpmailer/class.phpmailer.php');
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = "ssl";
        $mail->Port     = 465;
        $mail->Host     = "smtp.gmail.com";
        $mail->Mailer   = "smtp";
        $mail->WordWrap   = 80;

        $pid = $this->input->post('pid');
        $location = $this->input->post('location');
        $p_category = $this->input->post('p_category');
        $p_status = $this->input->post('p_status');

		$loc = ''; 
		$cate = ''; 
		$min_price = ''; 
		$max_price = ''; 
		$min_size = ''; 
		$max_size = ''; 
		$status = '';
		$tag ='';
		$pro = '';
		$tags = $this->input->post('tag');
		$where = '';
		$userid = $this->session->userdata('userid');
		$roleid = $this->session->userdata('roleid');

        $customer = $this->pro->getCustomerRequirement();
		
		if($customer){
			$i = 1;
			foreach ($customer as $cust) {
				$cust->location = trim($cust->location, ',');
				$arrloc = explode(',', $cust->location);
				foreach ($arrloc as $l) {
					if($l == $location)
						$loc = $l;
				}
				$cust->category = trim($cust->category, ',');
				$arrcate = explode(',', $cust->category);
				foreach ($arrcate as $c) {
					if($c == $p_category)
						$cate = $c;
				}
				$cust->type = trim($cust->type, ',');
				$arrstatus = explode(',', $cust->type);
				foreach ($arrstatus as $s) {
					if($s == $p_status)
						$status = $s;
				}
				if($cust->min_price != '')
					$min_price = $cust->min_price;
				if($cust->max_price != '')
					$max_price = $cust->max_price;
				if($cust->min_size != '')
					$min_size = $cust->min_size;
				if($cust->max_size != '')
					$max_size = $cust->max_size;

				if($i == 1)
				{
					$pro = $this->pro->getPropertyForMatch($pid,$loc,$cate,$status,$min_price,$max_price,$min_size,$max_size);
				}

				if($pro){

					$property_type = '';
		        	$images = '';

					$imgs = $this->pro->getAllImage($pro->pid);

		        	if($imgs)
		        	{
			        	foreach ($imgs as $img) {
			        		$img_path = base_url('assets/upload/noimage.jpg');
			        		if(file_exists(FCPATH.'assets/upload/property/thumb/'.$img->pid.'_'.$img->url))
							{
								$img_path = site_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url);
							}
							$images.= '<img style="width:100%;" src="'.$img_path.'" alt="" />';
			        	}
			        }else{
			        	$images = '';
			        }

		        	if($pro->p_type == 1)
						$property_type = "Sale";
					if($pro->p_type == 2)
						$property_type = "Rent";
					if($pro->p_type == 3)
						$property_type = "Rent & Sale";

			        $mail->SetFrom("estatecambodia168.dev@gmail.com", "Estate Cambodia");
			        $mail->Subject = "Estate Cambodia - ".$pro->property_name;
			        $mail->addBCC($cust->email);

			        $logo = "http://estatecambodia.com/assets/img/logo.png";
			        $iconloc = "http://estatecambodia.com/assets/img/placeholder.png";
			        $description = '<div style="width: 100%">
			            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin: 0 auto;">
			                <tbody>
			                    <tr>
			                        <td style="width:8px" width="8"></td>
			                        <td>
			                            <div align="center" class="" style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px; padding:20px;height: auto;">
			                                <img src="'.$logo.'" style="width: 140px;">
			                                <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:12px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
			                                    <p>Dear customer,</p>
			                                    The following are the properties that Estate Cambodia would like to share and you may review for your interest: 
			                                    <ul style="list-style: none; text-align: left;">
		                                            <li>- Property ID: P'.$pro->pid.'</li>
		                                            <li>- Property Title: '.$pro->property_name.'</li>
		                                            <li>- Price: '.$pro->price.'$</li>
		                                            <li>- Type: '.$property_type.'</li>
		                                            <li>- <img src="'.$iconloc.'" />Location: '.$pro->locationname.'</li>
		                                            <li>- Link: <a href="http://estatecambodia.com/site/site/detail/'.$pro->pid.'/?name=browser">http://estatecambodia.com/detail/P'.$pro->pid.'</a>
		                                            </li>
		                                        </ul>
			                                </div>
			                                <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:12px;color:rgba(0,0,0,0.87);text-align:left; margin-bottom: 20px;">
			                                	'.$pro->description.'
			                                </div>
			                                <div>
			                                	'.$images.'
			                                </div>
			                                <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left"> 
			                                    <p>Best regards,</p>
			                                    <p>Estate Cambodia Team</p>
			                                </div>
			                            </div>
			                        </td>
			                    </tr>
			                </tbody>
			            </table>
			        </div>';
			        $mail->MsgHTML($description);
			        $mail->IsHTML(true);
			        $mail->Send();
			        $mail->ClearAddresses();
				}

				$i++;
			}
		}
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
        $config2['create_thumb'] = "$pid".'_'.str_replace(" ", "_", $imagename);
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
	    $config['file_name']  	 = "$pid".'_'.str_replace(" ", "_", $imagename);
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
	    $config['file_name']  	 = "$pid".'_'.str_replace(" ", "_", $imagename);
		$config['overwrite']	 = true;

	    return $config;
	}
	function saveimg($pid,$imagename){
		$date=date('Y-m-d H:i:s');
		$user=$this->session->userdata('user_name');
		$count=$this->db->query("SELECT count(*) as count FROM tblgallery where pid='$pid' AND url='$imagename'")->row()->count;
		if($count==0){
			$data=array('pid'=>$pid,
						'url'=>str_replace(" ", "_", $imagename),
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
		$avialable_pro = $this->input->post('avialable_pro');
		$price = $this->input->post('price');
		$project = $this->input->post('project');

		$where = ""; $is_admin = "";
		$var = $this->session->all_userdata();
		$user = $var['userid'];

		$groupadmin = $this->db->query("SELECT * FROM tblgroupuser WHERE is_active = 1 AND is_admin_group = $user ")->row();

		if($groupadmin)
			$is_admin = " OR u.group_id = ".$groupadmin->groupid;
		else
			$is_admin = "";


		$role = $this->session->userdata('roleid');
		$rol = $this->db->query("SELECT * FROM `z_role` WHERE `roleid` = $role ")->row();

		if($rol->is_admin == 1 || $rol->is_admin == 2)
			$where.= "";
		else
			$where.= " AND pl.agent_id = '$user'".$is_admin;

		if($p_type !="")
			$where.= " AND pt.typeid = '$p_type' ";
		// if($s_name !="")
		// 	$where.= " AND pl.pid = '$s_name' ";
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
		if($avialable_pro !="")
			$where .= " AND pl.p_status = '$avialable_pro' ";
		if($price !='')
			$where .= " AND pl.price LIKE '%$price%' ";
		if($project !="")
			$where.= " AND pro.projectid = $project ";

		$sql="SELECT pl.pid,
					 pl.property_name,
					 pl.type_id,
					 pl.agent_id,
					 pl.lp_id,
					 pl.p_status,
					 pl.create_date,
					 pl.pro_level,
					 pl.relative_owner,
					 pl.price,
					 pl.hit,
					 pl.p_type,
					 pl.direct_sale,
					 pt.typeid,
					 pl.housesize,
					 pt.typename,
					 pl.property_tag,
					 pl.internal_remark,
					 pl.address,
					 pl.projectid,
					 u.userid,
					 u.user_name,
					 u.group_id,
					 l.propertylocationid,
					 l.lineage,
					 pro.projectid,
					 pro.project_name
		FROM tblproperty pl
		left join tblpropertytype pt
		on pl.type_id = pt.typeid
		left join admin_user as u
		on u.userid = pl.agent_id
		left join tblpropertylocation l
		on pl.lp_id = l.propertylocationid
		left join tblproject as pro
		on pl.projectid = pro.projectid
		WHERE pl.p_status <> 0 {$where} 
		AND CONCAT(pl.property_name,pl.pid) LIKE '%$s_name%'  
		order by pl.create_date DESC";

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
			$level ="";
			$owner ="";
			$property_type ="";
			
			if($row->p_status==1)
				$visibled="Available";
			if($row->p_status == 2)
				$visibled="Draft";
			if($row->p_status == 3)
				$visibled="Sold";
			if($row->p_status == 4)
				$visibled="Rented";
			if($row->p_status == 5)
				$visibled="NA";

			if($row->p_type == 1)
				$property_type = "Sale";
			if($row->p_type == 2)
				$property_type = "Rent";
			if($row->p_type == 3)
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
			// <td class='no'>".$row->create_date."</td>
			// <td class='user'>".$row->user_name."</td>
			// <td class='name'>".$level."</td>	
			// <td class='name'>".$owner."</td>
			// <td class='hit'>".$row->hit."</td>
			// <td class='name'>".$property_type."</td>
			$table.= "<tr class='clickable' data-toggle='collapse' data-target='#group-of-rows-".$i."' aria-expanded='false' aria-controls='group-of-rows-".$i."'>
				 <td class='no'><i class='fa fa-plus' aria-hidden='true'></i></td>
				 <td class='remove_tag no_wrap'>";
				 
				 if($this->green->gAction("D")){
					$table.= "<a style='padding:0px 5px;'><img rel=".$row->pid." onclick='deletestore(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
				 }

				 if($this->green->gAction("U")){
					$table.= "<a style='padding:0px 5px;'><img rel=".$row->pid." onclick='update(event);' src='".base_url('assets/images/icons/edit.png')."'/></a>";
				 }
				 if($this->green->gAction("U")){
					$table.= "<a style='padding:0px 5px;'><img rel=".$row->pid." onclick='renew(event);' src='".base_url('assets/images/icons/reload.png')."'/></a>";
				 }
				 // if($this->green->gAction("U")){
					// $table.= "<a style='padding:0px 5px;' href='".site_url('site/site/detail/'.$row->pid.'/?text='.$row->property_name.'&name=browser')."' target='_blank'><img rel=".$row->pid." src='".base_url('assets/images/icons/view.png')."'/></a>";
				 // }
				 if($this->green->gAction("U")){
					$table.= "<a href='".site_url('property/property/analysis/'.$row->pid)."'><img rel=".$row->pid." src='".base_url('assets/images/icons/analytics.png')."'/></a>";
				 }
			$table.= " 
				 </td>
				 <td class='name' style='text-align:left !important'>
				 	<a href='".site_url('site/site/detail/'.$row->pid.'/?text='.$row->property_name.'&name=browser')."'>P".$row->pid.'-'.$row->property_name."</a>
				 </td>
				 <td class='name'>$".$row->price."</td>
				 <td class='name'>".$row->typename."</td>
				 <td class='name'>".$loc."</td>	
				 <td class='name'>".$property_type."</td>		
				 <td class='type'>".$visibled."</td>
				 <td class='user'>".$row->user_name."</td>
				 <td class='name'>".$level."</td>	
				 <td class='name'>".$owner."</td>
				 <td class='name'>".$row->project_name."</td>
				 </tr>
				 <tr id='group-of-rows-".$i."' class='collapse' style='background:#ccc'>
		            <td style='text-align:left !important'><i class='fa fa-minus' aria-hidden='true'></i></td>
		            <td style='text-align:left !important'>Size: ".$row->housesize."</td>
		          	<td style='text-align:left !important' colspan='2'>Address: ".$row->address."</td>
		            <td style='text-align:left !important'>Hit: ".$row->hit."</td>
		            <td style='text-align:left !important' colspan='2'>Pro-Tag: ".$row->property_tag."</td> 
		            <td style='text-align:left !important' colspan='3'>In-Remark: ".$row->internal_remark."</td> 
		            <td style='text-align:left !important' colspan='2'>Date: ".$row->create_date."</td> 
		        </tr>";										 
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
		$data = array(
			'create_date' => $date,
		);
		$this->db->where('pid',$pid)->update('tblproperty',$data);
		
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
		WHERE pl.p_status= 0 AND (u.is_active = 0 OR u.is_active = 1) AND u.type_post IS NOT NULL {$where} AND pl.property_name LIKE '%$s_name%'  order by pl.create_date DESC";

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

		$pro = $this->db->query("SELECT 
                                        p.pid,
                                        p.agent_id,
                                        p.p_status,
                                        p.property_name,
                                        p.validate_date,
                                        p.price,
                                        p.lp_id,
                                        p.p_type,
                                        u.userid,
                                        u.user_name,
                                        u.email,
                                        u.phone,
                                        lp.propertylocationid,
                                        lp.locationname
                                    FROM tblproperty as p
                                    INNER JOIN admin_user u
                                    ON p.agent_id = u.userid
                                    INNER JOIN tblpropertylocation lp
                                    ON p.lp_id = lp.propertylocationid
                                    WHERE p.pid = $pid ")->row();

		require('phpmailer/class.phpmailer.php');
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = "ssl";
        $mail->Port     = 465;
        $mail->Host     = "smtp.gmail.com";
        $mail->Mailer   = "smtp";
        $mail->WordWrap   = 80;

        $mail->SetFrom("estatecambodia168.dev@gmail.com", "Estate Cambodia");
        $mail->Subject = "Estate Cambodia - Property Approved";
        $mail->AddAddress($pro->email);

        $logo = "http://estatecambodia.com/assets/img/logo.png";
        $description = '<div style="width: 100%">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 640px; margin: 0 auto;">
                <tbody>
                    <tr>
                        <td style="width:8px" width="8"></td>
                        <td>
                            <div align="center" class="" style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px; padding:20px;">
                                <img src="'.$logo.'" style="width: 140px;">
                                <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
                                    Your property post has been reviewed, approved, and listed in the portal.
                                    <ul style="list-style: none; text-align: left;">
                                    	<li>- Property ID: P'.$pro->pid.' USD</li>
                                        <li>- Property Title: '.$pro->property_name.' USD</li>
                                        <li>- Price: '.$pro->price.'USD</li>
                                        <li>- Location: '.$pro->locationname.'</li>
                                    </ul>
                                </div>
                                <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
                                    If you would like to join us as partner, please click the following link to request an account.
                                    <a href="http://estatecambodia.com/site/site/join">http://estatecambodia.com/site/site/join</a>
                                </div>
                                <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
                                    <p>Best regards,</p>
                                    <p>Estate Cambodia Team</p>
                                </div>
                            </div>
                        </td>
                        <td style="width:8px" width="8"></td>
                    </tr>
                </tbody>
            </table>
        </div>';

        $mail->MsgHTML($description);
        $mail->IsHTML(true);
        if(!$mail->Send()){
            echo "<p class='error'>Problem in Sending Mail.</p>";
        }
	}
	function delete_pro($pid)
	{
		$this->db->where('pid',$pid)->delete('tblproperty');
	}
	function analysis($id)
	{
		$data['page_header']="New Property";
		$data['id'] = $id;
		$data['pname'] = $this->pro->getPropertyName($id);			
		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('property/property/analysis',$data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function analysisperday($id)
	{
		$date = Date('Y-m-d');
		$perdate = $this->db->query("SELECT DATE_FORMAT(date_create,'%M-%d') as 'year', count(*) as 'income'
									FROM tblvisitor 
									WHERE month(date_create) = month('$date')
									AND pid = $id
									GROUP BY date(date_create) 
									ORDER BY date_create DESC
									")->result();
		header("Content-type:text/x-json");
		echo json_encode($perdate);
	}
	function analysisperweek($id)
	{
		$name = $this->db->query("SELECT property_name FROM tblproperty WHERE pid = $id ")->row()->property_name;
		$date = Date('Y-m-d');
		$perdate = $this->db->query("SELECT count(id) as allhit FROM tblvisitor 
						WHERE (DATE(date_create) <= date_sub(date(NOW()), INTERVAL -1 WEEK))
						AND pid = $id ")->row()->allhit;
		$arr[] = array('value'=>$perdate,'country'=>$name);
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function analysispermonth($id)
	{
		$perdate = $this->db->query("SELECT DATE_FORMAT(date_create,'%y-%m') as 'year',count(*) as 'income'
									FROM tblvisitor WHERE pid = $id
									GROUP BY YEAR(date_create), MONTH(date_create)
									ORDER BY date_create DESC
									")->result();
		header("Content-type:text/x-json");
		echo json_encode($perdate);
	}
	function getPropertyTag()
	{
		$data = $this->db->query("SELECT property_tag as label FROM tblproperty WHERE property_tag is not null GROUP BY property_tag ")->result();
		header("Content-type:text/x-json");
		echo json_encode($data);
	}
	function getViewByChannel($id,$gdate)
	{
		$where = ""; $date = date('Y-m-d');
		if($gdate == 1)
			$where.= "tblvisitor.date_create = '$date' ";
		else{
			$where.= "(tblvisitor.date_create >= date_sub(now(), interval $gdate DAY))";
		}
		$sql = $this->db->query("SELECT
									    tblvisitor.view_from AS 'year',
									    COUNT(*) AS income
									FROM
									    tblproperty
									INNER JOIN tblvisitor ON tblproperty.pid = tblvisitor.pid
									WHERE
									    {$where}
									    AND (tblvisitor.view_from = 'facebook' OR tblvisitor.view_from = 'telegram' OR tblvisitor.view_from = 'whatsapp' OR tblvisitor.view_from = 'line' OR tblvisitor.view_from = 'browser') 
									    AND tblproperty.p_status = 1 AND tblproperty.pid = $id
									GROUP BY
									    tblvisitor.view_from
									ORDER BY
										income DESC
								")->result();
		$data = array();
		$i = 1;
		$nameyear = "";
		foreach ($sql as $row) {
			// if($row->year == null || $row->year == 'browser')
			// 	$nameyear = "browser";
			// else
			$nameyear = $row->year;
			$data[] = array('country' => $nameyear,
							'value' => $row->income);
			$i++;
		}
		header("Content-type:text/x-json");
		echo json_encode($data);
	}
	function updatestatusimage($pid)
	{
		$imgstatus = $this->input->post('arr'); 
		$arr = array(); 
		$arrs = array();
		$idgallery = $this->db->query("SELECT * FROM tblgallery WHERE pid = $pid ")->result(); 	
		$i = 0;
		foreach ($idgallery as $idg) {
			$arr[$i] = $idg->gallery_id;
			$i++;
		}
		$j = 0;
		foreach ($imgstatus as $val) {
			$arrs[$j] = $val;
			$this->db->query("UPDATE tblgallery SET enable_pro_image = $arrs[$j] WHERE gallery_id = $arr[$j]");
			$j++;
		}
	}	
}