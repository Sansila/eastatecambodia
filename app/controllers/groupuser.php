<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groupuser extends CI_Controller {
	protected $thead;
	protected $idfield;
	protected $searchrow;
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('encrypt');
        $this->load->helper(array('form', 'url'));
        $this->load->model("modgroupuser","guser");

        $this->thead=array("No"=>'no',
							 "Category Name"=>'name',	 
							 "Parent"=>'parent',	
							 "MenuType"=>'location',	
							 "Article"=>'article',	
							 "Visibled"=>'visibled',
							 "Action"=>'Action'							 	
							);
		$this->idfield="categoryid";

		date_default_timezone_set("Asia/Bangkok");
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
}