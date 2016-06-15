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
        $data['mensaje'] = 'Aun no has registrado ninguna mascota';
        $data['mascota'] = $this->Mascotas_model->get_mascota();
        $this->load->view('admin/vwMascotas', $data);
    }

    public function add_mascota() {
        $data['razas'] = $this->Mascotas_model->get_razas();
        $data['paises'] = $this->Paises_model->get_pais();
        $this->load->view('admin/vwAddMascota', $data);
    }

    public function guardar_mascota() {

        if ($this->input->post('submit_reg')) {

            $this->Mascotas_model->add_mascota();
            $data = array('mensaje' => 'Registro correcto');
            redirect(base_url() . 'index.php/admin/Mascotas', $data);
        } else {
            $data = array('mensaje' => 'No se realizo el registro');
            redirect(base_url() . 'index.php/admin/Mascotas', $data);
        }
    }

    public function edit_form($id) {
        $data['razas'] = $this->Mascotas_model->get_razas();
        $data['paises'] = $this->Paises_model->get_pais();
        $data['mascota'] = $this->Mascotas_model->get_mascotaxid($id);
        $this->load->view('admin/vwFormEditMascota', $data);
    }

    public function edit_mascota() {

        if ($this->input->post('update_mascota')) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                redirect(base_url() . 'index.php/amo/Mascotas');
            } else {
                $file_info = $this->upload->data();
                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Mascotas_model->update_mascota($imagen);
                redirect(base_url() . 'index.php/admin/Mascotas', $data);
            }
        }
    }

    public function historia_clinica($id) {
        $data['mascota'] = $this->Mascotas_model->get_mascotaxid($id);
        $this->load->view('admin/vwHistoriaClinica', $data);
    }

    public function get_vacunacion($id) {
        $data['mensaje'] = 'Aun no se han registrado vacunas';
        $data['mascota'] = $this->Mascotas_model->get_mascotaxid($id);
        $data['vacunas'] = $this->Vacunas_model->get_vacunacion($id);
        $this->load->view('admin/vwVacunas', $data);
    }

    public function add_vacuna($id) {
        $data['mascota'] = $this->Mascotas_model->get_mascotaxid($id);
        $this->load->view('admin/vwAddVacuna', $data);
    }

    public function guardar_vacuna() {

        if ($this->input->post('submit_reg')) {

            $this->Vacunas_model->add_vacuna();
            $data = array('mensaje' => 'Registro correcto');
            redirect(base_url() . 'index.php/admin/Mascotas', $data);
        } else {
            $data = array('mensaje' => 'No se realizo el registro');
            redirect(base_url() . 'index.php/admin/Mascotas', $data);
        }
    }

    public function get_analisis($id) {
        $data['analisis'] = $this->Analisis_model->get_analisis($id);
        $this->load->view('admin/vwVacunas', $data);
    }

    public function get_ecografias($id) {
        $data['ecografia'] = $this->Ecografias_model->get_ecografias($id);
        $this->load->view('admin/vwVacunas', $data);
    }

    public function get_radiologias($id) {
        $data['radiologia'] = $this->Radiologias_model->get_radiologias($id);
        $this->load->view('admin/vwVacunas', $data);
    }

}
