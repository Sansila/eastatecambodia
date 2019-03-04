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
		$id = $this->input->post('token');
		$email = $this->input->post('email');
		$data['id'] = $id;
		$data['email'] = $email;
		$this->load->view('forget/header');
		$this->load->view('forget/formforgetpassword',$data);
		$this->load->view('forget/footer');
	}
	function changpassword()
	{
		$id = $this->input->post('id');
		$email = $this->input->post('email');
		$cnpwd = $this->input->post('confirm_password');
		$data = array(
			'password' => md5($cnpwd),
		);
		$this->db->where('userid',$id);
		$this->db->update('admin_user',$data);

		$this->sendEmail($id,$email);
	}
	function sendEmail($id,$email)
	{
		$config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'sansila.dev@gmail.com',
            'smtp_pass' => '@Sila.com.Dev'
        );

        //$name  = $this->input->post('name');
       // $email = $this->input->post('customer_mail');
        //$desc  = $this->input->post('comments');
        //$owner = $this->input->post('owner');

        $desc = "<a>confirm password</a>";

        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");

        $this->email->from('sansila.dev@gmail.com');
        $this->email->to($email);
        $this->email->subject('Confirm New Password');
        $this->email->message($desc);

        if($this->email->send())
        {
            redirect(site_url('login'));
        }
        else
        {
            show_error($this->email->print_debugger());
        }
	}
}
