<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('encrypt');
        $this->load->helper(array('form', 'url'));
        $this->load->model("site/modsite","site");
        date_default_timezone_set("Asia/Bangkok");
    }
    public function index()
    {   
        $datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['type'] = $this->site->getPropertyType();
        $data['location'] = $this->site->getPropertyLocation();
        $data['data'] = $this->site->getItemLocation();
        $data['slide'] = $this->site->getSlide();
        $data['hot'] = $this->site->getHotProperty();

        $page = 0;
        if(isset($_GET['per_page']))
            $page = $_GET['per_page'];
        $config['base_url'] = site_url('?a=link');
        $config['per_page'] = 12;
        $config['num_link'] = 3;
        $config['page_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = $this->lang->line('pagination_prev');
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = $this->lang->line('pagination_next');
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $query = " SELECT * FROM tblproperty as p
                left join tblpropertytype as pt on p.type_id = pt.typeid 
                -- left join tblgallery as g on p.pid = g.pid
                WHERE p.p_status = 1  AND p.pro_level <> 1 ORDER BY p.create_date desc,p.pid desc ";

        $config['total_rows'] = count($this->db->query($query)->result());
        $this->pagination->initialize($config);
        $limit = " LIMIT ".$config['per_page'];
        if($page >0)
            $limit = " LIMIT $page, ".$config['per_page'];
        $query.= " {$limit}";
        $data['lists'] = $this->db->query($query)->result();
        $data['project'] = $this->site->getProject();

        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/index',$data);
        $this->load->view('site/contain/footer',$datas);
    }
    function detail($pid)
    {
        $name = "";
        if(isset($_GET['name']))
            $name = $_GET['name'];

        $datas['name'] = $name;
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['profile'] = $this->site->getSiteprofile();
        $data['detail'] = $this->site->getPropertyByID($pid);
        $data['image'] = $this->site->getImageByID($pid);
        $data['imagelimit'] = $this->site->getImageLimitByID($pid);
        $data['type'] = $this->site->getPropertyType();
        $data['location'] = $this->site->getPropertyLocation();
        $this->site->updateHit($pid);
        $this->load->view('site/contain/headerdetail',array_merge($datas,$data));
        $this->load->view('site/detail',$data);
        $this->load->view('site/contain/footer',$datas);
    }
    function search()
    {
        $datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['type'] = $this->site->getPropertyType();
        $data['location'] = $this->site->getPropertyLocation();
        $data['data'] = $this->site->getItemLocation();
        $data['slide'] = $this->site->getSlide();

        $status = ''; 
        $location = ''; 
        $category = ''; 
        $firstprice = ''; 
        $lastprice = ''; 
        $available = ''; 
        $order =''; 
        $sort=''; 
        $return_cat = ""; 
        $return_loc = ""; 
        $list_type = '';
        $floorarea_first = "";
        $floorarea_last = "";
        $floorlevel_first = "";
        $floorlevel_last = "";
        $landarea_first = "";
        $landarea_last = "";
        $land_title = "";
        $bedroom_first = "";
        $bedroom_last = "";
        $bathroom_first = "";
        $bathroom_last = "";
        $park_first = "";
        $park_last = "";
        $features = "";
        $return_feature = "";
        $agent = "";
        $search_map = "";
        
        if(isset($_GET['status']))
            $status = $_GET['status'];
        if(isset($_GET['q']))
            $location = $_GET['q'];
        if(isset($_GET['categories']))
            $category = $_GET['categories'];
        if(isset($_GET['price__gte']))
            $firstprice = $_GET['price__gte'];
        if(isset($_GET['price__lte']))
            $lastprice = $_GET['price__lte'];
        if(isset($_GET['available']))
            $available = $_GET['available'];
        if(isset($_GET['order']))
            $order = $_GET['order'];
        if(isset($_GET['sort']))
            $short = $_GET['sort'];
        if(isset($_GET['list_type']))
            $list_type = $_GET['list_type'];
        if(isset($_GET['building_area_total__gte']))
            $floorarea_first = $_GET['building_area_total__gte'];
        if(isset($_GET['building_area_total__lte']))
            $floorarea_last = $_GET['building_area_total__lte'];
        if(isset($_GET['address_floor_level__gte']))
            $floorlevel_first = $_GET['address_floor_level__gte'];
        if(isset($_GET['address_floor_level__lte']))
            $floorlevel_last = $_GET['address_floor_level__lte'];
        if(isset($_GET['land_area_total__gte']))
            $landarea_first = $_GET['land_area_total__gte'];
        if(isset($_GET['land_area_total__lte']))
            $landarea_last = $_GET['land_area_total__lte'];
        if(isset($_GET['land_title']))
            $land_title = $_GET['land_title'];
        if(isset($_GET['bedrooms__gte']))
            $bedroom_first = $_GET['bedrooms__gte'];
        if(isset($_GET['bedrooms__lte']))
            $bedroom_last = $_GET['bedrooms__lte'];
        if(isset($_GET['bathrooms__gte']))
            $bathroom_first = $_GET['bathrooms__gte'];
        if(isset($_GET['bathrooms__lte']))
            $bathroom_last = $_GET['bathrooms__lte'];
        if(isset($_GET['garages__gte']))
            $park_first = $_GET['garages__gte'];
        if(isset($_GET['garages__lte']))
            $park_last = $_GET['garages__lte'];
        if(isset($_GET['features']))
            $features = $_GET['features'];
        if(isset($_GET['agent']))
            $agent = $_GET['agent'];
        if(isset($_GET['search_map']))
            $search_map = $_GET['search_map'];

        if($location != "")
        {
            $location = trim($location, ';');
            $arr = explode(';', $location);
            $num = count($arr);$i=0;
            foreach ($arr as $arr) {
                $comma = urlencode(";");
                if(++$i == $num)
                {
                    $comma = "";
                }
                $return_loc.= $arr.''.$comma;
            }
        }

        if($category !="")
        {
            $ar = urlencode('[]');
            foreach ($category as $cat) {
                $return_cat .= "categories".$ar."=".$cat."&";
            }
        }else{
            $return_cat .= "categories=&";
        }

        if($features !="")
        {
            $ar = urlencode('[]');
            foreach ($features as $f) {
                $return_feature .= "features".$ar."=".$f."&";
            }
        }else{
            $return_feature .= "features=&";
        }

        if($search_map == "map"){
            redirect(site_url('listmap/searchmap?available='.$available.'&agent='.$agent.'&status='.$status.'&'.$return_cat.'price__lte='.$lastprice.'&price__gte='.$firstprice.'&q='.$return_loc.'&list_type='.$list_type.'&order='.$order.'&sort='.$sort.'&'.$return_feature.'garages__lte='.$park_last.'&garages__gte='.$park_first.'&bedrooms__lte='.$bedroom_last.'&bedrooms__gte='.$bedroom_first.'&building_area_total__lte='.$landarea_last.'&building_area_total__gte='.$landarea_first.'&land_title='.$land_title.'&address_floor_level__lte='.$floorlevel_last.'&address_floor_level__gte='.$floorlevel_first));
        }

        $page = 0;
        if(isset($_GET['per_page']))
            $page = $_GET['per_page'];
        $config['base_url'] = site_url('site/site/search?available='.$available.'&agent='.$agent.'&status='.$status.'&'.$return_cat.'price__lte='.$lastprice.'&price__gte='.$firstprice.'&q='.$return_loc.'&list_type='.$list_type.'&order='.$order.'&sort='.$sort.'&'.$return_feature.'garages__lte='.$park_last.'&garages__gte='.$park_first.'&bedrooms__lte='.$bedroom_last.'&bedrooms__gte='.$bedroom_first.'&building_area_total__lte='.$landarea_last.'&building_area_total__gte='.$landarea_first.'&land_title='.$land_title.'&address_floor_level__lte='.$floorlevel_last.'&address_floor_level__gte='.$floorlevel_first);

        $config['per_page'] = 16;
        $config['num_link'] = 3;
        $config['page_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = $this->lang->line('pagination_prev');
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = $this->lang->line('pagination_next');
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $where = ""; $order_by = ""; $return_cat = ""; $return_loc = ""; $limit="";

        if($status !="" || $location !="" || $category !="" || $firstprice !="" ||$lastprice !="")
        {
                $where.= " AND 1=1 ";
            if($firstprice !="" && $lastprice !=""){
                $where.= " AND p.price BETWEEN $firstprice AND $lastprice";
            }else if($firstprice !=""){
                $where.= " AND p.price BETWEEN 0 AND $firstprice";
            }else if($lastprice !=""){
                $where.= " AND p.price BETWEEN 0 AND $lastprice";
            }
            if($status !="")
            {
                if($status == "rent")
                    $where.= " AND p.p_type = 2 ";
                if($status == "sale")
                    $where.= " AND p.p_type = 1 ";
                if($status == "both")
                    $where.= " AND p.p_type = 3 ";
            }
            if($location != "")
            {
                $location = trim($location, ';');
                $arr = explode(';', $location);
                $num = count($arr);
                $i=0;
                $where.= " AND (";
                foreach ($arr as $arr) {
                    $lid = $this->db->query("SELECT * FROM tblpropertylocation WHERE locationname = '$arr' ")->row();
                    $and = "AND";
                    $or = "OR";
                    if(++$i == $num)
                    {
                        $and = "";
                        $or = "";
                    }
                    if($lid)
                    {
                        $where.= " lp.lineage LIKE '%$lid->propertylocationid%' OR p.property_name LIKE '%$arr%' $and ";
                    }else{
                        $where.= " (p.property_name LIKE '%$arr%' OR p.pid = '".substr($arr,1)."' OR p.property_tag LIKE '%$arr%') $and ";
                    }    
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
                    $where.= " pt.typename = '$cat' $or ";
                }
                $where.= ")";
            }
        }else{
            $where.= "";
        }

        if($floorarea_first !="" && $floorarea_last !="")
        {
            $where.= " AND p.housesize BETWEEN $floorarea_first AND $floorarea_last";
        }else if($floorarea_first !="")
        {
            $where.= " AND p.housesize BETWEEN 0 AND $floorarea_first";
        }else if($floorarea_last !="")
        {
            $where.= " AND p.housesize BETWEEN 0 AND $floorarea_last";
        }

        if($floorlevel_first !="" && $floorlevel_last !="")
        {
            $where.= " AND p.floor BETWEEN $floorlevel_first AND $floorlevel_last";
        }else if($floorlevel_first !="")
        {
            $where.= " AND p.floor BETWEEN 0 AND $floorlevel_first";
        }else if($floorlevel_last !="")
        {
            $where.= " AND p.floor BETWEEN 0 AND $floorlevel_last";
        }

        if($landarea_first !="" && $landarea_last !="")
        {
            $where.= " AND p.housesize BETWEEN $landarea_first AND $landarea_last";
        }else if($landarea_first !="")
        {
            $where.= " AND p.housesize BETWEEN 0 AND $landarea_first";
        }else if($landarea_last !="")
        {
            $where.= " AND p.housesize BETWEEN 0 AND $landarea_last";
        }

        if($land_title != "")
        {
            if($land_title == "hard")
                $where.= " AND p.title = 2 ";
            if($land_title == "soft")
                $where.= " ANd p.title = 1 ";
        }

        if($bedroom_first !="" && $bedroom_last !="")
        {
            $where.= " AND p.bedroom BETWEEN $bedroom_first AND $bedroom_last";
        }else if($bedroom_first !="")
        {
            $where.= " AND p.bedroom BETWEEN 0 AND $bedroom_first";
        }else if($bedroom_last !="")
        {
            $where.= " AND p.bedroom BETWEEN 0 AND $bedroom_last";
        }

        if($bathroom_first !="" && $bathroom_last !="")
        {
            $where.= " AND p.bathroom BETWEEN $bathroom_first AND $bathroom_last";
        }else if($bathroom_first !="")
        {
            $where.= " AND p.bathroom BETWEEN 0 AND $bathroom_first";
        }else if($bathroom_last !="")
        {
            $where.= " AND p.bathroom BETWEEN 0 AND $bathroom_last";
        }

        if($park_first !="" && $park_first !="")
        {
            $where.= " AND p.parking BETWEEN $park_first AND $park_last";
        }else if($park_first !="")
        {
            $where.= " AND p.parking BETWEEN 0 AND $park_first";
        }else if($park_first !="")
        {
            $where.= " AND p.parking BETWEEN 0 AND $park_first";
        }

        if($agent !="")
        {
            $where.= " AND p.agent_id = '$agent' ";
        }

        // ============= Order by =============//

        if($order != "" && $sort == null)
        {
            $order_by.= " ORDER BY p.create_date $order";
        }else if($sort !="" && $order != ""){
            if($sort == "Price")
                $order_by.= " ORDER BY p.price $order ";
            if($sort == "Area")
                $order_by.= " ORDER BY p.housesize $order ";
            if($sort == "Date")
                $order_by.= " ORDER BY p.create_date $order ";
        }else{
            $order_by.= " ORDER BY p.create_date desc, p.pid desc";
        }

        // ============ configure pagination =====//

        $query = "SELECT p.pid,
                         p.type_id,
                         p.lp_id,
                         p.p_status,
                         p.property_name,
                         p.price,
                         p.housesize,
                         p.description,
                         p.create_date,
                         p.p_type,
                         p.bedroom,
                         p.bathroom,
                         p.address,
                         p.parking,
                         p.title,
                         p.floor,
                         p.property_tag,
                         lp.propertylocationid,
                         lp.locationname,
                         lp.lineage,
                         pt.typeid,
                         pt.menu,
                         pt.typename 
                        FROM tblproperty as p
                        LEFT JOIN tblpropertylocation as lp 
                        ON p.lp_id = lp.propertylocationid
                        LEFT JOIN tblpropertytype as pt
                        ON p.type_id = pt.typeid
                        WHERE p.p_status = 1 {$where} {$order_by}
            ";

        $all = $this->db->query($query)->result();
        
        $config['total_rows'] = count($this->db->query($query)->result());
        $this->pagination->initialize($config);
        $limit = " LIMIT ".$config['per_page'];
        if($page >0)
            $limit = " LIMIT $page, ".$config['per_page'];
        $query.= " {$limit}";
        $data['all'] = $all;
        $data['result'] = $this->db->query($query)->result();
        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/search',$data);
        $this->load->view('site/contain/footer',$datas);
    }
    function getlocation()
    {
        $data = $this->site->getItemLocation();
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    function about($menu_id)
    {
        $datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['slide'] = $this->site->getSlide();
        $data['desc'] = $this->site->getArticleAbout($menu_id);
        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/about',$data);
        $this->load->view('site/contain/footer',$datas);
    }
    function contact($menu_id)
    {
        $datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['slide'] = $this->site->getSlide();
        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/contact',$data,$datas);
        $this->load->view('site/contain/footer',$datas);
    }
    function location()
    {
        header("content-type:text/x-json");
        $result = $this->site->getItemLocation();
        echo json_encode($result);
    }
    function getAutoLocation()
    {
        $q = $this->input->get('q');
        header("content-type:text/x-json");
        $result = $this->site->autoLocation($q);
        echo json_encode($result);
    }
    function properties($id)
    {
        $datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['type'] = $this->site->getPropertyType();
        $data['location'] = $this->site->getPropertyLocation();
        $data['data'] = $this->site->getItemLocation();
        $data['slide'] = $this->site->getSlide();
        $data['id'] = $id;

        $status = ''; 
        $location = ''; 
        $category = ''; 
        $firstprice = ''; 
        $lastprice = ''; 
        $available = ''; 
        $order =''; 
        $sort=''; 
        $return_cat = ""; 
        $return_loc = ""; 
        $list_type = '';
        $floorarea_first = "";
        $floorarea_last = "";
        $floorlevel_first = "";
        $floorlevel_last = "";
        $landarea_first = "";
        $landarea_last = "";
        $land_title = "";
        $bedroom_first = "";
        $bedroom_last = "";
        $bathroom_first = "";
        $bathroom_last = "";
        $park_first = "";
        $park_last = "";
        $features = "";
        $return_feature = "";
        $type = "";
        $search_map = "";
        
        if(isset($_GET['status']))
            $status = $_GET['status'];
        if(isset($_GET['q']))
            $location = $_GET['q'];
        if(isset($_GET['categories']))
            $category = $_GET['categories'];
        if(isset($_GET['price__gte']))
            $firstprice = $_GET['price__gte'];
        if(isset($_GET['price__lte']))
            $lastprice = $_GET['price__lte'];
        if(isset($_GET['available']))
            $available = $_GET['available'];
        if(isset($_GET['order']))
            $order = $_GET['order'];
        if(isset($_GET['sort']))
            $short = $_GET['sort'];
        if(isset($_GET['list_type']))
            $list_type = $_GET['list_type'];
        if(isset($_GET['building_area_total__gte']))
            $floorarea_first = $_GET['building_area_total__gte'];
        if(isset($_GET['building_area_total__lte']))
            $floorarea_last = $_GET['building_area_total__lte'];
        if(isset($_GET['address_floor_level__gte']))
            $floorlevel_first = $_GET['address_floor_level__gte'];
        if(isset($_GET['address_floor_level__lte']))
            $floorlevel_last = $_GET['address_floor_level__lte'];
        if(isset($_GET['land_area_total__gte']))
            $landarea_first = $_GET['land_area_total__gte'];
        if(isset($_GET['land_area_total__lte']))
            $landarea_last = $_GET['land_area_total__lte'];
        if(isset($_GET['land_title']))
            $land_title = $_GET['land_title'];
        if(isset($_GET['bedrooms__gte']))
            $bedroom_first = $_GET['bedrooms__gte'];
        if(isset($_GET['bedrooms__lte']))
            $bedroom_last = $_GET['bedrooms__lte'];
        if(isset($_GET['bathrooms__gte']))
            $bathroom_first = $_GET['bathrooms__gte'];
        if(isset($_GET['bathrooms__lte']))
            $bathroom_last = $_GET['bathrooms__lte'];
        if(isset($_GET['garages__gte']))
            $park_first = $_GET['garages__gte'];
        if(isset($_GET['garages__lte']))
            $park_last = $_GET['garages__lte'];
        if(isset($_GET['features']))
            $features = $_GET['features'];
        if(isset($_GET['type']))
            $type = $_GET['type'];
        if(isset($_GET['search_map']))
            $search_map = $_GET['search_map'];
    
        if($location != "")
        {
            $location = trim($location, ';');
            $arr = explode(';', $location);
            $num = count($arr);$i=0;
            foreach ($arr as $arr) {
                $comma = urlencode(";");
                if(++$i == $num)
                {
                    $comma = "";
                }
                $return_loc.= $arr.''.$comma;
            }
        }

        if($category !="")
        {
            $ar = urlencode('[]');
            foreach ($category as $cat) {
                $return_cat .= "categories".$ar."=".$cat."&";
            }
        }else{
            $return_cat .= "categories=&";
        }

        if($features !="")
        {
            $ar = urlencode('[]');
            foreach ($features as $f) {
                $return_feature .= "features".$ar."=".$f."&";
            }
        }else{
            $return_feature .= "features=&";
        }

        if($search_map == "map"){
            redirect(site_url('listmap/properties/'.$id.'/?type='.$type.'&available='.$available.'&status='.$status.'&'.$return_cat.'price__lte='.$lastprice.'&price__gte='.$firstprice.'&q='.$return_loc.'&list_type='.$list_type.'&order='.$order.'&sort='.$sort.'&'.$return_feature.'garages__lte='.$park_last.'&garages__gte='.$park_first.'&bedrooms__lte='.$bedroom_last.'&bedrooms__gte='.$bedroom_first.'&building_area_total__lte='.$landarea_last.'&building_area_total__gte='.$landarea_first.'&land_title='.$land_title.'&address_floor_level__lte='.$floorlevel_last.'&address_floor_level__gte='.$floorlevel_first));
        }

        $page = 0;
        if(isset($_GET['per_page']))
            $page = $_GET['per_page'];
        $config['base_url'] = site_url('site/site/properties/'.$id.'/?type='.$type.'&available='.$available.'&status='.$status.'&'.$return_cat.'price__lte='.$lastprice.'&price__gte='.$firstprice.'&q='.$return_loc.'&list_type='.$list_type.'&order='.$order.'&sort='.$sort.'&'.$return_feature.'garages__lte='.$park_last.'&garages__gte='.$park_first.'&bedrooms__lte='.$bedroom_last.'&bedrooms__gte='.$bedroom_first.'&building_area_total__lte='.$landarea_last.'&building_area_total__gte='.$landarea_first.'&land_title='.$land_title.'&address_floor_level__lte='.$floorlevel_last.'&address_floor_level__gte='.$floorlevel_first);

        $config['per_page'] = 16;
        $config['num_link'] = 3;
        $config['page_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = $this->lang->line('pagination_prev');
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = $this->lang->line('pagination_next');
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $where = ""; $order_by = ""; $return_cat = ""; $return_loc = ""; $limit="";

        if($status !="" || $location !="" || $category !="" || $firstprice !="" ||$lastprice !="")
        {
                $where.= " AND 1=1 ";
            if($firstprice !="" && $lastprice !=""){
                $where.= " AND p.price BETWEEN $firstprice AND $lastprice";
            }else if($firstprice !=""){
                $where.= " AND p.price BETWEEN 0 AND $firstprice";
            }else if($lastprice !=""){
                $where.= " AND p.price BETWEEN 0 AND $lastprice";
            }
            if($status !="")
            {
                if($status == "rent")
                    $where.= " AND p.p_type = 2 ";
                if($status == "sale")
                    $where.= " AND p.p_type = 1 ";
                if($status == "both")
                    $where.= " AND p.p_type = 3 ";
            }
            if($location != "")
            {
                $location = trim($location, ';');
                $arr = explode(';', $location);
                $num = count($arr);$i=0;
                $where.= " AND (";
                foreach ($arr as $arr) {
                    $lid = $this->db->query("SELECT * FROM tblpropertylocation WHERE locationname = '$arr' ")->row();
                    $and = "AND";
                    $or = "OR";
                    if(++$i == $num)
                    {
                        $and = "";
                        $or = "";
                    }
                    if($lid)
                    {
                        $where.= " lp.lineage LIKE '%$lid->propertylocationid%' OR p.property_name LIKE '%$arr%' $and ";
                    }else{
                        $where.= " (p.property_name LIKE '%$arr%' OR p.pid = '".substr($arr,1)."' OR p.property_tag LIKE '%$arr%') $and ";
                    }    
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
                    $where.= " pt.typename = '$cat' $or ";
                }
                $where.= ")";
            }
        }else{
            $where.= "";
        }

        if($floorarea_first !="" && $floorarea_last !="")
        {
            $where.= " AND p.housesize BETWEEN $floorarea_first AND $floorarea_last";
        }else if($floorarea_first !="")
        {
            $where.= " AND p.housesize BETWEEN 0 AND $floorarea_first";
        }else if($floorarea_last !="")
        {
            $where.= " AND p.housesize BETWEEN 0 AND $floorarea_last";
        }

        if($floorlevel_first !="" && $floorlevel_last !="")
        {
            $where.= " AND p.floor BETWEEN $floorlevel_first AND $floorlevel_last";
        }else if($floorlevel_first !="")
        {
            $where.= " AND p.floor BETWEEN 0 AND $floorlevel_first";
        }else if($floorlevel_last !="")
        {
            $where.= " AND p.floor BETWEEN 0 AND $floorlevel_last";
        }

        if($landarea_first !="" && $landarea_last !="")
        {
            $where.= " AND p.housesize BETWEEN $landarea_first AND $landarea_last";
        }else if($landarea_first !="")
        {
            $where.= " AND p.housesize BETWEEN 0 AND $landarea_first";
        }else if($landarea_last !="")
        {
            $where.= " AND p.housesize BETWEEN 0 AND $landarea_last";
        }

        if($land_title != "")
        {
            if($land_title == "hard")
                $where.= " AND p.title = 2 ";
            if($land_title == "soft")
                $where.= " ANd p.title = 1 ";
        }

        if($bedroom_first !="" && $bedroom_last !="")
        {
            $where.= " AND p.bedroom BETWEEN $bedroom_first AND $bedroom_last";
        }else if($bedroom_first !="")
        {
            $where.= " AND p.bedroom BETWEEN 0 AND $bedroom_first";
        }else if($bedroom_last !="")
        {
            $where.= " AND p.bedroom BETWEEN 0 AND $bedroom_last";
        }

        if($bathroom_first !="" && $bathroom_last !="")
        {
            $where.= " AND p.bathroom BETWEEN $bathroom_first AND $bathroom_last";
        }else if($bathroom_first !="")
        {
            $where.= " AND p.bathroom BETWEEN 0 AND $bathroom_first";
        }else if($bathroom_last !="")
        {
            $where.= " AND p.bathroom BETWEEN 0 AND $bathroom_last";
        }

        if($park_first !="" && $park_first !="")
        {
            $where.= " AND p.parking BETWEEN $park_first AND $park_last";
        }else if($park_first !="")
        {
            $where.= " AND p.parking BETWEEN 0 AND $park_first";
        }else if($park_first !="")
        {
            $where.= " AND p.parking BETWEEN 0 AND $park_first";
        }

        if($type !="")
        {
            $where.= " AND pt.menu = '$type' ";
        }

        // ============= Order by =============//

        if($order != "" && $sort == null)
        {
            $order_by.= " ORDER BY p.create_date $order, p.pid desc ";
        }else if($sort !="" && $order != ""){
            if($sort == "Price")
                $order_by.= " ORDER BY p.price $order ";
            if($sort == "Area")
                $order_by.= " ORDER BY p.housesize $order ";
            if($sort == "Date")
                $order_by.= " ORDER BY p.create_date $order ";
        }else{
            $order_by.= " ORDER BY p.create_date desc,p.pid desc ";
        }

        // ============ configure pagination =====//

        $query = "SELECT p.pid,
                         p.type_id,
                         p.lp_id,
                         p.p_status,
                         p.property_name,
                         p.price,
                         p.housesize,
                         p.description,
                         p.create_date,
                         p.p_type,
                         p.bedroom,
                         p.bathroom,
                         p.address,
                         p.parking,
                         p.title,
                         p.floor,
                         p.property_tag,
                         lp.propertylocationid,
                         lp.locationname,
                         lp.lineage,
                         pt.typeid,
                         pt.menu,
                         pt.typename        
                        FROM tblproperty as p
                        LEFT JOIN tblpropertylocation as lp 
                        ON p.lp_id = lp.propertylocationid
                        LEFT JOIN tblpropertytype as pt
                        ON p.type_id = pt.typeid
                        WHERE p.p_status = 1 {$where} {$order_by}
            ";

        $config['total_rows'] = count($this->db->query($query)->result());
        $this->pagination->initialize($config);
        $limit = " LIMIT ".$config['per_page'];
        if($page >0)
            $limit = " LIMIT $page, ".$config['per_page'];
        $query.= " {$limit}";
        $data['result'] = $this->db->query($query)->result();
        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/properties',$data);
        $this->load->view('site/contain/footer',$datas);
    }
    function postproperty()
    {
        $datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['slide'] = $this->site->getSlide();
        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/postproperty',$data);
        $this->load->view('site/contain/footer',$datas);
    }
    function join()
    {
        $datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['slide'] = $this->site->getSlide();
        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/joinus',$data);
        $this->load->view('site/contain/footer',$datas);
    }
    function save()
    {
        $name = $this->input->post('txtname');
        $email = $this->input->post('txtemail');
        $phone = $this->input->post('txtphone');
        $address = $this->input->post('txtaddress');
        $type = $this->input->post('txttype_post');
        $date = Date('y-m-d');

        $data = array(
            'user_name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'created_date' => $date,
            'type_post' => $type,
            'is_active' => 0
        );

        $id = $this->site->save($data);
        $this->post($id,$type,$email);
          
    }
    function post($id,$type,$email){
        $datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['slide'] = $this->site->getSlide();
        $data['id'] = $id;
        $data['owner'] = $type;
        $data['email'] = $email;
        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/post',$data);
        $this->load->view('site/contain/footer',$datas);
    }
    function savepost()
    {
        $this->load->library('upload');

        $uid = $this->input->post('txtid');
        $title = $this->input->post('txttitle');
        $price = $this->input->post('txtprice');
        $size = $this->input->post('txtprice');
        $cate = $this->input->post('txtcategory');
        $ptype = $this->input->post('txttype');
        $location = $this->input->post('txtlocation');
        $content = $this->input->post('txtcontent');
        $lat = $this->input->post('latitude');
        $long = $this->input->post('longtitude');
        $email = $this->input->post('txtemail');

        $lname = $this->site->getLocationNamebyID($location);

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
        $mail->Subject = "Estate Cambodia - Submit";
        $mail->AddAddress($email);
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
                                    Thank you for submitting your property to Estate Cambodia. We will review the property and get it approved to the list of the following property information:
                                    <ul style="list-style: none; text-align: left;">
                                        <li>- Property Title: '.$title.'</li>
                                        <li>- Price: '.$price.'USD</li>
                                        <li>- Location: '.$lname.'</li>
                                    </ul>
                                    Please contact to us if you wish to promote your property exclusively:
                                    <p>Email: info@estatecambodia.com | 093 633 687</p>
                                </div>
                                <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
                                    If you would like to join us as partner, please click the following link to request an account.
                                    <a href="http://estatecambodia.com/site/site/join">http://estatecambodia.com/site/site/join</a>
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
        }

        $data = array(
            'agent_id' => $uid,
            'property_name' => $title,
            'price' => $price,
            'p_type' => $ptype,
            'lp_id' => $location,
            'housesize' => $size,
            'description' => $content,
            'type_id'=> $cate,
            'latitude'=> $lat,
            'longtitude'=> $long,
            'create_date'=> date('Y-m-d'),
            'p_status' => 0,
        );

        $pid = $this->site->savepost($data);

        $orders=0;
        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);

        for($i=0; $i<$cpt; $i++)
        {        
            $extends = pathinfo($files["userfile"]["name"][$i], PATHINFO_EXTENSION);
            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
            $_FILES['userfile']['size']= $files['userfile']['size'][$i];

            if($extends == "mp4" || $extends == "movie" || $extends == "mpe" || $extends == "qt" || $extends == "mov" || $extends == "avi" || $extends == "mpg" || $extends == "mpeg")
            {
                $this->upload->initialize($this->set_upload_options_video($pid,$_FILES['userfile']['name']));
                if ( ! $this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());         
                }else{
                    $this->saveimg($pid,$_FILES['userfile']['name']);
                }
            }else{
                $this->upload->initialize($this->set_upload_options($pid,$_FILES['userfile']['name']));
                if ( ! $this->upload->do_upload()){
                    $error = array('error' => $this->upload->display_errors());         
                }else{  
                    $this->creatthumb($pid,$_FILES['userfile']['name'],$orders[$i]);
                }
            }
            if($i==$cpt-1){
               redirect('site/site/message?m=p', 'refresh');
            }
        }
    }
    
    function creatthumb($pid,$imagename,$order){
        $data = array('upload_data' => $this->upload->data());
        $config2['image_library'] = 'gd2';
        $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
        $config2['new_image'] = './assets/upload/property/thumb';
        $config2['maintain_ratio'] = false;
        $config2['create_thumb'] = "$pid".'_'."$imagename";
        $config2['thumb_marker'] = false;
        $config2['height'] = 564;
        $config2['width'] = 848;
        $config2['quality'] = 100;
        $this->load->library('image_lib');
        $this->image_lib->initialize($config2); 
        if ( ! $this->image_lib->resize()){
            echo $this->image_lib->display_errors();
        }else{
            $this->saveimg($pid,$imagename);
        }
        
    }

    private function set_upload_options($pid,$imagename)
    {   
        if(!file_exists('./assets/upload/property/')){
            if(mkdir('./assets/upload/property/',0755,true)){
                return true;
            }
            if(mkdir('./assets/upload/property/thumb',0755,true)){
                return true;
            }
        }
        $config = array();
        $config['upload_path'] = './assets/upload/property/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|mpeg|mpg|mp4|mpe|qt|avi|mov';
        $config['max_size']      = '0';
        $config['file_name']     = "$pid".'_'."$imagename";
        $config['overwrite']     = true;

        return $config;
    }
    private function set_upload_options_video($pid,$imagename)
    {   
        if(!file_exists('./assets/upload/property/')){
            if(mkdir('./assets/upload/property/',0755,true)){
                return true;
            }
            if(mkdir('./assets/upload/property/thumb',0755,true)){
                return true;
            }
        }
        $config = array();
        $config['upload_path'] = './assets/upload/property/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|mpeg|mpg|mp4|mpe|qt|avi|mov';
        $config['max_size']      = '0';
        $config['file_name']     = "$pid".'_'."$imagename";
        $config['overwrite']     = true;

        return $config;
    }
    function saveimg($pid,$imagename){
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
    function message()
    {
        $m = ""; $msg ="";
        if(isset($_GET['m']))
            $m = $_GET['m'];

        if($m == "p")
            $msg = "Thank you for uploading your property. Our team will review soon";
        else
            $msg = "Thank you for join us. Our team will review soon";

        $datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['slide'] = $this->site->getSlide();
        $data['bodymsg'] = $msg;

        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/messageafterpost',$data);
        $this->load->view('site/contain/footer',$datas);
    }
    function savejoin()
    {
        $name = $this->input->post('txtName');
        $phone = $this->input->post('txtPhone');
        $email = $this->input->post('txtEmail');
        $business = $this->input->post('txtBusiness');
        $address = $this->input->post('txtAddress');
        $remark = $this->input->post('txtRemark');
        $date = Date('y-m-d');

        $data = array(
            'user_name' => $name,
            'first_name' => $name,
            'last_name' => $name,
            'email' => $phone,
            'phone' => $email,
            'business' => $business,
            'address' => $address,
            'remark' => $remark,
            'created_date' => $date,
            'is_active' => 0,
        );

        $join = $this->site->savejoin($data);

        if($join){
            // redirect('site/site/message?m=j', 'refresh');
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
            $mail->Subject = "Estate Cambodia";
            $mail->AddAddress($email);
            $logo = "http://estatecambodia.com/assets/img/logo.png";
            $description = '<div style="width: 100%">
                <table border="0" cellpadding="0" cellspacing="0" style="width: 640px; margin: 0 auto;">
                    <tbody>
                        <tr>
                            <td style="width:8px" width="8"></td>
                            <td>
                                <div align="center" class="" style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px; padding:20px;">
                                    <img src="'.$logo.'" style="width: 140px;">
                                    <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">
                                        Thank you for join us, Our team will review soon.
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
            if(!$mail->Send())
                echo "<p class='error'>Problem in Sending Mail.</p>";
            else
                redirect('site/site/message?m=j', 'refresh');
        }
        else{
            redirect('site/site/join?m=error', 'refresh');
        }
    }
    function saveipaddress()
    {
        $data = array(
            "ip" => $this->input->post('ip'),
            "city" => $this->input->post('city'),
            "region" => $this->input->post('region'),
            "region_code" => $this->input->post('region_code'),
            "country" => $this->input->post('country'),
            "country_name" => $this->input->post('country_name'),
            "continent_code" => $this->input->post('continent_code'),
            "in_eu" => $this->input->post('in_eu'),
            "postal" => $this->input->post('postal'),
            "latitude" => $this->input->post('latitude'),
            "longitude" => $this->input->post('longitude'),
            "timezone" => $this->input->post('timezone'),
            "utc_offset" => $this->input->post('utc_offset'),
            "country_calling_code" => $this->input->post('country_calling_code'),
            "currency" => $this->input->post('currency'),
            "languages" => $this->input->post('languages'),
            "asn" => $this->input->post('asn'),
            "org" => $this->input->post('org'),
            "pid" => $this->input->post('pid'),
            "date_create" => Date('y-m-d'),
            "view_from" => $this->input->post('view_from')
        );
        $this->db->insert('tblvisitor',$data);
    }
    function helpmefindproperty($id)
    {
        $datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['slide'] = $this->site->getSlide();
        $data['id'] = $id;
        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/helpfind_property',$data);
        $this->load->view('site/contain/footer',$datas);
    }
    function savefind()
    {
        $c = ""; $t = "";
        $cates = $this->input->post('txtpro_cate');
        $email = $this->input->post('txtEmail');
        foreach ($cates as $cate) {
            $c.= $cate.',';
        }
        $types = $this->input->post('txtpro_type');
        foreach ($types as $type) {
            $t.= $type.',';
        }
        $id = $this->input->post("txtID");
        $data = array(
                    'fname' => $this->input->post('txtName'),
                    'fphone' => $this->input->post('txtPhone'),
                    'femail' => $this->input->post('txtEmail'),
                    'faddress' => $this->input->post('txtAddress'),
                    'fpcategory' => $c,
                    'fpstatus' => $t,
                    'fcreate_date' => date('Y-m-d'),
                    'fdescription' => $this->input->post('txtDes')
                    );
        $this->db->insert('tblfindproperty',$data);

        if($this->db->affected_rows() > 0){
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
            $mail->Subject = "state Cambodia - Property Inquiry";
            $mail->AddAddress($email);
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
                                        Thank you for submitting your requirements to us. Our team will work on your requirement and get back to you on the recommended property.
                                        <p>Thank you for your opportunity to collaborate with you.</p>
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
            if(!$mail->Send())
                echo "<p class='error'>Problem in Sending Mail.</p>";
            else
                redirect(site_url('site/site/helpmefindproperty/'.$id.'?type='.$id.'&m=success'),'refresh');
        }
        else{
            redirect(site_url('site/site/helpmefindproperty/'.$id.'?type='.$id.'&m=error'),'refresh');
        }
    }
    function getallproperty()
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
        $data = $this->db->query("SELECT 
                                        p.pid,
                                        p.agent_id,
                                        p.p_status,
                                        p.property_name,
                                        p.validate_date,
                                        p.price,
                                        p.lp_id,
                                        p.p_type,
                                        p.ccemail,
                                        u.userid,
                                        u.user_name,
                                        u.email,
                                        u.phone,
                                        lp.propertylocationid,
                                        lp.locationname
                                    FROM tblproperty as p
                                    INNER JOIN admin_user u
                                    ON p.agent_id = u.userid
                                    INNER JOIN tblpropertylocation lp
                                    ON p.lp_id = lp.propertylocationid
                                    WHERE p.p_status = 1 AND DATE(p.validate_date) = CURDATE() ")->result();
        $description = "";
        foreach ($data as $check) {
            $type = "";
            if($check->p_type == 1)
                $type = "Sale";
            if($check->p_type == 2)
                $type = "Rent";
            if($check->p_type == 3)
                $type = "Sale and Rent";
            $mail->Subject = "Estate Cambodia P".$check->pid." - ".$check->property_name;
            $mail->AddAddress($check->email);
            if($check->ccemail != "")
                $mail->AddCC($check->ccemail);
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
                                        Dear Partner/Agent/Property Owner,Kindly verify and update the property information as follow: 
                                        <ul style="list-style: none; text-align: left;">
                                            <li>- Property ID: P'.$check->pid.'</li>
                                            <li>- Property Title: '.$check->property_name.' USD</li>
                                            <li>- Price: '.$check->price.'</li>
                                            <li>- Type: '.$type.'</li>
                                            <li>- Location: '.$check->locationname.'</li>
                                            <li>- Last Updated: '.$check->validate_date.'</li>
                                            <li>- Link: <a href="http://estatecambodia.com/site/site/detail/'.$check->pid.'">http://estatecambodia.com/detail/P'.$pid.'</a></li>
                                        </ul>
                                    </div>
                                    <div style="text-align: left">
                                        <ul style="list-style: none; text-align: left;">
                                            <li style="padding: 20px 0px;">
                                                <a target="_blank" href="http://estatecambodia.com/site/site/updateValidate/'.$check->pid.'" style="background: #d84949;padding: 10px;border-radius: 5px;color: white; text-decoration: none; margin-right: 10px; font-size:12px;">
                                                    Property Info Is Correct
                                                </a>
                                            </li>
                                            <li>
                                                <a target="_blank" href="http://estatecambodia.com/firstlogin/'.$check->pid.'" style="background: #d84949;padding: 10px;border-radius: 5px;color: white; text-decoration: none; margin-right: 10px; font-size:12px;">
                                                    Change Property Info
                                                </a>
                                            </li>
                                            <li style="padding: 20px 0px;">
                                                <a target="_blank" href="http://estatecambodia.com/site/site/changePropertyStatus/'.$check->pid.'" style="background: #d84949;padding: 10px;border-radius: 5px;color: white; text-decoration: none; font-size:12px;">
                                                    Property Is Not Available Now
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
                                        Property verification is very important to understand if the information is valid for our customers so that we can provide reliable information to them. Thanks for your collaboration. 
                                        <p>Best regards,</p>
                                        <p>Estate Cambodia Team</p>
                                    </div>
                                </div>
                                                    
                            <!-- </td>
                            <td class="td-second"> -->
                                <div align="center" class="" style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px; padding:20px;height: auto; ">
                                    <img src="'.$logo.'" style="width: 140px;">
                                    <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
                                        ដៃគូ / ភ្នាក់ងារ / ម្ចាស់អចលនទ្រព្យសូមបញ្ជាក់ពីព័ត៌មានអចលនទ្រព្យបច្ចុប្បន្នមានដូចខាងក្រោម: 
                                        <ul style="list-style: none; text-align: left;">
                                            <li>- លេខសម្គាល់អចលនទ្រព្យ: P'.$check->pid.'</li>
                                            <li>- ចំណងជើងអចលនទ្រព្យ: '.$check->property_name.' USD</li>
                                            <li>- តម្លៃ: '.$check->price.'</li>
                                            <li>- ប្រភេទ: '.$type.'</li>
                                            <li>- ទីតាំង: '.$check->locationname.'</li>
                                            <li>- កែប្រែចុងក្រោយ: '.$check->validate_date.'</li>
                                            <li>- Link: <a href="http://estatecambodia.com/site/site/detail/'.$check->pid.'">http://estatecambodia.com/detail/P'.$pid.'</a></li>
                                        </ul>
                                    </div>
                                    <div style="text-align: left">
                                        <ul style="list-style: none; text-align: left;">
                                            <li style="padding: 20px 0px;">
                                                <a target="_blank" href="http://estatecambodia.com/site/site/updateValidate/'.$check->pid.'" style="background: #d84949;padding: 10px;border-radius: 5px;color: white; text-decoration: none; margin-right: 10px; font-size:12px;">
                                                    ព័ត៌មានអចនទ្រព្យគឺត្រឹមត្រូវ
                                                </a>
                                            </li>
                                            <li>
                                                <a target="_blank" href="http://estatecambodia.com/firstlogin/'.$check->pid.'" style="background: #d84949;padding: 10px;border-radius: 5px;color: white; text-decoration: none; margin-right: 10px; font-size:12px;">
                                                    ផ្លាស់ប្តូរព័ត៌មានអចនទ្រព្យ
                                                </a>
                                            </li>
                                            <li style="padding: 20px 0px;">
                                                <a target="_blank" href="http://estatecambodia.com/site/site/changePropertyStatus/'.$check->pid.'" style="background: #d84949;padding: 10px;border-radius: 5px;color: white; text-decoration: none; font-size:12px;">
                                                    អចនទ្រព្យមិនអាចរកបានទេឥឡូវនេះ
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
                                        ការផ្ទៀងផ្ទាត់អចលនទ្រព្យគឺមានសារៈសំខាន់ខ្លាំងណាស់ក្នុងការយល់ដឹងថាតើព័ត៌មានមានសុពលភាពសម្រាប់អតិថិជនរបស់យើងដូច្នេះយើងអាចផ្តល់ព័ត៌មានដែលអាចទុកចិត្តបានដល់ពួកគេ។ សូមអរគុណសម្រាប់កិច្ចសហការរបស់អ្នក។ 
                                        <p>Best regards,</p>
                                        <p>Estate Cambodia Team</p>
                                    </div>
                                </div>
                                <div style="clear: both;"></div>
                            </td>
                            <td style="width:8px" width="8"></td>
                        </tr>
                    </tbody>
                </table>
            </div>';

            $mail->MsgHTML($description);
            $mail->IsHTML(true);
            $mail->Send();
            $mail->ClearAddresses();
            $this->updateValidate($check->pid);
        }
    }
    function updateValidate($pid)
    {
        $this->site->updateValidateProperty($pid);
        $msg = "Your Property has been verified.";
        $datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['slide'] = $this->site->getSlide();
        $data['bodymsg'] = $msg;

        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/messageafterpost',$data);
        $this->load->view('site/contain/footer',$datas);
    }
    function changePropertyStatus($pid)
    {
        $this->site->changePropertyStatus($pid);
        $msg = "<p>Your Property has been disabled​​ from our website.</p> <p>Your Property status has been changed to not available.</p>";
        $datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['slide'] = $this->site->getSlide();
        $data['bodymsg'] = $msg;

        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/messageafterpost',$data);
        $this->load->view('site/contain/footer',$datas);
    }
    function listmap()
    {
        $datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['slide'] = $this->site->getSlide();

        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/listmap',$data);
        $this->load->view('site/contain/footer',$datas);
    }
    function listing_property()
    {
        $property_list = $this->site->getPropertyListOnMap();
        $arr = array();
        foreach ($property_list as $list) {
            $detail = site_url('site/site/detail/'.$list->pid.'/?name='.$list->property_name);
            $type = ""; $imgs = "";
            if($list->p_type == 1)
                $type = "Sale";
            elseif ($list->p_type == 2)
                $type = "Rent";
            else
                $type = "Rent & Sale";

            $img = $this->site->getImage($list->pid);

            if(@ file_get_contents(base_url('assets/upload/property/'.$img->pid.'_'.$img->url))) 
                $imgs =  base_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url); 
            else 
                $imgs = base_url('assets/upload/noimage.jpg');

            $arr[] = array($list->property_name,
                           $list->address,
                           '$'.$list->price,
                           (float)$list->latitude,
                           (float)$list->longtitude,
                           $detail,
                           $imgs,
                           "",
                           $type
                          );
        }
        header("Content-type:text/x-json");
        echo json_encode($arr);
    }
    function listproject()
    {
        $datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['type'] = $this->site->getPropertyType();
        $data['location'] = $this->site->getPropertyLocation();
        $data['data'] = $this->site->getItemLocation();
        $data['slide'] = $this->site->getSlide();
        $data['hot'] = $this->site->getHotProperty();

        $page = 0;
        if(isset($_GET['per_page']))
            $page = $_GET['per_page'];
        $config['base_url'] = site_url('?a=link');
        $config['per_page'] = 8;
        $config['num_link'] = 3;
        $config['page_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = $this->lang->line('pagination_prev');
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = $this->lang->line('pagination_next');
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $query = "  SELECT * FROM tblproject p
                    INNER JOIN tblpropertylocation l
                    ON p.project_location = l.propertylocationid
                    WHERE p.is_active = 1 ORDER BY p.projectid DESC ";

        $config['total_rows'] = count($this->db->query($query)->result());
        $this->pagination->initialize($config);
        $limit = " LIMIT ".$config['per_page'];
        if($page >0)
            $limit = " LIMIT $page, ".$config['per_page'];
        $query.= " {$limit}";
        $data['lists'] = $this->db->query($query)->result();

        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/listproject',$data);
        $this->load->view('site/contain/footer',$datas);
    }
}
?>