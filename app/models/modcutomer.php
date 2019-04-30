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
    	$where = "";
    	if($roleid != 1)
            $where.= " AND byroleid = $roleid";
    	$query = $this->db->query("SELECT * FROM tblgroupcustomer 
    							   WHERE is_active = 1 {$where} 
    							   ORDER BY groupid DESC")->result();
    	return $query;
    }
}