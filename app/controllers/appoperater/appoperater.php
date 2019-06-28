<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appoperater extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("Modappoperater","app");	
	}

	public function index()
	{

	}
	function login($user,$pass)
	{	
		$password = md5($pass);
		$sql = $this->db->query("SELECT * FROM admin_user 
										  WHERE 
											user_name = '$user' 
										  AND 
										  	password = '$password' 
										  AND 
										  	is_active = 1
										  	")->row();
    	if($sql)
    		echo "Login Success";
    	else
    		echo "Login False";

	}
	function getCategory()
	{
		$cates = array();
		$cate = $this->app->getCategory();
		foreach ($cate as $row) {
			$cates[] = array('typeid' => (int)$row->typeid,
				             'typename' => $row->typename,
				         );
		}
		header("Content-type:text/x-json");
		echo json_encode($cates);
	}
	function getLocation()
	{
		$locs = array();
		$loc = $this->app->getLocation();
		foreach ($loc as $row) {
			$locs[] = array('propertylocationid' => (int)$row->propertylocationid,
							'locationname' => $row->locationname
							);
		}
		header("Content-type:text/x-json");
		echo json_encode($locs);
	}
	function saveProperty()
	{
		$lat = ""; $long = "";
       	$pname = $this->input->post('pname');
       	$user  = $this->input->post('user');
       	$cid   = $this->input->post('cid');
       	$lid   = $this->input->post('lid');
       	$type  = $this->input->post('type');
       	$price = $this->input->post('price');
       	$size  = $this->input->post('size');
       	$desc  = $this->input->post('desc');
       	$latlng  = $this->input->post('latlng');

       	if(!empty($latlng)){
       		$latlng = substr($latlng,7,-1);
       	}
       	else{
       		$lat = "12.989977";
       		$long = "104.986689";
       	}

       	$latlng = trim($latlng,',');
       	$arr = explode(',', $latlng);
       	$i = 1;
       	foreach ($arr as $arr) {
       		if($i == 1)
       			$lat = $arr;
       		else
       			$long = $arr;
       		$i++;
       	}

       	$userid = $this->app->getUserid($user);

       	$data = array(
       		'property_name' => $pname,
       		'agent_id' => $userid,
       		'lp_id' => $lid,
       		'type_id' => $cid,
       		'p_type' => $type,
       		'price' => $price,
       		'housesize' => $size,
       		'description' => $desc,
       		'latitude' => $lat,
       		'longtitude' => $long,
       		'create_date'=> date('Y-m-d'),
			'validate' => 1,
			'p_status' => 1,
			'pro_level' => 2
       	);

       	$saveProperty = $this->app->saveProperty($data);
       	if($saveProperty)
       		echo $saveProperty;
       	else
       		echo "";
	}
	function getfilename()
	{
		$img = $_POST['filesource'];
		$pid = $_POST['pid'];
		define('UPLOAD_DIR', './assets/upload/property/');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = UPLOAD_DIR . $pid .'_'. uniqid() . '.jpg';
		$success = file_put_contents($file, $data);
		print $success ? $file : 'Unable to save the file.';
		
		$this->getimagetoresize($pid,$file);
	}
	function getimagetoresize($pid,$file)
	{	
		$this->load->library('upload');
      	$config2['image_library'] = 'gd2';
        $config2['source_image'] = $file;
        $config2['new_image'] = './assets/upload/property/thumb';
        $config2['maintain_ratio'] = false;
        $config2['create_thumb'] = "anc.jpg";
        $config2['thumb_marker'] = false;
        $config2['height'] = 564;
		$config2['width'] = 848;
		$config2['quality'] = 100;
        $this->load->library('image_lib');
        $this->image_lib->initialize($config2); 
        if ( ! $this->image_lib->resize()){
        	echo $this->image_lib->display_errors();
		}

		$this->saveimag($pid,$file);
	}
	function saveimag($pid,$file)
	{
		$imagename = substr($file,28);
		$date=date('Y-m-d H:i:s');
		$user=$this->session->userdata('user_name');
		$count=$this->db->query("SELECT count(*) as count FROM tblgallery where pid='$pid' AND url='$imagename'")->row()->count;
		if($count==0){
			$data=array('pid'=>$pid,
						'url'=>$imagename,
						'gallery_type'=>'0');
			$this->db->insert('tblgallery',$data);
		}
	}
}