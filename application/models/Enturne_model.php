<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enturne_model extends CI_Model {

    public function update_enturne() {
        $idv=  $this->input->post('idv');
        $origen = $this->input->post('localidad');
        $carroceria = $this->input->post('carroceria');
        $enturne = $this->input->post('enturne');
        $data = array(
            'carroceria_id' => $carroceria,
            'enturne'=>$enturne,
            'origen_id'=>$origen
        );
        $this->db->where('idv', $idv);
        $this->db->update('sf_vehiculo', $data);
    }

}
