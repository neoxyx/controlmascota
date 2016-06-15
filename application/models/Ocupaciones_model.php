<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ocupaciones_model extends CI_Model {

    public function add_ocupacion() {

        $this->db->insert("ocupaciones", array(
            'codigo' => $this->input->post("codocupa", TRUE),
            'nombre' => $this->input->post("nomocupa", TRUE)
        ));
    }

    public function get_ocupaciones($xcod='#00#') {
      if ($xcod=='#00#'){
         //no hay parametros
           $consulta = $this->db->get('ocupaciones');
      }
      else{
         $consulta = $this->db->get_where('ocupaciones', array('codigo' => $xcod));
      }

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        }
    }

    public function edit_ocupacion() {
        $id = $this->input->post('codigo');
        $data=array(
            'nombre' => $this->input->post('nomocupa')
        );
        $this->db->where('codigo', $id);
        $this->db->update('ocupaciones', $data);
    }

}
