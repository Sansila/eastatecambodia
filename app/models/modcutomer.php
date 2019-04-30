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
			'byrolerid'=> $this->$this->session->userdata('roleid'),
            'groupname'=>$groupname,
            'is_active'=>$is_active,
         );
		$data1 = array('date_create' => date('Y-m-d'));
        if($groupid!=''){
            $this->db->where('groupid',$groupid)->update('tblgroupcustomer',$data);
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
}