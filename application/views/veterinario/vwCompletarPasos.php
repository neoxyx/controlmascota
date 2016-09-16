<?php
$this->load->view('empresa/vwHeader');
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
            <h1>Completar <small>Registro</small></h1>
            <ol class="breadcrumb">
                <li class="active"><a href="<?php echo base_url().'index.php/empresa/Dashboard'?>"<i class="fa fa-home"></a></i></li>
            </ol>
            
        </div>
    </div><!-- /.row -->

    <div class="row">
        <div class="col-lg-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-industry fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading"></p>
                            <p class="announcement-text">Datos Empresa</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url().'index.php/empresa/Perfil/get_emp'?>">
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
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading"></p>
                            <p class="announcement-text">Documentación</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url().'index.php/empresa/Perfil/adj_doc'?>">
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
$this->load->view('empresa/vwFooter');
?>
