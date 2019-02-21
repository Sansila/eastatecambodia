<?php
    class Modgreenadmin extends CI_Model {

    	function getPropertyCategory()
    	{
    		$query = $this->db->query("SELECT * FROM tblpropertytype WHERE type_status = 1 ")->result();
    		return $query;
    	}
    	function getCountAllPropertyByCategoryID($cid,$cname)
    	{
    		$row = $this->db->query("SELECT count(p.pid) as pro_count,
    											p.pid,
    											p.type_id,
    											p.p_status,
    											pt.typeid,
    											pt.typename
								    			FROM tblproperty as p
								    			INNER JOIN tblpropertytype as pt 
								    			ON p.type_id = pt.typeid
								    			WHERE p.p_status = 1 AND p.type_id = $cid ORDER BY pro_count ASC")->row();
    		
			$arr = array('country'=>$row->typename,'value'=>$row->pro_count);
			return $arr;
    		
    	}
    }
?>