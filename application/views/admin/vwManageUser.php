<?php
$this->load->view('admin/vwHeader');
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
    <script src="<?=  base_url().'assets/js/morris/chart-data-morris.js'?>"></script>
    
<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Usuarios<small> Modulo de Administración</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Tablero</li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-user fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php
                                $sql = "SELECT * FROM users WHERE nivel='Administrador'";
                                $consulta = $this->db->query($sql);

                                $count1 = $consulta->num_rows(); //get current query record.

                                echo $count1;
                                ?></p>
                    <p class="announcement-text">Administrador</p>
                  </div>
                </div>
              </div>
              <a href="<?=base_url().'index.php/admin/Perfil/get_perfil'?>">
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
                    <i class="fa fa-building fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php
                                $sql = "SELECT * FROM sf_empresa";
                                $consulta = $this->db->query($sql);

                                $count1 = $consulta->num_rows(); //get current query record.

                                echo $count1;
                                ?></p>
                    <p class="announcement-text">Empresas</p>
                  </div>
                </div>
              </div>
              <a href="<?=base_url().'index.php/admin/Empresas'?>">
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
                    <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php
                                $sql = "SELECT * FROM users WHERE nivel='Conductor'";
                                $consulta = $this->db->query($sql);

                                $count1 = $consulta->num_rows(); //get current query record.

                                echo $count1;
                                ?></p>
                    <p class="announcement-text">Conductores</p>
                  </div>
                </div>
              </div>
              <a href="<?=base_url().'index.php/admin/Conductores'?>">
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
                    <i class="fa fa-truck fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php
                                $sql = "SELECT * FROM sf_vehiculo";
                                $consulta = $this->db->query($sql);

                                $count1 = $consulta->num_rows(); //get current query record.

                                echo $count1;
                                ?></p>
                    <p class="announcement-text">Vehiculos</p>
                  </div>
                </div>
              </div>
              <a href="<?=base_url().'index.php/admin/Vehiculos'?>">
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
                    <i class="fa fa-map-marker fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php
                                $sql = "SELECT * FROM users WHERE nivel='GPS'";
                                $consulta = $this->db->query($sql);

                                $count1 = $consulta->num_rows(); //get current query record.

                                echo $count1;
                                ?></p>
                    <p class="announcement-text">GPS</p>
                  </div>
                </div>
              </div>
              <a href="<?=base_url().'index.php/admin/Gps/get_users_gps'?>">
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