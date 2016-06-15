<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registros_model extends CI_Model {

    public function get_usuarios() {
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function add_user() {
        $query = $this->db->get_where('users', array('usuario' => $this->input->post('username')));
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {

            $this->db->insert("users", array(
                'nombre' => $this->input->post("nombre", TRUE),
                'apellidos' => $this->input->post("apellidos", TRUE),
                'id_pais' => $this->input->post('pais',TRUE),
                'id_depto' => $this->input->post('provincia',TRUE),
                'id_ciudad' => $this->input->post('localidad',TRUE),
                'telefono' => $this->input->post("telefono", TRUE),
                'nivel' => $this->input->post("nivel", TRUE),
                'usuario' => $this->input->post("username", TRUE),
                'pass' => md5($this->input->post("password", TRUE)),
                'codigo' => $this->input->post("code", TRUE),
                'estado' => '0',
                'fecha_creacion' => date('Y-m-d H:i:s')
            ));

            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

//esta funcion de enviar email se deb probar desde un servidor ya que en local por si solo sin algunos programas adicionales no funciona la prueba de envio de correo
        $this->load->library('email');
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.controlmascota.com'; //'mail.enturne.co';
        $config['smtp_port'] = '25';
        $config['smtp_user'] = 'info@controlmascota.com'; //'sistemas@enturne.co';
        $config['smtp_pass'] = 'jhV_3103';
        $config['validation'] = TRUE;
        $this->email->initialize($config);
        $this->email->clear();

        $this->email->from('info@controlmascota.com', 'Control Mascota');
        //$this->email->from('sistemas@enturne.co', 'Enturne SAS');
        $this->email->to($this->input->post('username', TRUE));
        $this->email->subject('Confirme cuenta de usuario APP Control Mascota');
        $this->email->message('<h1>Bienvenido: ' . $this->input->post('nombre', TRUE) . '' . $this->input->post('apellidos', TRUE) . '<p>'
                . 'Para confirmar su registro ingrese a la siguiente url'
                . '<a href="' . base_url() . 'login/confirmar' . $code . '<b>Gracias por su registro</b>'
                . '</p>');
        $this->email->send();
    }

    public function add_user_veterinario() {
        $query = $this->db->get_where('users', array('usuario' => $this->input->post('username')));
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {

            $this->db->insert("users", array(
                'nombre' => $this->input->post("nombre", TRUE),
                'apellidos' => $this->input->post("apellidos", TRUE),
                'tipo_doc' => $this->input->post("tipo_doc", TRUE),
                'cedula' => $this->input->post("cedula", TRUE),
                'pais' => $this->input->post("pais", TRUE),
                'dpto' => $this->input->post("provincia", TRUE),
                'ciudad' => $this->input->post("localidad", TRUE),
                'direccion' => $this->input->post("direccion", TRUE),
                'email' => $this->input->post("email", TRUE),
                'telefono' => $this->input->post("telefono", TRUE),
                'nivel' => $this->input->post("nivel", TRUE),
                'usuario' => $this->input->post("username", TRUE),
                'pass' => md5($this->input->post("password", TRUE)),
                'id_empresa' => $this->input->post("id_empresa", TRUE),
                'permisos' => $this->input->post("permisos", TRUE),
                'codigo' => $this->input->post("code", TRUE),
                'estado' => '0',
                'fecha_creacion' => date('Y-m-d H:i:s')
            ));

            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function get_tiposdoc() {
        $query = $this->db->get('tiposdocumento');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
   }


    public function guardar_amo() {

        $this->db->insert("users", array(
            'nombre' => $this->input->post("nombre", TRUE),
            'apellidos' => $this->input->post("apellidos", TRUE),
            'tipo_doc' => $this->input->post("tipo_doc", TRUE),
            'cedula' => $this->input->post("cedula", TRUE),
            'pais' => $this->input->post("pais", TRUE),
            'dpto' => $this->input->post("provincia", TRUE),
            'ciudad' => $this->input->post("localidad", TRUE),
            'direccion' => $this->input->post("direccion", TRUE),
            'email' => $this->input->post("email", TRUE),
            'telefono' => $this->input->post("telefono", TRUE),
            'nivel' => 'Amo',
            'estado' => 2,
            'fecha_creacion' => date('Y-m-d H:i:s'),
            'fecha_activacion' => date('Y-m-d H:i:s')
        ));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function very($code) {
        $consulta = $this->db->get_where('users', array('codigo' => $code));

        if ($consulta->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function very_estado_admin() {
        $consulta = $this->db->get_where('users', array('usuario' => $this->input->post('username', TRUE),
            'pass' => md5($this->input->post('password', TRUE)), 'nivel' => 'Administrador', 'estado' => '1'));

        if ($consulta->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function very_estado_veterinario() {
        $consulta = $this->db->get_where('users', array('usuario' => $this->input->post('username', TRUE),
            'pass' => md5($this->input->post('password', TRUE)), 'nivel' => 'Veterinario', 'estado' => '1'));

        if ($consulta->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function very_estado_amo() {
        $consulta = $this->db->get_where('users', array('usuario' => $this->input->post('username', TRUE),
            'pass' => md5($this->input->post('password', TRUE)), 'nivel' => 'Amo', 'estado' => '1'));

        if ($consulta->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_user($code) {
        $this->db->where('codigo', $code);
        $this->db->update('users', array('estado' => '1'));
    }

    public function registros_ult_sem() {
        $query = 'SELECT * FROM users WHERE WEEK(fecha_creacion)=WEEK(curdate())';
        $consulta = $this->db->query($query);
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {

            print 'no results';
        }
    }

    public function registros_sin_val() {

        $consulta = $this->db->get_where('users', array('estado' => '0')); // get query result

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {

            print 'no results';
        }
    }

    public function get_registroxid_ult_sem($id) {

        $consulta = $this->db->get_where('users', array('id' => $id));

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    public function get_iduser($xusuario) {

        $consulta = $this->db->get_where('users', array('usuario' => $xusuario));

        if ($consulta->num_rows() > 0) {
            return $consulta->row();
        } else {
            return FALSE;
        }
    }

    public function activar_registro() {
        $id = $this->input->post('id');
        $data = array(
            'estado' => $this->input->post("activar", TRUE),
            'fecha_activacion' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function registros_completos() {

        $sql = "SELECT * FROM users WHERE nivel!='Administrador' AND tipo_doc IS NOT NULL AND cedula IS NOT NULL AND fecha_nac IS NOT NULL AND edad IS NOT NULL AND sexo IS NOT NULL AND pais IS NOT NULL AND dpto IS NOT NULL AND ciudad IS NOT NULL AND direccion IS NOT NULL AND telefono IS NOT NULL AND celular IS NOT NULL AND licencia_conduccion IS NOT NULL AND categoria_lic IS NOT NULL AND fecha_ven_licencia IS NOT NULL AND pdf IS NOT NULL OR foto_cedula AND foto_licencia IS NOT NULL AND estado='1' ";
        $consulta = $this->db->query($sql);

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {

            print 'no results';
        }
    }

    public function pen_docs_empresa() {

        $sql = "SELECT * FROM sf_empresa WHERE rut AND camaracomercio IS NULL OR pdf IS NULL ";
        $consulta = $this->db->query($sql);

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {

            print 'no results';
        }
    }

    public function pend_docs_vehiculos() {

        $sql = "SELECT * FROM sf_vehiculo WHERE soat AND rtecnomecanica AND licenciatransito AND cedulapropietario AND rutpropietario AND carnetafiliacion IS NULL OR pdf IS NULL ";
        $consulta = $this->db->query($sql);

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {

            print 'no results';
        }
    }

    public function pend_docs_conductores() {

        $sql = "SELECT * FROM users WHERE pdf IS NULL AND nivel='Conductor' OR foto_cedula AND foto_licencia IS NULL AND nivel='Conductor'";
        $consulta = $this->db->query($sql);

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {

            print 'no results';
        }
    }

    public function get_pendocsxid($id) {

        $consulta = $this->db->get_where('users', array('id' => $id));

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    public function get_pendocs_vehiculoxid($id) {

        $consulta = $this->db->get_where('sf_vehiculo', array('idv' => $id));

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    public function get_pendocs_emp_xid($id) {

        $consulta = $this->db->get_where('sf_empresa', array('id' => $id));

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    public function subir_foto_cc_user($imagen) {
        $id = $this->input->post('id');
        $data = array(
            'foto_cedula' => $imagen
        );

        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function subir_foto_lic_user($imagen) {
        $id = $this->input->post('id');
        $data = array(
            'foto_licencia' => $imagen
        );

        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function subir_pdf_user($imagen) {
        $id = $this->input->post('id');
        $data = array(
            'pdf' => $imagen
        );

        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function subir_rut($imagen) {
        $id = $this->input->post('id');
        $data = array(
            'rut' => $imagen
        );

        $this->db->where('id', $id);
        $this->db->update('sf_empresa', $data);
    }

    public function subir_camaracomercio($imagen) {
        $id = $this->input->post('id');
        $data = array(
            'camaracomercio' => $imagen
        );

        $this->db->where('id', $id);
        $this->db->update('sf_empresa', $data);
    }

    public function subir_pdf_emp($imagen) {
        $id = $this->input->post('id');
        $data = array(
            'pdf' => $imagen
        );

        $this->db->where('id', $id);
        $this->db->update('sf_empresa', $data);
    }

    public function subir_soat($imagen) {
        $id = $this->input->post('id');
        $data = array(
            'soat' => $imagen
        );

        $this->db->where('idv', $id);
        $this->db->update('sf_vehiculo', $data);
    }

    public function subir_rtecno($imagen) {
        $id = $this->input->post('id');
        $data = array(
            'rtecnomecanica' => $imagen
        );

        $this->db->where('idv', $id);
        $this->db->update('sf_vehiculo', $data);
    }

    public function subir_ltransito($imagen) {
        $id = $this->input->post('id');
        $data = array(
            'licenciatransito' => $imagen
        );

        $this->db->where('idv', $id);
        $this->db->update('sf_vehiculo', $data);
    }

    public function subir_ccprop($imagen) {
        $id = $this->input->post('id');
        $data = array(
            'cedulapropietario' => $imagen
        );

        $this->db->where('idv', $id);
        $this->db->update('sf_vehiculo', $data);
    }

    public function subir_rutprop($imagen) {
        $id = $this->input->post('id');
        $data = array(
            'rutpropietario' => $imagen
        );

        $this->db->where('idv', $id);
        $this->db->update('sf_vehiculo', $data);
    }

    public function subir_carnet($imagen) {
        $id = $this->input->post('id');
        $data = array(
            'carnetafiliacion' => $imagen
        );

        $this->db->where('idv', $id);
        $this->db->update('sf_vehiculo', $data);
    }

    public function subir_pdf_vehiculo($imagen) {
        $id = $this->input->post('id');
        $data = array(
            'pdf' => $imagen
        );

        $this->db->where('idv', $id);
        $this->db->update('sf_vehiculo', $data);
    }

    public function get_perxid($id) {

        $consulta = $this->db->get_where('users', array('id' => $id));

        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

}
