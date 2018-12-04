<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Youtube extends CI_Controller {
	
	protected $thead;
	protected $idfield;
	protected $searchrow;	
	function __construct(){
		parent::__construct();
		//$this->lang->load('stock', 'english');
		$this->load->model("ModMenu","men");			
		$this->thead=array("No"=>'no',
							 "Video Name"=>'name',	 
							 "Video Code"=>'parent',
							 "Order"=>'order',
							 "Home page"=>'home',
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
		$this->parser->parse('youtube/youtube_list', $data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function getdata(){
		$perpage=$this->input->post('perpage');
		$s_name=$this->input->post('s_name');
		
		$sql="SELECT * FROM tblgallery WHERE gallery_type=1";
		$table='';
		$pagina='';
		$paging=$this->green->ajax_pagination(count($this->db->query($sql)->result()),site_url("youtube/getdata"),$perpage);
		$i=1;
		$limit=" LIMIT {$paging['start']}, {$paging['limit']}";
		$sql.=" {$limit}";
		$this->green->setActiveRole($this->session->userdata('roleid'));
        $this->green->setActiveModule($this->input->post('m'));
        $this->green->setActivePage($this->input->post('p')); 
		foreach($this->db->query($sql)->result() as $row){
			$home='No';
			if($row->home==1)
				$home='Yes';
			$table.= "<tr>
				 <td class='no'>".$i."</td>
				 <td class='type'>".$row->gallery_title."</td>							 	
				 <td class='type'>".$row->url."</td>							 	
				 <td class='type'>".$row->order."</td>
				 <td class='type'>".$home."</td>
				 <td class='remove_tag no_wrap'>";
				 
				 if($this->green->gAction("D")){
					$table.= "<a><img rel=".$row->gallery_id." onclick='deletestore(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
				 }
				 if($this->green->gAction("U")){
					$table.= "<a><img rel=".$row->gallery_id." onclick='update(event);' src='".base_url('assets/images/icons/edit.png')."'/></a>";
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
		$this->parser->parse('youtube/youtube_form', $data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function edit($storeid){
		$datas['row']=$this->db->query("SELECT * FROM tblgallery WHERE gallery_id='$storeid'")->row();
		$data['page_header']="New Store";			
		$this->parser->parse('greenadmin/header', $data);
		$this->load->view('youtube/youtube_form', $datas);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function viewall_v(){
		$lang='en';
		if($this->session->userdata('lang'))
			$lang=$this->session->userdata('lang');
		$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead;
		$data['page_header']="Store List";	
		$data['lang']=$lang;
		$datas['type']='feat';
		$datas['data']=$this->db->query("SELECT * FROM tblgallery WHERE gallery_type='1'")->result();
		$this->parser->parse('site/header', $data);
		$this->load->view('site/all_video', $datas);
		
		$this->parser->parse('site/footer', $data);
	}
	function delete($storeid){
		$this->db->where('gallery_id',$storeid)->delete('tblgallery');
	}
	function save(){
		$gallery_id = $this->input->post('gallery_id');
		$video_code = $this->input->post('video_code');

		if($this->input->post('home') == 1){
			$this->db->set('home',0)->update('tblgallery');
		}
		$count=$this->vaidate($video_code,$gallery_id);
		$data=array(
			'gallery_title' => $this->input->post('video_title'),
			'url' => $this->input->post('video_code'),
			'gallery_type' => 1,
			'home' => $this->input->post('home'),
			'location_id' => $this->input->post('location_id'),
			'order' => $this->input->post('order')
		);
		$msg='';
		if($count>0){
			$msg="Video Is already Exist...!";
			$storeid='';
		}else{
			if($gallery_id!=''){
				$this->db->where("gallery_id",$gallery_id)->update('tblgallery',$data);
				$msg="Video Has update...!";

			}
			else{
				$this->db->insert('tblgallery',$data);
				$gallery_id=$this->db->insert_id();
				$msg="Video Has Created...!";
			}
		}
		$arr=array('msg'=>$msg,'gallery_id'=>$gallery_id);
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function vaidate($code,$id){
		$where='';
		if($id!='')
			$where=" AND gallery_id <> $id";
		return $this->db->query("SELECT COUNT(*) as count FROM tblgallery WHERE url='$code' {$where}")->row()->count;

		// return
	}
}