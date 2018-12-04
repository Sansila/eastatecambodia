<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModPayment extends CI_Model {
	function getpayment(){
		$query = $this->db->get('set_pay_method');
		return $query->result();
	}
	function save($mid,$mname,$remark,$status){
		$data = array(
					  'method_name'	  	=> 		$mname,
					  'remark'	  		=> 		$remark,
					  'site_enabled'	=>		$status
					  );
		if($mid==""){
			$this->db->insert('set_pay_method',$data);
		}else{
			$this->db->where('paymethodid',$mid);
			$this->db->update('set_pay_method',$data);
		}
	}
	function getonerow($id){
		$this->db->where('paymethodid',$id);
		$query = $this->db->get('set_pay_method');
		return $query->row();
	}
	function validate($name,$id){
            $where='';
            if($id!='')
                $where.=" AND paymethodid<>'$id'";

            return $this->db->query("SELECT COUNT(*) as count FROM set_pay_method where method_name='$name' {$where}")->row()->count;
    }
}