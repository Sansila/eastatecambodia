<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('encrypt');
        $this->load->helper(array('form', 'url'));
        $this->load->model("site/modsite","site");
        header('Content-Type: application/json; charset=utf-8');
    }
    public function index()
    {   
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['type'] = $this->site->getPropertyType();
        $data['location'] = $this->site->getPropertyLocation();
        $data['data'] = $this->site->getItemLocation();
        $data['slide'] = $this->site->getSlide();

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
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
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
                left join tblgallery as g on p.pid = g.pid
                WHERE p.p_status = 1 GROUP bY p.pid ORDER BY p.pid desc
                ";

        $config['total_rows'] = count($this->db->query($query)->result());
        $this->pagination->initialize($config);
        $limit = " LIMIT ".$config['per_page'];
        if($page >0)
            $limit = " LIMIT $page, ".$config['per_page'];
        $query.= " {$limit}";
        $data['lists'] = $this->db->query($query)->result();

        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/index',$data);
        $this->load->view('site/contain/footer',$datas);
    }
    function detail($pid)
    {
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['profile'] = $this->site->getSiteprofile();
        $data['detail'] = $this->site->getPropertyByID($pid);
        $data['image'] = $this->site->getImageByID($pid);
        $data['type'] = $this->site->getPropertyType();
        $data['location'] = $this->site->getPropertyLocation();
        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/detail',$data);
        $this->load->view('site/contain/footer',$datas);
    }
    function search()
    {
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

        $page = 0;
        if(isset($_GET['per_page']))
            $page = $_GET['per_page'];
        $config['base_url'] = site_url('site/site/search?available='.$available.'&status='.$status.'&'.$return_cat.'price__lte='.$lastprice.'&price__gte='.$firstprice.'&q='.$return_loc.'&list_type='.$list_type.'&order='.$order.'&sort='.$sort.'&'.$return_feature.'garages__lte='.$park_last.'&garages__gte='.$park_first.'&bedrooms__lte='.$bedroom_last.'&bedrooms__gte='.$bedroom_first.'&building_area_total__lte='.$landarea_last.'&building_area_total__gte='.$landarea_first.'&land_title='.$land_title.'&address_floor_level__lte='.$floorlevel_last.'&address_floor_level__gte='.$floorlevel_first);

        $config['per_page'] = 8;
        $config['num_link'] = 3;
        $config['page_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
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
                    $lid = $this->db->query("SELECT * FROM tblpropertylocation WHERE locationname LIKE '%$arr%' ")->row();
                    $and = "AND";
                    $or = "OR";
                    if(++$i == $num)
                    {
                        $and = "";
                        $or = "";
                    }
                    if($lid)
                    {
                        $where.= " lp.lineage LIKE '%$lid->propertylocationid%' $and ";
                    }else{
                        $where.= " p.property_name LIKE '%$arr%' $and ";
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

        // ============= Order by =============//

        if($order != "" && $sort == null)
        {
            $order_by.= " ORDER BY p.pid $order";
        }else if($sort !="" && $order != ""){
            if($sort == "Price")
                $order_by.= " ORDER BY p.price $order ";
            if($sort == "Area")
                $order_by.= " ORDER BY p.housesize $order ";
            if($sort == "Date")
                $order_by.= " ORDER BY p.create_date $order ";
        }

        // ============ configure pagination =====//

        $query = "SELECT * FROM tblproperty as p
                                    LEFT JOIN tblpropertylocation as lp 
                                    ON p.lp_id = lp.propertylocationid
                                    LEFT JOIN tblpropertytype as pt
                                    ON p.type_id = pt.typeid
                                    LEFT JOIN tblgallery as g 
                                    on p.pid = g.pid
                                    WHERE p.p_status = 1 {$where} GROUP BY p.pid {$order_by}
            ";

        $config['total_rows'] = count($this->db->query($query)->result());
        $this->pagination->initialize($config);
        $limit = " LIMIT ".$config['per_page'];
        if($page >0)
            $limit = " LIMIT $page, ".$config['per_page'];
        $query.= " {$limit}";
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
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['slide'] = $this->site->getSlide();
        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/contact',$data,$datas);
        $this->load->view('site/contain/footer',$datas);
    }
    function send_contact()
    {
        $this->load->library('email');  

        $email = $this->input->post('customer_mail');
        $name = $this->input->post('name');
        $coment = $this->input->post('comments');

         $config = Array(
            'protocol' => 'sendmail',
            'mailpath' => '/usr/sbin/sendmail',
            'smtp_host' => 'ssl://mail.cabs-international.com',
            'smtp_port' => 587,
            'smtp_user' => 'sila@cabs-international.com', // change it to yours
            'smtp_pass' => '@sila.com', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $message = $coment;
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($email); // change it to yours
            $this->email->to('sila@cabs-international.com');// change it to yours
            $this->email->subject('Comments from customer');
            $this->email->message($message);
        if($this->email->send())
        {
            $datas['profile'] = $this->site->getSiteprofile();
            $datas['menu'] = $this->site->get_menu();
            $data['slide'] = $this->site->getSlide();
            $this->load->view('site/contain/header',$datas);
            $this->load->view('site/contact',$data,$datas);
            $this->load->view('site/contain/footer',$datas);
        }
        else
        {
         show_error($this->email->print_debugger());
        }

    }
    function test()
    {
        header("content-type:text/x-json");
        $result = $this->site->getItemLocation();
        // print_r($result); die;
        echo json_encode($result);
    }
}
?>