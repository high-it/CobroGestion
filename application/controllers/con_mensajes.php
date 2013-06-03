<?php
    class con_mensajes extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            
            $this->load->model('mod_mensajes');
             $this->load->library('session');
        }
        public function index(){
            //TOMA LA INFORMACION DE LOS OPERADORES Y 
            $resul=$this->mod_nuevodeudor->EstadoDeuda();
             $EstadoDeuda = array();
            if($resul){
               foreach($resul->result() as $row ){
                    $EstadoDeuda[$row->codigo]=$row->Nombre;       
               }
            }
            $data['EstadoDeuda']=$EstadoDeuda;
            
            $this->load->view('view_mensajes',$data); 
        }
    }
?>