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
            <h1>Clinica<small>  Crear Amo</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/veterinario/Dashboard' ?>"><i class="fa fa-dashboard fa-2x"></i></a></li>
                <li class="active"><i class="icon-file-alt"></i> Datos Personales</li>
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

    <?php echo '<h4 style="color:red">' . $mensaje . '</h4>' ?>
    <?php
    $attributes = array("class" => "form-horizontal", "id" => "basicBootstrapForm");
    echo form_open("veterinario/Amo/guardar_amo", $attributes);
    ?>
        <div class="form-group">
            <label class="col-xs-3 control-label">Nombre Completo(*):</label>
            <div class="col-xs-4">
                <?php echo "<h5 style='color:red'>" . form_error('nombre') . "</h5>"; ?>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre"></input>
            </div>
            <div class = "col-xs-4">
                <?php echo "<h5 style='color:red'>" . form_error('apellidos') . "</h5>"; ?>
                <input type = "text" class = "form-control" name = "apellidos" placeholder = "Apellidos" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">Tipo documento(*):</label>
            <div class="col-xs-4">
                <?php echo "<h5 style='color:red'>" . form_error('tipo_doc') . "</h5>"; ?>
                <select name="tipo_doc" class="form-control">
                    <option value="CC">Cédula</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="TM">Libreta Militar</option>
                </select>
            </div>
            <div class = "col-xs-4">
                <?php echo "<h5 style='color:red'>" . form_error('cedula') . "</h5>"; ?>
                <input type = "text" class = "form-control" name = "cedula" placeholder = "No de Cédula" />            
            </div>
        </div>

        <div>
            <ol class="breadcrumb">
                <li class="active"><i class="icon-file-alt"></i> Datos De Contacto</li>
                <div style="clear: both;"></div>
            </ol>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">País(*):</label>
            <div class = "col-xs-4">
                <?php echo "<h5 style='color:red'>" . form_error('pais') . "</h5>"; ?>
                <select name="pais" id="pais" class="form-control"> 
                    <option value="">País</option>
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
            <label class = "col-xs-3 control-label">Departamento(*):</label>
            <div class = "col-xs-4">
                <?php echo "<h5 style='color:red'>" . form_error('provincia') . "</h5>"; ?>
                <select name="provincia" id="provincia" class="form-control">
                    <option value="">Selecciona tu pais</option>	
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Ciudad(*):</label>
            <div class = "col-xs-4">
                <?php echo "<h5 style='color:red'>" . form_error('localidad') . "</h5>"; ?>
                <select name="localidad" id="localidad" class="form-control">
                    <option value="">Selecciona tu departamento</option>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Dirección(*):</label>
            <div class = "col-xs-4">
                <?php echo "<h5 style='color:red'>" . form_error('direccion') . "</h5>"; ?>
                <input type = "text" class = "form-control" name = "direccion" placeholder = "Dirección" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Email:</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "email" placeholder="Correo electronico"/>
            </div>
        </div>
        <div class = "form-group">
            <label class = "col-xs-3 control-label">Teléfono(*):</label>
            <div class = "col-xs-4">
                <?php echo "<h5 style='color:red'>" . form_error('telefono') . "</h5>"; ?>
                <input type = "text" class = "form-control" name = "telefono" placeholder="Telefono" onKeyPress="return validar(event)" maxlength="10"/>
            </div>
        </div>
        <div class = "form-group">
            <label class = "col-xs-3 control-label">Celular(*):</label>
            <div class = "col-xs-4">
                <?php echo "<h5 style='color:red'>" . form_error('celular') . "</h5>"; ?>
                <input type = "text" class = "form-control" name = "celular" placeholder="Celular" onKeyPress="return validar(event)" maxlength="10"/>
            </div>
        </div>
          
        <div class = "form-group">
            <div class = "col-xs-9 col-xs-offset-3">
                <input type = "submit" class = "btn btn-primary" name = "reg_amo" value = "Guardar"/>
            </div>
        </div>
    <?php echo form_close()?>
</div><!--/#page-wrapper -->


<?php
$this->load->view('veterinario/vwFooter');
?>
