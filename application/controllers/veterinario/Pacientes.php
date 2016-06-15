<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pacientes extends CI_Controller {

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
    
    public function add_paciente() { 
        $data['amo'] = $this->Registros_model->get_usuarios();
        $data['especies'] = $this->Mascotas_model->get_especies();
        $data['paises'] = $this->Paises_model->get_pais();
        $this->load->view('veterinario/vwAddPaciente', $data);
    }
    
    public function get_pacientes($id) {
        $data['mensaje']='Aun no tienes pacientes';        
        $data['pacientes'] = $this->Veterinaria_model->get_pacientes($id);
        $data['paises'] = $this->Paises_model->get_pais();
        $this->load->view('veterinario/vwPacientes', $data);
    }
    
    public function form_paciente($id) {
        $data['especies'] = $this->Mascotas_model->get_especies();
        $data['paises'] = $this->Paises_model->get_pais();
        $data['mascota'] = $this->Mascotas_model->get_mascotaxid($id);
        $this->load->view('veterinario/vwFormEditMascota', $data);
    }
    
    public function edit_paciente() {

        if ($this->input->post('update_mascota')) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $file_info = $this->upload->data();
                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Mascotas_model->update_mascota($imagen);
                redirect(base_url() . 'index.php/veterinario/Dashboard', $data);
            } else {
                $file_info = $this->upload->data();
                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Mascotas_model->update_mascota($imagen);
                redirect(base_url() . 'index.php/veterinario/Dashboard', $data);
            }
        }
    }
    
    public function historia_clinica($id){
        $data['mascota'] = $this->Mascotas_model->get_mascotaxid($id);
        $this->load->view('veterinario/vwHistoriaClinica', $data);
    }
    
    public function get_vacunacion($id){
        $data['mensaje'] = 'Aun no se han registrado vacunas';
        $data['mascota'] = $this->Mascotas_model->get_mascotaxid($id);
        $data['vacunas'] = $this->Vacunas_model->get_vacunacion($id);
        $this->load->view('veterinario/vwVacunas',$data);    
    }
    
    public function add_vacuna($id) {
        $data['mascota'] = $this->Mascotas_model->get_mascotaxid($id);
        $this->load->view('veterinario/vwAddVacuna', $data);
    }
    
    public function guardar_vacuna() {

        if ($this->input->post('submit_reg')) {

            $this->Vacunas_model->add_vacuna();
            $data = array('mensaje' => 'Registro correcto');
            redirect(base_url() . 'index.php/veterinario/Dashboard', $data);
        } else {
            $data = array('mensaje' => 'No se realizo el registro');
            redirect(base_url() . 'index.php/veterinario/Dashboard', $data);
        }
    }
}
