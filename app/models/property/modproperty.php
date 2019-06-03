<?php
    class Modproperty extends CI_Model {
    	
        function vaidate($title,$pid){
            $where='';
            if($pid !='')
                $where.=" AND pid<>'$pid'";
            return $this->db->query("SELECT COUNT(*) as count FROM tblproperty where property_name='$title' {$where} and p_status = 1 ")->row()->count;
        }
        function save($data, $pro_id){
            if($pro_id != '') {
                $this->db->where('pid',$pro_id)->update('tblproperty',$data);
            }else{
                $this->db->insert('tblproperty',$data);
                $pro_id = $this->db->insert_id();
                $this->db->query("UPDATE `tblproperty` SET `validate_date` = DATE_ADD(CURDATE(), INTERVAL 15 DAY) WHERE `pid` = $pro_id");
            }
            return $pro_id;
        }
        function getPropertyLocation($lineage)
        {
            $arr = "";
            $lineage = trim($lineage, '-');
            $arr = explode('-', $lineage);
            $num = count($arr);
            $i = 1; $main_id = "";;
            foreach($arr as $l)
            {
                if($i == 1)
                {
                    $main_id.= $l;
                }
                $i++;
            }
            $result = $this->db->query("SELECT * FROM tblpropertylocation where propertylocationid = '$main_id' ")->row();
            return $result->locationname;
        }
        function countAllproperty($userid)
        {
            $where = "";
            if($userid == 4)
                $where.= " ";
            else
                $where.= " AND agent_id = $userid";

            $sql = $this->db->query("SELECT count(*) as allproperty FROM tblproperty WHERE p_status=1 {$where}")->row();
            return $sql->allproperty;
        }
        function countAllUnaproveProperty()
        {
            $sql = $this->db->query("SELECT count(*) as approve FROM tblproperty pl
                                        inner join admin_user as u
                                        on u.userid = pl.agent_id
                                    WHERE  u.is_active = 0 AND u.type_post IS NOT NULL ")->row();
            return $sql->approve;
        }
        function getPropertyName($id)
        {
            $sql = $this->db->query("SELECT * FROM tblproperty where pid = $id")->row();
            return $sql->property_name;
        }
        function getImage($pid)
        {
            $sql = $this->db->query("SELECT * FROM tblgallery as g 
                                    WHERE g.pid = $pid 
                                    AND (g.enable_pro_image = 1 OR g.enable_pro_image is null)
                                    ")->row();
            return $sql;
        }
        function getAllImage($pid)
        {
            $sql = $this->db->query("SELECT * FROM tblgallery as g 
                                     WHERE g.pid = $pid 
                                     AND (g.enable_pro_image = 1 OR g.enable_pro_image is null) 
                                     LIMIT 3
                                     ")->result();
            return $sql;
        }
        function setupdate($imgstatus)
        {
            $arr = array();
            foreach ($imgstatus as $img) {
                $arr[] = $img;
            }
            return $arr;
        }
        function getPropertyForMatch($pid,$loc,$cate,$status,$min_price,$max_price,$min_size,$max_size)
        {
            $sql = $this->db->query("SELECT 
                                        p.pid,
                                        p.lp_id,
                                        p.type_id,
                                        p.property_name,
                                        p.description,
                                        p.price,
                                        p.p_type,
                                        p.housesize,
                                        p.property_tag,
                                        l.propertylocationid,
                                        l.locationname,
                                        pt.typeid,
                                        pt.typename
                                    FROM tblproperty as p
                                    INNER JOIN tblpropertylocation l 
                                    ON p.lp_id = l.propertylocationid
                                    INNER JOIN tblpropertytype as pt
                                    ON p.type_id = pt.typeid
                                    WHERE p.p_status = 1 
                                    AND p.pid = $pid
                                    AND l.propertylocationid = $loc
                                    AND pt.typeid = $cate
                                    AND p.p_type = $status
                                    AND (p.price BETWEEN $min_price AND $max_price)
                                    AND (p.housesize BETWEEN $min_size AND $max_size) ")->row();
            return $sql;
        }
    }