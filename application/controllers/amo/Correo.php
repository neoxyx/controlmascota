<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Correo extends CI_Controller {

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
        $this->load->view('conductor/vwCorreo');
    }

    public function send_mail() {
        
        $this->load->library("email");
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'neoxyx@gmail.com',
            'smtp_pass' => 'estebinchas',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );
        $this->email->initialize($configGmail);
        $this->email->from('Plataforma Enturne');
        $this->email->to('tecnocolingenieria@gmail.com');

        $this->email->subject($_SESSION['usuario']);
        $this->email->message($this->input->post('mensaje'));
        $this->email->send();
        redirect(base_url() . 'index.php/conductor/Perfil/comp_info');
    }

}
