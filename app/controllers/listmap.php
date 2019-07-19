<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Listmap extends CI_Controller {
		
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
        $this->load->helper(array('form', 'url'));
        $this->load->model("site/modsite","site");
        date_default_timezone_set("Asia/Bangkok");
	}

	function index()
	{
		echo "";
	}
	function searchmap()
	{
		$datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['slide'] = $this->site->getSlide();
        $data['typecate'] = $this->site->getPropertyType();
        $data['tags'] = $this->site->getAllPropertyTag();
        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/listmapbysearch',$data);
        $this->load->view('site/contain/footer',$datas);
	}
	function showToMap()
	{
		$status = $this->input->get('status'); 
        $location = $this->input->get('location'); 
        $category = $this->input->get('category');
        $firstprice = $this->input->get('firstprice');  
        $lastprice = $this->input->get('lastprice');  
        $available = $this->input->get('available');  
        $order = $this->input->get('order'); 
        $sort = $this->input->get('sort');  
        $return_cat = $this->input->get('return_cat');  
        $return_loc = $this->input->get('return_loc'); 
        $list_type = $this->input->get('list_type'); 
        $floorarea_first = $this->input->get('floorarea_first'); 
        $floorarea_last = $this->input->get('floorarea_last'); 
        $floorlevel_first = $this->input->get('floorlevel_first'); 
        $floorlevel_last = $this->input->get('floorlevel_last'); 
        $landarea_first = $this->input->get('landarea_first'); 
        $landarea_last = $this->input->get('landarea_last'); 
        $land_title = $this->input->get('land_title'); 
        $bedroom_first = $this->input->get('bedroom_first'); 
        $bedroom_last = $this->input->get('bedroom_last'); 
        $bathroom_first = $this->input->get('bathroom_first'); 
        $bathroom_last = $this->input->get('bathroom_last'); 
        $park_first = $this->input->get('park_first'); 
        $park_last = $this->input->get('park_last'); 
        $features = $this->input->get('features'); 
        $return_feature = $this->input->get('return_feature'); 
        $agent = $this->input->get('agent');

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
                $category = trim($category, ',');
                $arrc = explode(',', $category);
                $where.= " AND (";
                $num = count($arrc);$i=0;
                foreach ($arrc as $cat) {
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
                         p.latitude,
                         p.longtitude,
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
                        WHERE p.p_status = 1 AND p.latitude <> '' AND p.longtitude <> '' {$where} {$order_by} 
            ";

        $all = $this->db->query($query)->result();

		$arr = array();
        foreach ($all as $list) {
            $detail = site_url('site/site/detail/'.$list->pid.'/?text='.$list->property_name.'&name=browser');
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

            $imglast = "";
            if($list->typeid == 1 || $list->typeid == 3 || $list->typeid == 6) //hotel,condo,commer unit
                $imglast = base_url('assets/js/map/img/hotel.png');
            if($list->typeid == 2) //villa
                $imglast = base_url('assets/js/map/img/villa.png');
            if($list->typeid == 4) //house
                $imglast = base_url('assets/js/map/img/house.png');
            if($list->typeid == 7) //office space
                $imglast = base_url('assets/js/map/img/office.png');
            if($list->typeid == 8) //wherehouse
                $imglast = base_url('assets/js/map/img/office.png');
            if($list->typeid == 5) //house
                $imglast = base_url('assets/js/map/img/land.png');
            if($list->typeid == 11) //agriculture Land
                $imglast = base_url('assets/js/map/img/tree.png');

            $arr[] = array($list->property_name,
                           $list->address,
                           '$'.$list->price,
                           (float)$list->latitude,
                           (float)$list->longtitude,
                           $detail,
                           $imgs,
                           $imglast,
                           $type
                          );
        }
        header("Content-type:text/x-json");
        echo json_encode($arr);
	}
    function properties($id)
    {
        $datas['name'] = "";
        $datas['profile'] = $this->site->getSiteprofile();
        $datas['menu'] = $this->site->get_menu();
        $data['slide'] = $this->site->getSlide();
        $data['typecate'] = $this->site->getPropertyType();
        $data['id'] = $id;
        $data['tags'] = $this->site->getAllPropertyTag();
        $this->load->view('site/contain/header',$datas);
        $this->load->view('site/listmapbycategory',$data);
        $this->load->view('site/contain/footer',$datas);
    }
    function showByCategory()
    {
        $status = $this->input->get('status'); 
        $location = $this->input->get('location'); 
        $category = $this->input->get('category');
        $firstprice = $this->input->get('firstprice');  
        $lastprice = $this->input->get('lastprice');  
        $available = $this->input->get('available');  
        $order = $this->input->get('order'); 
        $sort = $this->input->get('sort');  
        $return_cat = $this->input->get('return_cat');  
        $return_loc = $this->input->get('return_loc'); 
        $list_type = $this->input->get('list_type'); 
        $floorarea_first = $this->input->get('floorarea_first'); 
        $floorarea_last = $this->input->get('floorarea_last'); 
        $floorlevel_first = $this->input->get('floorlevel_first'); 
        $floorlevel_last = $this->input->get('floorlevel_last'); 
        $landarea_first = $this->input->get('landarea_first'); 
        $landarea_last = $this->input->get('landarea_last'); 
        $land_title = $this->input->get('land_title'); 
        $bedroom_first = $this->input->get('bedroom_first'); 
        $bedroom_last = $this->input->get('bedroom_last'); 
        $bathroom_first = $this->input->get('bathroom_first'); 
        $bathroom_last = $this->input->get('bathroom_last'); 
        $park_first = $this->input->get('park_first'); 
        $park_last = $this->input->get('park_last'); 
        $features = $this->input->get('features'); 
        $return_feature = $this->input->get('return_feature'); 
        $agent = $this->input->get('agent');
        $type = $this->input->get('type');

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
                $category = trim($category, ',');
                $arrc = explode(',', $category);
                $where.= " AND (";
                $num = count($arrc);$i=0;
                foreach ($arrc as $cat) {
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

        if($type !="")
        {
            $where.= " AND pt.menu = '$type' ";
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
                         p.latitude,
                         p.longtitude,
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
                        WHERE p.p_status = 1 AND p.latitude <> '' AND p.longtitude <> '' {$where} {$order_by} 
            ";

        $all = $this->db->query($query)->result();

        $arr = array();
        foreach ($all as $list) {
            $detail = site_url('site/site/detail/'.$list->pid.'/?text='.$list->property_name.'&name=browser');
            $type = ""; $imgs = "";
            if($list->p_type == 1)
                $type = "Sale";
            elseif ($list->p_type == 2)
                $type = "Rent";
            else
                $type = "Rent & Sale";

            $img = $this->site->getImage($list->pid);

            // if(@ file_get_contents(base_url('assets/upload/property/'.$img->pid.'_'.$img->url))) 
            //     $imgs =  base_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url); 
            // else 
            //     $imgs = base_url('assets/upload/noimage.jpg');

            $imgs = base_url('assets/upload/noimage.jpg');
            if(file_exists(FCPATH.'assets/upload/property/thumb/'.$img->pid.'_'.$img->url))
            {
                $imgs = site_url('assets/upload/property/thumb/'.$img->pid.'_'.$img->url);
            }

            $imglast = "";
            if($list->typeid == 1 || $list->typeid == 3 || $list->typeid == 6) //hotel,condo,commer unit
                $imglast = base_url('assets/js/map/img/hotel.png');
            if($list->typeid == 2) //villa
                $imglast = base_url('assets/js/map/img/villa.png');
            if($list->typeid == 4) //house
                $imglast = base_url('assets/js/map/img/house.png');
            if($list->typeid == 7) //office space
                $imglast = base_url('assets/js/map/img/office.png');
            if($list->typeid == 8) //wherehouse
                $imglast = base_url('assets/js/map/img/office.png');
            if($list->typeid == 5) //house
                $imglast = base_url('assets/js/map/img/land.png');
            if($list->typeid == 11) //agriculture Land
                $imglast = base_url('assets/js/map/img/tree.png');

            $arr[] = array($list->property_name,
                           $list->address,
                           '$'.$list->price,
                           (float)$list->latitude,
                           (float)$list->longtitude,
                           $detail,
                           $imgs,
                           $imglast,
                           $type
                          );
        }
        header("Content-type:text/x-json");
        echo json_encode($arr);
    }
}