<?php
    class ModSlide extends CI_Model {
    	function getSlide(){
    		$query = $this->db->where('site_visibled',1)->where('is_active',1)->get('site_slideshow');
			return $query->result();
    	}
    	function getrSlide(){
    		$query = $this->db->query("SELECT * FROM site_ads a
    								 INNER JOIN site_adsblog_detail b 
    								 WHERE a.adsid=b.adsid
    								 AND a.site_enabled=1
    								 AND a.is_active=1
    								 AND b.adsblogid=1");
			return $query->result();
    	}
    }