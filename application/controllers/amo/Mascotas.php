<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mascotas extends CI_Controller {

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
        $data['mensaje'] = 'Aun no has registrado ninguna mascota';
        $data['especies'] = $this->Mascotas_model->get_especies();
        $data['paises'] = $this->Paises_model->get_pais();
        $data['mascota'] = $this->Mascotas_model->get_mascota();
        $this->load->view('amo/vwMascotas', $data);
    }

    public function llena_razas() {
        $options = "";
        if ($this->input->post('especies')) {
            $especies = $this->input->post('especies');
            $razas = $this->Mascotas_model->get_razas($especies);
            foreach ($razas as $fila) {
?>
<option value="<?php echo $fila->id ?>"><?php echo $fila->nombre_raza ?></option>
<?php
                                      }
        }
    }

    public function guardar_mascota() {
        $nombre = $this->input->post('nombre');
        $fecha_nac = $this->input->post('fecha_nac');
        $especies = $this->input->post('especies');
        $raza = $this->input->post('raza');
        $sexo = $this->input->post('sexo');
        $esteril = $this->input->post('esteril');
        $alergias = $this->input->post('alergias');
        $chip = $this->input->post('chip');
        $fecha_chip = $this->input->post('fecha_chip');
        $res = $this->Mascotas_model->add_mascota($nombre,$fecha_nac,$especies,$raza,$sexo,$esteril,$alergias,$chip,$fecha_chip);
        if($res==true){
            $data = "Mascota creada con &eacute;xito";            
            $resultadosJson = json_encode($data);
        }else{
            $data = "Error al guardar en base de datos"; 
            $resultadosJson = json_encode($data);
        }
        echo $resultadosJson;     

    }

    public function edit_form($id) {
        $data['especies'] = $this->Mascotas_model->get_especies();
        //$data['paises'] = $this->Paises_model->get_pais();
        $data['mascota'] = $this->Mascotas_model->get_mascotaxid($id);
        $this->load->view('amo/vwFormEditMascota', $data);
    }

    public function edit_mascota() {
        if ($this->input->post('update_mascota')) {
            //verificar si van a subir una foto de la mascota
            $bandera=0; //para saber si se sube bien la imagen o si no subieron imagen
            $imagen="";
            if ($_FILES['userfile']['name']!=''){
                //cargar la imagen
                $nombre_imagen=url_title(convert_accented_characters($_FILES['userfile']['name']),'-',TRUE);
                //url_title quita los espacios y los cambia por el caracter guion. convert_accented_characters elimina las tildes.
                //para que las imagenes tengan un nombre único de archivo y se muestre la imagen que esta asociada a la mascota
                //$nuevo_nombre = time().'.'.end(explode(".",strtolower($nombre_imagen)));
                $nuevo_nombre = time() . '_' . strtolower($nombre_imagen);
                $imagen=str_replace('jpg','',$nuevo_nombre);
                $imagen .= '.jpg';
                $config['max_size'] = 2000;
                $config['quality']='90%';
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['file_name']=$imagen;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()){
                    $bandera=0;
                }else{
                    $bandera=1;
                    $file_info = $this->upload->data();
                    $data = array('upload_data' => $this->upload->data());
                    $imagen = $file_info['file_name'];
                }
            }

            $subir = $this->Mascotas_model->update_mascota($imagen);
            if ($bandera==1){
                redirect(base_url() . 'index.php/amo/Mascotas', $data);
            }else{
                redirect(base_url() . 'index.php/amo/Mascotas');
            }
        }
    }


    public function historia_clinica($id) {
        $data['mascota'] = $this->Mascotas_model->get_mascotaxid($id);
        $this->load->view('amo/vwHistoriaClinica', $data);
    }

    public function get_vacunacion($id) {
        $data['mensaje'] = 'Aun no se han registrado vacunas';
        $data['mascota'] = $this->Mascotas_model->get_mascotaxid($id);
        $data['vacunas'] = $this->Vacunas_model->get_vacunacion($id);
        $this->load->view('amo/vwVacunas', $data);
    }

    public function add_vacuna($id) {
        $data['mascota'] = $this->Mascotas_model->get_mascotaxid($id);
        $this->load->view('amo/vwAddVacuna', $data);
    }

    public function guardar_vacuna() {

        if ($this->input->post('submit_reg')) {

            $this->Vacunas_model->add_vacuna();
            $data = array('mensaje' => 'Registro correcto');
            redirect(base_url() . 'index.php/amo/Mascotas', $data);
        } else {
            $data = array('mensaje' => 'No se realizo el registro');
            redirect(base_url() . 'index.php/amo/Mascotas', $data);
        }
    }

    public function get_analisis($id) {
        $data['analisis'] = $this->Analisis_model->get_analisis($id);
        $this->load->view('amo/vwVacunas', $data);
    }

    public function get_ecografias($id) {
        $data['ecografia'] = $this->Ecografias_model->get_ecografias($id);
        $this->load->view('amo/vwVacunas', $data);
    }

    public function get_radiologias($id) {
        $data['radiologia'] = $this->Radiologias_model->get_radiologias($id);
        $this->load->view('amo/vwVacunas', $data);
    }

}
