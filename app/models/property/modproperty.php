<?php
    class Modproperty extends CI_Model {
    	
        function vaidate($title,$pid){
            $where='';
            if($pid !='')
                $where.=" AND pid<>'$pid'";
            return $this->db->query("SELECT COUNT(*) as count FROM tblproperty where property_name='$title' {$where} and p_status = 1 ")->row()->count;
        }
        function save($data, $pro_id){
            if($pro_id != '') {
                $this->db->where('pid',$pro_id)->update('tblproperty',$data);
            }else{
                $this->db->insert('tblproperty',$data);
                $pro_id = $this->db->insert_id();
            }
            return $pro_id;
        }
        function getPropertyLocation($lineage)
        {
            $arr = "";
            $lineage = trim($lineage, '-');
            $arr = explode('-', $lineage);
            $num = count($arr);
            $i = 1; $main_id = "";;
            foreach($arr as $l)
            {
                if($i == 1)
                {
                    $main_id.= $l;
                }
                $i++;
            }
            $result = $this->db->query("SELECT * FROM tblpropertylocation where propertylocationid = '$main_id' ")->row();
            return $result->locationname;
        }
        function countAllproperty($userid)
        {
            $where = "";
            if($userid == 4)
                $where.= " ";
            else
                $where.= " AND agent_id = $userid";

            $sql = $this->db->query("SELECT count(*) as allproperty FROM tblproperty WHERE p_status=1 {$where}")->row();
            return $sql->allproperty;
        }
        function countAllUnaproveProperty()
        {
            $sql = $this->db->query("SELECT count(*) as approve FROM tblproperty pl
                                        inner join admin_user as u
                                        on u.userid = pl.agent_id
                                    WHERE  u.is_active = 0 AND u.type_post IS NOT NULL ")->row();
            return $sql->approve;
        }
    }