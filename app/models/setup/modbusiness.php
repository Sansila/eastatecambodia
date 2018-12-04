<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModBusiness extends CI_Model {
	function getbusiness(){
		$query = $this->db->get('set_business_type');
		return $query->result();
	}
	function save($bid,$bname){
		$data = array(
					  'description'    	=> 		$bname,
					  );
		if($bid==""){
			$this->db->insert('set_business_type',$data);
		}else{
			$this->db->where('business_typeid',$bid);
			$this->db->update('set_business_type',$data);
		}
	}
	function getonerow($id){
		$this->db->where('business_typeid',$id);
		$query = $this->db->get('set_business_type');
		return $query->row();
	}
	function validate($id,$name){
            $where='';
            if($id!='')
                $where.=" AND business_typeid<>'$id'";

            return $this->db->query("SELECT COUNT(*) as count FROM set_business_type where description='$name' {$where}")->row()->count;
    }
}