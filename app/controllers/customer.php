<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {
	protected $theads;
	protected $idfields;
	protected $thead;
	protected $idfield;
	protected $searchrow;
	public function __construct(){
        parent::__construct();
        $this->load->model("Modcutomer","cust");
        $this->load->helper(array('form', 'url'));
        $this->load->helper("url");

		$this->theads=array("No"=>'no',
							 "Group Name"=>'Group Name',
							 "Customer Name"=>'Customer Name',	 
							 "Phone"=>'Phone',	
							 "Email"=>'Email',	
							 "Address"=>'Address',	
							 "Location"=>'Location',
							 "Action"=>'Action'							 	
							);
		$this->idfields="categoryid";

		$this->thead = array(
			"No"=>'no',
			"Group Name"=>'Group Name',
			"Visibled"=>'visibled',
			"Action"=>'Action'			
		);
		$this->theadkh = array(
			"លេខរាង"=>'លេខរាង',
			"ឈ្មោះ"=>'ឈ្មោះ',
			"បង្ហាញ"=>'បង្ហាញ',
			"កំណត់"=>'កំណត់'			
		);
		$this->idfield="categoryid";
    }
	public function index()
	{
		$data['page_header']="Here is Index Page";	
		$data['idfield']=$this->idfields;		
		$data['thead']=	$this->theads;	
		$this->load->view('greenadmin/header',$data);
		$this->load->view('customer/customer');
		$this->load->view('greenadmin/footer');	
	}
	function view()
	{
		$data['page_header']="Here is Index Page";	
		$data['idfield']=$this->idfields;		
		$data['thead']=	$this->theads;
		$this->load->view('greenadmin/header',$data);
		$this->load->view('customer/customer');
		$this->load->view('greenadmin/footer');	
	}
	function getdata_customer()
	{
		$perpage=$this->input->post('perpage');
		$s_name=$this->input->post('s_name');
		$g_name=$this->input->post('group');

		$where = '';
		if($g_name !='')
			$where.= " AND g.groupid = $g_name ";
		$sql=" SELECT * FROM tblcustomer as c 
			INNER JOIN tblgroupcustomer as g 
			ON c.group_name = g.groupid
			WHERE c.is_active = 1 AND c.customer_name LIKE '%$s_name%' 
			{$where}
			ORDER BY c.customerid DESC";
		$table='';
		$pagina='';
		$paging=$this->green->ajax_pagination(count($this->db->query($sql)->result()),site_url("greenadmin/home/getdata_customer"),$perpage);
		$no=1;
		$limit=" LIMIT {$paging['start']}, {$paging['limit']}";
		$sql.=" {$limit}";
		$this->green->setActiveRole($this->session->userdata('roleid'));
        $this->green->setActiveModule($this->input->post('m'));
        $this->green->setActivePage($this->input->post('p'));

		foreach($this->db->query($sql)->result() as $row){
			$location = $row->locationid;
			$location = trim($location, ',');
            $arr = explode(',', $location);
            $i = 0; $wheres = ""; $cats = "";
            $num = count($arr);
            $wheres.= " AND (";
            foreach ($arr as $r) {
        		$or = "OR";
                if(++$i == $num)
                {
                    $or = "";
                }
                $wheres.= "propertylocationid = '$r' $or ";
            }
            $wheres.= ")";
            $category = $this->db->query("SELECT * FROM tblpropertylocation WHERE status = 1 {$wheres}")->result();
            $s = count($category); $i=0;
            foreach ($category as $cat) {
            	$or = ",";
                if(++$i == $s)
                {
                    $or = "";
                }
            	$cats.= $cat->locationname.''.$or;
            }
            
			$table.= "<tr>
				 <td class='no'>
	                <label class='custom-control custom-checkbox'>
	                    <input type='checkbox' class='custom-control-input'>
	                    <span class='custom-control-indicator'></span>
	                </label>
				 </td>
				 <td class='location hide'>".$row->locationid."</td>
				 <td class='name'>".$row->groupname."</td>
				 <td class='name'>".$row->customer_name."</td>											
				 <td class='type'>".$row->phone."</td>							 	
				 <td class='email'>".$row->email."</td>							 	
				 <td class='type'>".$row->address."</td>							 	
				 <td class='country'>".$cats."</td>
				 <td class='remove_tag no_wrap'>";
				 
				 if($this->green->gAction("D")){
					$table.= "<a><img rel=".$row->customerid." onclick='deletefinding(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
				 }
				 if($this->green->gAction("U")){
				 	$table.= "<a><img rel='".$row->customerid."' onclick='update(event);' src='".site_url('assets/images/icons/edit.png')."'></a>";
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
	function delete($id)
	{
		$this->db->query("UPDATE tblcustomer SET is_active = 2 WHERE customerid = $id ")->row();
	}
	function addgroup()
	{
		$data['page_header']="Here is Index Page";	
		$this->load->view('greenadmin/header',$data);
		$this->load->view('groupcustomer/add');
		$this->load->view('greenadmin/footer');
	}
	function savegroup()
	{
		$groupid=$this->input->post('groupid');
		$groupname=$this->input->post('groupname');
		$is_active=$this->input->post('is_active');
		//$count=$this->cust->vaidate($groupname,$groupid);
		$msg='';
		$groupids=$this->cust->save($groupid,$groupname,$is_active);
		if($groupids == $groupid)
			$msg="Group Name Has Updated...!";
		else
			$msg="Group Name Has Created...!";
		
		$arr=array('msg'=>$msg,'groupid'=>$groupids);
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function viewgroup()
	{
		$data['page_header']="Here is Index Page";	
		$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead;
		$this->load->view('greenadmin/header',$data);
		$this->load->view('groupcustomer/list');
		$this->load->view('greenadmin/footer');
	}
	function getgroupdata()
	{
		$perpage=$this->input->post('perpage');
		$s_name=$this->input->post('s_name');		

		$sql="SELECT * FROM tblgroupcustomer WHERE is_active=1 AND groupname LIKE '%$s_name%' order by groupid desc";

		$table='';
		$pagina='';
		$paging=$this->green->ajax_pagination(count($this->db->query($sql)->result()),site_url("customer/getgroupdata"),$perpage);

		$i=1;
		$limit=" LIMIT {$paging['start']}, {$paging['limit']}";
		$sql.=" {$limit}";
		$this->green->setActiveRole($this->session->userdata('roleid'));
    	$this->green->setActiveModule($this->input->post('m'));
    	$this->green->setActivePage($this->input->post('p')); 

		foreach($this->db->query($sql)->result() as $row){
			$visibled='No';
			$typ='';
			$lay='';
			if($row->is_active==1)
				$visibled="Yes";

			$table.= "<tr>
				<td class='no'>".$i."</td>
				<td class='type'>".$row->groupname."</td>
				<td class='country'>".$visibled."</td>
				<td class='remove_tag no_wrap'>";

			if($this->green->gAction("D")){
				$table.= "<a><img rel='".$row->groupid."'  onclick='deletestore(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
			}
			if($this->green->gAction("U")){
				$table.= "<a><img rel='".$row->groupid."'  onclick='update(event);' src='".base_url('assets/images/icons/edit.png')."'/></a>";
			}

			$table.= " </td></tr>";
			$i++;
		}

		$arr['data']=$table;
		$arr['pagina']=$paging;
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function editgroup($gid)
	{
		$data['page_header']="Here is Index Page";	
		$data['row'] = $this->cust->getgroupdatabyid($gid);
		$this->load->view('greenadmin/header',$data);
		$this->load->view('groupcustomer/add');
		$this->load->view('greenadmin/footer');
	}
	function deletegroup($gid)
	{
		$this->db->query("UPDATE tblgroupcustomer SET is_active = 0 WHERE groupid = $gid ")->row();
	}
	function add()
	{
		$data['page_header']="Here is Index Page";	
		$datas['locs'] = $this->cust->getlocation();
		$this->load->view('greenadmin/header',$data);
		$this->load->view('customer/add',$datas);
		$this->load->view('greenadmin/footer');
	}
	function savecustomer()
	{
		$customerid = $this->input->post('customerid');
		$location = $this->input->post('location');
		$category = $this->input->post('category');
		$property = $this->input->post('property');
		$gender = $this->input->post('gender');

		$loc = '';
		$cate = '';
		$prop = ''; 
        $i = 1; 
        $num = count($location); 
        $numcat = count($category); 
        $numpro = count($property); 

        $cama = ',';
        foreach ($location as $key) {
            $loc.= $key.''.$cama;
            if(++$i == $num)
            {
                $cama = '';
            }
        }
        $camac = ',';
        foreach ($category as $cat) {
        	$cate.= $cat.''.$camac;
            if(++$i == $numcat)
            {
                $camac = '';
            }
        }
        $camap = ',';
        if($property !="")
        {
        	foreach ($property as $pro) {
	        	$prop.= $pro.''.$camap;
	            if(++$i == $numpro)
	            {
	                $camap = '';
	            }
	        }
        }
        
        $data = array(
        	'locationid' => $loc,
        	'byroleid' => $this->session->userdata('roleid'),
        	'group_name' => $this->input->post('groupid'),
        	'company' => $this->input->post('company'),
        	'title' => $this->input->post('title'),
        	'customer_name' => $this->input->post('customername'),
        	'phone' => $this->input->post('phone'),
        	'email' => $this->input->post('email'),
        	'address' => $this->input->post('address'),
        	'description' => $this->input->post('description'),
        	'remark' => $this->input->post('remark'),
        	'is_active' => $this->input->post('is_active'),
        	'gender' => $gender,
        	'pid' => $prop,
        	'categoryid' => $cate,
        	'userid' => $this->session->userdata('userid'),
        	'notify_property' => $this->input->post('notify'),
        );
        $data1 = array(
        	'create_date' => date('Y-m-d')
        );
        $msg='';
		$customerids = $this->cust->savecustomer($data,$data1,$customerid);
		if($customerids == $customerid)
			$msg="Customer Has Updated...!";
		else
			$msg="Customer Has Created...!";
		
		$arr=array('msg'=>$msg,'customerid'=>$customerids);
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function editcustomer($cid)
	{
		$data['page_header']="Here is Index Page";	
		$datas['locs'] = $this->cust->getlocation();
		$datas['row'] = $this->cust->getCustomerByid($cid);
		$this->load->view('greenadmin/header',$data);
		$this->load->view('customer/add',$datas);
		$this->load->view('greenadmin/footer');
	}
	function sendEmail()
	{
		$location = $this->input->post('loc');
		$email = $this->input->post('email');
		$property = $this->input->post('property');

		$location = trim($location, ',');
        $arr = explode(',', $location);
        $num = count($arr);
        $numpro = count($property);
        $i=0;
        $where = " AND (";
        // foreach ($arr as $loc) {
        // 	$or = "OR";
        //     if(++$i == $num)
        //     {
        //         $or = "";
        //     }
        // 	$where.= "lp_id = '$loc' $or ";
        // }
        // $where.= ") AND (";
        foreach ($property as $p) {
        	$or = "OR";
            if(++$i == $numpro)
            {
                $or = "";
            }
        	$where.= "p.pid = '$p' $or ";
        }
        $where.= ")";

        $propertys = $this->db->query("SELECT 
        								p.pid,
        								p.lp_id,
        								p.type_id,
        								p.property_name,
        								p.description,
        								p.price,
        								p.p_type,
        								l.propertylocationid,
        								l.locationname,
        								pt.typeid,
        								pt.typename
        							   FROM tblproperty as p
        							   RIGHT JOIN tblpropertylocation l 
        							   ON p.lp_id = l.propertylocationid
        							   RIGHT JOIN tblpropertytype as pt
        							   ON p.type_id = pt.typeid
        							   WHERE p.p_status = 1 {$where} ")->result();


        $iconloc = "http://estatecambodia.com/assets/img/placeholder.png";
        $list = '<div class="container">
        		<div id="products" class="row list-group" style="width: 100%;margin: 0 auto;">';

        foreach ($propertys as $pro) {
        	$img = $this->cust->getImage($pro->pid);
        	$images = '';
        	$property_type = '';
        	if(@ file_get_contents(base_url('assets/upload/property/'.$img->pid.'_'.$img->url)))
        		$images = base_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url);
        	else
        		$images = base_url('assets/upload/noimage.jpg');

        	if($pro->p_type == 1)
				$property_type = "Sale";
			if($pro->p_type == 2)
				$property_type = "Rent";
			if($pro->p_type == 3)
				$property_type = "Rent & Sale";

        	$list.= '<div class="item  col-xs-4 col-lg-4" style="width: 299px; height:550px; border: 1px solid; float: left; margin: 10px;">
                        <div class="thumbnail" style=";padding: 0px;-webkit-border-radius: 0px;-moz-border-radius: 0px;border-radius: 0px;">
                            <img class="group list-group-image" src="'.$images.'" alt="" style="float: left; margin-bottom: 10px;" width="300" height="187"/>
                            <div style="padding:0px 10px 7px 10px;color: white; background: #d84949;">
                                	P'.$pro->pid.' | '.$pro->typename.' | '.$property_type.'
                            </div>
                            <div class="caption" style="padding: 10px; ">
                                <h4 class="group inner list-group-item-heading" style="height:43px; overflow: hidden;     margin-top: 3px;">
                                	<a href="'.site_url('site/site/detail/'.$pro->pid.'?name=browser').'" style="text-decoration: none;">
                                    '.$pro->property_name.'
                                    </a>
                                </h4>
                                <div style="font-size:12px;">
		                            <img src="'.$iconloc.'" />'.$pro->locationname.'
		                        </div>
                                <div class="group inner list-group-item-text" style="margin: 0 0 11px; height:160px; overflow:hidden; font-size:12px;">
                                	'.$pro->description.'
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6" style="width: 160px;float: left;">
                                        <p class="lead" style="color: #d84949;">
                                            $'.$pro->price.'
                                        </p>
                                    </div>
                                    <div class="col-xs-12 col-md-6" style="width: 110px;float: left;text-align: center;border: 1px solid;background: #d84949;color: white; height: 30px; margin-top: 12px;">
                                        <p class="lead" style="margin-top: 6px;">
                                            <a href="'.site_url('site/site/detail/'.$pro->pid.'?name=browser').'" style="color:white; text-decoration: none;">
                                                Details
                                            </a>
                                        </p>
                                    </div>
                                    <p style="clear: both;"></p>
                                </div>
                            </div>
                        </div>
                   	</div>
                   	';
        }
        $list.="</div><div style='clear: both;'></div></div>";

        //echo $list; die();

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
        $mail->Subject = "Estate Cambodia - Properties Information Sharing";
        $mail->AddAddress($email);
        $logo = "http://estatecambodia.com/assets/img/logo.png";
        $description = '<div style="width: 100%">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin: 0 auto;">
                <tbody>
                    <tr>
                        <td style="width:8px" width="8"></td>
                        <td>
                            <div align="center" class="" style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px; padding:20px;height: auto;">
                                <img src="'.$logo.'" style="width: 140px;">
                                <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
                                    <p>Dear customer,</p>
                                    <p>The following are the properties that Estate Cambodia would like to share and you may review for your interest: </p>
                                    '.$list.'
                                </div>
                                <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left"> 
                                    <p>Best regards,</p>
                                    <p>Estate Cambodia Team</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>';
        $mail->MsgHTML($description);
        $mail->IsHTML(true);
        if($mail->Send())
        	echo "success";
        $mail->ClearAddresses();
	}
	function searchproperty()
	{
		$location = $this->input->post('location');
		$category = $this->input->post('category');
		$property = $this->input->post('property');

		$where = "";

        if($location !="")
        {
            $where.= " AND (";
            $num = count($location);$i=0;
            foreach ($location as $loc) {
                $or = "OR";
                if(++$i == $num)
                {
                    $or = "";
                }
                $where.= " p.lp_id = $loc $or ";
            }
            $where.= ")";
        }

        if($category !="")
        {
            $where.= " AND (";
            $num = count($category);$i=0;
            foreach ($category as $cat) {
                $or = "OR";
                if(++$i == $num)
                {
                    $or = "";
                }
                $where.= " p.type_id = $cat $or ";
            }
            $where.= ")";
        }

        $query = "SELECT p.pid,
                         p.type_id,
                         p.lp_id,
                         p.property_name
                        FROM tblproperty as p
                        WHERE p.p_status = 1 {$where} ORDER BY p.pid DESC
               ";

        $all = $this->db->query($query)->result();
        $option = "<option value=''>-Select-</option>";

        foreach ($all as $pro) {
        	$option.='<option value="'.$pro->pid.'">P'.$pro->pid.' - '.$pro->property_name.'</option>';
        }
        $arr['data']=$option;
        header('Content-Type: application/json');
        echo json_encode($arr);
	}
}
