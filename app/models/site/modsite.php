<?php
    class Modsite extends CI_Model {
        
        function getPropertyByID($pid)
        {
            $sql = $this->db->query(" SELECT * FROM tblproperty as p
                left join tblpropertytype as pt on p.type_id = pt.typeid
                left join tblpropertylocation as lp on p.lp_id = lp.propertylocationid
                left join admin_user as u on p.agent_id = u.userid
                WHERE p.p_status = 1 AND p.pid = '$pid' ")->row();
            return $sql;
        }
        function getImageByID($pid)
        {
            $sql = $this->db->query("SELECT * FROM tblgallery as g 
                                    right join tblproperty as p on p.pid = g.pid
                                    WHERE p.pid = '$pid' AND p.p_status = 1 ")->result();
            return $sql;
        }
        function getSiteprofile()
        {
            $sql = $this->db->query("SELECT * FROM site_profile")->row();
            return $sql;
        }
        function getPropertyType()
        {
            $sql = $this->db->query("SELECT * FROM tblpropertytype where type_status = 1 ")->result();
            return $sql;
        }
        function getPropertyLocation()
        {
            $sql = $this->db->query("SELECT * FROM tblpropertylocation where status='1' ORDER BY lineage asc")->result();
            return $sql;
        }
        function getItemLocation()
        {
            $query = $this->db->query("SELECT * FROM tblpropertylocation where status='1' ORDER BY lineage asc");
            
            $cat = array(
                'items' => array(),
                'parents' => array()
            );

            foreach ($query->result() as $cats) {
                $cat['items'][$cats->propertylocationid] = $cats;
                $cat['parents'][$cats->parent_id][] = $cats->propertylocationid;
            }

            if ($cat) {
                $result = $this->getSubItem(0,$cat);
                return $result;
            } else {
                return FALSE;
            }
        }
        function getSubItem($parent,$menu,$loop=0)
        {
            $html = array();
            $loop++;

            $title = ""; $gettitle = "";
            if (isset($menu['parents'][$parent])) {
                foreach ($menu['parents'][$parent] as $itemId) {
                    if (!isset($menu['parents'][$itemId])) {
                        if($loop==3){
                            $html[] = $menu['items'][$itemId]->locationname;

                        }else{
                            if($loop==1){
                              $html[$menu['items'][$itemId]->locationname] = array();

                            }else{
                              $html[$menu['items'][$itemId]->locationname] = array();

                            }

                        }
                    }
                    if (isset($menu['parents'][$itemId])) {
                        if($loop==3){
                            $html[] = $menu['items'][$itemId]->locationname;
                            $html[] = $this->getSubItem($itemId,$menu);
                    
                        }else{
                            $html[$menu['items'][$itemId]->locationname] = $menu['items'][$itemId]->locationname;
                            $html[$menu['items'][$itemId]->locationname] = $this->getSubItem($itemId,$menu,$loop);

                        }
                    }
                }
            }

            return $html;
        }
        function getRelatedProperty($pid,$agent_id)
        {
            $query = $this->db->query(" SELECT * FROM tblproperty as p
                left join tblpropertytype as pt on p.type_id = pt.typeid 
                WHERE p.p_status = 1 AND p.agent_id = $agent_id AND p.pid <> $pid ORDER bY p.pid DESC
                LIMIT 20 ")->result();
            return $query;
        }
        function get_menu()
        {
            $query = $this->db->query("SELECT * FROM tblmenus as m 
                                       INNER JOIN tbllocation as l ON m.menu_type = l.location_id 
                                       ORDER BY m.menu_id asc");
            $cat = array(
                'items' => array(),
                'parents' => array()
            );
            foreach ($query->result() as $cats) {
                $cat['items'][$cats->menu_id] = $cats;
                $cat['parents'][$cats->parentid][] = $cats->menu_id;
            }
            if ($cat) {
                $result = $this->generateTree(0,$cat);
                return $result;
            } else {
                return FALSE;
            }
        }
        function generateTree($parent,$menu)
        {
            $html = "";
            if (isset($menu['parents'][$parent])) {
                foreach ($menu['parents'][$parent] as $menu_s) {
                    if (!isset($menu['parents'][$menu_s])) {
                        $html .= "<li>";
                        $html .= "<a href='" . site_url('site/site/'.$menu['items'][$menu_s]->location_name.'/'.$menu['items'][$menu_s]->menu_id).'?type='.$menu['items'][$menu_s]->menu_id. "'>" . $menu['items'][$menu_s]->menu_name . "</a>"; //no sub
                        $html .= "</li>";
                    }
                    if (isset($menu['parents'][$menu_s])) {
                        $html .= "<li class='dropdown'>";
                        $html .= "<a class='dropdown-toggle' data-toggle='dropdown'>" . $menu['items'][$menu_s]->menu_name . "</a>";
                        $html .= "<ul class='dropdown-menu'>";
                        $html .= "<li>";
                        $html .= "<a href='" . site_url('site/site/'.$menu['items'][$menu_s]->location_name.'/'.$menu['items'][$menu_s]->menu_id)."'>All</a>"; //no sub
                        $html .= "</li>";
                        $html .= $this->generateTree($menu_s,$menu);
                        $html .= "</li>";
                        $html .= "</ul>";
                    }else{
                        $html .= $this->generateTree($menu_s,$menu);
                    }
                }
            }
            return $html;

        }
        function get_menu_footer()
        {
            $query = $this->db->query("SELECT * FROM tblmenus as m 
                                       INNER JOIN tbllocation as l ON m.menu_type = l.location_id 
                                       WHERE l.location_id = 17 ORDER BY m.menu_id asc")->result();
            return $query;
        }
        function getSlide()
        {
            $sql = $this->db->query("SELECT * FROM tblbanner ")->row();
            return $sql;
        }
        function getArticleAbout($menu_id)
        {
            $sql = $this->db->query("SELECT * FROM tblarticle WHERE menu_id = '$menu_id' ")->row();
            return $sql;
        }
        function autoLocation($q)
        {
            $data = array(); $all = array();
            $row = $this->db->query("SELECT count(*) as coun_all FROM tblpropertylocation WHERE locationname LIKE '%$q%' ")->row();
            $sql = $this->db->query("SELECT * FROM tblpropertylocation WHERE locationname LIKE '%$q%' ")->result();
            foreach ($sql as $val) {
                $all[] = array('count'=>$row->coun_all,'full_name'=>$val->locationname);
            }
            $data = array('locations' => $all);
            return $data;
        }
        function updateHit($pid)
        {
            $row = $this->db->query("SELECT hit FROM tblproperty where pid = '$pid' ")->row();
            $hit = $row->hit + 1;
            $data = array(
                'hit' => $hit
            );
            $this->db->where('pid',$pid)->update('tblproperty',$data);
        }
        function getImage($pid)
        {
            $sql = $this->db->query("SELECT * FROM tblgallery as g 
                                    right join tblproperty as p on p.pid = g.pid
                                    WHERE p.pid = '$pid' AND p.p_status = 1 ")->row();
            return $sql;
        }
        function save($data)
        {
            $insert = $this->db->insert('admin_user',$data);
            $id = $this->db->insert_id();
            
            return $id;
        }
        function savepost($data)
        {
            $this->db->insert('tblproperty',$data);
            $id = $this->db->insert_id();

            return $id;
        }
}


