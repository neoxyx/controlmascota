<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mascotas_model extends CI_Model {

    public function get_especies() {
        $this->db->order_by('nombre_especie','asc');
        $query = $this->db->get('ci_especies');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function get_razas($especies) {
        $this->db->where('especie_id', $especies);
        $this->db->order_by('nombre_raza', 'asc');
        $razas = $this->db->get('razas');
        if ($razas->num_rows() > 0) {
            return $razas->result();
        } else {
            print 'no results';
        }
    }

    public function get_all_mascotas() {

        $consulta = $this->db->get('mascotas');

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    public function get_amos() {

        $query = $this->db->get_where('users', array('usuario' => 'Amo'));

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {

            print 'no results';
        }
    }

    public function get_mascota() {
        $iduser = $_SESSION['iduser'];
        $SqlInfo = "select m.id,m.nombre,u.direccion,m.id_raza,m.id_especie,m.esterilizado,m.alergias,m.foto_mascota,m.created_at,timestampdiff(month,m.fecha_nacimiento,curdate()) AS EDAD_ACTUAL,r.nombre_raza,e.nombre_especie,m.sexo FROM mascotas m, razas r, ci_especies e, users u
        WHERE m.id_amo=u.id and m.id_raza=r.id and m.id_especie=e.id and u.id='$iduser'";

        $query = $this->db->query($SqlInfo);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {

            print 'no results';
        }
    }

    public function get_mascotaxid($id) {
        $SqlInfo = "select m.id,m.nombre,m.fecha_nacimiento,m.sexo,m.alergias,m.id_especie,m.id_raza,m.foto_mascota,m.id_chip,m.fecha_chip,m.created_at,r.nombre_raza,e.nombre_especie FROM mascotas m, razas r, ci_especies e WHERE m.id='$id' AND m.id_raza=r.id AND m.id_especie=e.id";
        $query = $this->db->query($SqlInfo);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {

            print 'no results';
        }
    }

    public function add_mascota() {
        $iduser = $_SESSION['iduser'];
        $this->db->insert("mascotas", array(
            'nombre' => $this->input->post("nombre", TRUE),
            'id_especie' => $this->input->post('especies'),
            'id_raza' => $this->input->post('raza'),
            'sexo' => $this->input->post('gender'),
            'fecha_nacimiento' => $this->input->post('fecha_nac'),
            'esterilizado' => $this->input->post('esteril'),
            'alergias' => $this->input->post('alergias'),
            'id_amo' => $iduser,
            'id_chip' => $this->input->post('chip'),
            'fecha_chip' => $this->input->post('fecha_chip'),
            'created_at' => date('Y-m-d H:i:s')
        ));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update_mascota($imagen) {
        $id = $this->input->post('id');
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'fecha_nacimiento' => $this->input->post('theDate'),
            'id_especie' => $this->input->post('especies'),
            'id_raza' => $this->input->post('raza'),
            'sexo' => $this->input->post('gender'),
            'alergias' => $this->input->post('alergias'),
            'id_chip' => $this->input->post('chip'),
            'fecha_chip' => $this->input->post('theDatec'),
            'foto_mascota' => $imagen,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        $this->db->update('mascotas', $data);
        if ($this->db->affected_rows()==0){
           echo "No se actualizó ningún registro";
        }
    }

    public function get_vacunas($id) {

    }

    public function get_historia($id) {

    }

}
