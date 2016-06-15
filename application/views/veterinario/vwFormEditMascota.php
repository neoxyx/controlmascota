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
            <h1>Editar <small> Mascota</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/veterinario/Dashboard' ?>"><i class="icon-dashboard"></i> Volver Atras</a></li>
                <li class="active"><i class="icon-file-alt"></i> Datos Mascota</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

    <form method="post" action="<?= base_url() . 'index.php/veterinario/Pacientes/edit_paciente' ?>" id="basicBootstrapForm" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">

            <label class="col-xs-3 control-label">Nombre</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="nombre"  value="<?php
                foreach ($mascota as $value) {
                    echo $value->nombre;
                }
                ?>"></input>
            </div>           
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fecha de nacimiento</label>
            <div class = "col-xs-4">
                <input type = "text" readonly name = "theDate" value="<?php echo $value->fecha_nacimiento?>">
                <button type = "button"  onclick = "displayCalendar(document.forms[0].theDate, 'yyyy/mm/dd', this)"><i class="fa fa-calendar"></i>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Especie(*):</label>
            <div class = "col-xs-4">
                <select name="especies" id="especies" class="form-control"> 
                    <option value="<?php echo $value->especie?>">Actual: <?php echo $value->nombre_especie?></option>
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
                    <option value="<?php echo $value->raza?>">Actual: <?php echo $value->nombre_raza?></option>
                </select>                                                                                   
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Sexo</label>
            <div class = "col-xs-6">
                <div class = "radio">
                    <label>
                        <input type = "radio" name = "gender" value = "<?php echo $value->sexo?>" checked=""/> Actual: <?php echo $value->sexo?>
                    </label>
                </div>
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
            <label class = "col-xs-3 control-label">País</label>
            <div class = "col-xs-4">
                <select name="pais" id="pais" class="form-control"> 
                    <option value="<?php echo $value->pais_id?>">Actual: <?php echo $value->nombre_pais?></option>
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
                    <option value="<?php echo $value->dpto_id?>">Actual: <?php echo $value->nombre_dpto?></option>	
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Ciudad</label>
            <div class = "col-xs-4">
                <select name="localidad" id="localidad" class="form-control">
                    <option value="<?php echo $value->ciudad_id?>">Actual: <?php echo $value->nombre_ciudad?></option>
                </select>
            </div>
        </div>


        <div class = "form-group">
            <label class = "col-xs-3 control-label">Dirección</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "direccion" value="<?php echo $value->direccion?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Alergias</label>
            <div class = "col-xs-4">
                <textarea class = "form-control" name = "alergias"><?php echo $value->alergias?></textarea>
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
                <input type = "text" class = "form-control" name = "chip" value="<?php echo $value->chip_id?>"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fecha de instalación</label>
            <div class = "col-xs-4">
                <input type = "text" readonly name = "theDatec" value="<?php echo $value->fecha_chip?>">
                <button type = "button" onclick = "displayCalendar(document.forms[0].theDatec, 'yyyy/mm/dd', this)"><i class="fa fa-calendar"></i></button>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $value->id?>"/>
        
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-photo fa-2x"></i> Foto Perfil:</li>

                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->
        
        <div class = "form-group">
            <label class = "col-xs-3 control-label">Foto:</label>
            <div class = "col-xs-4">
                <input type = "file" class="form-control"  name = "userfile"/>
            </div>
        </div>
        
        <div class = "form-group">
            <div class = "col-xs-9 col-xs-offset-3">
                <input type = "submit" class = "btn btn-primary" name = "update_mascota" value = "Actualizar"/>
            </div>
        </div>

    </form>
</div><!--/#page-wrapper -->


<?php
$this->load->view('veterinario/vwFooter');
?>

