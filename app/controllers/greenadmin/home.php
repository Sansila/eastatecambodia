<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	protected $thead;
	protected $idfield;
	protected $searchrow;
	public function __construct(){
        parent::__construct();
        $this->load->model("greenadmin/Modgreenadmin","modgreen");
        $this->load->helper("url");
        $this->thead=array("No"=>'no',
							 "Customer Name"=>'Customer Name',	 
							 "Phone"=>'Phone',	
							 "Email"=>'Email',	
							 "Address"=>'Address',	
							 "Property Category"=>'Property Category',
							 "Property Type"=>'Property Type',
							 "Action"=>'Action'							 	
							);
		$this->idfield="categoryid";
    }
	public function index()
	{
		$data['page_header']="Here is Index Page";		
		$this->load->view('greenadmin/header',$data);
		$this->load->view('greenadmin/index');
		$this->load->view('greenadmin/footer');	
	}
	function getChart($userid,$roleid)
	{
		$arr = array();
		$test = $this->modgreen->getPropertyCategory();
		foreach ($test as $t) {
			$arr[] = $this->modgreen->getCountAllPropertyByCategoryID($t->typeid,$t->typename,$userid,$roleid);
		}
		header("Content-type:text/x-json");
		echo json_encode($arr);	
	}
	function chartSatatus()
	{
		$data['page_header']="Here is Index Page";		
		$this->load->view('greenadmin/header',$data);
		$userid = $this->session->userdata('userid');
  		$roleid=$this->session->userdata('roleid'); 
		//$data['allproperty'] = $this->modgreen->getallProperty($userid,$roleid);
		$this->load->view('greenadmin/chartstatus',$data);
		$this->load->view('greenadmin/footer');	
	}
	function getCountStatus($userid,$roleid)
	{
		$arr = array();
		$status = $this->modgreen->getCountStatus($userid,$roleid);
		foreach ($status as $row) {
			$name = "";
			if($row->p_type == 0)
				$name = "Other";
			if($row->p_type == 1)
				$name = "Sale";
			if($row->p_type == 2)
				$name = "Rent";
			if($row->p_type == 3)
				$name = "Sale & Rent";

			$arr[] = array('country'=>$name,'value'=>$row->st_type);
		}
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function getCountStatusBySale($userid,$roleid)
	{
		$arr = array();
		$sales = $this->modgreen->getCountStatusBySale($userid,$roleid);
		foreach ($sales as $sale) {
			$arr[] = array('country'=>$sale->typename,'value'=>$sale->st_type);
		}
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function getCountStatusByRent($userid,$roleid)
	{
		$arr = array();
		$rents = $this->modgreen->getCountStatusByRent($userid,$roleid);
		foreach ($rents as $rent) {
			$arr[] = array('country'=>$rent->typename,'value'=>$rent->st_type);
		}
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function getCountStatusByRentAndSale($userid,$roleid)
	{
		$arr = array();
		$rents = $this->modgreen->getCountStatusByRentAndSale($userid,$roleid);
		foreach ($rents as $rent) {
			$arr[] = array('country'=>$rent->typename,'value'=>$rent->st_type);
		}
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function getCountLocation($userid,$roleid)
	{
		$arr = array();
		$main_id = array(); $counter = array();
		
		$rents = $this->db->query("SELECT * FROM  tblpropertylocation as pl
								   WHERE pl.status = 1  ")->result();
		foreach ($rents as $row) {
			$arrs = ""; $lineage = "";
			$lineage = $row->lineage;
			$lineage = trim($lineage, '-');
			$arrs = explode('-', $lineage);
			$num = count($arrs);
			$a = 1; 
			foreach($arrs as $l)
			{
				if($a == 1)
				{
					$main_id[]= $l;
				}
				$a++;
			}
			
		}	
		$where = "";

		$where .= " AND"; 
		$a = 1;
		foreach ($main_id as $lid) {
			if($a == 1){
				$where.= " (p.p_parent = $lid ";
			}
			else{
				$where.= " OR p.p_parent = $lid";
			}
			$a++;
		}
		$where .= ")";

		$rol = $this->db->query("SELECT * FROM `z_role` WHERE `roleid` = $roleid ")->row();

        if($rol->is_admin == 1 || $rol->is_admin == 2)
            $where.= "";
        else
            $where.= " AND p.agent_id = $userid ";

		$last = $this->db->query("SELECT count(p.p_parent) as value, pl.locationname as country  FROM tblproperty as p
			INNER JOIN tblpropertylocation pl 
			ON pl.propertylocationid = p.p_parent
			WHERE p.p_status = 1 {$where}
			GROUP BY p.p_parent
			")->result();
		header("Content-type:text/x-json");
		echo json_encode($last);
	}
	function view_property()
	{
		$data['page_header']="Here is Index Page";		
		$this->load->view('greenadmin/header',$data);
		$this->load->view('greenadmin/property_view_analysis');
		$this->load->view('greenadmin/footer');	
	}
	function view_hot_month()
	{
		// $sql = $this->db->query("SELECT DATE_FORMAT(date_create,'%y-%m') as 'year',count(*) as 'income'
		// 							FROM tblvisitor WHERE pid = $id
		// 							GROUP BY YEAR(date_create), MONTH(date_create)")->result();
		$date = Date('Y-m-d');
		$sql = $this->db->query("SELECT
								    DATE_FORMAT(tblvisitor.date_create,'%y-%m') as year, COUNT(*) AS income
								FROM
								    tblproperty
								INNER JOIN tblvisitor ON tblproperty.pid = tblvisitor.pid
								WHERE
								    tblproperty.pro_level = 1 AND tblproperty.p_status = 1
								GROUP BY YEAR(tblvisitor.date_create), MONTH(tblvisitor.date_create)")->result();
		header("Content-type:text/x-json");
		echo json_encode($sql);
	}
	function view_sale_day()
	{
		$date = date('Y-m-d');
		$sql = $this->db->query("SELECT
								   DATE_FORMAT(tblvisitor.date_create, '%m-%d') as 'year', COUNT(*) AS income, tblpropertytype.typename AS cate
								FROM
								    tblproperty
								INNER JOIN tblvisitor ON tblproperty.pid = tblvisitor.pid
								INNER JOIN tblpropertytype ON tblpropertytype.typeid = tblproperty.type_id
								WHERE
								    (tblvisitor.date_create between (CURDATE() - INTERVAL 7 DAY) and CURDATE()) AND tblproperty.p_type = 1 AND tblproperty.p_status = 1
								GROUP BY tblpropertytype.typeid, tblvisitor.date_create 
								ORDER BY tblvisitor.date_create ASC
								")->result();
		$data = array();
		$i = 1;
		foreach ($sql as $row) {
			$data[] = array('year' => $i.'('.$row->year.')',
							'cate' => $row->cate,
							'income' => $row->income);
			$i++;
		}
		header("Content-type:text/x-json");
		echo json_encode($data);
	}
	function view_rent_day()
	{
		$date = date('Y-m-d');
		$sql = $this->db->query("SELECT
								   DATE_FORMAT(tblvisitor.date_create, '%m-%d') as 'year', COUNT(*) AS income, tblpropertytype.typename AS cate
								FROM
								    tblproperty
								INNER JOIN tblvisitor ON tblproperty.pid = tblvisitor.pid
								INNER JOIN tblpropertytype ON tblpropertytype.typeid = tblproperty.type_id
								WHERE
								    (tblvisitor.date_create between (CURDATE() - INTERVAL 7 DAY) and CURDATE()) AND tblproperty.p_type = 2 AND tblproperty.p_status = 1
								GROUP BY tblpropertytype.typeid, tblvisitor.date_create 
								ORDER BY tblvisitor.date_create ASC 
								")->result();
		$data = array();
		$i = 1;
		foreach ($sql as $row) {
			$data[] = array('year' => $i.'('.$row->year.')',
							'cate' => $row->cate,
							'income' => $row->income);
			$i++;
		}
		header("Content-type:text/x-json");
		echo json_encode($data);
	}
	function view_sale_month()
	{
		$date = date('Y-m-d');
		$sql = $this->db->query("SELECT
								    DATE_FORMAT(tblvisitor.date_create, '%Y-%m') AS 'year',
								    COUNT(*) AS income,
								    tblpropertytype.typename AS cate
								FROM
								    tblproperty
								INNER JOIN tblvisitor ON tblproperty.pid = tblvisitor.pid
								INNER JOIN tblpropertytype ON tblpropertytype.typeid = tblproperty.type_id
								WHERE
								    (tblvisitor.date_create >= date_sub(now(), interval 3 month)) AND tblproperty.p_type = 1 AND tblproperty.p_status = 1
								    GROUP BY
								        tblpropertytype.typeid,
								        YEAR(tblvisitor.date_create), MONTH(tblvisitor.date_create)
								    ORDER BY
								        tblvisitor.date_create ASC
								")->result();
		$data = array();
		$i = 1;
		foreach ($sql as $row) {
			$data[] = array('year' => $i.'('.$row->year.')',
							'cate' => $row->cate,
							'income' => $row->income);
			$i++;
		}
		header("Content-type:text/x-json");
		echo json_encode($data);
	}
	function view_rent_month()
	{
		$date = date('Y-m-d');
		$sql = $this->db->query("SELECT
								    DATE_FORMAT(tblvisitor.date_create, '%Y-%m') AS 'year',
								    COUNT(*) AS income,
								    tblpropertytype.typename AS cate
								FROM
								    tblproperty
								INNER JOIN tblvisitor ON tblproperty.pid = tblvisitor.pid
								INNER JOIN tblpropertytype ON tblpropertytype.typeid = tblproperty.type_id
								WHERE
								    (tblvisitor.date_create >= date_sub(now(), interval 3 month)) AND tblproperty.p_type = 2 AND tblproperty.p_status = 1
								    GROUP BY
								        tblpropertytype.typeid,
								        YEAR(tblvisitor.date_create), MONTH(tblvisitor.date_create)
								    ORDER BY
								        tblvisitor.date_create ASC
								")->result();
		$data = array();
		$i = 1;
		foreach ($sql as $row) {
			$data[] = array('year' => $i.'('.$row->year.')',
							'cate' => $row->cate,
							'income' => $row->income);
			$i++;
		}
		header("Content-type:text/x-json");
		echo json_encode($data);
	}
	function view_finding()
	{
		$data['page_header']="Here is Index Page";
		$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead;		
		$this->load->view('greenadmin/header',$data);
		$this->load->view('greenadmin/list_customer');
		$this->load->view('greenadmin/footer');	
	}
	function getdata()
	{
		$perpage=$this->input->post('perpage');
		$s_name=$this->input->post('s_name');
		
		$sql="SELECT * FROM tblcustomer WHERE is_active = 0 AND customer_name LIKE '%$s_name%' ORDER BY customerid DESC";
		$table='';
		$pagina='';
		$paging=$this->green->ajax_pagination(count($this->db->query($sql)->result()),site_url("greenadmin/home/getdata"),$perpage);
		$no=1;
		$limit=" LIMIT {$paging['start']}, {$paging['limit']}";
		$sql.=" {$limit}";
		$this->green->setActiveRole($this->session->userdata('roleid'));
        $this->green->setActiveModule($this->input->post('m'));
        $this->green->setActivePage($this->input->post('p'));

		foreach($this->db->query($sql)->result() as $row){
			$location = $row->customerid;
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
                $wheres.= "typeid = '$r' $or ";
            }
            $wheres.= ")";
            $category = $this->db->query("SELECT * FROM tblpropertytype WHERE type_status = 1 {$wheres}")->result();
            $s = count($category); $i=0;
            foreach ($category as $cat) {
            	$or = ",";
                if(++$i == $s)
                {
                    $or = "";
                }
            	$cats.= $cat->typename.''.$or;
            }
            $type = $row->customerid;
            $type = trim($type, ',');
            $arrs = explode(',', $type);
            $st = count($arrs); $i = 0;
            $status = ""; $all = "";
            foreach ($arrs as $ar) {
            	if($ar == 1)
            		$status = "Sale";
            	else
            		$status = "Rent";

            	$or = ",";
                if(++$i == $st)
                {
                    $or = "";
                }
            	$all.= $status.''.$or;
            }
            $color = "";
            if($row->is_active == 1)
            	$color = "colorbg";
            else
            	$color = "";
			$table.= "<tr>
				 <td class='no ".$color."'>".$no."</td>
				 <td class='name ".$color."'>".$row->customer_name."</td>											
				 <td class='type ".$color."'>".$row->phone."</td>							 	
				 <td class='type ".$color."'>".$row->email."</td>							 	
				 <td class='type ".$color."'>".$row->address."</td>							 	
				 <td class='country ".$color."'>".$cats."</td>
				 <td class='country ".$color."'>".$all."</td>
				 <td class='remove_tag no_wrap ".$color."'>";
				 
				 if($this->green->gAction("D")){
					$table.= "<a><img rel=".$row->customerid." onclick='deletefinding(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
				 }
				 if($this->green->gAction("U")){
				 	if($row->is_active == 1)
						$table.= "<a>Reviewed</a>";
					else
						$table.= "<a href='".site_url('greenadmin/home/review/'.$row->customerid)."'>Review</a>";
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
		$this->db->where('customerid',$id);
		$this->db->delete('tblcustomer');
	}
	function review($id)
	{
		$data = array('is_active' => 1,'userid'=>$this->session->userdata('userid'));
		$this->db->where('customerid',$id);
		$this->db->update('tblcustomer',$data);

		redirect($_SERVER['HTTP_REFERER']);
	}
	function analisys_post()
	{
		$sql = $this->db->query("SELECT count(*) as income, tblproperty.create_date as year FROM tblproperty
								WHERE (tblproperty.create_date between (CURDATE() - INTERVAL 7 DAY) and CURDATE()) AND tblproperty.p_status = 1
								GROUP by create_date
								ORDER BY tblproperty.create_date DESC
								")->result();
		header("Content-type:text/x-json");
		echo json_encode($sql);
	}
	function analisys_view()
	{
		$sql = $this->db->query("SELECT
								    COUNT(*) AS income,
								    tblvisitor.date_create as year
								FROM
								    tblvisitor
								WHERE
								    (tblvisitor.date_create BETWEEN(CURDATE() - INTERVAL 7 DAY) AND CURDATE())
								GROUP BY
								    tblvisitor.date_create
								ORDER BY tblvisitor.date_create DESC
								    ")->result();
		header("Content-type:text/x-json");
		echo json_encode($sql);
	}
	function mostview()
	{
		$thead=array("PropertyID"=>'PropertyID',
					 "Property Name"=>'Property Name',
					 "Viewed" => "Viewed",	 
					 "Price"=>'Price',	
					 "Type"=>'Type',	
					 "Category"=>'Category',	
					 "Location"=>'Location',
					 //"Action"=>'Action'							 	
					);
		$data['thead']=	$thead;
		$data['page_header']="Here is Index Page";		
		$this->load->view('greenadmin/header',$data);
		$this->load->view('greenadmin/property_most_view',$data);
		$this->load->view('greenadmin/footer');
	}
	function getdata_proview()
	{
		$perpage=$this->input->post('perpage');
		$s_name=$this->input->post('s_name');
		$perdate = $this->input->post('perdate');
		$userid = ""; $user = "";
		$roleid = $this->session->userdata('roleid');
		$rol = $this->db->query("SELECT * FROM `z_role` WHERE `roleid` = $roleid ")->row();
		if($rol->is_admin == 1 || $rol->is_admin == 2){
			$userid = ""; $user = "";
		}
		else{
			$userid = $this->session->userdata('userid');
			$user = " AND p.agent_id = $userid";
		}

		$where = "";
		$date = Date('Y-m-d');
		if($perdate == 1)
			$where.= " AND v.date_create = '$date' $user GROUP BY v.pid  ORDER BY total_pro DESC LIMIT 15";
		else if($perdate > 1)
			$where.= " AND (v.date_create between (CURDATE() - INTERVAL $perdate DAY) and CURDATE()) $user GROUP BY v.pid  ORDER BY total_pro DESC LIMIT 15";
		else
			$where.= " AND v.date_create = '$date' $user GROUP BY v.pid ORDER BY total_pro DESC LIMIT 15";
		
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
			where p.p_status = 1 {$where} ";
		$table='';
		$i=1;
		$this->green->setActiveRole($this->session->userdata('roleid'));
        $this->green->setActiveModule($this->input->post('m'));
        $this->green->setActivePage($this->input->post('p')); 
		foreach($this->db->query($sql)->result() as $row){
			$type = "";
			if($row->p_type == 1)
				$type = "Sale";
			if($row->p_type == 2)
				$type = "Rent";
			if($row->p_type == 3)
				$type = "Rent & Sale";
			
			$table.= "<tr>
				 <td class='no'>P".$row->pid." - ".$row->property_name." - $".$row->price."</td>
				 <td class='no' style='width:10%;text-align: center;'>
				 	<a target='_blank' href='".site_url('site/site/detail/'.$row->pid.'/?text='.$row->property_name.'&name=browser')."'>Details</a>
				 </td>
				 <td class='no' style='width:10%;text-align: center;'>
				 	<a href='".site_url('property/property/analysis/'.$row->pid)."'>View Analysis</a>
				 </td>
				 <td class='no' style='width:10%;text-align: center;'>".$row->total_pro." View</td>";
			$table.= "</tr>";										 
			$i++;	 
		}
		$arr['data']=$table;
		//$arr['pagina']=$paging;
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function getViewPropertyPerYear()
	{
		$date = date('Y-m-d');
		$sql = $this->db->query("SELECT
								    DATE_FORMAT(tblvisitor.date_create, '%M') AS 'year',
								    COUNT(*) AS income
								FROM
								    tblproperty
								INNER JOIN tblvisitor ON tblproperty.pid = tblvisitor.pid
								WHERE
								    (tblvisitor.date_create >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)) AND tblproperty.p_status = 1
							    GROUP BY
							        YEAR(tblvisitor.date_create),
							        MONTH(tblvisitor.date_create)
							    ORDER BY
							        income
							    DESC
								")->result();
		$data = array();
		$i = 1;
		foreach ($sql as $row) {
			$data[] = array('country' => $row->year,
							'value' => $row->income);
			$i++;
		}
		header("Content-type:text/x-json");
		echo json_encode($data);
	}
	function getViewByChannel($gdate)
	{
		$where = ""; $date = date('Y-m-d');
		$var = $this->session->all_userdata();
		$user = $var['userid'];
		$role = $this->session->userdata('roleid');
		$rol = $this->db->query("SELECT * FROM `z_role` WHERE `roleid` = $role ")->row();

		if($gdate == 1)
			$where.= "tblvisitor.date_create = '$date' ";
		else{
			$where.= "(tblvisitor.date_create >= date_sub(now(), interval $gdate DAY))";
		}
		if($rol->is_admin == 1 || $rol->is_admin == 2)
			$where.= "";
		else
			$where.= " AND tblproperty.agent_id = $user";
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
		$nameyear = "";
		foreach ($sql as $row) {
			// if($row->year == null || $row->year == 'browser')
			// 	$nameyear = "browser";
			// else
			$nameyear = $row->year;
			$data[] = array('country' => $nameyear,
							'value' => $row->income);
			$i++;
		}
		header("Content-type:text/x-json");
		echo json_encode($data);
	}
	// function customer()
	// {
	// 	$data['page_header']="Here is Index Page";
	// 	$data['idfield']=$this->idfields;		
	// 	$data['thead']=	$this->theads;		
	// 	$this->load->view('greenadmin/header',$data);
	// 	$this->load->view('greenadmin/customer');
	// 	$this->load->view('greenadmin/footer');	
	// }
	// function getdata_customer()
	// {
	// 	$perpage=$this->input->post('perpage');
	// 	$s_name=$this->input->post('s_name');
		
	// 	$sql="SELECT * FROM tblcustomer WHERE is_active = 1 AND customer_name LIKE '%$s_name%' ORDER BY customerid DESC";
	// 	$table='';
	// 	$pagina='';
	// 	$paging=$this->green->ajax_pagination(count($this->db->query($sql)->result()),site_url("greenadmin/home/getdata_customer"),$perpage);
	// 	$no=1;
	// 	$limit=" LIMIT {$paging['start']}, {$paging['limit']}";
	// 	$sql.=" {$limit}";
	// 	$this->green->setActiveRole($this->session->userdata('roleid'));
 //        $this->green->setActiveModule($this->input->post('m'));
 //        $this->green->setActivePage($this->input->post('p'));

	// 	foreach($this->db->query($sql)->result() as $row){
	// 		$location = $row->locationid;
	// 		$location = trim($location, ',');
 //            $arr = explode(',', $location);
 //            $i = 0; $wheres = ""; $cats = "";
 //            $num = count($arr);
 //            $wheres.= " AND (";
 //            foreach ($arr as $r) {
 //        		$or = "OR";
 //                if(++$i == $num)
 //                {
 //                    $or = "";
 //                }
 //                $wheres.= "propertylocationid = '$r' $or ";
 //            }
 //            $wheres.= ")";
 //            $category = $this->db->query("SELECT * FROM tblpropertylocation WHERE status = 1 {$wheres}")->result();
 //            $s = count($category); $i=0;
 //            foreach ($category as $cat) {
 //            	$or = ",";
 //                if(++$i == $s)
 //                {
 //                    $or = "";
 //                }
 //            	$cats.= $cat->locationname.''.$or;
 //            }
            
	// 		$table.= "<tr>
	// 			 <td class='no'>".$no."</td>
	// 			 <td class='name '>".$row->customer_name."</td>											
	// 			 <td class='type '>".$row->phone."</td>							 	
	// 			 <td class='type '>".$row->email."</td>							 	
	// 			 <td class='type '>".$row->address."</td>							 	
	// 			 <td class='country '>".$cats."</td>
	// 			 <td class='remove_tag no_wrap '>";
				 
	// 			 if($this->green->gAction("D")){
	// 				$table.= "<a><img rel=".$row->customerid." onclick='deletefinding(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
	// 			 }
	// 			 if($this->green->gAction("U")){
	// 			 	$table.= "<a href='".site_url('greenadmin/home/approveByemail/'.$row->customerid)."'>Approve by Email</a>";
	// 			 }
	// 		$table.= " </td>
	// 			 </tr>
	// 			 ";										 
	// 		$no++;	 
	// 	}

	// 	$arr['data']=$table;
	// 	$arr['pagina']=$paging;
	// 	header("Content-type:text/x-json");
	// 	echo json_encode($arr);
	// }
	function getPropertyStatus()
	{
		$userid = $this->session->userdata('userid');
		$roleid = $this->session->userdata('roleid');
		$where = "";
    	$rol = $this->db->query("SELECT * FROM `z_role` WHERE `roleid` = $roleid ")->row();
    	if($rol->is_admin == 1 || $rol->is_admin == 2)
    		$where.= "";
    	else
    		$where.=" AND agent_id = $userid";
		$sql = $this->db->query("SELECT tblproperty.p_status as 'year', 
										COUNT(*) as income 
								 FROM tblproperty 
								 WHERE p_status is not null {$where} 
								 GROUP BY p_status
								 ORDER BY income DESC
								 ")->result();
		$data = array();
		$i = 1;
		$nameyear = "";
		foreach ($sql as $row) {
			if($row->year == 1)
				$nameyear = 'Available';
			if($row->year == 2)
				$nameyear = 'Draft';
			if($row->year == 3)
				$nameyear = 'Sold';
			if($row->year == 4)
				$nameyear = 'Rented';
			if($row->year == 5)
				$nameyear = 'NA';
			if($row->year == 0)
				$nameyear = 'Unavailable';

			$data[] = array('country' => $nameyear,
							'value' => $row->income);
			$i++;
		}
		header("Content-type:text/x-json");
		echo json_encode($data);
	}
}