<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registros extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['registros'] = '';
        $data['mensaje'] = '';
        $data['paises'] = $this->Paises_model->get_pais();
        $this->load->view('registro', $data);
    }

    public function guardar() {
        $code = $this->input->post('code', TRUE);
        $this->form_validation->set_rules('username', 'Usuario', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Confirmar Contraseña', 'required');
       // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telefono', 'Telefono', 'required');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('pais', 'País', 'required');
        $this->form_validation->set_rules('provincia', 'Departamento', 'required');
        $this->form_validation->set_rules('localidad', 'Ciudad', 'required');
        $this->form_validation->set_rules('terminos', 'Terminos y politicas de privacidad', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['mensaje'] = '';
            $this->load->view('registro', $data);
        } else {

            $res = $this->Registros_model->add_user();
            if ($res == FALSE) {
                $data['mensaje'] = 'Registro incorrecto el email del usuario ya está registrado, escoje otro e intentalo de nuevo';
                $this->load->view('registro', $data);
            } else {
//esta funcion de enviar email se deb probar desde un servidor ya que en local por si solo sin algunos programas adicionales no funciona la prueba de envio de correo
                $config['charset'] = 'utf-8';
                $config['newline'] = "\r\n";
                $config['mailtype'] = 'html';
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'mail.controlmascota.com';
                $config['smtp_port'] = '25';
                $config['smtp_user'] = 'info@controlmascota.com';
                $config['smtp_pass'] = 'jhV_3103';
                $config['validation'] = TRUE;
                $this->email->initialize($config);
                $this->email->clear();

                $this->email->from('info@controlmascota.com', 'Control Mascota');
                $this->email->to($this->input->post('username', TRUE));
                $this->email->subject('Confirme cuenta de usuario Control Mascota');
                $this->email->message('<h1>Bienvenido: ' . $this->input->post('nombre', TRUE) . ' ' . $this->input->post('apellidos', TRUE) . '<p>'
                        . 'Para confirmar su registro ingrese a la siguiente url '
                        . anchor(base_url() . 'index.php/Registros/confirmar/' . $code) . ' <br><b>Gracias por su registro</b>'
                        . '</p>');
                $this->email->send();
                $data['mensaje'] = 'Registro correcto se le enviara un mensaje a su email para habilitar su acceso';
                $this->load->view('login', $data);
            }
        }
    }

    public function confirmar($code) {
        $res = $this->Registros_model->very($code, 'codigo');
        if ($res == FALSE) {
            $data['mensaje'] = 'Este usuario no existe';
            $this->load->view('login', $data);
        } else {
            $this->Registros_model->update_user($code);
            $data['mensaje'] = 'Usuario confirmado con exito, inicie sesion';
            $this->load->view('login', $data);
        }
    }

    public function very_estado() {
        $consulta = $this->db->get_where('users', array('usuario' => $this->input->post('username', TRUE),
            'pass' => md5($this->input->post('password', TRUE)), 'estado' => '1'));

        if ($consulta->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function get_registros_sin_val() {
        $data['mensaje'] = 'No hay registros para validar';
        $data['registros'] = $this->Registros_model->registros_sin_val();
        $this->load->view('admin/vwRegistrosNactivos', $data);
    }

    public function get_registros_ult_sem() {
        $data['mensaje'] = '0 registros nuevos sin activar en los ultimos 7 días';
        $data['registros'] = $this->Registros_model->registros_ult_sem();
        $this->load->view('admin/vwRegistrosUltSem', $data);
    }

    public function get_registrosxid_ult_sem($id) {
        if (!$id) {
            show_404();
        }
        $data['registro'] = $this->Registros_model->get_registroxid_ult_sem($id);
        $this->load->view('admin/vwActivarRegistro', $data);
    }

    public function activar_registro() {

        $this->Registros_model->activar_registro();
        redirect(base_url() . 'index.php/Registros/get_registros_ult_sem');
    }

    public function registros_pen_docs_total() {
        $this->load->view('admin/vwPenDocsxCat');
    }

    public function pen_docs_empresa() {
        $data['mensaje'] = 'No hay registros pendientes de documentación';
        $data['registros'] = $this->Registros_model->pen_docs_empresa();
        $this->load->view('admin/vwPenDocsEmpresas', $data);
    }

    public function pend_docs_vehiculos() {
        $data['mensaje'] = 'No hay registros pendientes de documentación';
        $data['registros'] = $this->Registros_model->pend_docs_vehiculos();
        $this->load->view('admin/vwPenDocsVehiculos', $data);
    }

    public function pend_docs_conductores() {
        $data['mensaje'] = 'No hay registros pendientes de documentación';
        $data['registros'] = $this->Registros_model->pend_docs_conductores();
        $this->load->view('admin/vwPenDocsConductores', $data);
    }

    public function get_pendocs_vehiculoxid($id) {
        if (!$id) {
            show_404();
        }
        $data['mens'] = '';
        $data['registro'] = $this->Registros_model->get_pendocs_vehiculoxid($id);
        $this->load->view('admin/vwSubirDocsVehiculo', $data);
    }

    public function get_pendocsxid($id) {
        if (!$id) {
            show_404();
        }
        $data['mens'] = '';
        $data['registro'] = $this->Registros_model->get_pendocsxid($id);
        $this->load->view('admin/vwSubirDocsUser', $data);
    }

    public function get_pendocs_emp_xid($id) {
        if (!$id) {
            show_404();
        }
        $data['mens'] = '';
        $data['registro'] = $this->Registros_model->get_pendocs_emp_xid($id);
        $this->load->view('admin/vwSubirDocsEmp', $data);
    }

    public function registros_completos() {
        $data['mensaje'] = 'No hay registros completos';
        $data['registros'] = $this->Registros_model->registros_completos();
        $this->load->view('admin/vwRegistroscompletos', $data);
    }

    public function subir_pdf_user() {
        if ($this->input->post('update_pdf')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'zip|rar|pdf|docx|txt';
            $config['max_size'] = '2048';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $data['mens'] = 'Fallo al subir el doc, revise e intentelo de nuevo';
                redirect(base_url() . 'index.php/admin/vwSubirDocsUser', $data);
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, Y
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Registros_model->subir_pdf_user($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function subir_foto_cc_user() {
        if ($this->input->post('update_doc')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/admin/Dashboard');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Registros_model->subir_foto_cc_user($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
//FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    }

    public function subir_foto_lic_user() {
        if ($this->input->post('update_doc')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {

                redirect(base_url() . 'index.php/admin/Dashboard');
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Registros_model->subir_foto_lic_user($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
//FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    }

    public function subir_rut() {
        if ($this->input->post('update_rut')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $data['mens'] = 'Fallo al subir el doc, revise e intentelo de nuevo';
                redirect(base_url() . 'index.php/admin/vwSubirDocsEmp', $data);
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Registros_model->subir_rut($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
//FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    }

    public function subir_camaracomercio() {
        if ($this->input->post('update_camara')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $data['mens'] = 'Fallo al subir el doc, revise e intentelo de nuevo';
                redirect(base_url() . 'index.php/admin/vwSubirDocsEmp', $data);
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Registros_model->subir_camaracomercio($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
//FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    }

    public function subir_pdf_emp() {
        if ($this->input->post('update_pdf')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'zip|rar|pdf|docx|txt';
            $config['max_size'] = '2048';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $data['mens'] = 'Fallo al subir el doc, revise e intentelo de nuevo';
                redirect(base_url() . 'index.php/admin/vwSubirDocsEmp', $data);
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, Y
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Registros_model->subir_pdf_emp($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function subir_soat() {
        if ($this->input->post('update_soat')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $data['mens'] = 'Fallo al subir el doc, revise e intentelo de nuevo';
                redirect(base_url() . 'index.php/admin/vwSubirDocsVehiculo', $data);
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Registros_model->subir_soat($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
//FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    }

    public function subir_rtecno() {
        if ($this->input->post('update_rtecno')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $data['mens'] = 'Fallo al subir el doc, revise e intentelo de nuevo';
                redirect(base_url() . 'index.php/admin/vwSubirDocsVehiculo', $data);
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Registros_model->subir_rtecno($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function subir_ltransito() {
        if ($this->input->post('update_ltransito')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $data['mens'] = 'Fallo al subir el doc, revise e intentelo de nuevo';
                redirect(base_url() . 'index.php/admin/vwSubirDocsVehiculo', $data);
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Registros_model->subir_ltransito($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function subir_ccprop() {
        if ($this->input->post('update_ccprop')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $data['mens'] = 'Fallo al subir el doc, revise e intentelo de nuevo';
                redirect(base_url() . 'index.php/admin/vwSubirDocsVehiculo', $data);
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Registros_model->subir_ccprop($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function subir_rutprop() {
        if ($this->input->post('update_rutprop')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $data['mens'] = 'Fallo al subir el doc, revise e intentelo de nuevo';
                redirect(base_url() . 'index.php/admin/vwSubirDocsVehiculo', $data);
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Registros_model->subir_rutprop($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function subir_carnet() {
        if ($this->input->post('update_carnet')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '50000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $data['mens'] = 'Fallo al subir el doc, revise e intentelo de nuevo';
                redirect(base_url() . 'index.php/admin/vwSubirDocsVehiculo', $data);
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA Y HACEMOS
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Registros_model->subir_carnet($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function subir_pdf_vehiculo() {
        if ($this->input->post('update_pdfv')) {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'zip|rar|pdf|docx|txt';
            $config['max_size'] = '2048';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $data['mens'] = 'Fallo al subir el doc, revise e intentelo de nuevo';
                redirect(base_url() . 'index.php/admin/vwSubirDocsVehiculo', $data);
            } else {
                //EN OTRO CASO SUBIMOS LA IMAGEN, Y
                //ENVÍAMOS LOS DATOS AL MODELO PARA HACER LA INSERCIÓN
                $file_info = $this->upload->data();
                //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
                //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA

                $data = array('upload_data' => $this->upload->data());
                $imagen = $file_info['file_name'];
                $subir = $this->Registros_model->subir_pdf_vehiculo($imagen);
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

}
