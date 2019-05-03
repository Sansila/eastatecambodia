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
	                    <input type='checkbox' class='custom-control-input' value='".$row->customerid."'>
	                    <span class='custom-control-indicator'></span>
	                </label>
				 </td>
				 <td class='name '>".$row->groupname."</td>
				 <td class='name '>".$row->customer_name."</td>											
				 <td class='type '>".$row->phone."</td>							 	
				 <td class='type '>".$row->email."</td>							 	
				 <td class='type '>".$row->address."</td>							 	
				 <td class='country '>".$cats."</td>
				 <td class='remove_tag no_wrap '>";
				 
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
		$this->db->query("UPDATE tblcustomer SET is_active = 0 WHERE customerid = $id ")->row();
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
		$loc = ''; 
        $i = 1; 
        $num = count($location); 
        $cama = ',';
        foreach ($location as $key) {
            $loc.= $key.''.$cama;
            if(++$i == $num)
            {
                $cama = '';
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
	function sendTelegram()
	{
		$apiToken = "795337443:AAEILteGOYG6avigY3HAAtpTP4_opTFR8Pk";

		$data = [
		    'chat_id' => '582595177',
		    'phone_number' => '0964464486',
		    'text' => 'Hello world!'
		];

		$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
	}
}