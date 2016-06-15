<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {
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
        $arr['page'] = 'user';
        $this->load->view('empresa/vwManageUser',$arr);
    }

    public function add_user() {
        $arr['page'] = 'user';
        $this->load->view('empresa/vwAddUser',$arr);
    }

     public function edit_user() {
        $arr['page'] = 'user';
        $this->load->view('empresa/vwEditUser',$arr);
    }
    
     public function block_user() {
        // Code goes here
    }
    
     public function delete_user() {
        // Code goes here
    }
    
    
    
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */