<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ofertas extends CI_Controller {

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
        $data['mensaje']='No hay ofertas para tu enturne';
        $data['ofertas']=$this->Ofertas_model->get_ofertas_xorigen();
        $this->load->view('conductor/vwOfertas',$data);
    }
    
    public function aplicar_oferta(){
        
        $res=$this->Ofertas_model->aplicar_oferta();
        if($res==FALSE){
            $data['mensaje']='Ya estas aplicando para esta oferta';
            $this->load->view('conductor/vwOfertasAplicadas',$data);
        }else{
            $data['mensaje']='Se ha enviado tu hoja de vida a la empresa ofertante, la empresa contactara contigo si desea contratarte';
            $this->load->view('conductor/vwOfertasAplicadas',$data);
        }
        
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */