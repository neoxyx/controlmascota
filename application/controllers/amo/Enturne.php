<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enturne extends CI_Controller {

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
   
            $data['mensaje']='EL CONDUCTOR NO TIENE ASIGNADO VEHICULO PARA ENTURNAR';
            $data['paises']=$this->Paises_model->get_pais();            
            $data['carr']=$this->Vehiculos_model->get_carr_vehiculo();
            $data['asignado'] = $this->Conductores_model->get_vehiculo_asignado();
            $this->load->view('conductor/vwEnturne', $data);
    }

    public function update_enturne() {
        $this->Enturne_model->update_enturne();
        redirect(base_url().'index.php/conductor/Ofertas');
    }
    
   

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */