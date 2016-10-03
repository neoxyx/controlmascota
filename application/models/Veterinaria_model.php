<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Veterinaria_model extends CI_Model {

    public function add_veterinaria() {

        //$this->db->select_max('id');
        //$consult = $this->db->get('sf_empresa');
        //if ($consult->num_rows() > 0) {
         //   foreach ($consult->result() as $row) {
                //$id_emp = $row->id + 1;
            //}
        //}
        //FALTA VALIDAR SI EL NIT EXISTE PARA MOSTRAR UN AVISO DE QUE ESA EMPRESA YA ESTA CREADA
        $this->db->insert('sf_empresa', array(
            'nit' => $this->input->post('nit', TRUE),
            'nombre_empresa' => $this->input->post('name', TRUE),
            'siglas' => $this->input->post('siglas', TRUE),
            'id_pais' => $this->input->post('pais', TRUE),
            'id_depto' => $this->input->post('provincia', TRUE),
            'ciudad_id' => $this->input->post('localidad', TRUE),
            'email' => $this->input->post('email', TRUE),
            'telefono' => $this->input->post('telefono', TRUE),
            'direccion' => $this->input->post('direccion', TRUE),
            'fax' => $this->input->post('fax', TRUE),
            'web' => $this->input->post('web', TRUE),
            'rlegal' => $this->input->post('rlegal', TRUE),
            'created_at' => date('Y-m-d H:i:s')
        ));

        if ($this->db->affected_rows() > 0) {

           $consu = "select @@identity as ultimoid";
           $query1 = $this->db->query($consu);
           $result=$query1->row();
           $id_emp=$result->ultimoid;
           $data = array(
               'id_empresa' => $id_emp
           );
           $this->db->where('usuario', $_SESSION['usuario']);
           $this->db->update('users', $data);
           return true;

        } else {
            return false;
        }
    }

    public function add_veterinarioxadmin() {

        $this->db->insert('sf_empresa', array(
            'nit' => $this->input->post('nit', TRUE),
            'nombre_empresa' => $this->input->post('nombre', TRUE),
            'siglas' => $this->input->post('siglas', TRUE),
            'ciudad_id' => $this->input->post('localidad', TRUE),
            'email' => $this->input->post('email', TRUE),
            'telefono' => $this->input->post('telefono', TRUE),
            'direccion' => $this->input->post('direccion', TRUE),
            'fax' => $this->input->post('fax', TRUE),
            'web' => $this->input->post('web', TRUE),
            'rlegal' => $this->input->post('replegal', TRUE),
            'created_at' => date('Y-m-d H:i:s')
        ));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_userveterinarioxadmin() {

        $query = $this->db->get_where('users', array('usuario' => $this->input->post('username')));
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $code = rand(1000, 99999);
            $this->db->insert("users", array(
                'nombre' => $this->input->post("nombre", TRUE),
                'apellidos' => $this->input->post("apellidos", TRUE),
                'tipo_doc' => $this->input->post("tipo_doc", TRUE),
                'cedula' => $this->input->post("cc", TRUE),
                'fecha_nac' => $this->input->post("theDate", TRUE),
                'estado_civil' => $this->input->post("estado_civil", TRUE),
                'sexo' => $this->input->post("gender", TRUE),
                'pais' => $this->input->post("pais", TRUE),
                'dpto' => $this->input->post("provincia", TRUE),
                'ciudad' => $this->input->post("localidad", TRUE),
                'direccion' => $this->input->post("direccion", TRUE),
                'tipo_vivienda' => $this->input->post("tipo_vivienda", TRUE),
                'meses_vivienda' => $this->input->post("meses_vivienda", TRUE),
                'telefono' => $this->input->post("phone", TRUE),
                'celular' => $this->input->post("celphone", TRUE),
                'email' => $this->input->post("email", TRUE),
                'licencia_conduccion' => $this->input->post("licencia_conduccion", TRUE),
                'categoria_lic' => $this->input->post("categoria_lic", TRUE),
                'fecha_ven_licencia' => $this->input->post("theDatev", TRUE),
                'nivel' => 'Empresa',
                'usuario' => $this->input->post("usuario", TRUE),
                'pass' => md5($this->input->post("password", TRUE)),
                'codigo' => $code,
                'estado' => '0',
                'id_empresa' => $this->input->post("id_emp", TRUE),
                'permisos' => 'Administrador',
                'fecha_creacion' => date('Y-m-d H:i:s')
            ));

            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function get_veterinarios() {

        $consulta = $this->db->get('sf_empresa');

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    public function get_veterinaria($usuario) {
        $SqlInfo = "select t1.id,t1.nombre,t1.apellidos,t2.id,t2.nombre_empresa,t2.siglas,t2.nit,t2.ciudad_id,t2.direccion,t2.telefono,t2.fax,t2.email,t2.web,t2.rlegal,t2.rut,t2.camaracomercio,t2.logo,t2.created_at,t2.updated_at,t3.nombre_ciudad FROM users t1, sf_empresa t2 JOIN df_ciudades t3 ON t2.ciudad_id=t3.id WHERE t1.usuario='$usuario' AND t2.id=t1.id_empresa ";
        $query = $this->db->query($SqlInfo);

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function get_pacientes($id) {
        /*$SqlInfo1 = "select t1.id,t1.nombre,t1.id_raza,t1.direccion,t1.foto_mascota,t2.nombre_ciudad,t3.celular,t3.telefono,t3.nombre as amo,t3.apellidos,t4.nombre_raza FROM mascotas t1, df_ciudades t2, users t3, razas t4  WHERE t1.veterinario_id='$id' AND t1.ciudad_id=t2.id AND t1.raza=t4.id AND t1.user_id=t3.id "; */

        // ajusto la consulta para obtener los datos con base en la nueva estructura
       $SqlInfo1 = "select t1.id,t1.nombre,t1.id_raza,t1.foto_mascota, t4.nombre_raza FROM mascotas t1, razas t4 WHERE
                   t1.id_raza=t4.id and t1.id_cliente in(select id_cliente from clientes where id_empresa=" . $id . ")";
        $query1 = $this->db->query($SqlInfo1);

        if ($query1->num_rows() > 0) {
            return $query1->result();
        } else {

            print 'no results';
        }
    }

   public function get_personal() {
        $user = $_SESSION['usuario'];
        $SqlInfo = "select id_empresa FROM users WHERE usuario='$user' ";
        $query = $this->db->query($SqlInfo);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                $id_emp=$value->id_empresa;
            }
        }

        $SqlInfo1 = "select t1.id,t1.nombre,t1.apellidos,t1.tipo_doc,t1.cedula,t1.email,t1.usuario,t1.direccion,t1.telefono,t1.celular,t2.nombre_ciudad FROM users t1, df_ciudades t2 WHERE t1.id_empresa='$id_emp' AND t1.ciudad=t2.id";
        $query1 = $this->db->query($SqlInfo1);

        if ($query1->num_rows() > 0) {
            return $query1->result();
        } else {

            print 'no results';
        }
    }

    public function get_vetxid($id) {

        $consulta = $this->db->get_where('sf_empresa', array('id' => $id));

        if ($consulta->num_rows() > 0) {
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

        if ($consulta->num_rows() > 0) {
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
            'contacto' => $this->input->post("contacto", TRUE),
            'telcontacto' => $this->input->post("telcontacto", TRUE),
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
