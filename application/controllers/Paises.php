<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paises extends CI_Controller {

    /**
     * ark Admin Panel for Codeigniter
     * Author: Abhishek R. Kaushik
     * downloaded from http://devzone.co.in
     *
     */
    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $data['datos'] = $this->Paises_model->get_pais();
        $this->load->view('admin/vwPaises', $data);
    }

    public function llena_provincias() {
        $options = "";
        if ($this->input->post('pais')) {
            $pais = $this->input->post('pais');
            $provincias = $this->Paises_model->provincias($pais);
            foreach ($provincias as $fila) {
                ?>
                <option value="<?= $fila->id ?>"><?= $fila->nombre_dpto ?></option>
                <?php
            }
        }
    }

    public function llena_localidades() {
        $options = "";
        if ($this->input->post('provincia')) {
            $provincia = $this->input->post('provincia');
            $localidades = $this->Paises_model->localidades($provincia);
            foreach ($localidades as $fila) {
                ?>
                <option value="<?= $fila->id ?>"><?= $fila->nombre_ciudad ?></option>
                <?php
            }
        }
    }

    public function add_pais() {
        $arr['page'] = 'paises';
        $this->load->view('admin/vwPaises', $arr);
    }

    public function edit_pais() {
        $arr['page'] = 'paises';
        $this->load->view('admin/vwPaises', $arr);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
