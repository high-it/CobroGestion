<?php
    class mod_nuevodeudor extends CI_Model{
        
        function TipoPersona(){
            $query = $this->db->get('TipoPersona');
            return $query;
        }
        
        function TipoDocumento(){
            $query = $this->db->get('TipoDocumento');
            return $query;
        }
        
        function EstadoDeuda(){
            $query = $this->db->get('EtapaCobranza');
            return $query;
        }
        
        function list_deudores($codigo){
            $this->db->where('Cliente',$codigo);
            $query = $this->db->get('deudor');
            return $query;
        }
        
        function max_codigo(){
            $this->db->select_max('codigo');
            $query = $this->db->get('deudor');
            if($query->row()->codigo){
              $codigo=$query->row()->codigo+1   ;
            }else{
                $codigo=1;
            }
            return $codigo;
        }
        

        
        function ingresa($datos) {
            $this->db->insert('deudor', $datos);
        }

        function carga_deudores($codigo){
            $this->db->where('Cliente',$codigo);
            $query = $this->db->get('deudor');
            
            return $query;
        }
        
        function carga_contactos($codigo){
            $this->db->where('Cliente',$codigo);
            $query = $this->db->get('Contacto');
            
            return $query;
        }
        
        function carga_doc($codigo){
            echo 'REVISAR EL PROCEDIMIENTO PARA MOSTRAR LAS ACCIONES A REALIZAR';
          /*  $sql='select "Deuda"."Deudor", "Documento"."Accion","Documento"."ProxGestion","Documento"."Monto"
                    from "Deuda"
                    INNER JOIN "Documento"
                    on "Deuda"."Documento"="Documento"."Codigo"
                    where "Deuda"."Cliente"='.$codigo;
            echo '->'.$codigo;
            echo '->'.$sql;
            $query = $this->db->get($sql);
            return $query;*/
        }
        
        function busca_deudor($codigo){
            $this->db->where('codigo',$codigo);
            $this->db->limit(1);
            $query = $this->db->get('deudor');
            
            if($query ->num_rows()==1){
                return $query->row();
            }else{
                return false;  
            }
        }
        
        function busca_contacto($codigo){
            $this->db->where('codigo',$codigo);
            $this->db->limit(1);
            $query = $this->db->get('Contacto');
            
            if($query ->num_rows()==1){
                return $query->row();
            }else{
                return false;  
            }
        }
        
        function editar_deudor($codigo,$datos_deudor){
            $this->db->where('codigo',$codigo);
            $this->db->update('deudor',$datos_deudor);
        }
        
        function autogestion_usuario($datos){
            
            $this->db->where('codigo',$datos['codigo']);
            $this->db->update('usuario',$datos);
        }
        
        function TipoAccion(){
            $query = $this->db->get('accion');
            return $query;
        }
        function guarda_doc($doc,$deuda){
            $this->db->insert('Deuda',$deuda);
            $this->db->insert('Documento', $doc);
        }
        

        
        function guarda_docs($encabe,$det,$doc,$deuda){
            $this->db->insert('Deuda',$deuda);
            $this->db->insert('Documento', $doc);
            $this->db->insert('EncabezadoDoc', $encabe);
            $this->db->insert('DetalleDocumento', $det);
        }
        
        function max_doc(){
            $this->db->select_max('Codigo');
            $query = $this->db->get('Documento');
            if($query->row()->codigo){
              $codigo=$query->row()->codigo+1   ;
            }else{
                $codigo=1;
            }
            return $codigo;
        }
        
        function max_dueda(){
            $this->db->select_max('codigo');
            $query = $this->db->get('Deuda');
            if($query->row()->codigo){
              $codigo=$query->row()->codigo+1   ;
            }else{
                $codigo=1;
            }
            return $codigo;
        }
        
           
        
        //BUSCA LAS ACCIONES DE COBRANZA QUE SE DEBEN REALIZAR
        function AccionCobranza($codigo){
            $this->db->select('Documento.Monto, Documento.ProxGestion, Documento.Accion, Deuda.Deudor');
            $this->db->from('Documento');
            $this->db->join('Deuda','Documento.Codigo=Deuda.Documento','inner');
              
            //$this->db->order_by('Deudor','DESC');
            //$this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query;
        }
        //===============================================
        //                   CONTACTO
        //===============================================
        function TipoContacto(){
            $query=$this->db->get('TipoContacto');
            return $query;
        }
        
        function max_contacto(){
            $this->db->select_max('codigo');
            $query = $this->db->get('Contacto');
            if($query->row()->codigo){
              $codigo=$query->row()->codigo+1   ;
            }else{
                $codigo=1;
            }
            return $codigo;
        }
        
        function agrega_contacto($datos){
            $this->db->insert('Contacto',$datos);
        }
        
        function elimina_contacto($codigo){
            $this->db->where('codigo',$codigo);
            $this->db->delete('Contacto');
        }
        //===============================================
        //                   OPERADOR
        //=============================================== 
        function elimina_operador($codigo){
            $this->db->where('Codigo',$codigo);
            $this->db->delete('Operador');    
        }
        
        function agrega_operador($datos_op,$datos_usu){
            $this->db->insert('Operador',$datos_op);
            $this->db->insert('usuarios',$datos_usu);
        }
        
        function Operadores($codigo){
            $query = $this->db->get('Operador');
            return $query;
        }
        
        function busca_operador($codigo){
            $this->db->where('Codigo',$codigo);
            $this->db->limit(1);
            $query = $this->db->get('Operador');
            
            if($query ->num_rows()==1){
                return $query->row();
            }else{
                return false;  
            }
        }
        
        function max_operador(){
            $this->db->select_max('Codigo');
            $query = $this->db->get('Operador');
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

    }
    
    
                 
            //$query=$this->db->query('Select Deuda.Deudor, Documento.Accion,Documento.Monto,Documento.ProxGestion from Deuda INNER JOIN Documento on Deuda.Documento=Documento.Codigo WHERE Deuda.Cliente',$codigo);
            //$this->db->where('Deuda.Cliente',$codigo);
            
            //$this->db->select('Deuda.Deudor,Documento.Monto, Documento.ProxGestion, Documento.Accion');
            //$this->db->from('Deuda');
            //$this->db->join('Documento','Deuda.Documento=Documento.Codigo','inner');
            //$this->db->where('Deuda.Cliente',$codigo);
            
            
            
            //$this->db->select('Documento.Monto, Documento.ProxGestion, Documento.Accion, Deuda.Deudor');
            //$this->db->from('Documento');
            //$this->db->join('Deuda','Documento.Codigo=Deuda.Documento','inner');
            //$this->db->where('Deuda.Cliente',$codigo);
            //$this->db->order_by('ProxGestion','DESC');
            //$this->db->limit($limit, $offset);
            
            //$query = $this->db->get();
    
?>