<?php
    class Modprolocation extends CI_Model {
    	
        function vaidate($loc_name,$loc_id){
            $where='';
            if($loc_id !='')
                $where.=" AND propertylocationid<>'$loc_id'";
            return $this->db->query("SELECT COUNT(*) as count FROM tblpropertylocation where locationname='$loc_name' {$where}")->row()->count;
        }
        function save($data, $loc_id){
            if($loc_id != '') {
                $this->db->where('propertylocationid',$loc_id)->update('tblpropertylocation',$data);
                $this->green->updateCateLineAges();
            }else{
                $this->db->insert('tblpropertylocation',$data);
                $loc_id = $this->db->insert_id();
                $this->green->updateCateLineAges($loc_id);
            }
            return $loc_id;
        }
    }       