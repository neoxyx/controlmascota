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
            <h1>Agregar <small> Vehiculo</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/admin/Vehiculos' ?>"><i class="fa fa-level-up"></i></a></li>
                <li class="active"><i class="fa fa-user"></i> Datos Propietario</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>



    <form method="post" action="<?= base_url() . 'index.php/admin/Vehiculos/guardar_vehiculo' ?>" id="basicBootstrapForm" class="form-horizontal">

        <div class="form-group">
            <label class="col-xs-3 control-label">Propietario:</label>
            <div class="col-xs-4">
                <select class="form-control" name="tipo_propietario">
                    <option value="PL">Propietario Legal</option>
                    <option value="AV">Administrador de vehículo(Empresarial)</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">Nombre:</label>
            <div class="col-xs-4">
                <select class="form-control" name="user_id">
                    <option>Seleccione de la lista:</option>
                    <?php foreach ($user as $value) { ?>
                        <option value="<?php echo $value->id ?>"><?php echo $value->nombre;
                    echo " " . $value->apellidos; ?>
                        </option><?php
                        }
                    ?>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            
            <div class="col-xs-12">
                <b>Si el usuario no esta en la lista, crea uno</b> <a href="<?=base_url().'index.php/admin/Users/add_user'?>">Aqui</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-truck"></i> Datos Vehiculo</li>

                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Placa:</label>
            <div class = "col-xs-4">
                <input type="text" class="form-control" name="placa" />                                                                                                 
            </div>
        </div>
        
        <div class = "form-group">
            <label class = "col-xs-3 control-label">País Matricula:</label>
            <div class = "col-xs-4">
                <select name="pais" id="pais" class="form-control">  
                    <option>Seleccione Pais:</option>
                    <?php
                    foreach ($paises as $fila) {
                        ?>
                        <option value="<?= $fila->id ?>"><?= $fila->nombre_pais ?></option>
                        <?php
                    }
                    ?>	
                </select>                                                                                   
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Departamento Matricula:</label>
            <div class = "col-xs-4">
                <select name="provincia" id="provincia" class="form-control">
                    <option>Selecciona tu pais</option>	
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Ciudad Matricula:</label>
            <div class = "col-xs-4">
                <select name="localidad" id="localidad" class="form-control">
                    <option>Selecciona tu departamento</option>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Tipo de vehiculo:</label>
            <div class = "col-xs-4">
                <select name="tipo_vehiculo_id"  class="form-control">  
                    <?php
                    foreach ($tipov as $fila) {
                        ?>
                        <option value="<?= $fila->id ?>"><?= $fila->nombre_tv ?></option>
                        <?php
                    }
                    ?>	
                </select>                                                                                   
            </div>
        </div>


        <div class = "form-group">
            <label class = "col-xs-3 control-label">Carroceria:</label>
            <div class = "col-xs-4">
                <select name="carroceria_id"  class="form-control">  
                    <?php
                    foreach ($carr as $fila) {
                        ?>
                        <option value="<?= $fila->id ?>"><?= $fila->nombre_carr ?></option>
                        <?php
                    }
                    ?>	
                </select>                                                                                   
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Trailer:</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name="trailer" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Marca Trailer:</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name="trailermarca"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Satelite:</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "satelite" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Usuario Satelite:</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "sateliteusuario"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Clave Satelite:</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "sateliteclave" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Afiliado:</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "afiliado"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Repotenciación:</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "repotenciacion"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Modelo:</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "modelo" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Marca:</label>
            <div class = "col-xs-4">
                <select name="marca"  class="form-control">  
                    <?php
                    foreach ($marca as $fila) {
                        ?>
                        <option value="<?= $fila->id ?>"><?= $fila->nombre ?></option>
                        <?php
                    }
                    ?>	
                </select>                                                                                   
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Capacidad de carga(*):</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "capacidad_carga"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fecha de vencimiento SOAT(*):</label>
            <div class = "col-xs-2">
                <input type = "text" class="form-control" readonly name = "vence_soat" />               
            </div>
            <div class="col-xs-0">
                <button type="button" value="" onclick="displayCalendar(document.forms[0].vence_soat, 'yyyy/mm/dd', this)"><i class="fa fa-calendar"></i></button>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fecha de vencimiento TM(*):</label>
            <div class = "col-xs-2">
                <input type = "text" class="form-control" readonly name = "vence_rtecnomecanica" />
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
                <button type = "submit" class = "btn btn-primary" name = "guardar_reg" value = "Sign up">Guardar</button>
            </div>
        </div>
    </form>   

    <div><?php $mensaje
                    ?></div>
</div><!--/#page-wrapper -->


<?php
$this->load->view('admin/vwFooter');
?>

