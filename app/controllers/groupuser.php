<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groupuser extends CI_Controller {
	protected $thead;
	protected $idfield;
	protected $searchrow;
    function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('encrypt');
        $this->load->helper(array('form', 'url'));
        $this->load->model("modgroupuser","guser");

        $this->thead=array("No"=>'no',
							 "Group Name"=>'Group Name',	 
							 "Admin User"=>'Admin User',	
							 "Visibled"=>'visibled',
							 "Action"=>'Action'							 	
							);
		$this->idfield="categoryid";

		//date_default_timezone_set("Asia/Bangkok");
    }
    public function index()
    {
    	$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead;
		$data['page_header']="Store List";	

		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('groupuser/add',$data);
		$this->parser->parse('greenadmin/footer', $data);
    }
    function add()
    {
    	$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead;
		$data['page_header']="Store List";	

		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('groupuser/add',$data);
		$this->parser->parse('greenadmin/footer', $data);
    }
    function save()
    {
    	$create_date = date('Y-m-d H:i:s');
    	$date_modify = date('Y-m-d H:i:s');
    	$person_modify = $this->session->userdata('userid');
    	$groupid = $this->input->post('groupid');

    	$data = array(
    		'groupname' => $this->input->post('groupname'),
    		'is_admin_group' => $this->input->post('is_admin'),
    		'remark' => $this->input->post('remark'),
    		'is_active' => $this->input->post('is_active'),
    		'modify_date' => $date_modify,
    		'modify_person' => $person_modify,
    	);
    	$data1 = array(
    		'create_date' => $create_date,
    	);

    	$msg='';
		$groupids=$this->guser->save($data,$data1,$groupid);
		if($groupids == $groupid)
			$msg="Group Name Has Updated...!";
		else
			$msg="Group Name Has Created...!";
		
		$arr=array('msg'=>$msg,'groupid'=>$groupids);
		header("Content-type:text/x-json");
		echo json_encode($arr);
    }
    function view()
    {
    	$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead;
		$data['page_header']="Store List";	

		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('groupuser/list',$data);
		$this->parser->parse('greenadmin/footer', $data);
    }
    function getdata()
    {
    	$perpage=$this->input->post('perpage');
		$s_name=$this->input->post('s_name');

		$sql="SELECT g.is_admin_group,
					 g.groupname,
					 g.groupid,
					 u.userid,
					 u.user_name,
					 u.is_active
			  FROM tblgroupuser g 
			  INNER JOIN admin_user u 
			  ON g.is_admin_group = u.userid
			  WHERE u.is_active = 1 
			  AND g.is_active = 1
			  AND g.groupname LIKE '%$s_name%'
			  ORDER BY g.groupid DESC
			 ";
		$table='';
		$pagina='';
		$paging=$this->green->ajax_pagination(count($this->db->query($sql)->result()),site_url("groupuser/getdata"),$perpage);
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
				<td class='title'>".$row->groupname."</td>
				<td class='title'>".$row->user_name."</td>
				<td class='title'>".$visibled."</td>
				<td class='remove_tag no_wrap'>";
				if($this->green->gAction("D")) {
					$table.= "<a><img rel=".$row->groupid." onclick='deletestore(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
				}
				if($this->green->gAction("U")){
					$table.= "<a><img rel=".$row->groupid." onclick='update(event);' src='".base_url('assets/images/icons/edit.png')."'/></a>";
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
    function delete($groupid)
    {
    	$data = array('is_active' => 0);
    	$this->db->where('groupid', $groupid)->update('tblgroupuser',$data);
    }
    function edit($groupid)
    {
    	$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead;
		$data['page_header']="Store List";	
		$data['groupid'] = $groupid;
		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('groupuser/add', $data);
		$this->parser->parse('greenadmin/footer', $data);
    }
}