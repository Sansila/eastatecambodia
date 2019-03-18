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
		
		$sql="SELECT * FROM tblfindproperty WHERE 1=1 AND fname LIKE '%$s_name%' ORDER BY fid DESC";
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
			$location = $row->fpcategory;
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
            $type = $row->fpstatus;
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
            if($row->review == 1)
            	$color = "colorbg";
            else
            	$color = "";
			$table.= "<tr>
				 <td class='no ".$color."'>".$no."</td>
				 <td class='name ".$color."'>".$row->fname."</td>											
				 <td class='type ".$color."'>".$row->fphone."</td>							 	
				 <td class='type ".$color."'>".$row->femail."</td>							 	
				 <td class='type ".$color."'>".$row->faddress."</td>							 	
				 <td class='country ".$color."'>".$cats."</td>
				 <td class='country ".$color."'>".$all."</td>
				 <td class='remove_tag no_wrap ".$color."'>";
				 
				 if($this->green->gAction("D")){
					$table.= "<a><img rel=".$row->fid." onclick='deletefinding(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
				 }
				 if($this->green->gAction("U")){
				 	if($row->review == 1)
						$table.= "<a>Reviewed</a>";
					else
						$table.= "<a href='".site_url('greenadmin/home/review/'.$row->fid)."'>Review</a>";
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
		$this->db->where('fid',$id);
		$this->db->delete('tblfindproperty');
	}
	function review($id)
	{
		$data = array('review' => 1);
		$this->db->where('fid',$id);
		$this->db->update('tblfindproperty',$data);

		redirect($_SERVER['HTTP_REFERER']);
	}
	function analisys_post()
	{
		$sql = $this->db->query("SELECT count(*) as income, tblproperty.create_date as year FROM tblproperty
								WHERE (tblproperty.create_date between (CURDATE() - INTERVAL 7 DAY) and CURDATE()) AND tblproperty.p_status = 1
								GROUP by create_date")->result();
		header("Content-type:text/x-json");
		echo json_encode($sql);
	}
}