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
		$data['counter_finder'] = $this->dash->CountFinderProperty();
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
	function getdatainactiveuser()
	{
		$where = '';
		$perpage=$this->input->post('perpage');
		$fname=$this->input->post('fname');
		$lname=$this->input->post('lname');
		$uname=$this->input->post('uname');
		$email=$this->input->post('email');

		if($fname !="")
			$where.= " AND first_name LIKE '%$fname%' ";
		if($lname !="")
			$where.= " AND last_name LIKE '%$lname%' ";
		if($uname !="")
			$where.= " AND user_name LIKE '%$uname%' ";

		$sql="SELECT * FROM admin_user WHERE is_active = 0 AND (type_post IS NOT NULL OR type_post='join') {$where} ";
		$table='';
		$pagina='';
		$paging=$this->green->ajax_pagination(count($this->db->query($sql)->result()),site_url("sys/dashboard/getdatainactiveuser"),$perpage);
		$no=1;
		$limit=" LIMIT {$paging['start']}, {$paging['limit']}";
		$sql.=" {$limit}";
		$this->green->setActiveRole($this->session->userdata('roleid'));
        $this->green->setActiveModule($this->input->post('m'));
        $this->green->setActivePage($this->input->post('p'));

		foreach($this->db->query($sql)->result() as $row){
			$table.= "<tr>
				 <td class='no'>".$no."</td>
				 <td class='name'>".$row->first_name."</td>											
				 <td class='type'>".$row->last_name."</td>							 	
				 <td class='type'>".$row->user_name."</td>							 	
				 <td class='type'>".$row->email."</td>
				 <td class='country'>".$row->created_date."</td>
				 <td class='remove_tag no_wrap'>";
				 
				 if($this->green->gAction("D")){
					$table.= "<a style='padding:0px 5px;'><img rel=".$row->userid." onclick='deleteuser(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
				 }

				 if($this->green->gAction("U")){
					$table.= "<a style='padding:0px 5px;'><img rel=".$row->userid." onclick='updateuser(event);' src='".base_url('assets/images/icons/edit.png')."'/></a>";
				 }
			$table.= " </td>
				 </tr>
				 ";										 
			$no++;	 
		}

		$arr['data']=$table;
		$arr['pagina']=$paging;
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
}