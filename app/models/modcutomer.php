<?php
class Modcutomer extends CI_Model {


	function vaidate($groupname,$groupid)
	{
		$where='';
        if($groupid!='')
            $where.=" AND groupid<>'$groupid'";
        return $this->db->query("SELECT COUNT(*) as count FROM tblgroupcustomer where groupname='$groupname' {$where}")->row()->count;
	}
	function save($groupid,$groupname,$is_active)
	{
		$data=array(
			'byroleid'=>$this->session->userdata('roleid'),
            'groupname'=>$groupname,
            'is_active'=>$is_active,
         );
		$data1 = array('date_create' => date('Y-m-d'));
        if($groupid!=''){
            $this->db->where('groupid',$groupid)->update('tblgroupcustomer',$data);
            $groupid = $groupid;
        }else{
            $this->db->insert('tblgroupcustomer',array_merge($data,$data1));
            $groupid = $this->db->insert_id();
        }
        return $groupid;
	}
	function getgroupdatabyid($gid)
	{
		$sql = $this->db->query("SELECT * FROM tblgroupcustomer WHERE is_active = 1 AND groupid = $gid ")->row();
		return $sql;
	}
	function getlocation()
    {
        $sql = $this->db->query("SELECT * FROM tblpropertylocation WHERE status = 1 ")->result();
        return $sql;
    }
    function getgroupcustomer()
    {
    	$roleid = $this->session->userdata('roleid');
        $rol = $this->db->query("SELECT * FROM `z_role` WHERE `roleid` = $roleid ")->row();
    	$where = "";
    	if($rol->is_admin != 1 || $rol->is_admin != 2)
            $where.= " AND byroleid = $roleid";
    	$query = $this->db->query("SELECT * FROM tblgroupcustomer 
    							   WHERE is_active = 1 {$where} 
    							   ORDER BY groupid DESC")->result();
    	return $query;
    }
    function savecustomer($data,$data1,$customerid)
    {
        if($customerid!=''){
            $this->db->where('customerid',$customerid)->update('tblcustomer',$data);
            $cust = $customerid;
        }else{
            $this->db->insert('tblcustomer',array_merge($data,$data1));
            $cust = $this->db->insert_id();
        }
        return $cust;
    }
    function getGroup($roleid)
    {
        $rol = $this->db->query("SELECT * FROM `z_role` WHERE `roleid` = $roleid ")->row();
        $where = "";
        if($rol->is_admin != 1 || $rol->is_admin != 2)
            $where.= " AND byroleid = $roleid ";
        $sql = $this->db->query("SELECT * FROM tblgroupcustomer WHERE is_active = 1 {$where} ORDER BY groupid DESC")->result();
        return $sql;
    }
    function getCustomerByid($cid)
    {
        $sql = $this->db->query("SELECT * FROM tblcustomer as c 
                                INNER JOIN tblgroupcustomer as g 
                                ON c.group_name = g.groupid
                                WHERE c.is_active = 1 AND c.customerid = $cid
                                ")->row();
        return $sql;
    }
    function getPropertyCategory()
    {
        $sql = $this->db->query("SELECT * FROM tblpropertytype WHERE type_status = 1")->result();
        return $sql;
    }
    function getSelectedProperty($pid,$category,$location)
    {
        $where = "";

        if($location !="")
        {
            $location = trim($location, ',');
            $arrl = explode(',', $location);

            $num = count($arrl);$i=0;
            $where.= " AND (";
            foreach ($arrl as $loc) {
                $or = "OR";
                if(++$i == $num)
                {
                    $or = "";
                }
                $where.= " p.lp_id = $loc $or ";
            }
            $where.= ")";
        }

        if($category !="")
        {
            $category = trim($category, ',');
            $arrc = explode(',', $category);

            $num = count($arrc);$i=0;
            $where.= " AND (";
            foreach ($arrc as $cat) {
                $or = "OR";
                if(++$i == $num)
                {
                    $or = "";
                }
                $where.= " p.type_id = $cat $or ";
            }
            $where.= ")";
        }

        $query = $this->db->query("SELECT p.pid,
                         p.type_id,
                         p.lp_id,
                         p.property_name
                        FROM tblproperty as p
                        WHERE p.p_status = 1 {$where} ORDER BY p.pid DESC")->result();

        return $query;
    }
    function getallproperty()
    {
        $query = $this->db->query("SELECT p.pid,
                                          p.property_name
                                   FROM tblproperty as p
                                   WHERE p.p_status = 1 ORDER BY p.pid DESC")->result();

        return $query;
    }
    function getImage($pid)
    {
        $sql = $this->db->query("SELECT * FROM tblgallery as g WHERE g.pid = $pid ")->row();
        return $sql;
    }
    function getPropertyTag()
    {
        $sql = $this->db->query("SELECT property_tag, p_status, count(property_tag) as totaltag FROM tblproperty
                                 WHERE property_tag !='' 
                                 AND p_status = 1
                                 GROUP BY property_tag 
                                 ORDER BY totaltag DESC
                                 ")->result();
        return $sql;
    }

}