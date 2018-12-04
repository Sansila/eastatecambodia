<?php

    class Modcategory extends CI_Model {

    	

        function vaidate($location_name,$location_id){

            $where='';

            if($location_id!='')

                $where.=" AND location_id<>'$location_id'";

            return $this->db->query("SELECT COUNT(*) as count FROM tbllocation where location_name='$location_name' {$where}")->row()->count;

        }

        function save($location_id,$location_name,$is_active){

           

            $data=array(

                'location_name'=>$location_name,

                'is_active'=>$is_active

             );

            if($location_id!=''){

                $this->db->where('location_id',$location_id)->update('tbllocation',$data);

                $this->green->updateCateLineAge();

            }else{

                $this->db->insert('tbllocation',$data);

                $this->green->updateCateLineAge($location_id);

            }

            return $location_id;

        }



    }

        