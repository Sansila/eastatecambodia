<?php
    class Modmenu extends CI_Model {
    	
        function vaidate($menu_name,$menu_id){
            $where='';
            if($menu_id!='')
                $where.=" AND menu_id<>'$menu_id'";
            return $this->db->query("SELECT COUNT(*) as count FROM tblmenus where menu_name='$menu_name' {$where}")->row()->count;
        }
        function save_tab($menu_id,$article_id,$r){
            $data=array(
                    'menu_id'=>$menu_id,
                    'article_id'=>$article_id
                );
            if($menu_id!=''){
                if ($r==1) {
                    $this->db->where('menu_id',$menu_id)->delete('tbl_menu_tab');   
                }
                // $this->green->updateCateLineAge();
                $this->db->insert('tbl_menu_tab',$data);
                // $this->db->insert_id();
                
            }else{
                $this->db->insert('tbl_menu_tab',$data);
                $tab_id=$this->db->insert_id();
                // $this->green->updateCateLineAge($tab_id);
            }
            return $menu_id;
        }

        function save($data, $menu_id=''){
            if($menu_id != '') {
                $this->db->where('menu_id',$menu_id)->update('tblmenus',$data);
                $this->green->updateCateLineAge();
            }else{
                $this->db->insert('tblmenus',$data);
                $menu_id=$this->db->insert_id();
                $this->green->updateCateLineAge($menu_id);
            }
            return $menu_id;
        }

    }
        