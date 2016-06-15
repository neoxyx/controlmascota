<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Portal extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['registros'] = '';
        $data['mensaje'] = '';
        $this->load->view('portada/index.php', $data);
    }
    
    public function nosotros() {
        
        $this->load->view('portada/about.php');
    }
    
    public function contact() {
        $data['mensaje']='';
        $this->load->view('portada/contact.php',$data);
    }
    
    public function services() {
        $this->load->view('portada/services.php');
    }
    
}

