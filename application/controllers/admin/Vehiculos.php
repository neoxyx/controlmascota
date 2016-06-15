<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vehiculos extends CI_Controller {

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
        $data['datos'] = $this->Vehiculos_model->get_all_vehiculos();
        $this->load->view('admin/vwVehiculos', $data);
    }

    public function get_vehiculo_xid($id) {

        if (!$id) {
            show_404();
        }
        $data['paises'] = $this->Paises_model->get_pais();
        $data['marca'] = $this->Vehiculos_model->get_marca_vehiculo();
        $data['tipov'] = $this->Vehiculos_model->get_tipo_vehiculo();
        $data['carr'] = $this->Vehiculos_model->get_carr_vehiculo();
        $data['vehiculo'] = $this->Vehiculos_model->get_vehiculo_xid($id);
        $this->load->view('admin/vwFormEditVehiculo', $data);
    }

    public function update_vehiculo() {

        if ($this->input->post('update_reg')) {

            $this->Vehiculos_model->update_vehiculo_admin();
            $data = array('mensaje' => 'Datos actualizados');
            redirect(base_url() . 'index.php/admin/Vehiculos', $data);
        } else {
            $data = array('mensaje' => 'No se realizo actualización');
            redirect(base_url() . 'index.php/admin/Vehiculos', $data);
        }
    }

    public function add_vehiculo() {
        $data['marca'] = $this->Vehiculos_model->get_marca_vehiculo();
        $data['tipov'] = $this->Vehiculos_model->get_tipo_vehiculo();
        $data['carr'] = $this->Vehiculos_model->get_carr_vehiculo();
        $data['paises'] = $this->Paises_model->get_pais();
        $data['user'] = $this->Users_model->get_users();
        $this->load->view('admin/vwFormAddVehiculo', $data);
    }
    
    public function guardar_vehiculo() {

        if ($this->input->post('guardar_reg')) {

            $this->Vehiculos_model->add_vehiculo();
            $data = array('mensaje' => 'Vehiculo agregado corectamente');
            redirect(base_url() . 'index.php/admin/Vehiculos', $data);
        } else {
            $data = array('mensaje' => 'No se realizo registro');
            redirect(base_url() . 'index.php/admin/Vehiculos', $data);
        }
    }
    

}
