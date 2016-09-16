<?php
$this->load->view('amo/vwHeader');
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
            <h1>Panel Principal Amo<small></small></h1>
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

                        //$conductores = $this->db->get_where('mascotas', array('id_amo' => $cont)); // get query result
                        $conductores = $this->db->query('select * from mascotas where id_amo='. $cont . ' order by nombre'); // get query result
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
                            <i class="fa fa-h-square fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading"></p>
                            <p class="announcement-text">Centros Medicos Veterinarios</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url().'index.php/amo/Veterinarios'?>">
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
                </a>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-paw fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-text">Mis Mascotas</p>
                            <p class="announcement-text"><?php
                                echo $count1;
                                ?> </p>
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
