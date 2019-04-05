<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {
	
	protected $thead;
	protected $idfield;
	protected $searchrow;	
	function __construct(){
		parent::__construct();
		//$this->lang->load('stock', 'english');
		$this->load->model("modproduct","pro");	
		$this->load->model("site/modsite","site");		
		$this->thead=array("No"=>'no',
							 "Project Name"=>'Project Name',
							 "Location"=>'Location',
							 'Phone' => 'Phone',
							 'Email' => 'Email',
							 'Website' => 'Website',
							 'Contact Person' => 'Contact Person',
							 'Contact Title' => 'Contact Title',
							 "Visibled"=>'visibled',
							 "Action"=>'Action'							 	
							);
		$this->idfield="categoryid";
		
	}
	
	function index()
	{
		$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead;
		$data['page_header']="Store List";	

		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('project/add', $data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function add()
	{
		$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead;
		$data['page_header']="Store List";	

		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('project/add', $data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function save()
	{
		$projectid = $this->input->post('projectid');
		$projectname = $this->input->post('projectname');
		$msg = "";
		$data=array('project_location' => $this->input->post('locationid'),
					'project_name' => $projectname,
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'website' => $this->input->post('website'),
					'contact_person' => $this->input->post('contactperson'),
					'contact_title' => $this->input->post('contacttitle'),
					'remark' => $this->input->post('remark'),
					'is_active' => 1,
				);
		$data1 = array('create_date' => date('Y-m-d'));
        if($projectid!=''){
            $this->db->where('projectid',$projectid)->update('tblproject',$data);
            $msg="Project Has Updated...!";
        }else{
            $this->db->insert('tblproject',array_merge($data,$data1));
            $projectid.= $this->db->insert_id();
            $msg="Project Has Created...!";
        }

		$arr=array('msg'=>$msg,'projectid'=>$projectid);
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
        $config2['new_image'] = './assets/upload/project/thumb';
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
	    if(!file_exists('./assets/upload/project/')){
		    if(mkdir('./assets/upload/project/',0755,true)){
		        return true;
		    }
	    	if(mkdir('./assets/upload/project/thumb',0755,true)){
		        return true;
		    }
		}
	    $config = array();
	    $config['upload_path'] = './assets/upload/project/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|mpeg|mpg|mp4|mpe|qt|avi|mov';
	    $config['max_size']      = '0';
	    $config['file_name']  	 = "$pid".'_'."$imagename";
		$config['overwrite']	 = true;

	    return $config;
	}
	private function set_upload_options_video($pid,$imagename)
	{   
	    if(!file_exists('./assets/upload/project/')){
		    if(mkdir('./assets/upload/project/',0755,true)){
		        return true;
		    }
	    	if(mkdir('./assets/upload/project/thumb',0755,true)){
		        return true;
		    }
		}
	    $config = array();
	    $config['upload_path'] = './assets/upload/project/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|mpeg|mpg|mp4|mpe|qt|avi|mov';
	    $config['max_size']      = '0';
	    $config['file_name']  	 = "$pid".'_'."$imagename";
		$config['overwrite']	 = true;

	    return $config;
	}
	function saveimg($pid,$imagename){
		$date=date('Y-m-d H:i:s');
		$user=$this->session->userdata('user_name');
		$count=$this->db->query("SELECT count(*) as count FROM tblgallery where projectid='$pid' AND url='$imagename'")->row()->count;
		if($count==0){
			$data=array('projectid'=>$pid,
						'url'=>$imagename,
						'gallery_type'=>'0');
			$this->db->insert('tblgallery',$data);
		}
	}
	function view()
	{
		$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead;
		$data['page_header']="Store List";	

		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('project/view', $data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function getdata()
	{
		$perpage=$this->input->post('perpage');
		$s_name=$this->input->post('s_name');
		
		$sql="SELECT * FROM tblproject as p
			  INNER JOIN tblpropertylocation as l
			  ON p.project_location = l.propertylocationid
			  WHERE p.is_active=1 AND p.project_name LIKE '%$s_name%' order by p.projectid DESC";
		$table='';
		$pagina='';
		$paging=$this->green->ajax_pagination(count($this->db->query($sql)->result()),site_url("project/getdata"),$perpage);
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
			if($row->is_active==1)
				$visibled="Yes";
			
			$table.= "<tr>
				 <td class='no'>".$i."</td>										
				 <td class='type'>".$row->project_name."</td>
				 <td class='type'>".$row->locationname."</td>
				 <td class='type'>".$row->phone."</td>
				 <td class='type'>".$row->email."</td>
				 <td class='type'>".$row->website."</td>
				 <td class='type'>".$row->contact_person."</td>
				 <td class='type'>".$row->contact_title."</td>							 	
				 <td class='country'>".$visibled."</td>
				 <td class='remove_tag no_wrap'>";
				 
				 if($this->green->gAction("D")){
					$table.= "<a><img rel=".$row->projectid." onclick='deletestore(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
				 }
				 if($this->green->gAction("U")){
					$table.= "<a><img rel=".$row->projectid." onclick='update(event);' src='".base_url('assets/images/icons/edit.png')."'/></a>";
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
	function edit($projectid)
	{
		$datas['id']= $projectid;
		$data['page_header']="New Store";

		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('project/add', $datas);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function delete($projectid)
	{
		$data = array('is_active' => 0);
		$this->db->where('projectid', $projectid)->update('tblproject',$data);
	}
	function removeimg()
	{
		$id = $this->input->post('id');
		$row=$this->db->where('gallery_id',$id)->get('tblgallery')->row();
		unlink("./assets/upload/project/thumb/".$row->projectid.'_'.$row->url);
		unlink("./assets/upload/project/".$row->projectid.'_'.$row->url);
		$this->db->where('gallery_id',$id)->delete('tblgallery');
	}
	function detail($id)
	{
		$datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['slide'] = $this->site->getSlide();
        $data['image'] = $this->site->getImageProjectByID($id);
        $data['detail'] = $this->site->getDetailProject($id);
        //$data['project'] = $this->site->getProjectID($id);
        $data['project'] = $this->site->getProject();
        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/projectdetail',$data);
        $this->load->view('site/contain/footer',$datas);
	}
}