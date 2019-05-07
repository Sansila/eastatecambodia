<?php
    class Modgreenadmin extends CI_Model {

    	function getPropertyCategory()
    	{
    		$query = $this->db->query("SELECT * FROM tblpropertytype WHERE type_status = 1 ")->result();
    		return $query;
    	}
    	function getCountAllPropertyByCategoryID($cid,$cname,$userid,$roleid)
    	{
            $where = "";
            if($roleid == 1 || $roleid == 2)
                $where.= "";
            else
                $where.= " AND p.agent_id = $userid";
    		$row = $this->db->query("SELECT count(p.pid) as pro_count,
    											p.pid,
    											p.type_id,
    											p.p_status,
                                                p.agent_id,
    											pt.typeid,
    											pt.typename
								    			FROM tblproperty as p
								    			INNER JOIN tblpropertytype as pt 
								    			ON p.type_id = pt.typeid
								    			WHERE p.p_status = 1 {$where} AND p.type_id = $cid ")->row();
    		
            if($row->pro_count > 0){
                $arr = array('country'=>$row->typename,'value'=>$row->pro_count,'tid'=>$row->typeid);
               return $arr;
            }
    		
    	}
        function getallProperty($userid,$roleid)
        {
            $where = "";
            if($roleid == 1 || $roleid == 2)
                $where.= "";
            else
                $where.= " AND p.agent_id = $userid";
            $row = $this->db->query("SELECT count(p.pid) as alls, p.pid,p.p_status,p.agent_id FROM tblproperty as p WHERE p.p_status = 1 {$where} ")->row();
            return $row->alls;
        }
        function getCountStatus($userid,$roleid)
        {
            $where = "";
            if($roleid == 1 || $roleid == 2)
                $where.= "";
            else
                $where.= " AND agent_id = $userid";
            $return = $this->db->query("SELECT p_type,COUNT(*) as st_type
                                        FROM tblproperty 
                                        WHERE p_status = 1 {$where}
                                        GROUP BY p_type")->result();
            return $return;
        }
        function getCountStatusBySale($userid,$roleid)
        {
            $rol = $this->db->query("SELECT * FROM `z_role` WHERE `roleid` = $roleid ")->row();
            $where = "";
            if($rol->is_admin == 1 || $rol->is_admin == 2)
                $where.= "";
            else
                $where.= " AND agent_id = $userid ";
            $query = $this->db->query("SELECT p_type,COUNT(*) as st_type, typename
                                        FROM tblproperty 
                                        INNER JOIN tblpropertytype
                                        ON tblproperty.type_id = tblpropertytype.typeid
                                        WHERE p_status = 1 AND p_type = 1 {$where}
                                        GROUP BY type_id")->result();
            return $query;
        }
        function getCountStatusByRent($userid,$roleid)
        {
            $rol = $this->db->query("SELECT * FROM `z_role` WHERE `roleid` = $roleid ")->row();
            $where = "";
            if($rol->is_admin == 1 || $rol->is_admin == 2)
                $where.= "";
            else
                $where.= " AND agent_id = $userid ";
            $query = $this->db->query("SELECT p_type,COUNT(*) as st_type, typename
                                        FROM tblproperty 
                                        INNER JOIN tblpropertytype
                                        ON tblproperty.type_id = tblpropertytype.typeid
                                        WHERE p_status = 1 AND p_type = 2 {$where}
                                        GROUP BY type_id")->result();
            return $query;
        }
        function getCountStatusByRentAndSale($userid,$roleid){
            $rol = $this->db->query("SELECT * FROM `z_role` WHERE `roleid` = $roleid ")->row();
            $where = "";
            if($rol->is_admin == 1 || $rol->is_admin == 2)
                $where.= "";
            else
                $where.= " AND agent_id = $userid ";
            $query = $this->db->query("SELECT p_type,COUNT(*) as st_type, typename
                                        FROM tblproperty 
                                        INNER JOIN tblpropertytype
                                        ON tblproperty.type_id = tblpropertytype.typeid
                                        WHERE p_status = 1 AND p_type = 3 {$where}
                                        GROUP BY type_id")->result();
            return $query;
        }
    }
?>