<?php
$this->load->view('veterinario/vwHeader');
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
            <h1><?php
    if (!$empresa) {
        echo 'Panel Principal Veterinario';
    } else {
        foreach ($empresa as $value) {
            echo $value->siglas;
        }
    }
                ?>
                <small></small></h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Tablero</li>
            </ol>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Bienvenido <?php echo $nombre?>
            </div>
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-3"> <!-- comienzo a insertar la opción de tablero para creación de clientes -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-text">Clientes</p>
                            <p class="announcement-text"><?php
                                echo $clientes;
                                ?> </p>
                        </div>
                    </div>
                </div>
                <?php if ($permisos == 'Administrador') { ?>
                <a href="<?php echo base_url() . 'index.php/veterinario/Clientes/get_clientes/'.$idusuario ?>">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-8">
                                Ver
                            </div>
                            <div class="col-xs-4 text-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </div>
                        </div>
                    </div>
                </a><?php } else { ?>
                <a href="#">
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
                </a><?php }
                ?>
            </div>
        </div><!--termina div de opcion de clientes en el tablero del veterinario -->
        <div class="col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-paw fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-text">Pacientes</p>
                            <p class="announcement-text"><?php
                                echo $mascotas;
                                ?> </p>
                        </div>
                    </div>
                </div>
                <?php if ($permisos == 'Administrador') { ?>
                <a href="<?php echo base_url() . 'index.php/veterinario/Pacientes/get_pacientes/'.$idempresa ?>">
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
                </a><?php } else { ?>
                <a href="#">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-8">
                                Ver 
                            </div>
                            <div class="col-xs-4 text-right">
                                <i class="fa fa-arrow-circle-right"></i>
                            </div>
                        </div>
                    </div>
                </a><?php }
                ?>
            </div>
        </div>

    </div><!-- /.row -->
</div><!-- /#page-wrapper -->


<!--  PAge Code Ends here -->
<?php
$this->load->view('veterinario/vwFooter');
?>
