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
        $arr['page']='dash';
        $this->load->view('admin/vwDashboard',$arr);
    }
    
    public function send_mail() {       
        $this->load->view('admin/vwCorreo');
    }

    function config() {
        $this->load->view('admin/vwConfig');
    }
    
    function licencias(){
        $this->load->view('admin/vwLicencias');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */