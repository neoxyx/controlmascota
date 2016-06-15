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

        $variable = $this->Login_model->very_sesion_admin();
        $variable1 = $this->Login_model->very_sesion_veterinario();
        $variable2 = $this->Login_model->very_sesion_amo();

        if ($this->input->post('submit_login')) {

            $this->form_validation->set_rules('username', 'Usuario', 'required');
            $this->form_validation->set_rules('password', 'Contraseña', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['mensaje'] = '';
                $this->load->view('login', $data);
            } else {

                if ($variable == TRUE) {
                    $estado = $this->Registros_model->very_estado_admin();
                    if ($estado == TRUE) {
                        $variables = array('usuario' => $this->input->post('username'));
                        $this->session->set_userdata($variables);

                        //crear la variable de sesion para hallar el id del usuario loqueado
                        $result = $this->Registros_model->get_iduser($_SESSION['usuario']) ;
                        $this->session->set_userdata('iduser',$result->id);
                        $this->session->set_userdata('idempresa',$result->id_empresa);

                        $this->load->view('admin/vwDashboard', $variables);
                    } else {
                        $data = array('mensaje' => 'El usuario Administrador no esta activo | verifique su correo');
                        $this->load->view('login', $data);
                    }
                }
                if ($variable1 == TRUE) {
                    $estado1 = $this->Registros_model->very_estado_veterinario();
                    if ($estado1 == TRUE) {
                        $variables = array('usuario' => $this->input->post('username'));
                        $this->session->set_userdata($variables);
                        //crear la variable de sesion para hallar el id del usuario loqueado
                        $result = $this->Registros_model->get_iduser($_SESSION['usuario']) ;
                        $this->session->set_userdata('iduser',$result->id);
                        $this->session->set_userdata('idempresa',$result->id_empresa);

                        $variables['empresa'] = $this->Veterinaria_model->get_veterinaria();
                        $this->load->view('veterinario/vwDashboard', $variables);
                    } else {
                        $data = array('mensaje' => 'El usuario Veterinario no esta activo | verifique su correo');
                        $this->load->view('login', $data);
                    }
                }

                if ($variable2 == TRUE) {
                    $estado2 = $this->Registros_model->very_estado_amo();
                    if ($estado2 == TRUE) {
                        $variables = array('usuario' => $this->input->post('username'));
                        $this->session->set_userdata($variables);

                        //crear la variable de sesion para hallar el id del usuario loqueado
                        $result = $this->Registros_model->get_iduser($_SESSION['usuario']) ;
                        $this->session->set_userdata('iduser',$result->id);
                        $this->session->set_userdata('idempresa',$result->id_empresa);

                        $this->load->view('amo/vwDashboard', $variables);
                    } else {
                        $data = array('mensaje' => 'El usuario Amo no esta activo | verifique su correo');
                        $this->load->view('login', $data);
                    }
                }
                if ($variable == FALSE && $variable1 == FALSE && $variable2 == FALSE) {
                    $data = array('mensaje' => 'El usuario no existe, registrese si lo desea o comuniquese con Control Mascota');
                    $this->load->view('login', $data);
                }
                else{
                   //crear la variable de sesion para hallar el id del usuario loqueado
                   $result = $this->Registros_model->get_iduser($_SESSION['usuario']) ;
                   $this->session->set_userdata('iduser',$result->id);
                   $this->session->set_userdata('idempresa',$result->id_empresa);
               
               }
            }
        } else {
            redirect() . base_url('index.php/Login');
        }
    }

    public function token() {
        $token = md5(uniqid(rand(), true));
        $this->session->set_userdata('token', $token);
        return $token;
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
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
