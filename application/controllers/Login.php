<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['registros'] = '';
        $data['mensaje'] = '';
        $this->load->view('login', $data);
    }

    public function very_sesion() {
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Methods: GET, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

        $usuario = $this->input->post('usuario');
        $passw = $this->input->post('passw');

        $variable = $this->Login_model->very_sesion_admin($usuario,$passw);
        $variable1 = $this->Login_model->very_sesion_veterinario($usuario,$passw);
        $variable2 = $this->Login_model->very_sesion_amo($usuario,$passw);

        if ($variable == TRUE) {
            $estado = $this->Registros_model->very_estado_admin($usuario,$passw);
            if ($estado == TRUE) {
                $usuario = $this->Users_model->get_user_xusu($usuario);                     
                if ($usuario) 
                    $usuario_data = array(
                    'id' => $usuario->id,  
                    'idempresa' => $usuario->id_empresa,
                    'usuario' => $usuario->usuario,
                    'nombre' => $usuario->nombre,
                    'ape' => $usuario->apellidos  
                );
                $this->session->set_userdata('datos_usuario',$usuario_data);
                $data = 0;            
                $resultadosJson = json_encode($data);
            } else {
                $this->session->unset_userdata('datos_usuario');
                $data = "El usuario no esta activo, verifique su correo"; 
                $resultadosJson = json_encode($data);
            }
            echo $resultadosJson;   
        }
        if ($variable1 == TRUE) {
            $estado1 = $this->Registros_model->very_estado_veterinario($usuario,$passw);
            if ($estado1 == TRUE) {
                $usuario = $this->Users_model->get_user_xusu($usuario);                    
                if ($usuario) 
                    $usuario_data = array(
                    'id' => $usuario->id,  
                    'idempresa' => $usuario->id_empresa,
                    'usuario' => $usuario->usuario,
                    'nombre' => $usuario->nombre,
                    'ape' => $usuario->apellidos  
                );
                $this->session->set_userdata('datos_usuario',$usuario_data);
                $data = 1;            
                $resultadosJson = json_encode($data);
            } else {
                $this->session->unset_userdata('datos_usuario');
                $data = 3; 
                $resultadosJson = json_encode($data);
            }
            echo $resultadosJson;   
        }

        if ($variable2 == TRUE) {
            $estado2 = $this->Registros_model->very_estado_amo($usuario,$passw);
            if ($estado2 == TRUE) {
                $usuario = $this->Users_model->get_user_xusu($usuario);                     
                if ($usuario) 
                    $usuario_data = array(
                    'id' => $usuario->id,  
                    'idempresa' => $usuario->id_empresa,
                    'usuario' => $usuario->usuario,
                    'nombre' => $usuario->nombre,
                    'ape' => $usuario->apellidos  
                );
                $this->session->set_userdata('datos_usuario',$usuario_data);
                $data = 2;            
                $resultadosJson = json_encode($data);
            } else {
                $this->session->unset_userdata('datos_usuario');
                $data = 3; 
                $resultadosJson = json_encode($data);
            }
            echo $resultadosJson;     
        }
        if ($variable == FALSE && $variable1 == FALSE && $variable2 == FALSE) {
            $data = 4; 
            $resultadosJson = json_encode($data);
            echo $resultadosJson; 
        }
    }

    public function token() {
        $token = md5(uniqid(rand(), true));
        $this->session->set_userdata('token', $token);
        return $token;
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('index.php/Login'));
    }

    public function get_perfil_admin() {

        $this->load->view('admin/vwPerfil');
    }

    public function get_perfil_empresa() {

        $this->load->view('empresa/vwPerfil');
    }

    public function get_perfil_conductor() {

        $this->load->view('conductor/vwPerfil');
    }

    public function get_perfil_gps() {

        $this->load->view('gps/vwPerfil');
    }

}
