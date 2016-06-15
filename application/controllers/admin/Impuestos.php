<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Impuestos extends CI_Controller {

    /**
     * ark Admin Panel for Codeigniter 
     * Author: Abhishek R. Kaushik
     * downloaded from http://devzone.co.in
     *
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Impuestos_model');
    }

    public function index() {       
        $data['datos'] = $this->Impuestos_model->get_impuesto();
        $this->load->view('admin/vwImpuestos', $data);
    }

    public function add_idioma() {
        $arr['page'] = 'idioma';
        $this->load->view('admin/vwIdioma', $arr);
    }

    public function edit_pais() {
        $arr['page'] = 'paises';
        $this->load->view('admin/vwIdioma', $arr);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

