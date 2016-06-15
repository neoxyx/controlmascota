<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Opciones extends CI_Controller {
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
        $arr['page'] = 'opt';
        
             
        $this->load->view('admin/vwOpciones',$arr);
    }
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */