<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Amo extends CI_Controller {

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
        
    }

    public function add_amo() {
        $data['paises'] = $this->Paises_model->get_pais();
        $this->load->view('veterinario/vwAddAmo', $data);
    }

    public function guardar_amo() {
        if ($this->input->post('reg_amo')) {
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
            $this->form_validation->set_rules('tipo_doc', 'Tipo Documento', 'required');
            $this->form_validation->set_rules('cedula', 'No Documento', 'required');
            $this->form_validation->set_rules('pais', 'Pais', 'required');
            $this->form_validation->set_rules('provincia', 'Dpto', 'required');
            $this->form_validation->set_rules('localidad', 'Ciudad', 'required');
            $this->form_validation->set_rules('direccion', 'Dirección', 'required');
            $this->form_validation->set_rules('telefono', 'Teléfono', 'required|integer');
            $this->form_validation->set_rules('celular', 'Celular', 'required|integer');


            if ($this->form_validation->run() == FALSE) {
                $data['mensaje'] = '';
                $data['paises'] = $this->Paises_model->get_pais();
                $this->load->view('veterinario/vwAddAmo', $data);
            } else {

                $this->Registros_model->guardar_amo();
                $data['paises'] = $this->Paises_model->get_pais();
                $data['mensaje'] = 'Propietario guardado correctamente';
                $this->load->view('veterinario/vwAddAmo', $data);
            }
        } else {
            $data = array('mensaje' => 'No se guardo el registro');
            $this->load->view('veterinario/vwAddAmo', $data);
        }
    }

}
