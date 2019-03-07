<?php

	class ModDashBoard extends CI_Model{
		function getsiteprofile() {

			return $this->db->get('site_profile')->row();

		}
		function profile_save($data, $id) {
			$this->db->where('id', $id);
            return $this->db->update('site_profile', $data);
		}
		function CountPropertyisInactive()
		{
			$query = $this->db->query("SELECT COUNT(*) as total FROM tblproperty as p inner join admin_user as u on p.agent_id = u.userid where p.p_status = 0  and (u.is_active = 0 OR u.is_active = 1) AND u.type_post IS NOT NULL")->row();
			return $query->total;
		}
		function CountInactiveUser()
		{
			$query = $this->db->query("SELECT Count(*) as total_user FROM admin_user as u WHERE u.is_active = 0 AND u.type_post IS NOT NULL ")->row();
			return $query->total_user;
		}
		function CountActiveProperty()
		{
			$query = $this->db->query("SELECT COUNT(*) as total_pro FROM tblproperty as p WHERE p.p_status = 1 ")->row();
			return $query->total_pro;
		}
		function CountActiveUser()
		{
			$query = $this->db->query("SELECT Count(*) as total_user FROM admin_user as u WHERE u.is_active = 1")->row();
			return $query->total_user;
		}
	}

		