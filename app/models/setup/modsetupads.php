<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ModSetupAds extends CI_Model {
	function getstore(){
		$query = $this->db->query('SELECT * FROM set_store WHERE is_active=1');
		return $query->result();
	}
	function getblog(){
		$query = $this->db->query('SELECT * FROM site_ads_blog');
		return $query->result();
	}
	function getblogname($adsid,$arr=0){
		$data=$this->db->query("SELECT * 
								FROM site_adsblog_detail ad 
								INNER JOIN site_ads a 
								ON(ad.adsid=a.adsid)
								INNER JOIN site_ads_blog b 
								ON(ad.adsblogid=b.adsblogid)
								WHERE ad.adsid='$adsid'")->result();
		$name='';
		$arrs=array();
		foreach ($data as $d) {
			$name.=$d->blog.',';
			$arrs[$d->adsblogid]=$d->adsblogid;
		}
		if($arr>0)
			return $arrs;
		else
			return $name;
	}
	
}