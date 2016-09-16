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
            <h1>Enviar correo electronico<small> </small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url().'index.php/conductor/Dashboard'?>"><i class="icon-dashboard"></i> Volver Atras</a></li>
                <li class="active"><i class="icon-file-alt"></i> Correo Electronico</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>



    <form method="post" action="<?php echo base_url() . 'index.php/conductor/Correo/send_mail' ?>" id="basicBootstrapForm" class="form-horizontal">
        <div class="form-group">           
            <label class="col-xs-3 control-label">Mensaje</label>
            <div class="col-xs-4">
                <textarea class="form-control" name="mensaje"></textarea>                
            </div>
            
        </div>   

        <div class = "form-group">
            <div class = "col-xs-9 col-xs-offset-3">
                <button type = "submit" class = "btn btn-primary" name = "send" value = "Sign up">Enviar</button>
            </div>
        </div>
    </form>
</div><!--/#page-wrapper -->


<?php
$this->load->view('conductor/vwFooter');
?>