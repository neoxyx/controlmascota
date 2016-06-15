<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ofertas_model extends CI_Model {

    public function get_ofertas() {

        $consulta = "SELECT t1.id,t1.empresa_id,t1.origen_id,t1.destino_id,t1.contratados,t1.tipo_vehiculo_id,t1.carroceria_id,t1.cantidad,t1.fecha,t2.nombre_ciudad as origen,t3.nombre_tv,t4.nombre_carr,t5.nombre_ciudad as destino,t6.nombre_empresa FROM sf_carga t1 JOIN df_ciudades t2 ON t2.id=t1.origen_id JOIN df_ciudades t5 ON t5.id=t1.destino_id JOIN df_camiones_configuracion t3 ON t3.id=t1.tipo_vehiculo_id JOIN df_camiones_carroceria t4 ON t4.id=t1.carroceria_id JOIN sf_empresa t6 ON t6.id=t1.empresa_id";
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_ofertas_xorigen() {
        $query = $this->db->get_where('users', array('usuario' => $_SESSION['usuario']));

        if ($query->num_rows() != 0) {
            foreach ($query->result() as $row) {
                $id_con = $row->id;
            }
        }
        $v = "SELECT * FROM sf_vehiculo WHERE conductor_id='$id_con' AND enturne='Disponible'";
        $consulta1 = $this->db->query($v);
        if ($consulta1->num_rows() != 0) {
            foreach ($consulta1->result() as $row) {
                $carroceria = $row->carroceria_id;
                $vence_soat = $row->vence_soat;
                $vence_rtecno = $row->vence_rtecnomecanica;
                $origen = $row->origen_id;
            }
        }

        $consulta2 = "SELECT t1.id,t1.origen_id,t1.destino_id,t1.contratados,t1.tipo_vehiculo_id,t1.carroceria_id,t1.cantidad,t1.fecha,t2.nombre_ciudad as origen,t3.nombre_tv,t4.nombre_carr,t5.nombre_ciudad as destino,t6.nombre_empresa,t6.telefono,t6.fax FROM sf_carga t1 JOIN df_ciudades t2 ON t2.id=t1.origen_id JOIN df_ciudades t5 ON t5.id=t1.destino_id JOIN df_camiones_configuracion t3 ON t3.id=t1.tipo_vehiculo_id JOIN df_camiones_carroceria t4 ON t4.id=t1.carroceria_id JOIN sf_empresa t6 ON t6.id=t1.empresa_id WHERE t1.origen_id='$origen' AND t1.carroceria_id='$carroceria'";
        $query1 = $this->db->query($consulta2);
        if ($query1->num_rows() > 0) {
            return $query1->result();
        } else {
            return false;
        }
    }

    public function aplicar_oferta() {

        $query = $this->db->get_where('users', array('usuario' => $_SESSION['usuario']));
        if ($query->num_rows() != 0) {
            foreach ($query->result() as $row) {
                $id_con = $row->id;
            }
        }
        $v = "SELECT * FROM sf_vehiculo WHERE conductor_id='$id_con' AND enturne='Disponible'";
        $consulta1 = $this->db->query($v);
        if ($consulta1->num_rows() != 0) {
            foreach ($consulta1->result() as $row) {
                $idv = $row->idv;
                $carroceria = $row->carroceria_id;
                $vence_soat = $row->vence_soat;
                $vence_rtecno = $row->vence_rtecnomecanica;
                $origen = $row->origen_id;
            }
        }

        $consulta2 = "SELECT t1.id,t1.origen_id,t1.destino_id,t1.contratados,t1.tipo_vehiculo_id,t1.carroceria_id,t1.cantidad,t1.fecha,t2.nombre_ciudad as origen,t3.nombre_tv,t4.nombre_carr,t5.nombre_ciudad as destino,t6.nombre_empresa,t6.telefono,t6.fax FROM sf_carga t1 JOIN df_ciudades t2 ON t2.id=t1.origen_id JOIN df_ciudades t5 ON t5.id=t1.destino_id JOIN df_camiones_configuracion t3 ON t3.id=t1.tipo_vehiculo_id JOIN df_camiones_carroceria t4 ON t4.id=t1.carroceria_id JOIN sf_empresa t6 ON t6.id=t1.empresa_id WHERE t1.origen_id='$origen' AND t1.carroceria_id='$carroceria'";
        $query1 = $this->db->query($consulta2);
        if ($query1->num_rows() > 0) {
            foreach ($query1->result() as $row) {
                $id_carga = $row->id;
            }
        }
        $query3 = $this->db->get_where('sf_carga_vehiculos', array('carga_id' => $id_carga, 'vehiculo_id' => $idv));
        if ($query3->num_rows() > 0) {
            return FALSE;
        } else {
            $data = array(
                'carga_id' => $id_carga,
                'vehiculo_id' => $idv,
                'created_at' => date('Y-m-d H:i:s')
            );

            $this->db->insert('sf_carga_vehiculos', $data);
            return TRUE;
        }
    }

    public function get_ofertas_emp() {

        $query = $this->db->get_where('users', array('usuario' => $_SESSION['usuario']));
        if ($query->num_rows() != 0) {
            foreach ($query->result() as $row) {
                $id_emp = $row->id_empresa;
            }
        }

        $consulta = "SELECT t1.id,t1.origen_id,t1.destino_id,t1.contratados,t1.tipo_vehiculo_id,t1.carroceria_id,t1.cantidad,t1.fecha,t2.nombre_ciudad as origen,t3.nombre_tv,t4.nombre_carr,t5.nombre_ciudad as destino FROM sf_carga t1 JOIN df_ciudades t2 ON t2.id=t1.origen_id JOIN df_ciudades t5 ON t5.id=t1.destino_id JOIN df_camiones_configuracion t3 ON t3.id=t1.tipo_vehiculo_id JOIN df_camiones_carroceria t4 ON t4.id=t1.carroceria_id WHERE empresa_id='$id_emp'";
        $query1 = $this->db->query($consulta);
        if ($query1->num_rows() > 0) {
            return $query1->result();
        } else {
            return false;
        }
    }

    public function guardar_oferta_empresa() {

        $this->db->insert("sf_carga", array(
            'empresa_id' => $this->input->post("empresa_id", TRUE),
            'origen_id' => $this->input->post("origen_id", TRUE),
            'destino_id' => $this->input->post("destino_id", TRUE),
            'tipo_vehiculo_id' => $this->input->post("tipo_vehiculo_id", TRUE),
            'carroceria_id' => $this->input->post("carroceria_id", TRUE),
            'fecha' => $this->input->post("fecha", TRUE),
            'cantidad' => $this->input->post("cantidad", TRUE),
            'created_at' => date('Y-m-d H:i:s')
        ));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_oferta_xid($id) {

        $consulta = "SELECT t1.id,t1.empresa_id,t1.origen_id,t1.destino_id,t1.contratados,t1.tipo_vehiculo_id,t1.carroceria_id,t1.cantidad,t1.fecha,t2.nombre_ciudad as origen,t3.nombre_tv,t4.nombre_carr,t5.nombre_ciudad as destino FROM sf_carga t1 JOIN df_ciudades t2 ON t2.id=t1.origen_id JOIN df_ciudades t5 ON t5.id=t1.destino_id JOIN df_camiones_configuracion t3 ON t3.id=t1.tipo_vehiculo_id JOIN df_camiones_carroceria t4 ON t4.id=t1.carroceria_id WHERE t1.id='$id'";
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function delete_oferta($id) {
        $this->db->delete('sf_carga', array('id' => $id));
    }

    public function update_oferta($id) {
        $cantidad = $this->input->post('cantidad');
        $data = array(
            'cantidad' => $cantidad
        );
        $this->db->where('id', $id);
        $this->db->update('sf_carga', $data);
    }

}
