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
            if($roleid == 1)
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
                $arr = array('country'=>$row->typename,'value'=>$row->pro_count);
               return $arr;
            }
    		
    	}
        function getallProperty($userid,$roleid)
        {
            $where = "";
            if($roleid == 1)
                $where.= "";
            else
                $where.= " AND p.agent_id = $userid";
            $row = $this->db->query("SELECT count(p.pid) as alls, p.pid,p.p_status,p.agent_id FROM tblproperty as p WHERE p.p_status = 1 {$where} ")->row();
            return $row->alls;
        }
    }
?>