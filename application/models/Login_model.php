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

    public function very_sesion_admin($usuario,$passw) {

        $consulta = $this->db->get_where('users', array('usuario' => $usuario,
            'pass' => md5($passw), 'nivel' => 'Administrador'));

        if ($consulta->num_rows() == 1) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    public function very_sesion_veterinario($usuario,$passw) {
        $consulta = $this->db->get_where('users', array('usuario' => $usuario,
            'pass' => md5($passw), 'nivel' => 'Veterinario'));

        if ($consulta->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function very_sesion_amo($usuario,$passw) {
        $consulta = $this->db->get_where('users', array('usuario' => $usuario,
            'pass' => md5($passw), 'nivel' => 'Amo'));

        if ($consulta->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    
}
