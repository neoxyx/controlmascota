<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 */
class Users_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add_user() {

        $this->db->insert("users", array(
            'nombre' => $this->input->post('firstName'),
            'apellidos' => $this->input->post('lastName'),
            'tipo_doc' => $this->input->post('tipo_doc'),
            'cedula' => $this->input->post('cc'),
            'fecha_nac' => $this->input->post('theDate'),
            'estado_civil' => $this->input->post('est_civil'),
            'sexo' => $this->input->post('gender'),
            'pais' => $this->input->post('pais'),
            'dpto' => $this->input->post('provincia'),
            'ciudad' => $this->input->post('localidad'),
            'direccion' => $this->input->post('address'),
            'telefono' => $this->input->post('phone'),
            'celular' => $this->input->post('celphone'),
            'email' => $this->input->post('email'),
            'usuario' => $this->input->post('usuario'),
            'pass' =>  md5($this->input->post('contraseña')) ,
            'nivel' => $this->input->post('nivel'),
            /*'activo' => $this->input->post("activo", TRUE),*/
            'fecha_creacion' => date('Y-m-d H:i:s')
        ));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update_userxid() {
        $id= $this->input->post('id');
        $data = array(
            'nombre' => $this->input->post('firstName'),
            'apellidos' => $this->input->post('lastName'),
            'tipo_doc' => $this->input->post('tipo_doc'),
            'cedula' => $this->input->post('cc'),
            'fecha_nac' => $this->input->post('theDate'),
            'estado_civil' => $this->input->post('est_civil'),
            'sexo' => $this->input->post('gender'),
            'pais' => $this->input->post('pais'),
            'dpto' => $this->input->post('provincia'),
            'ciudad' => $this->input->post('localidad'),
            'direccion' => $this->input->post('address'),
            'telefono' => $this->input->post('phone'),
            'celular' => $this->input->post('celphone'),
            'email' => $this->input->post('email'),
            /*'activo' => $this->input->post("activo", TRUE),*/
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function get_users() {
        $query = $this->db->get('users');
        if ($query->num_rows() != 0) {
            return $query->result();
        } else {

            print 'no results';
        }
    }


    public function get_user_xid($id) {
        $query = $this->db->get_where('users',array('id'=>$id));
        if ($query->num_rows() != 0) {
            return $query->result();
        } else {

            print 'no results';
            return FALSE;
        }
    }


    public function get_user_xusu($xusu) {
        $query = $this->db->get_where('users',array('usuario'=>$xusu));
        if ($query->num_rows() != 0) {
            return $query->row();  //retorna 1 sola fila
        } else {

            print 'no results';
            return FALSE;
        }
    }

    public function get_edad() {
        $user=$_SESSION['usuario'];
        $query = "SELECT users.usuario, YEAR(CURDATE())-YEAR(users.fecha_nac) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(users.fecha_nac,'%m-%d'), 0, -1) AS EDAD_ACTUAL FROM users WHERE users.usuario='$user'";
        $consulta = $this->db->query($query);

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    public function get_perfil() {


        $query = $this->db->get_where('users',array('usuario'=>$_SESSION['usuario']));
        if ($query->num_rows() != 0) {
            return $query->result();
        } else {

            print 'no results';
        }
    }

    public function update_perfil() {

        $data = array(
            'nombre' => $this->input->post('firstName'),
            'apellidos' => $this->input->post('lastName'),
            'tipo_doc' => $this->input->post('tipo_doc'),
            'cedula' => $this->input->post('cc'),
            'fecha_nac' => $this->input->post('theDate'),
            'estado_civil' => $this->input->post('est_civil'),
            'sexo' => $this->input->post('gender'),
            'pais' => $this->input->post('pais'),
            'dpto' => $this->input->post('provincia'),
            'ciudad' => $this->input->post('localidad'),
            'direccion' => $this->input->post('address'),
            'telefono' => $this->input->post('phone'),
            'celular' => $this->input->post('celphone'),
            'email' => $this->input->post('email'),
            'updated_at'=>date('Y-m-d H:i:s')
        );

        $this->db->where('usuario', $_SESSION['usuario']);
        $this->db->update('users', $data);
    }

    public function update_user_pdf($imagen) {

        $data = array(
            'pdf' => $imagen
        );

        $this->db->where('usuario', $_SESSION['usuario']);
        $this->db->update('users', $data);
    }

    public function update_foto_perfil($imagen) {

        $data = array(
            'foto_ruta' => $imagen
        );

        $this->db->where('usuario', $_SESSION['usuario']);
        $this->db->update('users', $data);
    }

    public function get_doc() {

        $this->db->select('foto_cedula');
        $this->db->where('usuario', $_SESSION['usuario']);
        $this->db->from('users');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result();
        } else {

            print 'no results';
        }
    }

    public function get_lic() {

        $this->db->select('foto_licencia');
        $this->db->where('usuario', $_SESSION['usuario']);
        $this->db->from('users');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result();
        } else {

            print 'no results';
        }
    }

    public function update_foto_doc($imagen) {

        $data = array(
            'foto_cedula' => $imagen
        );

        $this->db->where('usuario', $_SESSION['usuario']);
        $this->db->update('users', $data);
    }

    public function update_foto_lic($imagen) {

        $data = array(
            'foto_licencia' => $imagen
        );

        $this->db->where('usuario', $_SESSION['usuario']);
        $this->db->update('users', $data);
    }

}
