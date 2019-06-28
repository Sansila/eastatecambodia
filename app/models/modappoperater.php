<?php
    class Modappoperater extends CI_Model {

    	function getCategory()
    	{
    		$sql = $this->db->query("SELECT typeid, typename FROM tblpropertytype WHERE type_status = 1")->result();
    		return $sql;
    	}
    	function getLocation()
    	{
    		$sql = $this->db->query("SELECT propertylocationid, locationname FROM tblpropertylocation WHERE status = 1 AND parent_id = 0 ")->result();
    		return $sql;
    	}
        function getUserid($user)
        {
            $sql = $this->db->query("SELECT * FROM admin_user WHERE is_active = 1 AND user_name = '$user' ")->row();
            
            return $sql->userid;
        }
        function saveProperty($data)
        {

            $this->db->insert('tblproperty',$data);
            $pro_id = $this->db->insert_id();
            $this->db->query("UPDATE `tblproperty` SET `validate_date` = DATE_ADD(CURDATE(), INTERVAL 15 DAY) WHERE `pid` = $pro_id");

            return $pro_id;
        }
    }