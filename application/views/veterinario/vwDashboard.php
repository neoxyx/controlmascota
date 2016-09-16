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
                Bienvenido <?php
                $consulta = $this->db->get_where('users', array('usuario' => $_SESSION['usuario']));
                if ($consulta->num_rows() != 0) {
                    foreach ($consulta->result() as $row) {
                        echo $row->nombre . " " . $row->apellidos;
                        $xidempresa = $row->id_empresa;
                        $xidusuario=$row->id;
                        $usuarios = $this->db->get_where('users', array('nivel' => 'Veterinario')); // get query result
                        $clientes=  $this->db->get_where('users', array('id_empresa' => $_SESSION['idempresa']));
                        $xnumclientes=$clientes->num_rows();
                        //se detecta si el usuario que ingresa tiene una empresa asociada con el objetivo de que se puedan filtrar las mascotas de sus clientes   
                        $xcodempusu=($_SESSION['idempresa']=='' || isset($_SESSION['idempresa'])) ? 0 : $_SESSION['idempresa'] ;
                        //para hallar el numero de mascotas se debe consultar el
                        $consu="select count(*) as cantidad from mascotas where id_amo in(select id from users where id_empresa=" . $xcodempusu . ")";
                        $query1 = $this->db->query($consu);
                        $fila=$query1->row();
                        $xnummascotas=$fila->cantidad;
                        $count1 = $usuarios->num_rows()-1; //get current query record.
                        $permiso = $row->permisos;
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
                            <i class="fa fa-key fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading"></p>
                            <p class="announcement-text">Licencias</p>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-8">
                                Ver / Activar
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
                            <i class="fa fa-hospital-o fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading"></p>
                            <p class="announcement-text">Mi Clinica</p>
                        </div>
                    </div>
                </div>
                <?php if ($permiso == 'Administrador') { ?>
                    <a href="<?php echo base_url() . 'index.php/veterinario/Perfil/get_empresa' ?>">
                        <div class="panel-footer announcement-bottom">
                            <div class="row">
                                <div class="col-xs-8">
                                    Ver / Completar
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
                                    Ver / Completar
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
        <div class="col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-text">Empleados</p>
                            <p class="announcement-text"><?php
                                echo $count1;
                                ?> </p>
                        </div>
                    </div>
                </div>
                <?php if ($permiso == 'Administrador') { ?>
                    <a href="<?php echo base_url() . 'index.php/veterinario/Perfil/get_empleados' ?>">
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
        </div>
        <div class="col-lg-3"> <!-- comienzo a insertar la opción de tablero para creación de clientes -->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-paw fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-text">Clientes</p>
                            <p class="announcement-text"><?php
                                echo $xnumclientes;
                                ?> </p>
                        </div>
                    </div>
                </div>
                <?php if ($permiso == 'Administrador') { ?>
                    <a href="<?php echo base_url() . 'index.php/veterinario/Clientes/get_clientes/'.$xidusuario ?>">
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
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-paw fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-text">Pacientes</p>
                            <p class="announcement-text"><?php
                                echo $xnummascotas;
                                ?> </p>
                        </div>
                    </div>
                </div>
                <?php if ($permiso == 'Administrador') { ?>
                    <a href="<?php echo base_url() . 'index.php/veterinario/Pacientes/get_pacientes/'.$xidempresa ?>">
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
        </div>

    </div><!-- /.row -->
</div><!-- /#page-wrapper -->


<!--  PAge Code Ends here -->
<?php
$this->load->view('veterinario/vwFooter');
?>
