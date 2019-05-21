<?php
    class Modarticle extends CI_Model {
    	
        
        function save($article_id,$title,$content,$is_active,$is_marguee,$content_kh,$keyword,$meta_desc,$location_id,$title_kh,$icon,$date,$is_menu){
           
            $data=array('article_title'=>$title,
                'article_title_kh'=>$title_kh,
                'content'=>$content,
                'article_date'=>$date,
                'content_kh'=>$content_kh,
                'meta_keyword'=>$keyword,
                'meta_desc'=>$meta_desc,
                'menu_id'=>$location_id,
                'icon'=>$icon,
                'is_active'=>$is_active,
                'is_marguee'=>$is_marguee,
                'is_menu' => strtolower($is_menu)
            );
            $data1 = array(
                'modify_by' => $this->session->userdata('userid'),
                'modify_date' => date('Y-m-d H:i:s')
            );
            if($article_id!=''){
                $this->db->where('article_id',$article_id)->update('tblarticle',array_merge($data,$data1));
            }else{
                $this->db->insert('tblarticle',$data);
                $article_id=$this->db->insert_id();
            }
            return $article_id;
        }
        function getUserName($userid)
        {
            $user = $this->db->query("SELECT * FROM admin_user WHERE userid = $userid")->row();
            return $user;
        }
    }
        