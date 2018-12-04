<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modulemodel extends CI_Model {

	public function getmodule()
	{	$this->db->where('is_active',1);
		$this->db->order_by('moduleid','asc');
		$query=$this->db->get('z_module');
		return $query->result();
		
	}
}