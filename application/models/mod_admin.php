<?php
    class mod_admin extends CI_Model{
        
        function TipoPersona(){
            $query = $this->db->get('TipoPersona');
            return $query;
        }
        
        function max_cliente(){
            $this->db->select_max('codigo');
            $query = $this->db->get('Clientes');
            if($query->row()->codigo){
              $codigo=$query->row()->codigo+1   ;
            }else{
                $codigo=1;
            }
            return $codigo;
        }
        
        function max_usuario(){
            $this->db->select_max('codigo');
            $query = $this->db->get('usuarios');
            if($query->row()->codigo){
              $codigo=$query->row()->codigo+1   ;
            }else{
                $codigo=1;
            }
            return $codigo;
        }
        
        function AgregaCliente($datos){
            $this->db->insert('Clientes', $datos);
        }
        
        function AgregaUsuario($datos){
            $this->db->insert('usuarios', $datos);
        }
        
        function lista_clientes(){
            $query=$this->db->get('Clientes');
            return $query;
        }
        
        function busca_cliente($codigo){
            $this->db->where('codigo',$codigo);
            $this->db->limit(1);
            $query = $this->db->get('Clientes');
            
            if($query ->num_rows()==1){
                return $query->row();
            }else{
                return false;  
            }
        }
        
        function editar_cliente($codigo,$datos_cliente){
            $this->db->where('codigo',$codigo);
            $this->db->update('Clientes',$datos_cliente);
        }
        function elimina_cliente($codigo){
            $this->db->where('codigo',$codigo);
            $this->db->delete('Clientes');
        }
        
        function max_tipo_cliente(){
            $this->db->select_max('codigo');
            $query = $this->db->get('TipoPersona');
            if($query->row()->codigo){
              $codigo=$query->row()->codigo+1   ;
            }else{
                $codigo=1;
            }
            return $codigo;
        }
        
        function agrega_tipo_cliente($datos){
            $this->db->insert('TipoPersona', $datos);
        }
        
        function max_etapa_cobranza(){
            $this->db->select_max('codigo');
            $query = $this->db->get('EtapaCobranza');
            if($query->row()->codigo){
              $codigo=$query->row()->codigo+1   ;
            }else{
                $codigo=1;
            }
            return $codigo;
        }
        
        function agrega_etapa_cobranza($datos){
            $this->db->insert('EtapaCobranza', $datos);
        }
    }
?>