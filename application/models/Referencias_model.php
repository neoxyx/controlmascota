<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Referencias_model extends CI_Model {

    public function get_ref_per() {
        $user = $_SESSION['usuario'];
        $SqlInfo = "select t1.id, t2.nombre, t2.apellido,t2.tipo_documento,t2.identificacion,t2.parentesco,t2.pais,t2.dpto,t2.ciudad,t2.direccion,t2.casa,t2.tiemporesidencia,t2.telefono,t2.celular,t3.nombre_ciudad FROM users t1, sf_guard_user_profile_rp t2 JOIN df_ciudades t3 ON t2.ciudad=t3.id WHERE t1.usuario='$user' AND t2.userhv_id=t1.id ";
        $query = $this->db->query($SqlInfo);
        /*  $this->db->select('t1.id, t2.nombre, t2.apellido,t2.tipo_documento,t2.identificacion,t2.parentesco,t2.ciudad,t2.direccion,t2.casa,t2.tiemporesidencia,t2.telefono,t2.celular')
          ->from('users t1,sf_guard_user_profile_rp t2')
          ->where('t1.usuario', $_SESSION['usuario'])
          ->where('t2.userhv_id', 't1.id');
          $query = $this->db->get(); */
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {

            print 'no results';
        }
    }

    public function get_ref_perxcc($cc) {
        
        $consulta = $this->db->get_where('sf_guard_user_profile_rp', array('identificacion' => $cc));

        if ($consulta->num_rows() >0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    public function add_ref_per() {

        $this->db->insert("sf_guard_user_profile_rp", array(
            'userhv_id' => $this->input->post("id_hv", TRUE),
            'nombre' => $this->input->post("firstName", TRUE),
            'apellido' => $this->input->post("lastName", TRUE),
            'tipo_documento' => $this->input->post("tipo_doc", TRUE),
            'identificacion' => $this->input->post("cc", TRUE),
            'parentesco' => $this->input->post("parentesco", TRUE),
            'pais' => $this->input->post("pais", TRUE),
            'dpto' => $this->input->post("provincia", TRUE),
            'ciudad' => $this->input->post("localidad", TRUE),
            'direccion' => $this->input->post("address", TRUE),
            'casa' => $this->input->post("vivienda", TRUE),
            'tiemporesidencia' => $this->input->post("meses_vivienda", TRUE),
            'telefono' => $this->input->post("phone", TRUE),
            'celular' => $this->input->post("celphone", TRUE),
            'created_at' => date('Y-m-d H:i:s')
        ));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function update_ref_per() {        

        $data = array(
            'nombre' => $this->input->post('firstName'),
            'apellido' => $this->input->post('lastName'),
            'tipo_documento' => $this->input->post('tipo_doc'),
            'identificacion' => $this->input->post('cc'),
            'parentesco' => $this->input->post('parentesco'),
            'pais' => $this->input->post('pais'),
            'dpto' => $this->input->post('provincia'),
            'ciudad' => $this->input->post('localidad'),
            'direccion' => $this->input->post('address'),
            'telefono' => $this->input->post('phone'),
            'celular' => $this->input->post('celphone'),
            'celular' => $this->input->post('celphone'),
            'casa' => $this->input->post('vivienda'),
            'tiemporesidencia' => $this->input->post('meses_vivienda'),
            'updated_at' => date('Y-m-d H:i:s') 
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('sf_guard_user_profile_rp', $data);
    }
    
    public function get_ref_emp() {
        $user = $_SESSION['usuario'];
        $SqlInfo = "select t1.id, t2.razonsocial, t2.nit, t2.pais,t2.dpto,t2.ciudad,t2.direccion, t2.telefono,t2.celular, t2.contacto, t2.telcontacto, t3.nombre_ciudad FROM users t1, sf_guard_user_profile_re t2 JOIN df_ciudades t3 ON t2.ciudad=t3.id WHERE t1.usuario='$user' AND t2.userhv_id=t1.id ";
        $query = $this->db->query($SqlInfo);
        /*  $this->db->select('t1.id, t2.nombre, t2.apellido,t2.tipo_documento,t2.identificacion,t2.parentesco,t2.ciudad,t2.direccion,t2.casa,t2.tiemporesidencia,t2.telefono,t2.celular')
          ->from('users t1,sf_guard_user_profile_rp t2')
          ->where('t1.usuario', $_SESSION['usuario'])
          ->where('t2.userhv_id', 't1.id');
          $query = $this->db->get(); */
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {

            print 'no results';
        }
    }

    public function get_ref_empxnit($nit) {
        
        $consulta = $this->db->get_where('sf_guard_user_profile_re', array('nit' => $nit));

        if ($consulta->num_rows() >0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    public function add_ref_emp() {

        $this->db->insert("sf_guard_user_profile_re", array(
            'userhv_id' => $this->input->post("id_hv", TRUE),
            'razonsocial' => $this->input->post("razonsocial", TRUE),
            'nit' => $this->input->post("nit", TRUE),
            'pais' => $this->input->post("pais", TRUE),
            'dpto' => $this->input->post("provincia", TRUE),
            'ciudad' => $this->input->post("localidad", TRUE),
            'direccion' => $this->input->post("address", TRUE),           
            'telefono' => $this->input->post("phone", TRUE),
            'celular' => $this->input->post("celphone", TRUE),
            'contacto'=> $this->input->post("contacto", TRUE),
            'telcontacto'=> $this->input->post("telcontacto", TRUE),
            'created_at' => date('Y-m-d H:i:s')
        ));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function update_ref_emp() {        

        $data = array(
            'razonsocial' => $this->input->post('razonsocial'),
            'nit' => $this->input->post('nit'),          
            'pais' => $this->input->post('pais'),
            'dpto' => $this->input->post('provincia'),
            'ciudad' => $this->input->post('localidad'),
            'direccion' => $this->input->post('address'),
            'telefono' => $this->input->post('phone'),
            'celular' => $this->input->post('celphone'),
            'contacto' => $this->input->post('contacto'),
            'telcontacto' => $this->input->post('telcontacto'),
            'updated_at' => date('Y-m-d H:i:s')          
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('sf_guard_user_profile_re', $data);
    }

}
