<?php
    class Modgroupuser extends CI_Model {
    	
    	function getAllUser()
    	{
    		$sql = $this->db->query("SELECT * FROM admin_user WHERE is_active = 1")->result();
    		return $sql;
    	}
    	function save($data,$data1,$groupid)
    	{
    		if($groupid!=''){
	            $this->db->where('groupid',$groupid)->update('tblgroupuser',$data);
	            $groupid = $groupid;
	        }else{
	            $this->db->insert('tblgroupuser',array_merge($data,$data1));
	            $groupid = $this->db->insert_id();
	        }
	        return $groupid;
    	}
    }
