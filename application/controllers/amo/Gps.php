<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gps extends CI_Controller {
/**
 * ark Admin Panel for Codeigniter 
 * Author: Abhishek R. Kaushik
 * downloaded from http://devzone.co.in
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->model('mapa_model');
        
    }

    public function index() {
        $arr['page'] = 'gps';
         
        //creamos la configuración del mapa con un array
        $config = array();
        //la zona del mapa que queremos mostrar al cargar el mapa
        //como vemos le podemos pasar la ciudad y el país
        //en lugar de la latitud y la longitud
        $config['center'] = 'bogota,colombia';
        // el zoom, que lo podemos poner en auto y de esa forma
        //siempre mostrará todos los markers ajustando el zoom	
        $config['zoom'] = '6';
        //el tipo de mapa, en el pdf podéis ver más opciones
        $config['map_type'] = 'ROADMAP';
        //el ancho del mapa		
        $config['map_width'] = '850px';
        //el alto del mapa	
        $config['map_height'] = '600px';
        //inicializamos la configuración del mapa	
        $this->googlemaps->initialize($config);

        //hacemos la consulta al modelo para pedirle 
        //la posición de los markers y el infowindow
        $markers = $this->Mapa_model->get_markers();
        foreach ($markers as $info_marker) {
            $marker = array();
            //podemos elegir DROP o BOUNCE
            $marker ['animation'] = 'DROP';
            //posición de los markers
            $marker ['position'] = $info_marker->pos_y . ',' . $info_marker->pos_x;
            //infowindow de los markers(ventana de información)	
            $marker ['infowindow_content'] = $info_marker->infowindow;
            //la id del marker
            $marker['id'] = $info_marker->id;
            $this->googlemaps->add_marker($marker);

            //podemos colocar iconos personalizados así de fácil
            //$marker ['icon'] = base_url().'imagenes/'.$fila->imagen;
            //si queremos que se pueda arrastrar el marker
            //$marker['draggable'] = TRUE;
            //si queremos darle una id, muy útil
        }

        //en $data['datos'tenemos la información de cada marker para
        //poder utilizarlo en el sidebar en nuestra vista mapa_view
        $data['datos'] = $this->Mapa_model->get_markers();
        //en data['map'] tenemos ya creado nuestro mapa para llamarlo en la vista
        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('conductor/vwGps', $data);
    }    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */