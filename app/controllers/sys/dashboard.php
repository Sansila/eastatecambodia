<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Dashboard extends CI_Controller {

	

	protected $thead;

	protected $idfield;

	protected $searchrow;	

	function __construct(){

		

		parent::__construct();

		$this->load->library('pagination');			

		$this->load->model('sys/ModDashBoard','dash');		



		$this->idfield="studentid";

	}

	function index(){

		$s_date=date('Y-m-d',strtotime("-3 months"));

		$e_date=date('Y-m-d');



		$data['data']="";		

		

		$data['thead']=	$this->thead;

		$data['page_header']="Disease List";	

		$this->parser->parse('greenadmin/header', $data);

		$this->parser->parse('sys/dashboard_form', $data);

		$this->parser->parse('greenadmin/footer', $data);

	}

	function search($year,$s_date='',$e_date='',$s_minage='',$s_maxage=''){

		if($s_date=='')

			$s_date=date('Y-m-d',strtotime("-3 months"));

		if($e_date=='')

			$e_date=date('Y-m-d');



		$data['data']="";

		$data['thead']=	$this->thead;

		$data['page_header']="Disease List";	

		$this->parser->parse('greenadmin/header', $data);

		$this->parser->parse('sys/dashboard_form', $data);

		$this->parser->parse('greenadmin/footer', $data);

	}



	function site_profile() {

		$data['row'] = $this->dash->getsiteprofile();

		$this->load->view('greenadmin/header', $data);

		$this->load->view('sys/profile_form', $data);

		$this->load->view('greenadmin/footer', $data);

	}



	function profile_save() {

		$msg = '';

		$status = false;

		$id = $this->input->post('site_id');

		$data = array(

			'site_name' => $this->input->post('site_name'),

			'phone' => $this->input->post('phone'),

			'email' => $this->input->post('email'),

			'address' => $this->input->post('address'),

			'facebook' => htmlentities($this->input->post('facebook')),

			'google_plus' => htmlentities($this->input->post('google_plus')),

			'youtube' => htmlentities($this->input->post('youtube')),

			'twitter' => htmlentities($this->input->post('twitter')),

			'linkedin' => htmlentities($this->input->post('linkedin')),
			// 'video' => $this->input->post('video'),

		);



		if($this->dash->profile_save($data, $id)) {

			$msg = 'Profile Updated...!';

			$status = true;

		} else {

			$msg = 'Something wrong';

		}



		$arr=array('msg'=>$msg,'status'=>$status);

		header("Content-type:text/x-json");

		echo json_encode($arr);

	}



}