<?php
    class modproduct extends CI_Model {
    	
        
        function save($product_id,$product_name,$menu_id,$content,$content_b,$is_active){
           
            $data=array('product_name'=>$product_name,
                'content_desc'=>$content,
                'menu_id'=>$menu_id,
                'content_bottom'=>$content_b,
                'menu_id'=>$menu_id,
                'is_active'=>$is_active
             );
            if($product_id!=''){
                $this->db->where('product_id',$product_id)->update('tblproduct',$data);
            }else{
                $this->db->insert('tblproduct',$data);
                $product_id=$this->db->insert_id();
            }
            return $product_id;
        }

    }
        