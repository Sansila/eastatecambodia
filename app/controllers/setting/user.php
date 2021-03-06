<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {

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
		$this->load->view('setting/user/add');
		$this->load->view('setting/user/view',$data);
		$this->load->view('greenadmin/footer');
	}
	function userprofile(){
		$userid=$this->session->userdata('userid');
		$data['user']=$this->db->query("SELECT * FROM admin_user adm 
										INNER JOIN z_role r 
										ON(adm.roleid=r.roleid)
										WHERE adm.userid='$userid'")->row();
		$this->load->view('greenadmin/header');
		$this->load->view('setting/user/user_profile',$data);
		$this->load->view('greenadmin/footer');
	}
	function saveprofile(){
		$last_name=$this->input->post('last_name');
		$first_name=$this->input->post('first_name');
		$email=$this->input->post('email');
		$old_pwd=$this->input->post('old_pwd');
		$new_pwd=$this->input->post('new_pwd');
		$is_pwd=$this->input->post('is_pwd');
		$userid=$this->session->userdata('userid');

		$msg='';
		$data=array('last_name'=>$last_name,
					'first_name'=>$first_name,
					'email'=>$email);
		if($is_pwd!=''){
			$row=$this->db->where('userid',$userid)->get('admin_user')->row();
			if(md5($old_pwd)==$row->password){
				$data2=array('password'=>md5($new_pwd));
				$this->db->where('userid',$userid)->update('admin_user',array_merge($data,$data2));
				$msg="Your Password and data has been change successful";
			}else{
				$msg="Your Old password is incorrect.!";
			}
		}else{
			$this->db->where('userid',$userid)->update('admin_user',$data);
			$msg="Your data has been Update successful";
		}
		header("Content-type:text/x-json");
		echo json_encode($msg);
	}
	function do_upload($id,$file)
	{
		$this->load->library('upload');
		if($file != "")
		{
			$this->upload->initialize($this->set_upload_options($id,$file));
	        if ( ! $this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());			
			}else{	
				$this->creatthumb($id,$file);
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	function creatthumb($id,$imagename){
		$data = array('upload_data' => $this->upload->data());
	 	$config2['image_library'] = 'gd2';
        $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
        $config2['new_image'] = './assets/upload/adminuser/thumb';
        $config2['maintain_ratio'] = false;
        $config2['create_thumb'] = "$id.png";
        $config2['thumb_marker'] = false;
        $config2['height'] = 145;
		$config2['width'] = 135;
		$config2['quality'] = 100;
        $this->load->library('image_lib');
        $this->image_lib->initialize($config2); 
        if ( ! $this->image_lib->resize()){
        	echo $this->image_lib->display_errors();
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
		
	}

	private function set_upload_options($id,$imagename)
	{   
	    if(!file_exists('./assets/upload/adminuser/')){
		    if(mkdir('./assets/upload/adminuser/',0755,true)){
		        return true;
		    }
	    	if(mkdir('./assets/upload/adminuser/thumb',0755,true)){
		        return true;
		    }
		}
	    $config = array();
	    $config['upload_path'] = './assets/upload/adminuser/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|mpeg|mpg|mp4|mpe|qt|avi|mov';
	    $config['max_size']      = '0';
	    $config['file_name']  	 = "$id.png";
		$config['overwrite']	 = true;

	    return $config;
	}
	function edit($id){
		$data1['query']=$this->user->getuserrow($id);
		$this->load->view('greenadmin/header');
		$this->load->view('setting/user/edit',$data1);
		$data['query']=$this->user->getuser();
		$this->load->view('setting/user/view',$data);
		$this->load->view('greenadmin/footer');
	}
	function edit_isinactive($id,$approve)
	{
		$data1['query']=$this->user->getuserrowinactive($id);
		$data1['approve'] = $approve;
		$this->load->view('greenadmin/header');
		$this->load->view('setting/user/edit',$data1);
		$data['query']=$this->user->getuser();
		$this->load->view('setting/user/view',$data);
		$this->load->view('greenadmin/footer');
	}
	function search(){
		
		$f_name=$this->input->post('f_name');
		$l_name=$this->input->post('l_name');
		$u_name=$this->input->post('u_name');
		$email=$this->input->post('email');
		$roleid=$this->input->post('roleid');
		$phone=$this->input->post('phone');
		$require=$this->input->post('require');
			//$schoolid=$_GET['schoolid'];
			//$year=$_GET['year'];
		// $data['query']=$this->user->searchuser($f_name,$l_name,$u_name,$email,$roleid);
		// $this->load->view('greenadmin/header');
		// $this->load->view('setting/user/add');
		// $this->load->view('setting/user/view',$data);
		// $this->load->view('greenadmin/footer');
	
		$query=$this->user->searchuser($f_name,$l_name,$u_name,$email,$roleid,$phone,$require);
			
			 $i=1; $req = '';
			foreach ($query as $row) {
				if($row->get_requirement == 1)
					$req = "Yes";
				else
					$req = "No";
				echo "
								<tr>
									<td align='center'>$i</td>
									<td>$row->first_name</td>
									<td>$row->last_name</td>
									<td>$row->user_name</td>
									<td>$row->phone</td>
									<td>$row->email</td>
									<td>$row->role</td>
									<td>".date("d-m-Y", strtotime($row->last_visit))."</td>
									<td>".date("d-m-Y", strtotime($row->created_date))."</td>
									<td>".$req."</td>
									";
									if($row->is_admin!='1')
										echo "<td align='center'><a><img rel='$row->userid' onclick='deleteuser(event);' src='".base_url('assets/images/icons/delete.png')."'/></a> <a><img  rel='$row->userid' onclick='updateuser(event);' src='".base_url('assets/images/icons/edit.png')."'/></a></td>";
									else
										echo "<td><a><img  rel='$row->userid' onclick='updateuser(event);' src='".base_url('assets/images/icons/edit.png')."'/></a></td>";
								echo "</tr>";# code...
							$i++;
			}
			// echo "<tr>
			// 	<td colspan='12' id='pgt'><div style='text-align:center'><ul class='pagination' style='text-align:center'>".$this->pagination->create_links()."</ul></div></td>
			// </tr>";
		
	}
	function search_inactive(){
		
		// if(isset($_GET['f_name'])){
		// 	$f_name=$_GET['f_name'];
		// 	$l_name=$_GET['l_name'];
		// 	$u_name=$_GET['u_name'];
		// 	$email=$_GET['email'];
		// 	$roleid=$_GET['roleid'];
		// 	$schoolid=$_GET['schoolid'];
		// 	$year=$_GET['year'];
		// 	$data['query']=$this->user->search_inactive($f_name,$l_name,$u_name,$email,$roleid,$schoolid,$year);
		// 	$this->load->view('header');
		// 	$this->load->view('setting/user/add');
		// 	$this->load->view('setting/user/view',$data);
		// 	$this->load->view('footer');
		// }
		$f_name=$this->input->post('f_name');
		$l_name=$this->input->post('l_name');
		$u_name=$this->input->post('u_name');
		$email=$this->input->post('email');
		$roleid=$this->input->post('roleid');
	
		$query=$this->user->search_inactive($f_name,$l_name,$u_name,$email,$roleid);
			
		$i=1;
		foreach ($query as $row) {
			echo "
							<tr>
								<td align='center'>$i</td>
								<td>$row->first_name</td>
								<td>$row->last_name</td>
								<td>$row->user_name</td>
								<td>$row->email</td>
								<td>$row->role</td>
								<td>".date("d-m-Y", strtotime($row->last_visit))."</td>
								<td>".date("d-m-Y", strtotime($row->created_date))."</td>";
								if($row->is_admin!='1')
									echo "<td align='center'><a><img rel='$row->userid' onclick='deleteuser(event);' src='".base_url('assets/images/icons/delete.png')."'/></a> <a><img  rel='$row->userid' onclick='updateuser(event);' src='".base_url('assets/images/icons/edit.png')."'/></a></td>";
								else
									echo "<td></td>";
							echo "</tr>";# code...
						$i++;
		}
		echo "<tr>
			<td colspan='12' id='pgt'><div style='text-align:center'><ul class='pagination' style='text-align:center'>".$this->pagination->create_links()."</ul></div></td>
		</tr>";
		
	}
	function saveuser(){

		$creat_date=date('Y-m-d H:i:s');
		$f_name=$this->input->post('txtf_name');
		$l_name=$this->input->post('txtl_name');
		$username=$this->input->post('txtu_name');
		$pwd=md5($this->input->post('txtpwd'));
		$password=$this->input->post('txtpwd');
		$email=$this->input->post('txtemail');
		$role=$this->input->post('cborole');
		$schlevel=$this->input->post('schlevelid');
		$count=$this->user->getuservalidate($username,$email);
		$store=$this->input->post('cbostore');
		$phone=$this->input->post('txtphone');
		$gender=$this->input->post('gender');
		$address=$this->input->post('address');
		$groupid = $this->input->post('txtgroup');
		$get_require = $this->input->post('getrequire');
		$file = $_FILES['userfile']['name'];
		//print_r($store);
		if($count!=0){
			$data1['error']='This username and your email has been created before Please choose other username ';
			$this->load->view('greenadmin/header');
			$this->load->view('setting/user/add',$data1);
			$data['query']=$this->user->getuser();
			$this->load->view('setting/user/view',$data);
			$this->load->view('greenadmin/footer');
		}else{
			if($role==1)
				$admin=1;
			else
				$admin=0;
			$data=array(
					'first_name'=>$f_name,
					'last_name'=>$l_name,
					'user_name'=>$username,
					'password'=>$pwd,
					'email'=>$email,
					'phone'=>$phone,
					'gender'=>$gender,
					'roleid'=>$role,
					'address'=>$address,
					'created_date'=>$creat_date,
					'is_admin'=>$admin,
					'is_active'=>1,
					'group_id'=> $groupid,
					'get_requirement' => $get_require,
					'realpassword' => $password
				);
			$this->db->insert('admin_user',$data);
			$id=$this->db->insert_id();			
			$this->do_upload($id, $file);
		}
		
	}
	function savestore($userid,$storeid){
		$data=array('userid'=>$userid,
					'storeid'=>$storeid);
		$this->db->insert('rela_adminuser_store_detail',$data);
	}
	function update(){
		$userid=$this->input->post('txtuserid');
		$f_name=$this->input->post('txtf_name');
		$l_name=$this->input->post('txtl_name');
		$username=$this->input->post('txtu_name');
		$pwd=md5($this->input->post('txtpwd'));
		$password=$this->input->post('txtpwd');
		$email=$this->input->post('txtemail');
		$role=$this->input->post('cborole');
		$store=$this->input->post('cbostore');
		$phone=$this->input->post('txtphone');
		$gender=$this->input->post('gender');
		$address=$this->input->post('address');
		$approve = $this->input->post('txtapprove');
		$modify_date=date('Y-m-d H:i:s');
		$groupid = $this->input->post('txtgroup');
		$get_require = $this->input->post('getrequire');
		$file = $_FILES['userfile']['name'];

		$realpwd=$this->user->getrealpwd($userid);

		$count=$this->user->getuservalidateup($username,$email,$userid);

		if($count!=0){
			$data1['query']=$this->user->getuserrow($userid);
			$data['error']=(object) array('error'=>"<div style='text-align:center; color:red;'>This username and your email has been created before Please choose other username </div>");
			$this->load->view('greenadmin/header');
			$data['query']=$this->user->getuser();
			$this->load->view('setting/user/edit',$data1);
			$this->load->view('setting/user/view',$data);
			$this->load->view('greenadmin/footer');
		}else{
			if($role==1)
				$admin=1;
			else
				$admin=0;

			$u_row=$this->user->getuserrow($userid);
			if($u_row->password!=$this->input->post('txtpwd')){
				$datas=array(
					'first_name'=>$f_name,
					'last_name'=>$l_name,
					'user_name'=>$username,
					'email'=>$email,
					'phone'=>$phone,
					'gender'=>$gender,
					'address'=>$address,
					'password'=>$pwd,
					'roleid'=>$role,
					'is_admin'=>$admin,
					'is_active'=>1,
					'modified_date' => $modify_date,
					'modified_by' => $this->session->userdata('userid'),
					'group_id'=> $groupid,
					'get_requirement' => $get_require,
					'realpassword' => $password
				);
			}else{
					$datas=array(
					'first_name'=>$f_name,
					'last_name'=>$l_name,
					'user_name'=>$username,
					'email'=>$email,
					'phone'=>$phone,
					'gender'=>$gender,
					'address'=>$address,
					'roleid'=>$role,
					'is_admin'=>$admin,
					'is_active'=>1,
					'modified_date'=> $modify_date,
					'modified_by' => $this->session->userdata('userid'),
					'group_id'=> $groupid,
					'get_requirement' => $get_require,
				);
			}
			$this->db->where('userid',$userid);
			$this->db->update('admin_user',$datas);

			$this->sendEmail($username,$realpwd,$email,$approve,$userid,$file);
		}
	}
	
	function delete($id){
		$data=array('is_active'=>0);
		$this->db->where('userid',$id);
		$this->db->update('admin_user',$data);
		unlink('./assets/upload/adminuser/'.$id.'.png');
		unlink('./assets/upload/adminuser/thumb/'.$id.'.png');
		redirect('setting/user/');
	}
	function delete_user($id)
	{
		$this->db->where('userid',$id);
		$this->db->delete('admin_user');
	}
	function sendEmail($username,$realpwd,$email,$approve,$userid,$file)
	{
		require('phpmailer/class.phpmailer.php');
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = "ssl";
        $mail->Port     = 465;
        $mail->Host     = "smtp.gmail.com";
        $mail->Mailer   = "smtp";
        $mail->WordWrap   = 80;

        $mail->SetFrom("estatecambodia168.dev@gmail.com", "Estate Cambodia");
        $mail->Subject = "Estate Cambodia - User Acount Has Been Changed";
        $mail->AddAddress($email);

        if($approve !="")
        	$pwd = '<li>- Password: '.$realpwd.'</li>';
        else
        	$pwd = "";

        $logo = "http://estatecambodia.com/assets/img/logo.png";
        $description = '<div style="width: 100%">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 640px; margin: 0 auto;">
                <tbody>
                    <tr>
                        <td style="width:8px" width="8"></td>
                        <td>
                            <div align="center" class="" style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px; padding:20px;">
                                <img src="'.$logo.'" style="width: 140px;">
                                <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
                                    Your account has been Changed.
                                    <ul style="list-style: none; text-align: left;">
                                    	<li>- User Name:'.$username.'</li>
                                        '.$pwd.'
                                    </ul>
                                    <p style="font-style: italic;">* Please change your password after login.</p>
                                </div>
                                <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
                                    Please click the following link to login your account.
                                    <a href="estatecambodia.com/login">estatecambodia.com/login</a>
                                </div>
                                <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
                                    <p>Best regards,</p>
                                    <p>Estate Cambodia Team</p>
                                </div>
                            </div>
                        </td>
                        <td style="width:8px" width="8"></td>
                    </tr>
                </tbody>
            </table>
        </div>';

        $mail->MsgHTML($description);
        $mail->IsHTML(true);
        if(!$mail->Send()){
            echo "<p class='error'>Problem in Sending Mail.</p>";
        }else
        {
        	$this->do_upload($userid, $file);
        }
        //$this->do_upload($userid);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */