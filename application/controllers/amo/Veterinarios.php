<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Veterinarios extends CI_Controller {

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
        $data['mensaje'] = 'Aun no hay registrados veterinarios';
        $data['veterinarios'] = $this->Veterinaria_model->get_veterinarios();
        $this->load->view('amo/vwVeterinarios', $data);
    }

}