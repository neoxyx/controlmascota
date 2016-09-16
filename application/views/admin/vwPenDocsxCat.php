<?php
$this->load->view('admin/vwHeader');
?>

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
            <h1>Pendientes <small>Documentación</small></h1>
            <ol class="breadcrumb">
                <a href="<?php echo base_url() . 'index.php/admin/Dashboard' ?>"><li class="active"><i class="fa fa-home"></i> </li></a>
            </ol>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Bienvenido
                <?php
                $query = $this->db->get_where('users', array('usuario' => $_SESSION['usuario']));
                if ($query->num_rows() != 0) {
                    foreach ($query->result() as $row) {

                        echo $row->nombre . " ";
                        echo $row->apellidos;
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
                            <i class="fa fa-building fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading"><?php
                                $sqlQ = "SELECT * FROM sf_empresa WHERE rut AND camaracomercio IS NULL OR pdf IS NULL ";
                                $cons = $this->db->query($sqlQ);

                                $count = $cons->num_rows(); //get current query record.

                                echo $count;
                                ?></p>
                            <p class="announcement-text">Empresas</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() . 'index.php/Registros/pen_docs_empresa' ?>">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-6">
                                Ver
                            </div>
                            <div class="col-xs-6 text-right">
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
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading"><?php
                                $sql = "SELECT * FROM users WHERE pdf IS NULL AND nivel='Conductor' OR foto_cedula AND foto_licencia IS NULL AND nivel='Conductor'";
                                $consulta = $this->db->query($sql);

                                $count1 = $consulta->num_rows(); //get current query record.

                                echo $count1;
                                ?></p>
                            <p class="announcement-text">Conductores</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() . 'index.php/Registros/pend_docs_conductores' ?>">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-6">
                                Ver
                            </div>
                            <div class="col-xs-6 text-right">
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
                            <i class="fa fa-truck fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading"><?php
                                $Qsql = "SELECT * FROM sf_vehiculo WHERE soat AND rtecnomecanica AND licenciatransito AND cedulapropietario AND rutpropietario AND carnetafiliacion  IS NULL OR pdf IS NULL";
                                $consult = $this->db->query($Qsql);

                                $count2 = $consult->num_rows(); //get current query record.

                                echo $count2;
                                ?></p>
                            <p class="announcement-text">Vehiculos</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() . 'index.php/Registros/pend_docs_vehiculos' ?>">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-6">
                                Ver
                            </div>
                            <div class="col-xs-6 text-right">
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
$this->load->view('admin/vwFooter');
?>