<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	protected $thead;
	protected $theadkh;
	protected $idfield;
	protected $searchrow;	

	function __construct(){
		parent::__construct();
		$this->load->library('pagination');	
		$this->load->library('session');		
		$this->load->model('sys/ModDashBoard','dash');		
		$this->load->model("property/modproperty","pro");
		$this->load->model('setting/usermodel','user');
		$this->load->model('setting/rolemodel','role');

		$this->thead=array("No"=>'no',
							"Date"=>"Date",
							"User Name"=>'User Name',
							"Pro_Number"=>'Pro_Number',
							"Property Name"=>'Property Name',
							"Category"=> "Category",
							"Location"=> "Location",
							"Hit" => "Hit",
							"Property Type" => "Property Type",
							"Visibled"=>'visibled',
							"Action"=>'Action'							 	
							);
		$this->theadkh=array("លេខរាង"=>'លេខរាង',
							"ថ្ងៃខែ"=>"ថ្ងៃខែ",
							"ឈ្មោះអ្នកប្រើ"=>'ឈ្មោះអ្នកប្រើ',
							"លេខរាងអចនទ្រព្យ"=>'លេខរាងអចនទ្រព្យ',
							"ឈ្មោះអចនទ្រព្យ"=>'ឈ្មោះអចនទ្រព្យ',
							"ប្រភេទ"=> "ប្រភេទ",
							"តំបន់"=> "តំបន់",
							"មើល" => "មើល",
							"ប្រភេទ" => "ប្រភេទ",
							"បង្ហាញ"=>'បង្ហាញ',
							"កំណត់"=>'កំណត់'							 	
							);
		$this->idfield="categoryid";

	}

	function index(){

		$s_date=date('Y-m-d',strtotime("-3 months"));
		$e_date=date('Y-m-d');
		$data['data']="";		
		$data['idfield']=$this->idfield;

		if($this->session->userdata('site_lang') == "khmer"){
			$data['thead']=	$this->theadkh;
		}
		else{
			$data['thead']=	$this->thead;
		}

		$data['page_header']="Disease List";
		$data['count_property'] = $this->dash->CountPropertyisInactive();
		$data['count_inactive_user'] = $this->dash->CountInactiveUser();
		$data['active_property'] = $this->dash->CountActiveProperty();
		$data['active_user'] = $this->dash->CountActiveUser();
		$data['query']=$this->user->getuser_inactive();
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