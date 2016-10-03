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

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
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
        $cons = $this->db->get_where('users', array('usuario' => $usuario));
        if ($cons->num_rows() != 0) {
            foreach ($cons->result() as $row) {
                $nombre = $row->nombre . " " . $row->apellidos;
                $cont = $row->id;

                //$conductores = $this->db->get_where('mascotas', array('id_amo' => $cont)); // get query result
                $conductores = $this->db->query('select * from mascotas where id_amo='. $cont . ' order by nombre'); // get query result
                $count1 = $conductores->num_rows(); //get current query record.

            }
        }
        $arr['nombre']=$nombre;
        $arr['cont']=$cont;
        $arr['count1']=$count1;
        $arr['page']='dash';
        $this->load->view('amo/vwDashboard',$arr);
    }

    public function send_mail() {

        $this->load->view('amo/vwCorreo');
    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */