<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mascotas extends CI_Controller {

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
        
        $data['datos'] = $this->Mascotas_model->get_mascotas();
        $this->load->view('admin/vwMascotas', $data);
    }
    

    public function add_mascota() {
        $arr['pais'] = $this->Paises_model->get_pais();
        $this->load->view('amo/vwFormMascota', $arr);
    }
    
    public function guardar_mascota() {
        if ($this->input->post('reg_mascota')) {

            $this->Mascotas_model->add_mascota();
            $data = array('mensaje' => 'Mascota Agregada correctamente');
            redirect(base_url() . 'index.php/admin/Mascotas', $data);
        } else {
            $data = array('mensaje' => 'Error al guardar, intentelo de nuevo');
            redirect(base_url() . 'index.php/admin/Mascotas', $data);
        }
    }
    

    public function edit_mascota() {
        $arr['page'] = 'paises';
        $this->load->view('admin/vwPaises', $arr);
    }

}
