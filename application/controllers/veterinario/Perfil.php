<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perfil extends CI_Controller {

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
        $data['perfil'] = $this->Users_model->get_perfil();
        $data['paises'] = $this->Paises_model->get_pais();
        $this->load->view('veterinario/vwFormPerfil', $data);
    }

    public function get_perfil() {
        $data['mensaje'] = '';
        $data['perfil'] = $this->Users_model->get_perfil();
        $this->load->view('veterinario/vwPerfil', $data);
    }

    public function get_perxid($id) {

        if (!$id) {
            show_404();
        }
        $data['paises'] = $this->Paises_model->get_pais();
        $data['perxid'] = $this->Registros_model->get_perxid($id);
        $this->load->view('veterinario/vwFormEditPer', $data);
    }

    public function get_empresa() {
        $data['mensaje'] = 'Aun no has registrado clinica';
        $data['empresa'] = $this->Veterinaria_model->get_veterinaria();
        $this->load->view('veterinario/vwEmpresa', $data);
    }

    public function get_personal() {
        $data['mensaje'] = 'Aun no has registrado empleados';
        $data['personal'] = $this->Veterinaria_model->get_personal();
        $this->load->view('veterinario/vwPersonal', $data);
    }

    public function add_emp() {
        $data['paises'] = $this->Paises_model->get_pais();
        $data['user'] = $this->Users_model->get_perfil();
        $this->load->view('veterinario/vwAddEmpresa', $data);
    }

    public function guardar_empresa() {

        if ($this->input->post('reg_empresa')) {
            /* $config['upload_path'] = './uploads/';
              $config['allowed_types'] = 'zip|rar|pdf|docx|txt';
              $config['max_size'] = '2048';

              $this->load->library('upload', $config);
              if (!$this->upload->do_upload()) {

              redirect(base_url() . 'index.php/empresa/Perfil/get_empresa');
              } else {
              //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS
              //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
              $file_info = $this->upload->data();
              //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
              //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

              $data = array('upload_data' => $this->upload->data()); */
            $this->Veterinaria_model->add_veterinaria();

            redirect(base_url() . 'index.php/veterinario/Perfil/get_empresa');
        }
        /* } else {
          $data['empresa'] = $this->Empresas_model->get_empresa();
          $data['mensaje'] = 'Registro incorrecto comuniquese con enturne';
          $this->load->view('empresa/vwEmpresa', $data);
          } */
    }

    public function guardar_personal() {

        if ($this->input->post('reg_user')) {

            $res = $this->Registros_model->add_user_veterinario();
            if ($res == FALSE) {
                $data['personal'] = '';
                $data['mensaje'] = 'Registro incorrecto el usuario ya existe, escoje otro e intentalo de nuevo';
                $this->load->view('veterinario/vwPersonal', $data);
            } else {
                $data['personal'] = $this->Veterinaria_model->get_personal();
                $data['mensaje'] = 'Registro correcto se le enviara un mensaje a su empleado para habilitar su acceso';
                $this->load->view('veterinario/vwPersonal', $data);
            }
        } else {
            $data['mensaje'] = 'Registro incorrecto comuniquese con el desarrollador';
            $this->load->view('veterinario/vwPersonal', $data);
        }
    }

    public function get_vetxid($id) {

        if (!$id) {
            show_404();
        }
        $data['paises'] = $this->Paises_model->get_pais();
        $data['empxid'] = $this->Veterinaria_model->get_vetxid($id);
        $this->load->view('veterinario/vwFormEditEmpresa', $data);
    }

    public function add_user() {
        $var = $this->Veterinaria_model->get_veterinaria();
        if (!$var) {
            $data['mensaje'] = 'Debes primero registrar una clinica para agregar personal';
            $data['personal'] = $this->Veterinaria_model->get_personal();
            $this->load->view('veterinario/vwPersonal', $data);
        } else {
            $data['paises'] = $this->Paises_model->get_pais();
            $data['empresa'] = $this->Veterinaria_model->get_veterinaria();
            $this->load->view('veterinario/vwAddUser', $data);
        }
    }

    public function edit_user() {

        if ($this->input->post('update_user')) {

            $res = $this->Users_model->update_perfil();
            if (!$res) {
                $data['mensaje'] = 'Datos actualizados';
                $data['perfil'] = $this->Users_model->get_perfil();
                $this->load->view('veterinario/vwPerfil', $data);
            } else {
                $data['mensaje'] = 'No se realizo actualización';
                $data['perfil'] = $this->Users_model->get_perfil();
                $this->load->view('veterinario/vwPerfil', $data);
            }
        } else {
            $data['mensaje'] = 'No se realizo actualización';
            $data['perfil'] = $this->Users_model->get_perfil();
            $this->load->view('veterinario/vwPerfil', $data);
        }
    }

    public function edit_foto_user() {
        if ($this->input->post('update_foto')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/veterinario/Perfil/get_perfil');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Users_model->update_foto_perfil($imagen);
                redirect(base_url() . 'index.php/veterinario/Perfil/get_perfil');
            }
        }
    }

    public function adj_doc() {
        $data['perfil'] = $this->Users_model->get_perfil();
        $data['doc'] = $this->Users_model->get_doc();
        $data['lic'] = $this->Users_model->get_lic();
        $this->load->view('veterinario/vwSubirDocs', $data);
    }

    public function edit_user_pdf() {
        if ($this->input->post('update_pdf')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'zip|rar|pdf|docx|txt';
            $config['max_size'] = '2048';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/veterinario/Perfil/adj_doc');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Users_model->update_user_pdf($imagen);
                redirect(base_url() . 'index.php/veterinario/Perfil/adj_doc');
            }
        }
    }

    public function edit_foto_doc() {
        if ($this->input->post('update_doc')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/veterinario/Perfil/adj_doc');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Users_model->update_foto_doc($imagen);
                redirect(base_url() . 'index.php/veterinario/Perfil/adj_doc');
            }
        }
//FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    }

    public function edit_foto_lic() {
        if ($this->input->post('update_lic')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/veterinario/Perfil/adj_doc');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Users_model->update_foto_lic($imagen);
                redirect(base_url() . 'index.php/veterinario/Perfil/adj_doc');
            }
        }
//FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    }

    public function comp_info() {

        $data['perfil'] = $this->Users_model->get_perfil();
        $data['paises'] = $this->Paises_model->get_pais();
        $this->load->view('veterinario/vwCompletarPasos', $data);
    }

    public function get_ref_per() {
        $data['mensaje'] = 'Aun no has registrado referencias personales';
        $data['refPer'] = $this->Referencias_model->get_ref_per();
        $this->load->view('veterinario/vwRefPer', $data);
    }

    public function add_ref_per() {
        $data['paises'] = $this->Paises_model->get_pais();
        $this->load->view('veterinario/vwFormRefPer', $data);
    }

    public function get_ref_perxcc($cc) {
        if (!$cc) {
            show_404();
        }
        $data['paises'] = $this->Paises_model->get_pais();
        $data['ref'] = $this->Referencias_model->get_ref_perxcc($cc);
        $this->load->view('veterinario/vwFormEditRefPer', $data);
    }

    public function guardar_refp() {

        if ($this->input->post('submit_reg')) {

            $this->Referencias_model->add_ref_per();
            $data = array('mensaje' => 'Registro correcto');
            redirect(base_url() . 'index.php/veterinario/Perfil/ref_per', $data);
        } else {
            $data = array('mensaje' => 'No se realizo el registro');
            redirect(base_url() . 'index.php/veterinario/Perfil/ref_per', $data);
        }
    }

    public function edit_ref_per() {

        if ($this->input->post('update_reg')) {

            $this->Referencias_model->update_ref_per();
            $data = array('mensaje' => 'Datos actualizados');
            redirect(base_url() . 'index.php/veterinario/Perfil/get_ref_per', $data);
        } else {
            $data = array('mensaje' => 'No se realizo actualización');
            redirect(base_url() . 'index.php/veterinario/Perfil/get_ref_per', $data);
        }
    }

    public function get_ref_emp() {
        $data['mensaje'] = 'Aun no has registrado referencias empresariales';
        $data['refEmp'] = $this->Referencias_model->get_ref_emp();
        $this->load->view('veterinario/vwRefEmp', $data);
    }

    public function add_ref_emp() {
        $data['paises'] = $this->Paises_model->get_pais();
        $this->load->view('veterinario/vwFormRefEmp', $data);
    }

    public function get_ref_empxnit($nit) {
        if (!$nit) {
            show_404();
        }
        $data['paises'] = $this->Paises_model->get_pais();
        $data['ref'] = $this->Referencias_model->get_ref_empxnit($nit);
        $this->load->view('veterinario/vwFormEditRefEmp', $data);
    }

    public function guardar_ref_emp() {

        if ($this->input->post('submit_reg')) {

            $this->Referencias_model->add_ref_emp();
            $data = array('mensaje' => 'Registro correcto');
            redirect(base_url() . 'index.php/veterinario/Perfil/get_ref_emp', $data);
        } else {
            $data = array('mensaje' => 'No se realizo el registro');
            redirect(base_url() . 'index.php/veterinario/Perfil/get_ref_emp', $data);
        }
    }

    public function edit_ref_emp() {

        if ($this->input->post('update_reg')) {

            $this->Referencias_model->update_ref_emp();
            $data = array('mensaje' => 'Datos actualizados');
            redirect(base_url() . 'index.php/empresa/Perfil/get_ref_emp', $data);
        } else {
            $data = array('mensaje' => 'No se realizo actualización');
            redirect(base_url() . 'index.php/veterinario/Perfil/get_ref_emp', $data);
        }
    }

    public function edit_foto_cedp() {
        if ($this->input->post('update_cedp')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/empresa/Perfil/get_vehiculos');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Vehiculos_model->update_cedp($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function edit_foto_rutp() {
        if ($this->input->post('update_rutp')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/empresa/Perfil/get_vehiculos');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Vehiculos_model->update_rutp($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function edit_foto_remolque() {
        if ($this->input->post('update_remol')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/empresa/Perfil/get_vehiculos');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Vehiculos_model->update_remol($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function edit_foto_carnet() {
        if ($this->input->post('update_carnet')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/empresa/Perfil/get_vehiculos');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Vehiculos_model->update_carnet($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }


    public function get_empleados() {
        $data['mensaje'] = 'Aun no has registrado empleados';
        $data['personal'] = $this->Veterinaria_model->get_personal();
        $this->load->view('veterinario/vwPersonal', $data);
    }


    public function finalizar_contrato_empleado() {

        $data['mensaje'] = 'Aun no has registrado empleados';
        $data['conductor'] = $this->Users_model->finalizar_contrato_empleado();
        redirect(base_url() . 'index.php/veterinario/Perfil/get_empleados');
    }

    public function finalizar_contrato_conductorxid($id) {

        if (!$id) {
            show_404();
        }
        $data['paises'] = $this->Paises_model->get_pais();
        $data['conxid'] = $this->Conductores_model->get_conductor_xid($id);
        $this->load->view('empresa/vwFinContConductor', $data);
    }

    public function ver_user_xid($id) {

        if (!$id) {
            show_404();
        }
        $data['paises'] = $this->Paises_model->get_pais();
        $data['perxid'] = $this->Users_model->get_user_xid($id);
        $this->load->view('veterinario/vwFormEditPer', $data);
    }

    public function add_conductor() {
        $data['paises'] = $this->Paises_model->get_pais();
        $this->load->view('veterinario/vwFormAddConductor', $data);
    }

    public function update_personal() {

        if ($this->input->post('update_reg')) {

            $this->Users_model->update_userxid();
            $data = array('mensaje' => 'Datos actualizados');
            redirect(base_url() . 'index.php/veterinario/Perfil/get_personal', $data);
        } else {
            $data = array('mensaje' => 'No se realizo actualización');
            redirect(base_url() . 'index.php/veterinario/Perfil/get_personal', $data);
        }
    }

    public function edit_foto_cccond() {
        if ($this->input->post('update_cc')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/empresa/Perfil/get_conductores');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Condcutores_model->update_cc($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function edit_foto_liccon() {
        if ($this->input->post('update_liccond')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/empresa/Perfil/get_conductores');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Condcutores_model->update_lict($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function edit_pdf() {
        if ($this->input->post('update_pdf')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'zip|rar|pdf|docx|txt';
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = '2048';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/empresa/Perfil/get_vehiculos');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS 
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Vehiculos_model->update_pdf($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
