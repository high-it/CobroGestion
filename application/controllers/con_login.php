<?php
    class con_login extends CI_Controller{
        
        public function __construct(){
            parent::__construct();
            $this->load->helper('form');
            $this->load->helper('array');
            $this->load->library('form_validation');
            $this->load->model('mod_login');
        }
        
        public function index($error_login=false){
            if ($error_login){
                $data['mensaje']="Error en el Login";
                $this->load->view('view_login',$data);
            }else{
                $this->load->view("view_login");
            }
        } 
        
        public function process_login(){
            //$this->output->enable_profiler(TRUE);  ver las estadisticas del proceso
 
            
            $this->form_validation->set_rules('nombre', 'nombre', 'trim|required|xss_clean');
            $this->form_validation->set_rules('clave', 'clave', 'trim|required|xss_clean|callback_check_database');
            
            if($this->form_validation->run() == FALSE){
	            $this->load->view('view_login');
	        }else{
	           $result = $this->mod_login->login( $this->input->post("nombre"), $this->input->post("clave"));
    	       if($result){
                    
                    $sess_array = array(
                        'codigo'=>$result->Cliente,
                        'nombre' => $result->nombre,
                        'tipo'   => $result->tipo,
                        'login' => true
                    );
                        
                    $this->session->set_userdata($sess_array);
                    
                    if($result->tipo=="normal"){
                        redirect("con_usuariovalido");
                    }else{
                        if($result->tipo=="admin"){
                            redirect("con_administrador",$result->nombre);
                        }
                    }
    	       }else{
                   redirect("con_login/index/true");
    	       }
            }
        }
        
        public function logout(){
            $this->session->sess_destroy();
            redirect("con_login");
        } 
    }
?>