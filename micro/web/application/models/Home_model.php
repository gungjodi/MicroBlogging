<?php
    Class Home_model extends CI_Model
    {
        function view()
        {
            return $this->db->select('*')
                    ->from('tb_posting')
                    ->order_by('date','desc')
                    ->get()->result();
        }
        
        function add($data,$id=NULL)
        {
            if (!empty($id)) {
                $this->db->where('id_posting', $id);
                $return = $this->db->update('tb_posting', $data);
            }else{
                $sql="INSERT INTO tb_posting VALUES (NULL,'".$data['text_content']."',NOW(),0)";
                $return = $this->db->query($sql);
            }
            return $return;
        }
        
        function delete($id)
        {
            $this->db->where('id_posting', $id);            
            $return = $this->db->delete('tb_posting');
            return $return;
        }
        
        function count_view($id)
        {
            $sql="UPDATE tb_posting SET view=(view+1) WHERE id_posting=$id";
            $return = $this->db->query($sql);
            return $return;
        }
        
        function get_content($id_posting)
        {
            return $this->db->select('*')
                    ->from('tb_posting')
                    ->where('id_posting',$id_posting)
                    ->get()->row();
        }
    }