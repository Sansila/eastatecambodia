<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appoperater extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("Modappoperater","app");	
	}

	public function index()
	{

	}
	function login()
	{	
		$user = $_POST['username'];
		$pass = $_POST['password'];

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
    		echo $sql->user_name;
    	else
    		echo "false";

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
		$lat = ""; $long = ""; $userid = "";
		$pid = $this->input->post("pid");
       	$pname = $this->input->post('pname');
       	$user  = $this->input->post('user');
       	$cid   = $this->input->post('cid');
       	$lid   = $this->input->post('lid');
       	$type  = $this->input->post('type');
       	$price = $this->input->post('price');
       	$size  = $this->input->post('size');
       	$desc  = $this->input->post('desc');
       	$latlng  = $this->input->post('latlng');
       	$owner = $this->input->post('owner');
       	$tag  = $this->input->post('tag');
       	$remark = $this->input->post('remark');
       	$_userid = $_POST['userid'];

       	//echo $user; die();

       	if(!empty($latlng)){
       		$latlng = substr($latlng,7,-1);
       	}
       	else{
       		$lat = "12.989977";
       		$long = "104.986689";
       	}

       	if($remark == "none")
       		$remark = "";
       	else
       		$remark = $remark;
       	if($desc == "none")
       		$desc = "";
       	else
       		$desc = $desc;
       	if($tag = "none")
       		$tag = "";
       	else
       		$tag = $tag;

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

       	if($user != "none")
	       	$userid = $this->app->getUserid($user);
	    else
	    	$userid = $_userid;

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
			'pro_level' => 3,
			'property_tag' => $tag,
			'internal_remark' => $remark,
			'relative_owner' => $owner
       	);

       	$saveProperty = $this->app->saveProperty($data,$pid);
       	if($saveProperty)
       		echo $saveProperty;
       	else
       		echo "";
	}
	function getfilename()
	{
		$pid = $_POST['pid'];
		$img = $_POST['filesource'];
		
		define('UPLOAD_DIR', './assets/upload/property/');
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = UPLOAD_DIR . $pid .'_'. uniqid() . '.jpg';
		$success = file_put_contents($file, $data);
		$success ? $file : 'Unable to save the file.';
		
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
		}else{
			$this->saveimag($pid,$file);
		}
	}
	function saveimag($pid,$file)
	{
		$countid = strlen($pid);
		$cutstring = (26 + $countid);
		$imagename = substr($file,$cutstring);
		$date=date('Y-m-d H:i:s');
		$user=$this->session->userdata('user_name');
		$count=$this->db->query("SELECT count(*) as count FROM tblgallery where pid='$pid' AND url='$imagename'")->row()->count;
		if($count==0){
			$data=array('pid'=>$pid,
						'url'=>$imagename,
						'gallery_type'=>'0');
			$insert = $this->db->insert('tblgallery',$data);
			if($insert)
				echo "success";
		}
	}
	function getpropertylist()
	{
		$where = ''; $firstcharater ='';
		$offset = $_GET['_start'];
		$limit  = $_GET['_limit'];
		$tsearch= $_GET['_txtsearch'];
		$username = $_GET['_user'];
		$getcategoryid = $_GET['_catid'];
		$getlocationid = $_GET['_locid'];

		$userid = $this->app->getUserid($username);

		if(!empty($tsearch))
			$firstcharater = $tsearch[0];
		if($firstcharater == "p" || $firstcharater == "P"){
			$str = substr($tsearch,1);
			$where.= " AND CONCAT(pl.property_name,pl.pid) LIKE '%$str%' ";
		}else{
			$where.= " AND CONCAT(pl.property_name,pl.pid) LIKE '%$tsearch%' ";
		}
		if($getcategoryid !="")
			$where.= " AND pl.type_id = $getcategoryid ";
		if($getlocationid !="")
			$where.= " AND pl.lp_id = $getlocationid ";

		$is_admin = "";
		$role = $this->app->getUseridNRoleid($username);
		$rol = $this->db->query("SELECT * FROM `z_role` WHERE `roleid` = $role->roleid ")->row();

		if($rol->is_admin == 1 || $rol->is_admin == 2)
			$where.= "";
		else
			$where.= " AND pl.agent_id = '$userid'";

		$sql = $this->db->query("SELECT 
								pl.pid,
								pl.agent_id,
								pl.type_id,
								pl.lp_id,
								pl.p_type,
								pl.relative_owner,
								pl.internal_remark,
								pl.latitude,
								pl.longtitude,
								pl.property_name,
								pl.create_date,
								pl.description,
								pl.pro_level,
								pl.p_status,
								pl.price,
								pl.lp_id,
								pl.p_type,
								pl.property_tag,
								pl.housesize,
								l.locationname
							FROM tblproperty pl
							INNER JOIN tblpropertylocation l
							ON pl.lp_id = l.propertylocationid
							WHERE pl.p_status = 1  AND pl.pro_level <> 1 {$where} 
							order by pl.create_date DESC, pl.pid desc
							LIMIT $offset, $limit ")->result();

		$str = '';  
		$limitstr = 100; 
		$string = ''; 
		$type = ''; 
		$image =''; 
		$img_path = 'noimage.jpg';
		$data = array();
		$p_type = '';
		$owner = '';
		$desc='';
		$remark='';
		$tag='';
		foreach ($sql as $row) {
			$str = strip_tags($row->description);
			$string = html_entity_decode($str);

			if($row->p_type == 1)
				$type = "Sale";
			if($row->p_type == 2)
				$type = "Rent";
			if($row->p_type == 3)
				$type = "Rent & Sale";

			$img = $this->app->getImage($row->pid);
			if($img){
				if(file_exists(FCPATH.'assets/upload/property/thumb/'.$row->pid.'_'.$img->url))
				{
					$img_path = $row->pid.'_'.$img->url;
				}else{
					$img_path = 'noimage.jpg';
				}
			}else
				$img_path = 'noimage.jpg';

			$data[] = array(
						'pid' => (int)$row->pid,
						'property_name' => $row->property_name,
						'price' => $row->price,
						'imageurl' => $img_path,
						'location_name' => $row->locationname,
						'size' => $row->housesize,
						'tag' => $row->property_tag,
						'remark' => $row->internal_remark,
						'desc' => $string = trim(preg_replace('/\s\s+/', ' ', $string)),
						'lat' => $row->latitude,
						'long' => $row->longtitude,
						'catid' => $row->type_id,
						'locid' => $row->lp_id,
						'owner' => $row->relative_owner,
						'p_type' => $type,
						'type' => $row->p_type,
						'userid' => (int)$row->agent_id
					  );
		}

		header("Content-type:text/x-json");
		echo json_encode($data);
	}
	function getpropertybyid($pid)
	{
		$sql = $this->db->query("SELECT * FROM tblproperty WHERE pid = $pid ")->row();

		$str = '';
		$string = ''; 
		$text = '';
		$str = strip_tags($row->description);
		$string = html_entity_decode($str);
		$text = trim(preg_replace('/\s\s+/', ' ', $string));

		$data = array('property_name' => $sql->property_name,
			          'type_id' => $sql->type_id,
			          'lp_id' => $sql->lp_id,
			          'type' => $sql->p_type,
			          'owner' => $sql->relative_owner,
			          'price' => $sql->price,
			          'size' => $sql->housesize,
			          'tag' => $sql->property_tag,
			          'remark' => $sql->internal_remark,
			          'desc' => $text,
					 );
		header("Content-type:text/x-json");
		echo json_encode($data);
	}
	function getListImage($pid)
	{
		$allimage = $this->app->getAllimagebyID($pid);

		$data = array(); $img_path = "";
		if($allimage)
		{
			foreach ($allimage as $img) {

				if(file_exists(FCPATH.'assets/upload/property/thumb/'.$img->pid.'_'.$img->url))
				{
					$img_path = $img->pid.'_'.$img->url;
				}else{
					$img_path = 'noimage.jpg';
				}

				$data[] = array(
							'imgid' => (int)$img->gallery_id,
							'imagename' => $img_path,
							'url' => site_url('assets/upload/property/thumb/'),
						  );
			}
		}else{
			$data[] = array(
							'imgid' => (int)0,
							'imagename' => 'noimage.jpg',
							'url' => site_url('assets/upload/property/thumb/'),
						  );
		}

		header("Content-type:text/x-json");
		echo json_encode($data);
	}
	function removeimg($id)
	{
		// $id = $this->input->post('id');
		$row=$this->db->where('gallery_id',$id)->get('tblgallery')->row();
		unlink("./assets/upload/property/thumb/".$row->pid.'_'.$row->url);
		unlink("./assets/upload/property/".$row->pid.'_'.$row->url);
		$delete = $this->db->where('gallery_id',$id)->delete('tblgallery');

		if($delete)
			echo "success";

	}
	function getImageAccount()
	{
		$user = $_GET['_user']; $image = '';
		$userid = $this->app->getUserid($user); 

		if(file_exists(FCPATH.'assets/upload/adminuser/'.$userid.'.png'))
		{
			$image = $userid.'.png';
		}else{
			$image = 'noimage.jpg';
		}

		echo $image;
	}
	function getMainLocation(){
		$locs = array();
		$loc = $this->app->getMainLocation();
		foreach ($loc as $row) {
			$locs[] = array('propertylocationid' => (int)$row->propertylocationid,
							'locationname' => $row->locationname
							);
		}
		header("Content-type:text/x-json");
		echo json_encode($locs);
	}
	function deletproperty($pid)
	{
		$data = array(
			'p_status' => 0,
		);
		$del = $this->db->where('pid',$pid)->update('tblproperty',$data);
		if($del)
			echo "ok";
		else
			echo "no";
	}
	function getuseridbyname()
	{
		$uname = $_GET['_user'];
		$userid = $this->app->getUserid($uname);

		echo $userid;
	}
	function getViewByChannel()
	{
		$where = ""; $date = date('Y-m-d');
		$gdate = $_GET['_day'];
		$user = $_GET['_user'];
		$userid = $this->app->getUserid($user);

		$role = $this->db->query("SELECT * FROM admin_user where userid = $userid ")->row()->roleid;
		$rol = $this->db->query("SELECT * FROM `z_role` WHERE `roleid` = $role ")->row();

		if($gdate == 1)
			$where.= "tblvisitor.date_create = '$date' ";
		else{
			$where.= "(tblvisitor.date_create >= date_sub(now(), interval $gdate DAY))";
		}
		if($rol->is_admin == 1 || $rol->is_admin == 2)
			$where.= "";
		else
			$where.= " AND tblproperty.agent_id = $userid";
		$sql = $this->db->query("SELECT
									    tblvisitor.view_from AS 'year',
									    COUNT(*) AS income
									FROM
									    tblproperty
									INNER JOIN tblvisitor ON tblproperty.pid = tblvisitor.pid
									WHERE
									    {$where}
									    AND (tblvisitor.view_from = 'facebook' OR tblvisitor.view_from = 'telegram' OR tblvisitor.view_from = 'whatsapp' OR tblvisitor.view_from = 'line' OR tblvisitor.view_from = 'browser') 
									    AND tblproperty.p_status = 1
									GROUP BY
									    tblvisitor.view_from
									ORDER BY
										income DESC
								")->result();
		$data = array();
		$i = 1;
		$nameyear = ""; $total = "";
		foreach ($sql as $row) {
			$nameyear = $row->year;
			$data[] = array('name' => $nameyear,
							'value' => (int)$row->income,
						);
			$i++;
		}
		header("Content-type:text/x-json");
		echo json_encode($data);
	}
	function gettopproperty()
	{
		$userid = ""; 
		$user = "";
		// $roleid = $this->session->userdata('roleid');
		// $rol = $this->db->query("SELECT * FROM `z_role` WHERE `roleid` = $roleid ")->row();
		$perdate = $_GET['_pdate'];
		$showby = $_GET['_showby'];
		$username = $_GET['_user'];

		$getuserid = $this->app->getUserid($username);
		$roleid = $this->db->query("SELECT * FROM admin_user where userid = $getuserid ")->row()->roleid;
		$rol = $this->db->query("SELECT * FROM `z_role` WHERE `roleid` = $roleid ")->row();

		if($rol->is_admin == 1 || $rol->is_admin == 2){
			$user = "";
		}
		else{
			$user = " AND p.agent_id = $getuserid";
		}

		$where = "";
		$date = Date('Y-m-d');
		$limit = "";

		if($showby !="")
		{
			if($showby == "all")
				$limit.= "";
			else
				$limit.= " LIMIT $showby";
		}
		
		if($perdate == 1)
		{
			$where.= " AND v.date_create = '$date' $user GROUP BY v.pid  ORDER BY total_pro DESC $limit";
		}else{
			$where.= " AND (v.date_create >= date_sub(now(), interval $perdate DAY)) $user GROUP BY v.pid  ORDER BY total_pro DESC $limit";
		}
		
		$sql="SELECT 
			count(*) as total_pro,
			p.pid,
			p.property_name,
			p.p_type,
			p.lp_id,
			p.type_id,
			p.p_status,
			p.price,
			p.agent_id,
			pt.typeid,
			pt.typename,
			v.pid,
			v.date_create,
			pl.propertylocationid,
			pl.locationname
			FROM tblproperty as p
			inner join tblvisitor as v 
			on v.pid = p.pid 
			inner join tblpropertytype as pt 
			on pt.typeid = p.type_id
			inner join tblpropertylocation as pl
			on pl.propertylocationid = p.lp_id
			where p.p_status != 0 {$where} ";
		$i=1; 
		$arr = array();
		foreach($this->db->query($sql)->result() as $row){
			$type = "";
			if($row->p_type == 1)
				$type = "Sale";
			if($row->p_type == 2)
				$type = "Rent";
			if($row->p_type == 3)
				$type = "Rent & Sale";

			$arr[] = array(
				'pid' => (int)$row->pid,
				'pname' => $row->property_name,
				'price' => $row->price,
				'location' => $row->locationname,
				'category' => $row->typename,
				'view' => $row->total_pro,
				'type' => $type
			);									 
			$i++;	 
		}
		
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
}