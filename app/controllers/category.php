<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
	protected $thead;
	protected $idfield;
	protected $searchrow;	
	function __construct()
	{
		parent::__construct();
		//$this->lang->load('stock', 'english');
		$this->load->model("Modcategory","cat");
		$this->thead = array(
			"No"=>'no',
			"Menu Name"=>'location_name',
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
		$this->parser->parse('category/category_list', $data);
		$this->parser->parse('greenadmin/footer', $data);
	}

	function getdata()
	{
		$perpage=$this->input->post('perpage');
		$s_name=$this->input->post('s_name');		

		$sql="SELECT location_id, location_name, is_active 
		FROM tbllocation
		WHERE is_active=1 AND location_name LIKE '%$s_name%' order by location_id asc";

		$table='';
		$pagina='';
		$paging=$this->green->ajax_pagination(count($this->db->query($sql)->result()),site_url("category/getdata"),$perpage);

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
				<td class='type'>".$row->location_name."</td>
				<td class='country'>".$visibled."</td>
				<td class='remove_tag no_wrap'>";

			if($this->green->gAction("D")){
				$table.= "<a><img rel='".$row->location_id."'  onclick='deletestore(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
			}
			if($this->green->gAction("U")){
				$table.= "<a><img rel='".$row->location_id."'  onclick='update(event);' src='".base_url('assets/images/icons/edit.png')."'/></a>";
			}

			$table.= " </td></tr>";
			$i++;
		}

		$arr['data']=$table;
		$arr['pagina']=$paging;
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}

	function add()
	{
		$data['page_header']="New Category";
		$this->load->view('greenadmin/header', $data);
		$this->load->view('category/category_form', $data);
		$this->load->view('greenadmin/footer', $data);
	}

	function edit($storeid)
	{
		$datas['row']=$this->db->query("SELECT * FROM tbllocation WHERE location_id='$storeid'")->row();

		$data['page_header']="New Store";			
		$this->parser->parse('greenadmin/header', $data);
		$this->load->view('category/category_form', $datas);
		$this->parser->parse('greenadmin/footer', $data);
	}

	function delete($storeid)
	{
		$this->db->where('location_id',$storeid)->delete('tbllocation');
	}

	function save()
	{
		$location_id=$this->input->post('location_id');
		$location_name=$this->input->post('location_name');
		$is_active=$this->input->post('is_active');
		$count=$this->cat->vaidate($location_name,$location_id);
		$msg='';
		if($count>0){
			$msg="Category Is already Exist...!";
			$storeid='';
		}else{
			$menu_id=$this->cat->save($location_id,$location_name,$is_active);
			$msg="Category Has Created...!";
		}
		$arr=array('msg'=>$msg,'location_id'=>$location_id);
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
}