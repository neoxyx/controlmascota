<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gps_model extends CI_Model {

    public function get_users_gps() {

        $consulta = $this->db->get_where('users', array('nivel' => 'GPS'));

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    public function get_user_gps_xid($id) {
        $consulta = $this->db->get_where('users', array('id' => $id));

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }
}
