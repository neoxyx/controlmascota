<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function very_sesion_admin() {

        $consulta = $this->db->get_where('users', array('usuario' => $this->input->post('username', TRUE),
            'pass' => md5($this->input->post('password', TRUE)), 'nivel' => 'Administrador'));

        if ($consulta->num_rows() == 1) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    public function very_sesion_veterinario() {
        $consulta = $this->db->get_where('users', array('usuario' => $this->input->post('username', TRUE),
            'pass' => md5($this->input->post('password', TRUE)), 'nivel' => 'Veterinario'));

        if ($consulta->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function very_sesion_amo() {
        $consulta = $this->db->get_where('users', array('usuario' => $this->input->post('username', TRUE),
            'pass' => md5($this->input->post('password', TRUE)), 'nivel' => 'Amo'));

        if ($consulta->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    
}
