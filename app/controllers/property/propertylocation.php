<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PropertyLocation extends CI_Controller {
	
	protected $thead;
	protected $idfield;
	protected $searchrow;	
	function __construct(){
		parent::__construct();
		//$this->lang->load('stock', 'english');
		$this->load->model("property/modprolocation","loc");			
		$this->thead=array("No"=>'no',
							"Location Name "=>'Location Name',
							 "Visibled"=>'visibled',
							 "Action"=>'Action'							 	
							);
		$this->idfield="propertylocationid";
		
	}
	
	function index()
	{
		$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead;
		$data['page_header']="Property type List";	

		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('property/propertylocation/view', $data);
		$this->parser->parse('greenadmin/footer', $data);
    }
    function add()
    {
		$data['page_header']="New Property";			
		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('property/propertylocation/form_add',$data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function save()
	{
		$loc_id = $this->input->post('loc_id');
		$loc_name = $this->input->post('loc_name');

		$data = array(
			'locationname' => $this->input->post('loc_name'),
      		'parent_id' => $this->input->post('parent_id'),
			'status' => $this->input->post('is_active'),
		);

		$count = $this->loc->vaidate($loc_name,$loc_id);
		$msg = '';
		if($loc_id > 0){
			$this->db->where('propertylocationid',$loc_id)->update('tblpropertylocation', $data);
			$msg="Property Location Has Update...!";
		}else{
			if($count > 0) {
				$msg = "Property Location Is already Exist...!";
			} else {
				$loc_id = $this->loc->save($data, $loc_id);
				$msg="Property Location Has Created...!";
			}
		}

		$arr=array('msg'=>$msg,'loc_id'=>$loc_id);
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function getdata(){
		$perpage=$this->input->post('perpage');
		$s_name=$this->input->post('s_name');
		
		$sql="SELECT *
		FROM tblpropertylocation pl
		WHERE pl.status=1 AND pl.locationname LIKE '%$s_name%' order by pl.lineage asc";
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
			if($row->status==1)
				$visibled="Yes";
			
			$table.= "<tr>
				 <td class='no'>".$i."</td>
				 <td class='name'>".str_repeat("---- &nbsp;",$row->level)."<span class='catline_".$row->level."'>".$row->locationname."</span>"."</td>		
				 <td class='type'>".$visibled."</td>
				 <td class='remove_tag no_wrap'>";
				 
				 if($this->green->gAction("D")){
					$table.= "<a><img rel=".$row->propertylocationid." onclick='deletestore(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
				 }
				 if($this->green->gAction("U")){
					$table.= "<a><img rel=".$row->propertylocationid." onclick='update(event);' src='".base_url('assets/images/icons/edit.png')."'/></a>";
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
	function edit($id)
	{
		$datas['id'] = $id;
		$data['page_header']="New Property Type";			
		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('property/propertylocation/form_add',$datas);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function delete($storeid)
	{
		$this->db->where('propertylocationid',$storeid)->delete('tblpropertylocation');
	}
}