<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clientes_model extends CI_Model {

   public function add_cliente() {
      $user = $_SESSION['usuario'];
      $xidempresa=$this->Users_model->get_user_xusu($user);  //hallar el codigo de la empresa para asociar la empresa al cliente
      if ($xidempresa){
          $this->db->insert("clientes", array(
           'id_empresa' => $xidempresa->id_empresa,
           'identifica' => $this->input->post("xidentifica"),
           'tipodoc' => $this->input->post('xtipodoc'),
           'apellidos' => $this->input->post('xapellidos'),
           'nombres' => $this->input->post('xnombres'),
           'direccion' => $this->input->post('xdireccion'),
           'id_pais' => $this->input->post('xpais'),
           'id_depto' => $this->input->post('xdepto'),
           'id_ciudad' => $this->input->post('xciudad'),
           'celulares' => $this->input->post('xcelulares'),
           'telfijo' => $this->input->post('xtelfijo'),
           'email' => $this->input->post('xemail'),
           'diacumple' => $this->input->post('xdiacumple'),
           'mescumple' => $this->input->post('xmescumple'),
           'id_ocupacion' => $this->input->post('xocupacion'),
           'sexo' => $this->input->post('xgenero')
       ));

       if ($this->db->affected_rows() > 0) {
           return true;
       } else {
           return false;
       }
    }
    else{
      echo "Cliente No identificado";
      exit;
      //llamar a alguna vista
      }
   }

   public function get_clientes($id_user) {

     $consu="select id_empresa from users where id=" . $id_user;
     $query1 = $this->db->query($consu);
     if ($query1->num_rows() > 0) {
         $fila=$query1->row();
     } else {

         print 'No hay resultados de Usuario';
         exit;
     }

     $consu="select c.id_cliente,c.id_empresa,e.nombre_empresa,c.identifica,c.tipodoc,c.apellidos,c.nombres,c.direccion, c.id_pais, p.nombre_pais,
           c.id_depto,d.nombre_dpto,c.id_ciudad,m.nombre_ciudad,c.celulares, c.telfijo,c.email,c.diacumple,c.mescumple,c.id_ocupacion,o.nombre as nomocupa, case sexo when 'F' then 'Femenino' when 'M' then 'Masculino' end as nombre_sexo
           from clientes c,df_paises p, df_departamentos d,df_ciudades m,sf_empresa e,ocupaciones o
           where c.id_empresa=e.id and c.id_pais=p.id and c.id_depto=d.id and c.id_ciudad=m.id and c.id_ocupacion=o.codigo
           and e.id=" . $fila->id_empresa;
       $query1 = $this->db->query($consu);

       if ($query1->num_rows() > 0) {
           return $query1->result();
       } else {

           print 'No hay resultados de Clientes';
       }
  }
/*
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
        $razas = $this->db->get('razas_perros');
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
        $user = $_SESSION['usuario'];
        $SqlInfo = "select t1.id,t1.nombre,t1.direccion,t1.alergias,t1.raza,t1.especie,t1.foto_mascota,t1.created_at,timestampdiff(month,t1.fecha_nacimiento,curdate()) AS EDAD_ACTUAL,t2.nombre_ciudad,t3.nombre_raza,t4.nombre_especie FROM mascotas t1, df_ciudades t2, razas_perros t3, ci_especies t4  WHERE t1.amo='$user' AND t2.id=t1.ciudad_id AND t1.raza=t3.id AND t1.especie=t4.id";
        $query = $this->db->query($SqlInfo);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {

            print 'no results';
        }
    }

    public function get_mascotaxid($id) {
        $SqlInfo = "select t1.id,t1.nombre,t1.fecha_nacimiento,t1.sexo,t1.direccion,t1.alergias,t1.especie,t1.raza,t1.foto_mascota,t1.chip_id,t1.pais_id,t1.dpto_id,t1.ciudad_id,t1.fecha_chip,t1.created_at,t2.nombre_ciudad,t3.nombre_pais,t4.nombre_dpto,t5.nombre_raza,t6.nombre_especie FROM mascotas t1, df_ciudades t2, df_paises t3, df_departamentos t4, razas_perros t5, ci_especies t6 WHERE t1.id='$id' AND t2.id=t1.ciudad_id AND t3.id=t1.pais_id AND t4.id=t1.dpto_id AND t1.raza=t5.id AND t1.especie=t6.id";
        $query = $this->db->query($SqlInfo);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {

            print 'no results';
        }
    }

    public function update_mascota($imagen) {
        $id = $this->input->post('id');
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'fecha_nacimiento' => $this->input->post('theDate'),
            'especie' => $this->input->post('especie'),
            'raza' => $this->input->post('raza'),
            'sexo' => $this->input->post('gender'),
            'pais_id' => $this->input->post('pais'),
            'dpto_id' => $this->input->post('provincia'),
            'ciudad_id' => $this->input->post('localidad'),
            'direccion' => $this->input->post('direccion'),
            'alergias' => $this->input->post('alergias'),
            'chip_id' => $this->input->post('chip'),
            'fecha_chip' => $this->input->post('theDatec'),
            'foto_mascota' => $imagen,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        $this->db->update('mascotas', $data);
    }

    public function get_vacunas($id) {

    }

    public function get_historia($id) {

    }
*/
}
