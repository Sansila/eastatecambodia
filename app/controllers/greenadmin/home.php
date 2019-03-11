<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model("greenadmin/Modgreenadmin","modgreen");
        $this->load->helper("url");
        
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

        if($roleid == 1)
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
								   DATE_FORMAT(tblvisitor.date_create, '%d') as 'year', COUNT(*) AS income, tblpropertytype.typename AS cate
								FROM
								    tblproperty
								INNER JOIN tblvisitor ON tblproperty.pid = tblvisitor.pid
								INNER JOIN tblpropertytype ON tblpropertytype.typeid = tblproperty.type_id
								WHERE
								    month(tblvisitor.date_create) = month('$date') AND tblproperty.p_type = 1 AND tblproperty.p_status = 1
								GROUP BY tblvisitor.date_create")->result();
		$data = array();
		foreach ($sql as $row) {
			$data[] = array('year' => $row->cate.'-'.$row->year,
							'income' => $row->income,
							'expenses' => $row->income);
		}
		header("Content-type:text/x-json");
		echo json_encode($data);
	}
}

