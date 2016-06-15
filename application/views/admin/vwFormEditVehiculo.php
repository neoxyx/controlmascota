<?php
$this->load->view('admin/vwHeader');
?>

<!--  
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Datos <small> Vehiculo</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/admin/Vehiculos' ?>"><i class="fa fa-level-up"></i></a></li>
                <li class="active"><i class="fa fa-truck"></i> Datos Vehiculo</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>



    <form method="post" action="<?= base_url() . 'index.php/admin/Vehiculos/update_vehiculo' ?>" id="basicBootstrapForm" class="form-horizontal">
        <div class="form-group">

            <label class="col-xs-3 control-label">Placa</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="placa" placeholder="Placa" value="<?php
                foreach ($vehiculo as $fila) {
                    echo $fila->placa;
                }
                ?>" />
            </div>
        </div>

        <input type="hidden" name="id" value="<?php
        echo $fila->idv;
        ?>"/>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Ciudad Matricula</label>
            <div class = "col-xs-4">
                <input type="text" class="form-control" name="localidad" value="<?php
                echo $fila->nombre_ciudad;
                ?>" />                                                                                                 
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Tipo de Vehiculo</label>
            <div class = "col-xs-4">
                <input type="text" class="form-control" name="tipo_vehiculo_id" value="<?php
                echo $fila->nombre_tv;
                ?>" />                                                                                                 
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Carroceria</label>
            <div class = "col-xs-4">
                <input type="text" class="form-control" name="carroceria_id" value="<?php
                echo $fila->nombre_carr;
                ?>" />  
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Trailer</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name="trailer" value="<?php
                echo $fila->trailer;
                ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Marca Trailer</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name="trailermarca" value="<?php
                echo $fila->trailermarca;
                ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Satelite</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "satelite" value="<?php
                echo $fila->satelite;
                ?> " />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Usuario Satelite</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "sateliteusuario" value="<?php
                echo $fila->sateliteusuario;
                ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Clave Satelite</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "sateliteclave" value="<?php
                echo $fila->sateliteclave;
                ?>" />
            </div>
        </div>
        
        <div class = "form-group">
            <label class = "col-xs-3 control-label">Afiliado</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "afiliado" value="<?php
                echo $fila->sateliteclave;
                ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Repotenciación</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "repotenciacion" value="<?php
                echo $fila->repotenciacion;
                ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Modelo</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "modelo" value="<?php
                echo $fila->modelo;
                ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Marca</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "marca" value="<?php
                echo $fila->marca;
                ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Capacidad de carga</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "capacidad_carga" value="<?php
                foreach ($vehiculo as $fila) {
                    echo $fila->capacidad_carga;
                }
                ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fecha de vencimiento SOAT</label>
            <div class = "col-xs-2">
                <input type = "text" class="form-control" readonly name = "vence_soat" value="<?php
                foreach ($vehiculo as $fila) {
                    echo $fila->vence_soat;
                }
                ?>"/>               
            </div>
            <div class="col-xs-0">
                <button type="button" value="" onclick="displayCalendar(document.forms[0].vence_soat, 'yyyy/mm/dd', this)"><i class="fa fa-calendar"></i></button>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fecha de vencimiento TM</label>
            <div class = "col-xs-2">
                <input type = "text" class="form-control" readonly name = "vence_rtecnomecanica" value="<?php
                foreach ($vehiculo as $fila) {
                    echo $fila->vence_rtecnomecanica;
                }
                ?>"/>
            </div>
            <div class="col-xs-0">
                <button type="button" value="" onclick="displayCalendar(document.forms[0].vence_soat, 'yyyy/mm/dd', this)"><i class="fa fa-calendar"></i></button>
            </div> 

        </div>

        <!--<div class = "form-group">
            <div class = "col-xs-6 col-xs-offset-3">
                <div class = "checkbox">
                    <label>
                        <input type = "checkbox" name = "agree" value = "agree" /> Acepto los terminos y condiciones
                    </label>
                </div>
            </div>
        </div>-->

        <div class = "form-group">
            <div class = "col-xs-9 col-xs-offset-3">
                <button type = "submit" class = "btn btn-primary" name = "update_reg" value = "Sign up">Actualizar</button>
            </div>
        </div>
    </form>   

    <div><?php $mensaje
                ?></div>
</div><!--/#page-wrapper -->


<?php
$this->load->view('admin/vwFooter');
?>
