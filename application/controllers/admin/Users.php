<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {
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
        $arr['page'] = 'user';
        $this->load->view('admin/vwManageUser',$arr);
    }

    public function add_user() {
        $data['paises'] = $this->Paises_model->get_pais();
        $this->load->view('admin/vwAddUser',$data);
    }
    
    public function guardar_user() {
        if ($this->input->post('guardar_user')) {

            $this->Users_model->add_user();
            $data = array('mensaje' => 'Usuario agregado corectamente');
            redirect(base_url() . 'index.php/admin/Vehiculos', $data);
        } else {
            $data = array('mensaje' => 'No se realizo registro');
            redirect(base_url() . 'index.php/admin/Vehiculos', $data);
        }
    }

     public function edit_user() {
        $arr['page'] = 'user';
        $this->load->view('admin/vwEditUser',$arr);
    }
    
     public function block_user() {
        // Code goes here
    }
    
     public function delete_user() {
        // Code goes here
    }
    
    
    
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */