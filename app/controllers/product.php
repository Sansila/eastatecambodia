<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
	
	protected $thead;
	protected $idfield;
	protected $searchrow;	
	function __construct(){
		parent::__construct();
		//$this->lang->load('stock', 'english');
		$this->load->model("modproduct","pro");			
		$this->thead=array("No"=>'no',
							"Images"=>'image',
							 "Product Name"=>'name',
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
		$this->parser->parse('product/product_list', $data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function getdata(){
		$perpage=$this->input->post('perpage');
		$s_name=$this->input->post('s_name');
		
		$sql="SELECT * FROM tblproduct WHERE product_name LIKE '%$s_name%' and is_active='1'";
		$table='';
		$pagina='';
		$paging=$this->green->ajax_pagination(count($this->db->query($sql)->result()),site_url("product/getdata"),$perpage);
		$i=1;
		$limit=" LIMIT {$paging['start']}, {$paging['limit']}";
		$sql.=" {$limit}";
		$this->green->setActiveRole($this->session->userdata('roleid'));
        $this->green->setActiveModule($this->input->post('m'));
        $this->green->setActivePage($this->input->post('p')); 
		foreach($this->db->query($sql)->result() as $row){
			$visibled='No';
			if($row->is_active==1)
				$visibled="Yes";
			$image_part=base_url('assets/upload/no_image.jpg');
		    if(file_exists(FCPATH."/assets/upload/product/$row->product_id.png")){
		        $image_part=base_url("/assets/upload/product/$row->product_id.png");
		    }
			$table.= "<tr>
				 <td class='no' style='text-align:center'>".$i."</td>
				 <td class='title'><img src='".$image_part."' style='width:80px;'/></td>
				 <td class='title'>".$row->product_name."</td>
				 <td class='visibled' style='text-align:center'>".$visibled."</td>
				 <td class='remove_tag no_wrap'>";						
				 if($this->green->gAction("D")){
					$table.= "<a><img rel=".$row->product_id." onclick='deletestore(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
				 }
				 if($this->green->gAction("U")){
					$table.= "<a><img rel=".$row->product_id." onclick='update(event);' src='".base_url('assets/images/icons/edit.png')."'/></a>";
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
		$this->parser->parse('product/product_form', $data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function edit($product_id){
		$datas['row']=$this->db->query("SELECT * FROM tblproduct WHERE product_id='$product_id'")->row();
		$data['page_header']="New Store";			
		$this->parser->parse('greenadmin/header', $data);
		$this->load->view('product/product_form', $datas);
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
		$this->db->where('article_id',$storeid)->set('is_active',0)->update('tblarticle');
	}
	function save(){
		$product_id=$this->input->post('product_id');
		$menu_id=$this->input->post('menu_id');
		$content=$this->input->post('content');
		$content_b=$this->input->post('content_b');
		$product_name=$this->input->post('product_name');
		$is_active=$this->input->post('is_active');
		$msg='';
		$product_id=$this->pro->save($product_id,$product_name,$menu_id,$content,$content_b,$is_active);
		$msg="Product Has Created...!";
		$arr=array('msg'=>$msg,'product_id'=>$product_id);
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function do_upload($adsid){	
		if(!file_exists('./assets/upload/product/'))
		 {
		    if(mkdir('./assets/upload/product/',0755,true))
		    {
		                return true;
		    }
		    
		 }
			$config['upload_path'] ='./assets/upload/product/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|png';
			$config['max_size']	= '5000';
			$config['file_name']  = "$adsid.png";
			$config['overwrite']=true;
			$config['file_type']='image/png';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());			
			}
			else
			{		
					
			}
		}
	
}