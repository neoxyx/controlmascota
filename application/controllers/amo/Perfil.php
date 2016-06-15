<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perfil extends CI_Controller {

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
        $data['perfil'] = $this->Users_model->get_perfil();
        $data['paises'] = $this->Paises_model->get_pais();
        $this->load->view('amo/vwFormPerfil', $data);
    }

    public function get_perfil() {
        $data['edad'] = $this->Users_model->get_edad();
        $data['perfil'] = $this->Users_model->get_perfil();
        $this->load->view('amo/vwPerfil', $data);
    }

    public function add_user() {
        $arr['page'] = 'user';
        $this->load->view('amo/vwAddUser', $arr);
    }

    public function edit_user() {

        if ($this->input->post('update_user')) {

            $this->Users_model->update_perfil();
            $data = array('mensaje' => 'Datos actualizados');
            redirect(base_url() . 'index.php/amo/Perfil/get_perfil', $data);
        } else {
            $data = array('mensaje' => 'No se realizo actualización');
            redirect(base_url() . 'index.php/amo/Perfil/get_perfil', $data);
        }
    }

    public function edit_foto_user() {
        if ($this->input->post('update_foto')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/amo/Perfil/get_perfil');
            } else {
                $file_info = $this->upload->data();
                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Users_model->update_foto_perfil($imagen);
                redirect(base_url() . 'index.php/amo/Perfil/get_perfil');
            }
        }
    }

    public function adj_doc() {
        $data['perfil'] = $this->Users_model->get_perfil();
        $data['doc'] = $this->Users_model->get_doc();
        $data['lic'] = $this->Users_model->get_lic();
        $this->load->view('amo/vwSubirDocs', $data);
    }
    
    public function edit_user_pdf() {
        if ($this->input->post('update_pdf')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'zip|rar|pdf|docx|txt';
            $config['max_size'] = '2048';
            
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/amo/Perfil/adj_doc');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Users_model->update_user_pdf($imagen);
                redirect(base_url() . 'index.php/amo/Perfil/adj_doc');
            }
        }
    }

    public function edit_foto_doc() {
        if ($this->input->post('update_doc')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/amo/Perfil/adj_doc');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Users_model->update_foto_doc($imagen);
                redirect(base_url() . 'index.php/amo/Perfil/adj_doc');
            }
        }
//FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    }


    public function get_vehiculos() {

        $data['mensaje'] = 'Aun no has registrado vehiculos';
        $data['vehiculo'] = $this->Vehiculos_model->get_vehiculos();
        $this->load->view('amo/vwVehiculos', $data);
    }

    public function get_vehiculo_xid($id) {

        if (!$id) {
            show_404();
        }
        $data['paises'] = $this->Paises_model->get_pais();
        $data['marca'] = $this->Vehiculos_model->get_marca_vehiculo();
        $data['tipov'] = $this->Vehiculos_model->get_tipo_vehiculo();
        $data['carr'] = $this->Vehiculos_model->get_carr_vehiculo();
        $data['vehiculo'] = $this->Vehiculos_model->get_vehiculo_xid($id);
        $this->load->view('amo/vwFormEditVehiculo', $data);
    }

    public function add_vehiculo() {
        $data['vehiculo'] = $this->Vehiculos_model->get_vehiculos();
        $data['marca'] = $this->Vehiculos_model->get_marca_vehiculo();
        $data['tipov'] = $this->Vehiculos_model->get_tipo_vehiculo();
        $data['carr'] = $this->Vehiculos_model->get_carr_vehiculo();
        $data['paises'] = $this->Paises_model->get_pais();
        $this->load->view('amo/vwFormAddVehiculo', $data);
    }

    public function guardar_vehiculo() {

        if ($this->input->post('submit_reg')) {
            $this->Vehiculos_model->add_vehiculo();
            redirect(base_url() . 'index.php/amo/Perfil/get_vehiculos');
        } else {
            $data = array('mensaje' => 'No se realizo el registro');
            redirect(base_url() . 'index.php/amo/Perfil/add_vehiculo', $data);
        }
    }

    public function update_vehiculo() {

        if ($this->input->post('update_reg')) {

            $this->Vehiculos_model->update_vehiculo();
            $data = array('mensaje' => 'Datos actualizados');
            redirect(base_url() . 'index.php/amo/Perfil/get_vehiculos', $data);
        } else {
            $data = array('mensaje' => 'No se realizo actualización');
            redirect(base_url() . 'index.php/amo/Perfil/get_vehiculos', $data);
        }
    }

    public function edit_foto_carnet() {
        if ($this->input->post('update_carnet')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/conductor/Perfil/get_vehiculos');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Vehiculos_model->update_carnet($imagen);
                header("Location:".$_SERVER['HTTP_REFERER']);  
            }
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
