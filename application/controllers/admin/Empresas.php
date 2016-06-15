<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Empresas extends CI_Controller {

    /**
     * ark Admin Panel for Codeigniter 
     * Author: Abhishek R. Kaushik
     * downloaded from http://devzone.co.in
     *
     */
    public function __construct() {
        parent::__construct();
        
    }

    public function index() {       
        $data['datos'] = $this->Empresas_model->get_empresas();
        $this->load->view('admin/vwEmpresas', $data);
    }
    
    public function edit_empresaxnit($nit) {  
        $data['paises'] = $this->Paises_model->get_pais();
        $data['datos'] = $this->Empresas_model->get_empxnit($nit);
        $this->load->view('admin/vwFormEmpresa', $data);
    }
    
    public function add_empresa() {  
        $data['paises'] = $this->Paises_model->get_pais();
        $this->load->view('admin/vwFormAddEmpresa', $data);
    }
    
    public function guardar_empresa() {
        if ($this->input->post('reg_empresa')) {

            $this->Empresas_model->add_empresaxadmin();
            $data['paises']=  $this->Paises_model->get_pais();
            $this->load->view('admin/vwAsignarUserEmp',$data);
        } else {
            $data = array('mensaje' => 'Error al guardar, intentelo de nuevo');
            redirect(base_url() . 'index.php/admin/Empresas', $data);
        }
    }
    public function guardar_usuario_empresa() {
        if ($this->input->post('reg_usuario_emp')) {

            $this->Empresas_model->add_userempresaxadmin();
            $data = array('mensaje' => 'Empresa Agregada correctamente');
            redirect(base_url() . 'index.php/admin/Empresas', $data);
        } else {
            $data = array('mensaje' => 'Error al guardar, intentelo de nuevo');
            redirect(base_url() . 'index.php/admin/Empresas', $data);
        }
    }

    
}

