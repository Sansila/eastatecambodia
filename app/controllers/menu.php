<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {
	
	protected $thead;
	protected $idfield;
	protected $searchrow;	
	function __construct(){
		parent::__construct();
		//$this->lang->load('stock', 'english');
		$this->load->model("ModMenu","men");			
		$this->thead=array("No"=>'no',
							 "Category Name"=>'name',	 
							 "Parent"=>'parent',	
							 "MenuType"=>'location',	
							 "Article"=>'article',	
							 "Visibled"=>'visibled',
							 "Action"=>'Action'							 	
							);
		$this->idfield="categoryid";
		
	}
	
	function index()
	{
		$data['idfield']=$this->idfield;		
		$data['thead']=	$this->thead;
		$data['page_header']="Store List";	

		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('menu/menu_list', $data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function getdata(){
		$perpage=$this->input->post('perpage');
		$s_name=$this->input->post('s_name');
		
		$sql="SELECT m.menu_id,l.location_name,m.menu_name,m.is_active,m.level,c.article_title,mp.menu_name as parent 
		FROM tblmenus m 
		LEFT JOIN tblmenus mp ON (m.parentid=mp.menu_id)
		LEFT JOIN tblarticle c ON (m.article_id=c.article_id)
		LEFT JOIN tbllocation l ON (m.location_id=l.location_id)
		WHERE m.is_active=1 AND m.menu_name LIKE '%$s_name%' order by m.lineage asc";
		$table='';
		$pagina='';
		$paging=$this->green->ajax_pagination(count($this->db->query($sql)->result()),site_url("menu/getdata"),$perpage);
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
				 <td class='name'>".str_repeat("---- &nbsp;",$row->level)."<span class='catline_".$row->level."'>".$row->menu_name."</span>"."</td>											
				 <td class='type'>".$row->parent."</td>							 	
				 <td class='type'>".$row->location_name."</td>							 	
				 <td class='type'>".$row->article_title."</td>							 	
				 <td class='country'>".$visibled."</td>
				 <td class='remove_tag no_wrap'>";
				 
				 if($this->green->gAction("D")){
					$table.= "<a><img rel=".$row->menu_id." onclick='deletestore(event);' src='".base_url('assets/images/icons/delete.png')."'/></a>";
				 }
				 if($this->green->gAction("U")){
					$table.= "<a><img rel=".$row->menu_id." onclick='update(event);' src='".base_url('assets/images/icons/edit.png')."'/></a>";
				 }
			$table.= " </td>
				 </tr>
				 ";										 
			$i++;	 
		}
		$arr['data']=$table;
		$arr['pagina']=$paging;
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
	function add(){
		$data['page_header']="New Store";			
		$this->parser->parse('greenadmin/header', $data);
		$this->parser->parse('menu/menu_form', $data);
		$this->parser->parse('greenadmin/footer', $data);
	}
	function edit($storeid){
		$datas['row']=$this->db->query("SELECT * FROM tblmenus WHERE menu_id='$storeid'")->row();
		// $datas['tab_id']=$this->db->query("SELECT * FROM tbl_menu_tab WHERE menu_id=$storeid")->result();
		$data['page_header']="New Store";

		$this->parser->parse('greenadmin/header', $data);
		$this->load->view('menu/menu_form', $datas);
		$this->parser->parse('greenadmin/footer', $data);
	}
	
	function delete($storeid){
		// $this->db->where('menui_d',$storeid)->delete('tblmenus');
		$this->db->where('menu_id', $storeid)->delete('tblmenus');
	}

	function save() 
	{
		// $tab_id = $this->input->post('tab_id');
		$menu_id = $this->input->post('menu_id');
		$menu_name = $this->input->post('menu_name');
		$is_active = $this->input->post('is_active');
		$menu_type = $this->input->post('menu_type');


		$data_store = array(
		'menu_name' => $this->input->post('menu_name'),
      	'menu_name_kh' => $this->input->post('menu_name_kh'), 
      	'article_id' => $this->input->post('article_id'),
      	'parentid' => $this->input->post('parent_id'),
      	'layout_id' => $this->input->post('layout'),
      	'location_id' => $this->input->post('location_id'),
      	'menu_type' => $this->input->post('menu_type'),
      	'order' => $this->input->post('order'),
      	'is_active' => $this->input->post('is_active')
		);

		$count = $this->men->vaidate($menu_name,$is_active,$menu_type,$menu_id);
		$msg = '';
		$countid = $this->db->query("SELECT Count(menu_id) AS menuid FROM tblmenus WHERE menu_id ='$menu_id' ")->row()->menuid;
		if($menu_id > 0){
			$this->db->where('menu_id',$menu_id)->update('tblmenus', $data_store);
			$msg="Menu Has Update...!";
		}else{ 

			if($count > 0) {
				$msg = "Menu Is already Exist...!";
				$storeid = '';
			} else {
				$menu_id = $this->men->save($data_store, $menu_id);
				$msg="Menu Has Created...!";
			}

		}

		$arr=array('msg'=>$msg,'menu_id'=>$menu_id);
		header("Content-type:text/x-json");
		echo json_encode($arr);
	}
}