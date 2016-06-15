<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Productos extends CI_Controller {
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
        $arr['mensaje']='No existen productos aun';
        $arr['product'] = $this->Productos_model->get_productos();
        $this->load->view('admin/vwProductos',$arr);
    }

    public function add_producto() {
        $arr['idioma']=  $this->Idioma_model->get_idioma();
        $arr['tax']=$this->Impuestos_model->get_impuesto();
        $arr['moneda']=$this->Monedas_model->get_moneda();
        $arr['cat'] = $this->Categorias_model->get_categorias();
        $this->load->view('admin/vwAddProducto',$arr);
    }

     public function edit_producto() {
        $arr['page'] = 'products';
        $this->load->view('admin/vwEditUser',$arr);
    }
    
     public function activar($id) {
         $this->Productos_model->activar($id);
         redirect(base_url().'index.php/admin/Productos');
    }
    
     public function desactivar($id) {
        $this->Productos_model->desactivar($id);
        redirect(base_url().'index.php/admin/Productos');
    }
    
    
    
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */


