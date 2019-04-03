<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {
	
	protected $thead;
	protected $idfield;
	protected $searchrow;	
	function __construct(){
		parent::__construct();
		//$this->lang->load('stock', 'english');
		$this->load->model("modproduct","pro");			
		$this->thead=array("No"=>'no',
							 "Project Name"=>'Project Name',
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
		$data=array('projectname' => $projectname,'is_active' => 1);
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
		
		$sql="SELECT * FROM tblproject
			  WHERE is_active=1 AND projectname LIKE '%$s_name%' order by projectid DESC";
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
				 <td class='type'>".$row->projectname."</td>							 	
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
}