<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModCountry extends CI_Model {
	function getcountry(){
		$query = $this->db->get('set_country');
		return $query->result();
	}
	function save($cid,$cname,$zcode,$status){
		$data = array(
					  'zip_code'    	=> 		$zcode,
					  'name'	  		=> 		$cname,
					  'site_enabled'	=>		$status
					  );
		if($cid==""){
			$this->db->insert('set_country',$data);
		}else{
			$this->db->where('countryid',$cid);
			$this->db->update('set_country',$data);
		}
	}
	function getonerow($id){
		$this->db->where('countryid',$id);
		$query = $this->db->get('set_country');
		return $query->row();
	}
	function validate($name,$id){
            $where='';
            if($id!='')
                $where.=" AND countryid<>'$id'";
            return $this->db->query("SELECT COUNT(*) as count FROM set_country where name='$name' {$where}")->row()->count;
    }
}