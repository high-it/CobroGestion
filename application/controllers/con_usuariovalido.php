<?php
    class con_usuariovalido extends CI_Controller{
        
        function __construct(){
            parent::__construct();
             $this->load->model('mod_nuevodeudor');
             $this->load->library('session');
             $CodigoLinea;
        }
        
        function index(){
            //echo '->'.$this->session->userdata('codigo');
            $cod_usuario=$this->session->userdata('codigo'); //codigo del usuario que usa la aplicacion
            
            //TOMA LOS DATOS DE LOS OPERADORES
            $data['Operadores']=$this->mod_nuevodeudor->Operadores($cod_usuario);
        
            //TOMA LOS DATOS DE LAS ACCIONES DE COBRANZA
            $data['accion_cobranza']=$this->mod_nuevodeudor->AccionCobranza($cod_usuario);
            
            //TOMA LOS DATOS DE LOS DEUDORES
            $data['datos_deudores']=$this->mod_nuevodeudor->carga_deudores($cod_usuario);
            
            //TOMA LOS DATOS DE LOS contactos
            $data['datos_contacto']=$this->mod_nuevodeudor->carga_contactos($cod_usuario);
            
            //toma los datos de los documentos
            $data['datos_doc']=$this->mod_nuevodeudor->carga_doc($cod_usuario);
            
            //TOMA LOS TIPOS DE ACCIONES Y EL CODIGO PARA LOS COMBOBOX
            $resul=$this->mod_nuevodeudor->EstadoDeuda();
             $EstadoDeuda = array();
            if($resul){
               foreach($resul->result() as $row ){
                    $EstadoDeuda[$row->codigo]=$row->Nombre;       
               }
            }
            $data['EstadoDeuda']=$EstadoDeuda;
            
            //TOMA LOS TIPOS DE CONTACTOS Y EL CODIGO PARA LOS COMBOBOX
            $resul=$this->mod_nuevodeudor->TipoContacto();
             $TipoContacto = array();
            if($resul){
               foreach($resul->result() as $row ){
                    $TipoContacto[$row->codigo]=$row->Nombre;       
               }
            }
            $data['TipoContacto']=$TipoContacto;
            
            //TOMA LOS TIPOS DE ACCIONES Y EL CODIGO PARA LOS COMBOBOX
            $resul=$this->mod_nuevodeudor->TipoAccion();
             $TipoAccion = array();
            if($resul){
               foreach($resul->result() as $row ){
                    $TipoAccion[$row->codigo]=$row->accion;       
               }
            }
            $data['TipoAccion']=$TipoAccion;
            
            //TOMA LOS TIPOS DE PERSONA Y EL CODIGO PARA LOS COMBOBOX
            $resul=$this->mod_nuevodeudor->TipoPersona();
             $TipoPersona = array();
            if($resul){
               foreach($resul->result() as $row ){
                    $TipoPersona[$row->codigo]=$row->Nombre;       
               }
            }
            $data['TipoPersona']=$TipoPersona;
            
            //TOMA LOS TIPOS DE DOCUMENTOS Y EL CODIGO PARA LOS COCMBOBOX
            $resul=$this->mod_nuevodeudor->TipoDocumento();
            $TipoDocumento=array();
            if($resul){
                foreach($resul->result() as $row){
                    $TipoDocumento[$row->codigo]=$row->Nombre;
                }
            }
             $data['TipoDocumento']=$TipoDocumento;
             
            //TOMA LOS TIPOS DE PERSONA Y EL CODIGO PARA LOS COMBOBOX
            $resul=$this->mod_nuevodeudor->list_deudores($cod_usuario);
             $deudores = array();
            if($resul){
               foreach($resul->result() as $row ){
                    $deudores[$row->codigo]=$row->nombres;       
               }
            }
            $data['deudores']=$deudores;
            
            //CARGA LA VISTA Y LE PASA LOS DATOS
            $this->load->view('view_usuario',$data);
        }
        
        //===============================================
        //                   DEUDORES
        //=============================================== 
        function agrega_deudor(){

            $datos_deudor =array(
                'codigo'=>$this->mod_nuevodeudor->max_codigo(),
                'nombres'=>$this->input->post("nombre"),
                'apaterno'=>$this->input->post("apat"),
                'amaterno'=>$this->input->post("amat"),
                'direccion'=>$this->input->post("dir"),
                'telefono'=>$this->input->post("telefono"),
                'mail'=>$this->input->post("mail"),
                'ciudad'=>$this->input->post("ciudad"),
                'comuna'=>$this->input->post("comuna"),
                'tipopersona'=>$this->input->post('TipoPersona'),
                'Cliente'=>$this->session->userdata('codigo'),
            );           
            
            $this->mod_nuevodeudor->ingresa($datos_deudor);
            redirect("con_usuariovalido");
        }
        
        function carga_deudor($codigo){
            
            $row=$this->mod_nuevodeudor->busca_deudor($codigo);

            $data['cod']=$row->codigo;
            $data['nomb']=$row->nombres;
            $data['apat']=$row->apaterno;
            $data['amat']=$row->amaterno;
            $data['dire']=$row->direccion;
            $data['telef']=$row->telefono;
            $data['mail']=$row->mail;
            $data['ciudad']=$row->ciudad;
            $data['com']=$row->comuna;
            $data['tperso']=$row->tipopersona;
            $data['cliente']=$row->Cliente;
            
            echo json_encode($data);
            
        }
        
        function modificar_deudor(){
            $cod_deudor=$this->input->post('cod');
            $datos_deudor =array(
                'nombres'=>$this->input->post("nombre"),
                'apaterno'=>$this->input->post("apat"),
                'amaterno'=>$this->input->post("amat"),
                'direccion'=>$this->input->post("dir"),
                'telefono'=>$this->input->post("telefono"),
                'mail'=>$this->input->post("mail"),
                'ciudad'=>$this->input->post("ciudad"),
                'comuna'=>$this->input->post("comuna"),
            );           
            
            $this->mod_nuevodeudor->editar_deudor($cod_deudor,$datos_deudor);
            redirect("con_usuariovalido");
        }
        
        //===============================================
        //                   CONTACTOS
        //=============================================== 
        function agregar_contacto(){
            $datos_contacto=array(
                'codigo'=>$this->mod_nuevodeudor->max_contacto(),
                'Deudor'=>$this->input->post("deudores"),
                'Cliente'=>$this->session->userdata('codigo'),
                'Nombre'=>$this->input->post("nom"),
                'Direccion'=>$this->input->post("dir"),
                'Telefono'=>$this->input->post("tel"),
                'Mail'=>$this->input->post("mail"),
                'Obser'=>$this->input->post("obser"),
                'Tipo'=>$this->input->post("TipoContacto"),
            );
            
            $this->mod_nuevodeudor->agrega_contacto($datos_contacto);
            redirect("con_usuariovalido");
        }
        
       function carga_contacto($codigo){
            $row=$this->mod_nuevodeudor->busca_contacto($codigo);
            $data['cod']=$row->codigo;
            $data['deudor']=$row->Deudor;
            $data['nom']=$row->Nombre;
            $data['dire']=$row->Direccion;
            $data['telef']=$row->Telefono;
            $data['mail']=$row->Mail;
            $data['obs']=$row->Obser;
            
            echo json_encode($data);
       }
       
       function elimina_contacto($codigo){
            $this->mod_nuevodeudor->elimina_contacto($codigo);
            redirect("con_usuariovalido");
        }
        
        //===============================================
        //                   DOCUMENTOS
        //=============================================== 
        function agrega_doc(){
            $dia=date("d/m/Y");//PODEMOS DESCOMPONER LA FECHA CON DATE("D") PARA EL DIA Y DE LA MISMA FORMA MES Y AÑO
            
            $codigo=$this->session->userdata('codigo');  
            $cod_doc=$this->mod_nuevodeudor->max_doc();
            $cod_deuda=$this->mod_nuevodeudor->max_dueda();
            
            $datos_doc=array(
                'Codigo'=>$cod_doc,
                'Monto'=>$this->input->post("Precio"),
                'Tipo'=>$this->input->post("TipoDocumento"),
                'Deuda'=>$cod_deuda,
                'Observacion'=>$this->input->post("observacion"),
                'Accion'=>$this->input->post("TipoAccion"),
                'ProxGestion'=>$this->input->post("ProxGes"),
                'ConPago'=>$this->input->post("ConPago"),
                'FechaEmision'=>$dia,               
            );  
            
            $datos_deuda=array(
                'codigo'=>$cod_deuda,
                'Documento'=>$cod_doc,
                'Deudor'=>$this->input->post("deudores"),
                'Cliente'=>$codigo,

            );
            
            $this->mod_nuevodeudor->guarda_doc($datos_doc,$datos_deuda);
            redirect("con_usuariovalido");
        }
        
        //===============================================
        //                   OPERADOR
        //===============================================       
        function agregar_operador($codigo){
            $datos_usuario=array(
                'codigo'=>$this->mod_nuevodeudor->max_usuario(),
                'nombre'=>$this->input->post('user'),
                'clave'=>md5($this->input->post('pass')),
                'tipo'=>"normal",
                'Cliente'=>$this->session->userdata('codigo'),
            );
            
            $datos_operador=array(
                'Codigo'=>$this->mod_nuevodeudor->max_operador(),
                'Nombre'=>$this->input->post("nom"),
                'Direccion'=>$this->input->post("dir"),
                'Telefono'=>$this->input->post("tel"),
                'Mail'=>$this->input->post("mail"),
                'Cliente'=>$this->session->userdata('codigo'),
            );
            
            $this->mod_nuevodeudor->agrega_operador($datos_operador,$datos_usuario);
            redirect("con_usuariovalido");
        }
        
        function carga_operador($codigo){
            //echo '->'.$codigo;
          
            $row=$this->mod_nuevodeudor->busca_operador($codigo);
            
            /*echo '->'.$row->Codigo;
            echo '->'.$row->Nombre;
            echo '->'.$row->Direccion;
            echo '->'.$row->Telefono;
            echo '->'.$row->Mail;*/
            $data['codigo']=$row->Codigo;
            $data['nom']=$row->Nombre;
            $data['dir']=$row->Direccion;
            $data['tel']=$row->Telefono;
            $data['mail']=$row->Mail;
            $data['cliente']=$row->Cliente;
            
            echo json_encode($data);
        }
        
        function modifica_operador(){
            
        }
        
        function elimina_operador($codigo){
            $this->mod_nuevodeudor->elimina_operador($codigo);
            redirect("con_usuariovalido");
            
        }
        //===============================================
        //                   AUTOGESTION
        //===============================================        
        function autogestion(){
            $codigo=$this->session->userdata('codigo');
            
            $datos_usuario=array(
                'codigo'=>$this->session->userdata('codigo'),
                'nombre'=>$this->input->post("nombre"),
                'clave'=>MD5($this->input->post("clave")),
            );
            
            $this->mod_nuevodeudor->autogestion_usuario($datos_usuario);
        }
        
    }
?>