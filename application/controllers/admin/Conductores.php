<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Conductores extends CI_Controller {

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
        $data['datos'] = $this->Conductores_model->get_all_conductores();
        $this->load->view('admin/vwConductores', $data);
    }
    
    public function get_conductor_xid($id) {  
        $data['paises']=$this->Paises_model->get_pais();
        $data['datos'] = $this->Conductores_model->get_conductor_xid($id);
        $this->load->view('admin/vwFormConductor', $data);
    }
    
    public function edit_conductor() {

        if ($this->input->post('update_conductor')) {

            $this->Conductores_model->update_conductor();
            $data = array('mensaje' => 'Datos actualizados');
            redirect(base_url() . 'index.php/admin/Conductores', $data);
        } else {
            $data = array('mensaje' => 'No se realizo actualización');
            redirect(base_url() . 'index.php/admin/Conductores', $data);
        }
    }
    
    public function add_conductor() {
        $data['mensaje']='';
        $data['paises']=$this->Paises_model->get_pais();
        $this->load->view('admin/vwFormAddConductor',$data);
    }
    
    public function guardar_conductor() {
        if ($this->input->post('reg_conductor')) {

            $this->Conductores_model->add_conductor();
            $data = array('mensaje' => 'Conductor Agregado correctamente');
            redirect(base_url() . 'index.php/admin/Conductores', $data);
        } else {
            $data = array('mensaje' => 'Error al guardar, intentelo de nuevo');
            redirect(base_url() . 'index.php/admin/Conductores', $data);
        }
    }
    
}

