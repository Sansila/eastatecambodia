<?php
    class Modappoperater extends CI_Model {

    	function getCategory()
    	{
    		$sql = $this->db->query("SELECT typeid, typename FROM tblpropertytype WHERE type_status = 1")->result();
    		return $sql;
    	}
    	function getLocation()
    	{
    		$sql = $this->db->query("SELECT propertylocationid, locationname FROM tblpropertylocation WHERE status = 1 ")->result();
    		return $sql;
    	}
        function getMainLocation()
        {
            $sql = $this->db->query("SELECT propertylocationid, locationname FROM tblpropertylocation WHERE status = 1 AND parent_id = 0 ")->result();
            return $sql;
        }
        function getUserid($user)
        {
            $sql = $this->db->query("SELECT * FROM admin_user WHERE is_active = 1 AND user_name = '$user' ")->row();
            
            return $sql->userid;
        }
        function getUseridNRoleid($user)
        {
            $sql = $this->db->query("SELECT * FROM admin_user WHERE is_active = 1 AND user_name = '$user' ")->row();
            return $sql;
        }
        function saveProperty($data,$pid)
        {   
            if($pid != 0)
            {
                $this->db->where('pid',$pid)->update('tblproperty',$data);
            }else{
                $this->db->insert('tblproperty',$data);
                $pid = $this->db->insert_id();
                $this->db->query("UPDATE `tblproperty` SET `validate_date` = DATE_ADD(CURDATE(), INTERVAL 15 DAY) WHERE `pid` = $pid");
            }
            return $pid;
        }
        function getImage($pid)
        {
            $sql = $this->db->query("SELECT * FROM tblgallery as g 
                                WHERE g.pid = '$pid' 
                                AND (g.enable_pro_image = 1 OR g.enable_pro_image is null)
                                ")->row();
            return $sql;
        }
        function getAllimagebyID($pid)
        {
            $sql = $this->db->query("SELECT * FROM tblgallery WHERE pid = $pid ")->result();
            return $sql;
        }
    }