<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gallery extends CI_Controller {
	
	protected $thead;
	protected $thead2;
	protected $idfield;
	protected $searchrow;	
	function __construct(){
		parent::__construct();
		//$this->lang->load('stock', 'english');
		
	}
	
	function index()
	{
		$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead;
		$data['page_header']="Store List";	

		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('gallery/gallery_form', $data);
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
	
	function removeimg(){
		$id=$this->input->post('id');
		$row=$this->db->where('gallery_id',$id)->get('tblgallery')->row();
		unlink("./assets/upload/gallery/thumb/".$row->article_id.'_'.$row->url);
		unlink("./assets/upload/gallery/".$row->article_id.'_'.$row->url);
		$this->db->where('gallery_id',$id)->delete('tblgallery');


	}
	
	 function upload()
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

	        $this->upload->initialize($this->set_upload_options($_FILES['userfile']['name']));
	        // $this->upload->do_upload();
	        if ( ! $this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());			
			}else{	
				$this->creatthumb($_FILES['userfile']['name'],$orders[$i]);
			}
	    }
	    redirect('gallery/gallery');
	}
	
	function creatthumb($imagename,$order){
			$data = array('upload_data' => $this->upload->data());
		 	$config2['image_library'] = 'gd2';
            $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
            $config2['new_image'] = './assets/upload/gallery/thumb';
            $config2['maintain_ratio'] = false;
            $config2['create_thumb'] = "$imagename";
            $config2['thumb_marker'] = false;
            $config2['height'] = 595;
            $config2['width'] = 595;
            $this->load->library('image_lib');
            $this->image_lib->initialize($config2); 
            if ( ! $this->image_lib->resize()){
            	echo $this->image_lib->display_errors();
			}else{
				$this->saveimg($imagename);
			}
		
	}
	private function set_upload_options($imagename)
	{   
	    //upload an image options
	    if(!file_exists('./assets/upload/gallery/')){
		    if(mkdir('./assets/upload/gallery/',0755,true)){
		        return true;
		    }
	    	if(mkdir('./assets/upload/gallery/thumb',0755,true)){
		                return true;
		    }
		}
	    $config = array();
	    $config['upload_path'] = './assets/upload/gallery/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|gif';
	    $config['max_size']      = '0';
	    $config['file_name']  	 = "$imagename";
		$config['overwrite']	 = true;

	    return $config;
	}

	function saveimg($imagename){
		$date=date('Y-m-d H:i:s');
		$user=$this->session->userdata('user_name');
		$count=$this->db->query("SELECT count(*) as count FROM tblgallery where url='$imagename'")->row()->count;
		if($count==0){
			$data=array('article_id'=>0,
						'url'=>$imagename,
						'gallery_type'=>'2');
			$this->db->insert('tblgallery',$data);
		}
	}
	
	
}