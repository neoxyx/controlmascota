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

        $data['paises'] = $this->Paises_model->get_pais();
        $data['perfil'] = $this->Users_model->get_perfil();
        $this->load->view('admin/vwFormPerfil', $data);
    }

    public function get_perfil() {
        $data['perfil'] = $this->Users_model->get_perfil();
        $this->load->view('admin/vwPerfil', $data);
    }

    public function add_user() {
        $arr['page'] = 'user';
        $this->load->view('admin/vwAddUser', $arr);
    }

    public function edit_user() {
        
        if ($this->input->post('update_user')) {

            $this->Users_model->update_perfil();
            $data=array('mensaje'=>'Datos actualizados');
            redirect(base_url().'index.php/admin/Perfil/get_perfil',$data);
        } else {
            $data=array('mensaje'=>'No se realizo actualización');
            redirect(base_url().'index.php/admin/Perfil',$data);
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

                redirect(base_url() . 'index.php/admin/Perfil/get_perfil');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Users_model->update_foto_perfil($imagen);
                redirect(base_url() . 'index.php/admin/Perfil/get_perfil');
            }
        }
//FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
