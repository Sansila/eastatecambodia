<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class article extends CI_Controller {
	
	protected $thead;
	protected $thead2;
	protected $idfield;
	protected $searchrow;	
	function __construct(){
		parent::__construct();
		//$this->lang->load('stock', 'english');
		$this->load->model("Modarticle","art");			
		$this->thead=array("No"=>'no',
							 "Title"=>'title',
							 "Location"=>'location_name',							 
							 "Action"=>'Action'							 	
							);
		$this->thead2=array(
							 "Nationality"=>'Nationality',
							 "first Name"=>'name',
							 "Family Name"=>'family',
							 "Gender"=>'gender',
							 "City"=>'city',
							 "Region"=>'region',
							 "Country"=>'country',
							 "Post Code"=>'post_code',
							 "Tel"=>'tel',
							 "mobile"=>'mobile',
							 "Address"=>'address',
							 "Email"=>'email',
							 "Time contact"=>'t_contact',
							 "Know by"=>'by',
							 "Purchase"=>'puc',
							 "as Client"=>'client',
							 "As Dist."=>'distribut',
							 "Other"=>'other',
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
		$this->parser->parse('article/article_list', $data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function contact_list()
	{
		$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead2;
		$data['page_header']="Store List";	

		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('contact_list', $data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function getdata(){
		$perpage=$this->input->post('perpage');
		$s_name=$this->input->post('s_name');
		
		$sql="SELECT a.*, ms.menu_id, ms.menu_name 
				FROM tblarticle a
				LEFT JOIN tblmenus ms 
				ON(a.menu_id=ms.menu_id)
				WHERE a.article_title LIKE '%$s_name%' and a.is_active='1'";
		$table='';
		$pagina='';
		$paging=$this->green->ajax_pagination(count($this->db->query($sql)->result()),site_url("store/store/getstore"),$perpage);
		$i=1;
		$limit=" LIMIT {$paging['start']}, {$paging['limit']}";
		$sql.=" {$limit}";
		$this->green->setActiveRole($this->session->userdata('roleid'));
    $this->green->setActiveModule($this->input->post('m'));
    $this->green->setActivePage($this->input->post('p')); 
		foreach($this->db->query($sql)->result() as $row){
			$visibled='No';
			if($row->is_active==1) {
				$visibled="Yes";
			}
			$table.= "<tr>
				<td class='no'>".$i."</td>
				<td class='title'>".$row->article_title."</td>
				<td class='title'>".$row->menu_name."</td>
				 
				<td class='remove_tag no_wrap'>";
				if($row->menu_id!=0 && $this->green->gAction("D")) {
					$table.= "<a><img rel=".$row->article_id." onclick='deletestore(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
				}
				if($this->green->gAction("U")){
					$table.= "<a><img rel=".$row->article_id." onclick='update(event);' src='".base_url('assets/images/icons/edit.png')."'/></a>";
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
	function removeimg(){
		$id=$this->input->post('id');
		$row=$this->db->where('gallery_id',$id)->get('tblgallery')->row();
		unlink("./assets/upload/article/thumb/".$row->article_id.'_'.$row->url);
		unlink("./assets/upload/article/".$row->article_id.'_'.$row->url);
		$this->db->where('gallery_id',$id)->delete('tblgallery');
	}
	function contactdata(){
		$perpage=$this->input->post('perpage');
		$s_name=$this->input->post('s_name');
		
		$sql="SELECT * FROM tblcontact ";
		$table='';
		$pagina='';
		$paging=$this->green->ajax_pagination(count($this->db->query($sql)->result()),site_url("article/contact_list"),$perpage);
		$i=1;
		$limit=" LIMIT {$paging['start']}, {$paging['limit']}";
		$sql.=" {$limit}";
		$this->green->setActiveRole($this->session->userdata('roleid'));
        $this->green->setActiveModule($this->input->post('m'));
        $this->green->setActivePage($this->input->post('p')); 
		foreach($this->db->query($sql)->result() as $row){
			
			$table.= "<tr>
				 
					 <td class='title'>".$row->nationality."</td>
					 <td class='title'>".$row->first_name."</td>
					 <td class='title'>".$row->family_name."</td>
					 <td class='title'>".$row->gender."</td>
					 <td class='title'>".$row->city."</td>
					 <td class='title'>".$row->region."</td>
					 <td class='title'>".$row->country."</td>
					 <td class='title'>".$row->post_code."</td>
					 <td class='title'>".$row->tel."</td>
					 <td class='title'>".$row->mobile."</td>
					 <td class='title'>".$row->address."</td>
					 <td class='title'>".$row->email."</td>
					 <td class='title'>".$row->preferred_time."</td>
					 <td class='title'>".$row->how_know_us."</td>
					 <td class='title'>".$row->purchase."</td>
					 <td class='title'>".$row->register_client."</td>
					 <td class='title'>".$row->distributor."</td>
					 <td class='title'>".$row->other."</td>
					
					 <td class='remove_tag no_wrap'>";							
						 if($this->green->gAction("D")){
							$table.= "<a><img rel=".$row->contact_id." onclick='deletecontact(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
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
	function add(){
		$data['page_header']="New Store";			
		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('article/article_form', $data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function edit($article_id){
		$datas['row']=$this->db->query("SELECT * FROM tblarticle WHERE article_id='$article_id'")->row();
		$data['page_header']="New Store";			
		$this->parser->parse('greenadmin/header', $data);
		$this->load->view('article/article_form', $datas);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function getprocount($countryid)
	{
		$data=$this->stor->getprovince($countryid);
		$pro='';
		foreach ($data as $p) {
			$pro.="<option value='$p->provinceid'>$p->prov_name </option>";
		}
		header("Content-type:text/x-json");
		echo json_encode($pro);
	}
	
	function delete($storeid){
		$this->db->where('article_id',$storeid)->delete('tblarticle');
	}

	function deletecontact($storeid){
		$this->db->where('contact_id',$storeid)->delete('tblcontact');
	}
	function upload($productid)
	{       
	    $this->load->library('upload');
	    $orders=$this->input->post('order');
	    $updimg=$this->input->post('updimg');
	    // $this->unlinkpic($productid);
	    // print_r($updimg);
	    $files = $_FILES;
	    $cpt = count($_FILES['userfile']['name']);
	    for($i=0; $i<$cpt; $i++)
	    {         
	    	
	        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

	        $this->upload->initialize($this->set_upload_options($productid,$_FILES['userfile']['name']));
	        // $this->upload->do_upload();
	        if ( ! $this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());			
			}else{	
				$this->creatthumb($productid,$_FILES['userfile']['name'],$orders[$i]);
			}
	    }
	}
	
	function creatthumb($productid,$imagename,$order){
			$data = array('upload_data' => $this->upload->data());
		 	$config2['image_library'] = 'gd2';
            $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
            $config2['new_image'] = './assets/upload/article/thumb';
            $config2['maintain_ratio'] = false;
            $config2['create_thumb'] = "$productid".'_'."$imagename";
            $config2['thumb_marker'] = false;
            $config2['height'] = 280;
            $config2['width'] = 380;
            $this->load->library('image_lib');
            $this->image_lib->initialize($config2); 
            if ( ! $this->image_lib->resize()){
            	echo $this->image_lib->display_errors();
			}else{
				$this->saveimg($productid,$imagename);
			}
		
	}
	private function set_upload_options($productid,$imagename)
	{   
	    //upload an image options
	    if(!file_exists('./assets/upload/article/')){
		    if(mkdir('./assets/upload/article/',0755,true)){
		        return true;
		    }
	    	if(mkdir('./assets/upload/article/thumb',0755,true)){
		                return true;
		    }
		}
	    $config = array();
	    $config['upload_path'] = './assets/upload/article/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $config['max_size']      = '0';
	    $config['file_name']  	 = "$productid".'_'."$imagename";
		$config['overwrite']	 = true;

	    return $config;
	}

	function saveimg($productid,$imagename){
		$date=date('Y-m-d H:i:s');
		$user=$this->session->userdata('user_name');
		$count=$this->db->query("SELECT count(*) as count FROM tblgallery where article_id='$productid' AND url='$imagename'")->row()->count;
		if($count==0){
			$data=array('article_id'=>$productid,
						'url'=>$imagename,
						'gallery_type'=>'0');
			$this->db->insert('tblgallery',$data);
		}
	}
	function save(){
		$article_id=$this->input->post('article_id');
		$title=$this->input->post('title');
		$title_kh=$this->input->post('title_kh');
		$content=$this->input->post('content');
		$content_kh=$this->input->post('content_kh');
		$keyword=$this->input->post('keyword');
		$meta_desc=$this->input->post('meta_desc');
		$location_id=$this->input->post('location_id');
		$event_date=$this->input->post('article_date');
		$icon=$this->input->post('icon');
		$is_active=$this->input->post('is_active');
		$is_marguee=$this->input->post('is_marguee');
		$msg='';

		$article_id=$this->art->save($article_id,$title,$content,$is_active,$is_marguee,$content_kh,$keyword,$meta_desc,$location_id,$title_kh,$icon,$event_date);
		
		$msg="Article Has Created...!";
		$arr=array('msg'=>$msg,'article_id'=>$article_id);
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	
}