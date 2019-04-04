<?php   
class Forgetpassword extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('encrypt');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        
    }
    public function index()
    {

    }
	function enteremail()
	{
		$this->load->view('forget/header');
		$this->load->view('forget/enteremail');
		$this->load->view('forget/footer');
	}
	function getuserid()
	{
		$email = $this->input->post('email');
		$id = $this->db->query("SELECT * FROM admin_user where email = '$email' AND is_active = 1 ")->row();
		if($id){
			header("Content-type:text/x-json");
			echo json_encode($id->userid);
		}else{
			header("Content-type:text/x-json");
			echo json_encode('');
		}
	}
	function resetpassword()
	{
		$id = $this->input->post('id');
		$email = $this->input->post('email');
		$cnpwd = $this->input->post('confirm_password');
		$data = array(
			'password' => md5($cnpwd),
		);
		$this->db->where('userid',$id);
		$this->db->update('admin_user',$data);

		redirect(site_url('login'));
	}
	function changpassword($id)
	{
		$user = $this->db->query("SELECT * FROM admin_user where userid = $id")->row();

        if($user->set_time >= time())
        {
            $data['id'] = $user->userid;
            $data['email'] = $user->email;
            $this->load->view('forget/header');
            $this->load->view('forget/formforgetpassword',$data);
            $this->load->view('forget/footer');
        }else{
            redirect(site_url('forgetpassword/enteremail'));
        }
	}
    function checkmessage()
    {
        $this->load->view('forget/header');
        $this->load->view('forget/checkemail');
        $this->load->view('forget/footer');
    }
}
