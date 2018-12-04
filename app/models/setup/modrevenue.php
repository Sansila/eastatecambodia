<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModRevenue extends CI_Model {
	function getrevenue(){
		$query = $this->db->get('set_revenue_range');
		return $query->result();
	}
	function save($id,$min,$max){
		$data = array(
						'min'    	=> 		$min,
					  	'max'    	=> 		$max,
					  );
		if($id==""){
			$this->db->insert('set_revenue_range',$data);
		}else{
			$this->db->where('revenue_rangeid',$id);
			$this->db->update('set_revenue_range',$data);
		}
	}
	function getonerow($id){
		$this->db->where('revenue_rangeid',$id);
		$query = $this->db->get('set_revenue_range');
		return $query->row();
	}
	function validate($id,$min,$max){
            $where='';
            if($id!='')
                $where.=" AND revenue_rangeid<>'$id'";
            return $this->db->query("SELECT COUNT(*) as count FROM set_revenue_range where min='$min' AND max='$max' {$where}")->row()->count;
    }
}