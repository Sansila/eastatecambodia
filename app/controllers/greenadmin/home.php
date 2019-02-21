<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model("greenadmin/modgreenadmin","modgreen");
        
    }
	public function index()
	{
		$userid = $this->session->userdata('userid');
  		$roleid=$this->session->userdata('roleid'); 
		$data['allproperty'] = $this->modgreen->getallProperty($userid,$roleid);
		$data['page_header']="Here is Index Page";		
		$this->load->view('greenadmin/header',$data);
		$this->load->view('greenadmin/index',$data);
		$this->load->view('greenadmin/footer');	
	}
	function getChart($userid,$roleid)
	{
		$arr = array();
		$test = $this->modgreen->getPropertyCategory();
		foreach ($test as $t) {
			$arr[] = $this->modgreen->getCountAllPropertyByCategoryID($t->typeid,$t->typename,$userid,$roleid);
		}
		header("Content-type:text/x-json");
		echo json_encode($arr);	
	}
	function chartSatatus()
	{
		$userid = $this->session->userdata('userid');
  		$roleid=$this->session->userdata('roleid'); 
		$data['allproperty'] = $this->modgreen->getallProperty($userid,$roleid);
		$data['page_header']="Here is Index Page";		
		$this->load->view('greenadmin/header',$data);
		$this->load->view('greenadmin/chartstatus',$data);
		$this->load->view('greenadmin/footer');	
	}
	function getCountStatus($userid,$roleid)
	{
		$arr = array();
		$status = $this->modgreen->getCountStatus($userid,$roleid);
		foreach ($status as $row) {
			$name = "";
			if($row->p_type == 0)
				$name = "Other";
			if($row->p_type == 1)
				$name = "Sale";
			if($row->p_type == 2)
				$name = "Rent";
			if($row->p_type == 3)
				$name = "Sale & Rent";

			$arr[] = array('country'=>$name,'value'=>$row->st_type);
		}
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
}

