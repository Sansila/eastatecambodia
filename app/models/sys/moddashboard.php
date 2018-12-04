<?php
	class ModDashBoard extends CI_Model{

		function getsiteprofile() {
			return $this->db->get('site_profile')->row();
		}

		function profile_save($data, $id) {
			$this->db->where('id', $id);
            return $this->db->update('site_profile', $data);
		}
	}
		