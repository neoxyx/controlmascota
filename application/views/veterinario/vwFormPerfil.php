<?php
$this->load->view('veterinario/vwHeader');
?>

<!--  
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Clinica <small>Editar Propietario</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/veterinario/Perfil/get_personal' ?>"><i class="icon-dashboard"></i> Volver Atras</a></li>
                <li class="active"><i class="icon-file-alt"></i> Datos Personales</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>
    
    <form method="post" action="<?= base_url() . 'index.php/veterinario/Perfil/edit_user' ?>" id="basicBootstrapForm" class="form-horizontal">
        <div class="form-group">
            <label class="col-xs-3 control-label">Nombre Completo</label>
            <div class="col-xs-4">
                
                <input type="text" class="form-control" name="firstName" placeholder="Nombre" value="<?php
                foreach ($perfil as $row) {
                    echo $row->nombre;
                }
                ?>" ></input>
                <input type="hidden" name="id" value="<?php echo $row->id?>"/>
            </div>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "lastName" placeholder = "Apellidos" value="<?php
                echo $row->apellidos;
                ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label disabled">Tipo de documento</label>
            <div class = "col-xs-3">
                <select name="tipo_doc" class="form-control">
                    <option value="<?php echo $row->tipo_doc?>">Actual: <?php
                echo $row->tipo_doc;
                ?> </option>
                    <option value="">Seleccione tipo de documento a continuación si desea cambiar:</option>
                    <option value="CC">CC</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="Libreta Militar">Libreta Militar</option>
                    <option value="NIT">NIT</option>     
                </select>
            </div>

            <label class = "col-xs-1 control-label">No</label>
            <div class = "col-xs-3">
                <input type="text" class = "form-control" name = "cc" value="<?php
                echo $row->cedula;
                ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fecha de nacimiento</label>
            <div class="col-xs-2">
                <input type="text" class="form-control" value="<?php
                echo $row->fecha_nac;
                ?>" readonly name="theDate">               
            </div>
            <div class="col-xs-0">
                <button type="button" onclick="displayCalendar(document.forms[0].theDate, 'yyyy/mm/dd', this)"><i class="fa fa-calendar"></i></button>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Estado Civil</label>
            <div class = "col-xs-4">
                <select class="form-control" name="est_civil">
                    <option value="<?php
                    echo $row->estado_civil;
                    ?>">Actual: <?php
                                echo $row->estado_civil;
                                ?></option>
                    <option value="">Seleccione estado civil a continuación si desea cambiar:</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                    <option value="Unión Libre">Unión Libre</option>
                    <option value="Separado">Separado</option>
                    <option value="Viudo">Viudo</option>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Sexo</label>
            <div class = "col-xs-4">
                <div class = "radio">
                    <label>
                        <input type = "radio" name = "gender" checked="" value = "<?php
                        echo $row->sexo;
                        ?>" /> Tu sexo actual es <b><?php echo $row->sexo ?></b> selecciona otro si deseas cambiar
                    </label>
                </div>
                <div class = "radio">
                    <label>
                        <input type = "radio" name = "gender" value = "Masculino" /> Masculino
                    </label>
                </div>
                <div class = "radio">
                    <label>
                        <input type = "radio" name = "gender" value = "Femenino" /> Femenino
                    </label>
                </div>
                <div class = "radio">
                    <label>
                        <input type = "radio" name = "gender" value = "Otro" /> Otro
                    </label>
                </div>
            </div>
        </div>

        <div>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i></li>
                <li class="active"><i class="icon-file-alt"></i> Información Residencial</li>

                <div style="clear: both;"></div>
            </ol>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">País</label>
            <div class = "col-xs-4">
                <select name="pais" id="pais" class="form-control"> 
                    <option value="<?php
                    echo $row->pais;
                    ?>">Seleccione pais solo si desea cambiar:</option>

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
            <label class = "col-xs-3 control-label">Departamento</label>
            <div class = "col-xs-4">
                <select name="provincia" id="provincia" class="form-control">
                    <option value="<?php
                    echo $row->dpto;
                    ?>">Selecciona tu pais</option>	
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Ciudad</label>
            <div class = "col-xs-4">
                <select name="localidad" id="localidad" class="form-control">
                    <option value="<?php
                    echo $row->ciudad;
                    ?>">Selecciona tu departamento</option>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Dirección</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "address" value="<?php
                echo $row->direccion;
                ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Teléfono</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "phone" value="<?php
                echo $row->telefono;
                ?>" />
            </div>
        </div>      

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Celular</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "celphone" value="<?php
                echo $row->celular;
                ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Email(*)</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "email" value="<?php
                echo $row->email;
                ?>" />
            </div>
        </div>



        <div class = "form-group">
            <div class = "col-xs-9 col-xs-offset-3">
                <input type = "submit" class = "btn btn-primary" name = "update_user" value="Actualizar" >
            </div>
        </div>
    </form>

    <div><?php $mensaje ?></div>
</div><!--/#page-wrapper -->


<?php
$this->load->view('veterinario/vwFooter');
?>
