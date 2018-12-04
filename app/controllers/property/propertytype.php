<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Propertytype extends CI_Controller {
	
	protected $thead;
	protected $idfield;
	protected $searchrow;	
	function __construct(){
		parent::__construct();
		$this->load->model("property/Modpropertytype","prop");			
		$this->thead=array("No"=>'no',
							"Pro-type Name"=>'Pro-type Name',
							"Pro-type Note"=>'Pro-type Note',
							"Visible"=>'Visible',
							"Action"=>'Action'							 	
							);
		$this->idfield="propertytype_id";
		
	}
	
	function index()
	{
		$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead;
		$data['page_header']="Property type List";	

		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('property/propertytype/lists_view', $data);
		$this->parser->parse('greenadmin/footer', $data);
    }
    function add()
    {
		$data['page_header']="New Property Type";			
		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('property/propertytype/form_add',$data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function save()
	{
		$input = $this->input->post();
		$protype_id = $input['protype_id'];
		$data = array(
			'typename' => $input['protype_name'],
			'type_note' => $input['protype_note'],
			'type_status' => $input['is_active']
		);
		$count = $this->prop->vaidate($input['protype_name'],$protype_id);
		$msg = '';
		//$countid = $this->db->query("SELECT Count(menu_id) AS menuid FROM tblmenus WHERE menu_id ='$menu_id' ")->row()->menuid;
		if($protype_id > 0){
			$this->db->where('typeid',$protype_id)->update('tblpropertytype', $data);
			$msg = "Propertytype Has Update...!";
		}else{ 

			if($count > 0) {
				$msg = "Propertytype Is already Exist...!";
				$storeid = '';
			} else {
				$protype_id = $this->prop->save($data, $protype_id);
				$msg="Propertytype Has Created...!";
			}

		}

		$arr=array('msg'=>$msg,'typeid'=>$protype_id);
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function getdata(){
		$perpage=$this->input->post('perpage');
		$s_name=$this->input->post('s_name');
		
		$sql="SELECT *
		FROM tblpropertytype pro
		WHERE pro.type_status=1 AND pro.typename LIKE '%$s_name%' order by pro.typeid asc";
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
			if($row->type_status==1)
				$visibled="Yes";
			
			$table.= "<tr>
				 <td class='no'>".$i."</td>										
				 <td class='type'>".$row->typename."</td>							 	
				 <td class='type'>".$row->type_note."</td>
				 <td class='type'>".$visibled."</td>
				 <td class='remove_tag no_wrap'>";
				 
				 if($this->green->gAction("D")){
					$table.= "<a><img rel=".$row->typeid." onclick='deletestore(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
				 }
				 if($this->green->gAction("U")){
					$table.= "<a><img rel=".$row->typeid." onclick='update(event);' src='".base_url('assets/images/icons/edit.png')."'/></a>";
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
	function edit($protype_id)
	{
		$datas['id'] = $protype_id;
		$data['page_header']="New Property Type";			
		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('property/propertytype/form_add',$datas);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function delete($protype_id)
	{
		$this->db->where('typeid',$protype_id)->delete('tblpropertytype');
	}
	
}