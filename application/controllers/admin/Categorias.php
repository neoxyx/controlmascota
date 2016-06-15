<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categorias extends CI_Controller {

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
        $arr['mensaje'] = 'No hay categorias creadas';
        $arr['cat'] = $this->Categorias_model->get_categorias();
        $this->load->view('admin/vwCategorias', $arr);
    }

    public function add_categoria() {
        $this->load->view('admin/vwAddCategoria');
    }

    public function guardar_categoria() {
        if ($this->input->post('reg_cat')) {
            $this->Categorias_model->add_categoria();
            redirect(base_url() . 'index.php/admin/Categorias');
        }
    }

    public function get_categoria_xid($id) {
        $arr['cat'] = $this->Categorias_model->get_categoria_xid($id);
        $this->load->view('admin/vwEditCategoria', $arr);
    }

    public function edit_categoria() {
        if ($this->input->post('update_cat')) {
            $this->Categorias_model->edit_categoria();
            redirect(base_url() . 'index.php/admin/Categorias');
        }
    }

    public function block_categoria() {
        // Code goes here
    }

    public function delete_categoria() {
        // Code goes here
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

