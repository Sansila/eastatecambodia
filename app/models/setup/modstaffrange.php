<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModStaffRange extends CI_Model {
	function getstaffrange(){
		$query = $this->db->get('set_staff_range');
		return $query->result();
	}
	function save($id,$min,$max){
		$data = array(
						'min'    	=> 		$min,
					  	'max'    	=> 		$max,
					  );
		if($id==""){
			$this->db->insert('set_staff_range',$data);
		}else{
			$this->db->where('staff_rangeid',$id);
			$this->db->update('set_staff_range',$data);
		}
	}
	function getonerow($id){
		$this->db->where('staff_rangeid',$id);
		$query = $this->db->get('set_staff_range');
		return $query->row();
	}
	function validate($id,$min,$max){
            $where='';
            if($id!='')
                $where.=" AND staff_rangeid<>'$id'";
            return $this->db->query("SELECT COUNT(*) as count FROM set_staff_range where min='$min' AND max='$max' {$where}")->row()->count;
    }
}