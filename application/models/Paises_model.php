<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paises_model extends CI_Model {

    public function add_pais() {

        $this->db->insert("df_paises", array(
            'nombre' => $this->input->post("name", TRUE),
            'codigo' => $this->input->post("code", TRUE),
            'created_at' => $this->input->post("date", TRUE)
        ));
    }

    public function get_pais() {
        $this->db->order_by('nombre_pais', 'asc');
        $pais = $this->db->get('df_paises');
        if ($pais->num_rows() > 0) {
            return $pais->result();
        }
    }

    public function provincias($pais) {
        $this->db->where('pais_id', $pais);
        $this->db->order_by('nombre_dpto', 'asc');
        $provincias = $this->db->get('df_departamentos');
        if ($provincias->num_rows() > 0) {
            return $provincias->result();
        }
    }
    
    public function localidades($provincias) {
        $this->db->where('departamento_id', $provincias);
        $this->db->order_by('nombre_ciudad', 'asc');
        $localidades = $this->db->get('df_ciudades');
        if ($localidades->num_rows() > 0) {
            return $localidades->result();
        }
    }

}
