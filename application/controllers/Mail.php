<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mail extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function send_mail() {

        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[1]');       
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Mensaje', 'required|min_length[10]');
        $this->form_validation->set_rules('subject', 'Asunto', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['mensaje'] = '';
            $this->load->view('portada/contact.php', $data);
        } else {

            $subject = $this->input->post('subject');
            $message = 'Email: ' . $this->input->post('email') . ' Nombre: ' . $this->input->post('nombre') . ' Web: ' . $this->input->post('web') . ' Mensaje: ' . $this->input->post('message');

            $this->email->from('info@controlmascota.com', 'Control Mascota');
            $this->email->to('neoxyx@gmail.com');
            $this->email->cc('webmaster@hosting4world.com');

            $this->email->subject($subject);
            $this->email->message($message);

            $this->email->send();

            echo $this->email->print_debugger();
            $data['mensaje'] = 'Gracias por contactarnos, en breve responderemos tu mensaje';
            $this->load->view('portada/contact.php', $data);
        }
    }

}
