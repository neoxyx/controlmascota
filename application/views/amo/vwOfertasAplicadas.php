<?php
$this->load->view('conductor/vwHeader');
?>
<!--  
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Ofertas de Carga <small></small></h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-opencart"></i> Ofertas</li>
                <li class="active"> <?php echo $mensaje?></li>

                <a href="<?php echo base_url().'index.php/conductor/Ofertas'?>"><button class="btn btn-primary" type="button" style="float:right;">Volver Atras</button></a>
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->



    

    


                </div><!--/#page-wrapper -->

                <?php
                $this->load->view('conductor/vwFooter');
                ?>
