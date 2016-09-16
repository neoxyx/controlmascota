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
            <h1>Panel Principal <small>Administrador</small></h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Tablero</li>
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
                            <i class="fa fa-cart-plus fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading"><?php
                                $sqlQ = 'SELECT * FROM users WHERE WEEK(fecha_creacion)=WEEK(curdate())';
                                $cons = $this->db->query($sqlQ);

                                $count = $cons->num_rows(); //get current query record.

                                echo $count;
                                ?></p>
                            <p class="announcement-text">Reg. Nuevos</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() . 'index.php/Registros/get_registros_ult_sem' ?>">
                    <div class="panel-footer announcement-bottom">
                        <div class="row">
                            <div class="col-xs-6">
                                U.semana
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
                            <i class="fa fa-check-circle-o fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading"><?php
                                $sql = "SELECT * FROM users WHERE estado='0'";
                                $consulta = $this->db->query($sql);

                                $count1 = $consulta->num_rows(); //get current query record.

                                echo $count1;
                                ?></p>
                            <p class="announcement-text">Para validar</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() . 'index.php/Registros/get_registros_sin_val' ?>">
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
                            <i class="fa fa-file-pdf-o fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading"><?php
                                $Qsql = "SELECT * FROM users WHERE pdf IS NULL AND nivel='Conductor' OR foto_cedula AND foto_licencia IS NULL AND nivel='Conductor'";
                                $consult = $this->db->query($Qsql);
                                $count2 = $consult->num_rows(); //get current query record.
                                $Qsql1 = "SELECT * FROM sf_empresa WHERE rut AND camaracomercio IS NULL OR pdf IS NULL ";
                                $consult1 = $this->db->query($Qsql1);
                                $count3 = $consult1->num_rows(); //get current query record.
                                $Qsql2 = "SELECT * FROM sf_vehiculo WHERE soat AND rtecnomecanica AND licenciatransito AND cedulapropietario AND rutpropietario AND carnetafiliacion  IS NULL OR pdf IS NULL";
                                $consult2 = $this->db->query($Qsql2);
                                $count4 = $consult2->num_rows(); //get current query record.
                                echo $count2+$count3+$count4;
                                ?></p>
                            <p class="announcement-text">Pend. Docs.</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() . 'index.php/Registros/registros_pen_docs_total' ?>">
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
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-check fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading"><?php
                                $Qsql1 = "SELECT * FROM users WHERE nivel!='Administrador' AND tipo_doc IS NOT NULL AND cedula IS NOT NULL AND fecha_nac IS NOT NULL AND edad IS NOT NULL AND sexo IS NOT NULL AND pais IS NOT NULL AND dpto IS NOT NULL AND ciudad IS NOT NULL AND direccion IS NOT NULL AND telefono IS NOT NULL AND celular IS NOT NULL AND licencia_conduccion IS NOT NULL AND categoria_lic IS NOT NULL AND fecha_ven_licencia IS NOT NULL AND pdf IS NOT NULL OR foto_cedula AND foto_licencia IS NOT NULL AND estado='1'  ";
                                $consul = $this->db->query($Qsql1);

                                $count3 = $consul->num_rows(); //get current query record.

                                echo $count3;
                                ?></p>
                            <p class="announcement-text">Completos!</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url() . 'index.php/Registros/registros_completos' ?>">
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