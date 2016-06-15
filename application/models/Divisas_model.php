<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Divisas_model extends CI_Model {

    public function add_divisas() {

        $this->db->insert("df_paises", array(
            'nombre' => $this->input->post("name", TRUE),
            'codigo' => $this->input->post("code", TRUE),
            'created_at' => $this->input->post("date", TRUE)
        ));
    }

    public function get_divisa() {
        
        $consulta = $this->db->get('df_divisas');

        if($consulta->num_rows()>0){
            return $consulta->result();
        }
    }

}

