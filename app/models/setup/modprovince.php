<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModProvince extends CI_Model {
	function getprovince(){
		$query = $this->db->get('set_province');
		return $query->result();
	}
	function getprovincebycountry($cid){
		$this->db->where("countryid",$cid);
		$query = $this->db->get('set_province');
		return $query->result();
	}
	function save($cid,$pid,$pname,$note,$status){
		$data = array(
					  'countryid'    	=> 		$cid,
					  'prov_name'	  	=> 		$pname,
					  'note'	  		=> 		$note,
					  'site_enabled'	=>		$status
					  );
		if($pid==""){
			$this->db->insert('set_province',$data);
		}else{
			$this->db->where('provinceid',$pid);
			$this->db->update('set_province',$data);
		}
	}
	function getonerow($id){
		$this->db->where('provinceid',$id);
		$query = $this->db->get('set_province');
		return $query->row();
	}
	function validate($name,$pid,$cid){
            $where='';
            if($pid!='')
                $where.=" AND provinceid<>'$pid'";

            return $this->db->query("SELECT COUNT(*) as count FROM set_province where prov_name='$name' AND countryid='$cid' {$where}")->row()->count;
    }
}