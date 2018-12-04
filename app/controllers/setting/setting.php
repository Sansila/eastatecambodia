<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('setting/usermodel','user');
		$this->load->model('setting/rolemodel','role');
		$this->load->library('pagination');	
		$this->load->helper(array('form', 'url'));	
	}
	public function index()
	{	
		$data['query']=$this->user->getuser();
		$this->load->view('greenadmin/header');		
		$this->load->view('setting/vsetting',$data);
		$this->load->view('greenadmin/footer');
	}
	function profile(){
		$userid=$this->session->userdata('userid');
		$data['userrow']=$this->db->where('userid',$userid)->get('admin_user')->row();
		$this->load->view('greenadmin/header');		
		$this->load->view('setting/profile',$data);
		$this->load->view('greenadmin/footer');
	}
	function changepwd(){
		$userid=$this->session->userdata('userid');
		$data['userrow']=$this->db->where('userid',$userid)->get('admin_user')->row();
		$this->load->view('greenadmin/header');		
		$this->load->view('setting/change_password',$data);
		$this->load->view('greenadmin/footer');
	}
	function savechagepwd(){
		$old_password=$this->input->post('old_password');
		$password=$this->input->post('password');
		$userid=$this->session->userdata('userid');

		$pwd=$this->db->query("SELECT password FROM admin_user WHERE userid='$userid'")->row()->password;
		$msg='';
		if(md5($old_password)==$pwd){
			$this->db->where('userid',$userid)->set('password',md5($password))->update('admin_user');
			$msg='Your Password has been change.';

		}else{
			$msg='Your Old Password is incorect.';
			$userid='';
		}

		$arr=array('msg'=>$msg,'userid'=>$userid);
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function saveprofile(){
		$userid=$this->session->userdata('userid');
		$first_name=$this->input->post('first_name');
		$last_name=$this->input->post('last_name');
		$user_name=$this->input->post('user_name');
		$phone=$this->input->post('phone');
		$email=$this->input->post('email');
		$address=$this->input->post('address');
		$validat=$this->validat($user_name,$userid);
		$data=array('first_name'=>$first_name,
					'last_name'=>$last_name,
					'phone'=>$phone,
					'email'=>$email,
					'address'=>$address);
		if($validat>0){
			$msg="This User name is Already Exist";
			$userid="";
		}else{
			$this->db->where('userid',$userid)->update('admin_user',$data);
			$msg='User has been Save....!';
		}
		
		
		$arr=array('msg'=>$msg,'userid'=>$userid);
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function validat($user_name,$userid){
		return $this->db->query("SELECT COUNT(*) as count FROM admin_user WHERE user_name='$user_name' AND userid<>'$userid'")->row()->count;
	}
	function do_upload($id='')
	{
		if($id=='')
			$id=$this->session->userdata('userid');
		if(!file_exists('./assets/upload/adminuser/')){
		    if(mkdir('./assets/upload/adminuser/',0755,true)){
		        return true;
		    }
		}
		$config['upload_path'] ='./assets/upload/adminuser/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name']  = "$id.png";
		$config['overwrite']=true;
		$config['file_type']='image/png';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());			
			echo $error['error'];
		}
		else
		{				
		
			
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */