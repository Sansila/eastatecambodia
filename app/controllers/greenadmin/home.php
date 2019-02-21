<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model("greenadmin/modgreenadmin","modgreen");
        
    }
	public function index()
	{
		$data['page_header']="Here is Index Page";		
		$this->load->view('greenadmin/header',$data);
		$this->load->view('greenadmin/index',$data);
		$this->load->view('greenadmin/footer');	
	}
	function getChart()
	{
		$arr = "";
		$test = $this->modgreen->getPropertyCategory();
		foreach ($test as $t) {
			$arr = $this->modgreen->getCountAllPropertyByCategoryID($t->typeid,$t->typename);
			header("Content-type:text/x-json");
			echo json_encode($arr);	
		}
	}
}

