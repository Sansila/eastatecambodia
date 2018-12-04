<?php
    class Modpropertytype extends CI_Model {
    	
        function vaidate($protype_name,$protype_id){
            $where='';
            if($protype_id !='')
                $where.=" AND typeid<>'$protype_id'";
            return $this->db->query("SELECT COUNT(*) as count FROM tblpropertytype where typename='$protype_name' {$where}")->row()->count;
        }
        function save($data, $protype_id){
            if($protype_id != '') {
                $this->db->where('typeid',$protype_id)->update('tblpropertytype',$data);
            }else{
                $this->db->insert('tblpropertytype',$data);
                $menu_id=$this->db->insert_id();
            }
            return $menu_id;
        }

    }       