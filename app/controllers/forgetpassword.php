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
	function sendEmail()
	{
		$id = $this->input->post('token');
		$email = $this->input->post('email');

        $st = array('set_time'=>strtotime("+24 hours"));
        $this->db->where('userid',$id);
        $this->db->update('admin_user',$st);

		$config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'in-v3.mailjet.com',
            'smtp_port' => '587',
            'smtp_user' => '7014579117a5e5ecf128c4f00ab8e79f',
            'smtp_pass' => '34fb989f8376cadf70d3a7c128a2e8f9',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => '\r\n'
        );
        $this->load->library('email',$config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

        $logo = "http://estatecambodia.com/assets/img/logo.png";
        $description = '<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="width:8px" width="8"></td>
                        <td>
                            <div align="center" class="" style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px; padding:20px;">
                                <img src="'.$logo.'" style="width: 140px;">
                                <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">
                                    <div style="padding: 0px 10px 10px; text-align: center">
                                    	By clicking on the following link, you are confirming your new password.
                                    </div>
                                    <div style="padding-top:32px;text-align:center">
						            	<a href="http://estatecambodia.com/forgetpassword/changpassword/'.$id.'" style="font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;line-height:16px;color:#ffffff;font-weight:400;text-decoration:none;font-size:14px;display:inline-block;padding:5px 24px;background-color:#d94235;border-radius:5px;min-width:90px" data-saferedirecturl="http://estatecambodia.com/forgetpassword/changpassword/'.$id.'" target="_blank">
						            	Reset password now
						            	</a>
						            </div>
                                </div>
                            </div>
                                                    
                        </td>
                        <td style="width:8px" width="8"></td>
                    </tr>
                </tbody>
            </table>';
            
        $this->email->from('7014579117a5e5ecf128c4f00ab8e79f','Estate cambodia Property Agence');
        $this->email->to($email);
        $this->email->subject('Estate Cambodia - Requesting to reset account password');
        $this->email->message($description);

        if($this->email->send())
        {
            $this->load->view('forget/header');
            $this->load->view('forget/checkemail');
            $this->load->view('forget/footer');
        }
        else
        {
            show_error($this->email->print_debugger());
        }
	}
    function checkmessage()
    {
        $this->load->view('forget/header');
        $this->load->view('forget/checkemail');
        $this->load->view('forget/footer');
    }
}
