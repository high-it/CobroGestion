<?php
    class mod_login extends CI_Model{
        public function login($nombre,$clave){
            $this->db->where('nombre',$nombre);
            $this->db->where('clave',MD5($clave));
            $this->db->limit(1);
            
            $query=$this->db->get('usuarios');
            
            if($query ->num_rows()==1){
                return $query->row();
            }else{
                return false;  
            }
            
        }
    }
?>