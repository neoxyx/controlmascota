<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Abhishek R. Kaushik
 * downloaded from http://devzone.co.in
 *
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();

    }

    public function index() {

        $session_data = $this->session->userdata('datos_usuario');
        $id = $session_data['id'];
        $usuario = $session_data['usuario'];
        $nombre = $session_data['nombre'];
        $ape = $session_data['ape'];
        $idempresa = $session_data['idempresa'];


        $consulta = $this->db->get_where('users', array('usuario' => $usuario));
        if ($consulta->num_rows() != 0) {
            foreach ($consulta->result() as $row) {
                $nombre = $row->nombre . " " . $row->apellidos;
                $xidempresa = $row->id_empresa;
                $xidusuario=$row->id;
                $usuarios = $this->db->get_where('users', array('nivel' => 'Veterinario')); // get query result
                $clientes=  $this->db->get_where('users', array('id_empresa' => $idempresa));
                $xnumclientes=$clientes->num_rows();
                //se detecta si el usuario que ingresa tiene una empresa asociada con el objetivo de que se puedan filtrar las mascotas de sus clientes   
                $xcodempusu=($idempresa=='' || isset($idempresa)) ? 0 : $idempresa ;
                //para hallar el numero de mascotas se debe consultar el
                $consu="select count(*) as cantidad from mascotas where id_amo in(select id from users where id_empresa=" . $xcodempusu . ")";
                $query1 = $this->db->query($consu);
                $fila=$query1->row();
                $xnummascotas=$fila->cantidad;
                $count1 = $usuarios->num_rows()-1; //get current query record.
                $permiso = $row->permisos;
            }
        }
        $arr['idusuario'] = $xidusuario;
        $arr['idempresa'] = $xidempresa;
        $arr['nombre'] = $nombre;
        $arr['clientes'] = $xnumclientes;
        $arr['mascotas'] = $xnummascotas;
        $arr['permisos'] = $permiso;
        $arr['cont'] = $count1;
        $arr['empresa']=  $this->Veterinaria_model->get_veterinaria($usuario);
        $this->load->view('veterinario/vwDashboard',$arr);
    }

    public function send_mail() {

        $this->load->view('veterinario/vwCorreo');
    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */