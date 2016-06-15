<?php
$this->load->view('amo/vwHeader');
?>

<!--
Author : Abhishek R. Kaushik
Downloaded from http://devzone.co.in
-->

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Añadir <small> Mascota</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/amo/Mascotas' ?>"><i class="icon-dashboard"></i> Volver Atras</a></li>
                <li class="active"><i class="icon-file-alt"></i> Datos Mascota</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

    <form method="post" action="<?= base_url() . 'index.php/amo/Mascotas/guardar_mascota' ?>" id="basicBootstrapForm" class="form-horizontal">
        <div class="form-group">

            <label class="col-xs-3 control-label">Nombre</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" value=""></input>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fecha de nacimiento</label>
            <div class = "col-xs-4">
                <input type = "text" readonly name = "fecha_nac">
                <button type = "button"  onclick = "displayCalendar(document.forms[0].fecha_nac, 'yyyy/mm/dd', this)"><i class="fa fa-calendar"></i>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Especie(*):</label>
            <div class = "col-xs-4">
                <select name="especies" id="especies" class="form-control">
                    <option value="">Seleccionar:</option>
                    <?php
                    foreach ($especies as $fila) {
                        ?>
                        <option value="<?= $fila->id ?>"><?= $fila->nombre_especie ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Raza(*):</label>
            <div class = "col-xs-4">
                <select name="raza" id="raza" class="form-control">
                    <option value="">Seleccione Raza</option>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Sexo</label>
            <div class = "col-xs-6">
                <div class = "radio">
                    <label>
                        <input type = "radio" name = "gender" value = "Macho" /> Macho
                    </label>
                </div>
                <div class = "radio">
                    <label>
                        <input type = "radio" name = "gender" value = "Hembra" /> Hembra
                    </label>
                </div>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Esterilizado:</label>
            <div class = "col-xs-6">
                <div class = "radio">
                    <label>
                        <input type = "radio" name = "esteril" value = "Si" /> Si
                    </label>
                </div>
                <div class = "radio">
                    <label>
                        <input type = "radio" name = "esteril" value = "No" /> No
                    </label>
                </div>
            </div>
        </div>
        <div class = "form-group">
            <label class = "col-xs-3 control-label">Alergias</label>
            <div class = "col-xs-4">
                <textarea class = "form-control" name = "alergias"></textarea>
            </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="icon-file-alt"></i> Datos Chip</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Numero de chip</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "chip" placeholder = "# Chip" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fecha de instalación</label>
            <div class = "col-xs-4">
                <input type = "text" readonly name = "fecha_chip">
                <button type = "button" onclick = "displayCalendar(document.forms[0].fecha_chip, 'yyyy/mm/dd', this)"><i class="fa fa-calendar"></i></button>
            </div>
        </div>

        <div class = "form-group">
            <div class = "col-xs-9 col-xs-offset-3">
                <button type = "submit" class = "btn btn-primary" name = "submit_reg" value = "Sign up">Agregar</button>
            </div>
        </div>

    </form>

    <div><?php $mensaje ?></div>
</div><!--/#page-wrapper -->


<?php
$this->load->view('amo/vwFooter');
?>
