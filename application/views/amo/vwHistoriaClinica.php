<?php
$this->load->view('amo/vwHeader');
foreach ($mascota as $value) {
    $nombre=$value->nombre;
    $id_masc=$value->id;
}
?>
<!--  
Load Page Specific CSS and JS here
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->
<!--  PAge Code Starts here -->

<!-- Page Specific Plugins -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
<!-- Page Specific CSS -->
<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
<script src="<?php echo base_url() . 'assets/js/morris/chart-data-morris.js' ?>"></script>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Historial Clinico<small> <?php echo $nombre?></small></h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Tablero</li>
            </ol>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Bienvenido(a) <?php
                $cons = $this->db->get_where('users', array('usuario' => $_SESSION['usuario']));
                if ($cons->num_rows() != 0) {
                    foreach ($cons->result() as $row) {
                        echo $row->nombre . " " . $row->apellidos;
                        $cont = $row->id;
                        $conductores = $this->db->get_where('mascotas', array('user_id' => $_SESSION['usuario'])); // get query result
                        
                        $count1 = $conductores->num_rows(); //get current query record.
                                             
                    }
                }
                ?> 
            </div>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-eyedropper fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading"></p>
                            <p class="announcement-text">Vacunación</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url().'index.php/amo/Mascotas/get_vacunacion/'.$id_masc?>">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-8">
                                Ver / Añadir
                            </div>
                            <div class="col-xs-4 text-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-line-chart fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-text">Analisis</p>
                            <p class="announcement-text"></p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() . 'index.php/amo/Mascotas' ?>">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-8">
                                Ver / Añadir
                            </div>
                            <div class="col-xs-4 text-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-file-photo-o fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-text">Ecografias</p>
                            <p class="announcement-text"></p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() . 'index.php/amo/Mascotas' ?>">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-8">
                                Ver / Añadir
                            </div>
                            <div class="col-xs-4 text-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
       
        <div class="col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-heartbeat fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-text">Radiologia</p>
                            <p class="announcement-text"></p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() . 'index.php/amo/Mascotas' ?>">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-8">
                                Ver / Añadir
                            </div>
                            <div class="col-xs-4 text-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-medkit fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-text">Cirugias</p>
                            <p class="announcement-text"></p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() . 'index.php/amo/Mascotas' ?>">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-8">
                                Ver / Añadir
                            </div>
                            <div class="col-xs-4 text-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        
    </div><!-- /.row -->



</div><!-- /#page-wrapper -->


<!--  PAge Code Ends here -->
<?php
$this->load->view('amo/vwFooter');
?>