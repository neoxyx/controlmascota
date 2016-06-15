<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Radiologias_model extends CI_Model {

    public function add_vacuna() {

        $this->db->insert("vacunas", array(
            'descripcion' => $this->input->post("desc", TRUE),
            'created_at' => date('Y-m-d')
        ));
    }

    public function get_vacunas() {
        $query = $this->db->get('vacunacion');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function get_vacunacion($id) {

        $consulta = $this->db->get_where('vacunacion', array('id_mascota' => $id));

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        }
    }

    public function edit_producto() {
        $id = $this->input->post('id');
        $data = array(
            'descripcion' => $this->input->post('desc'),
            'updated_at' => date('Y-m-d')
        );
        $this->db->where('id', $id);
        $this->db->update('sf_producto', $data);
    }

    public function activar($id) {
        $data = array(
            'activo'=>1,
            'updated_at' => date('Y-m-d')
        );
        $this->db->where('id', $id);
        $this->db->update('sf_producto', $data);
    }
    
    public function desactivar($id) {
        
        $data = array(
            'activo'=>0,
            'updated_at' => date('Y-m-d')
        );
        $this->db->where('id', $id);
        $this->db->update('sf_producto', $data);
    }
}

