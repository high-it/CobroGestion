<?php
    class mod_mensajes extends CI_Model{
    
    function Usuarios($codigo){
        $this->db->where('',$codigo);
        $query = $this->db->get('Oera');
        return $query;
    }
    
    function carga_deudores($codigo){
            $this->db->where('Cliente',$codigo);
            $query = $this->db->get('deudor');
            
            return $query;
        }
        
    }
?>