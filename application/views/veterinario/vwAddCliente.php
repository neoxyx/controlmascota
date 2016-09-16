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
            <h1>Añadir <small> Cliente</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/veterinario/Dashboard' ?>"><i class="fa fa-dashboard fa-2x"></i></a></li>
                <li class="active"><i class="icon-file-alt"></i> Datos del Cliente</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

    <form method="post" action="<?php echo base_url() . 'index.php/veterinario/Clientes/guardar_cliente' ?>" id="basicBootstrapForm" class="form-horizontal">

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Tipo de Documento(*):</label>
            <div class = "col-xs-4">
                <select name="xtipodoc" class="form-control">
                    <option value="">Seleccionar:</option>
                    <?php
                    foreach ($tiposdoc as $fila) {
                        ?>
                        <option value="<?php echo $fila->codigo ?>"><?php echo $fila->nombre ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">Identificación(*):</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="xidentifica" placeholder="Número de Documento" value=""></input>
            </div>
        </div>
        <div class="form-group">
           <label class="col-xs-3 control-label">Nombres(*):</label>
           <div class="col-xs-4">
              <input type="text" class="form-control" name="xnombres" placeholder="Nombres" value=""></input>
           </div>
        </div>
        <div class="form-group">
            <label class="col-xs-3 control-label">Apellidos(*):</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="xapellidos" placeholder="Apellidos" value=""></input>
            </div>
        </div>
        <div class = "form-group">
            <label class = "col-xs-3 control-label">País(*):</label>
            <div class = "col-xs-4">
                <select name="xpais" id="pais" class="form-control">
                    <option value="">País</option>
                    <?php
                    foreach ($paises as $fila) {
                        ?>
                        <option value="<?php echo $fila->id ?>"><?php echo $fila->nombre_pais ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class = "form-group">
            <label class = "col-xs-3 control-label">Departamento(*):</label>
            <div class = "col-xs-4">
                <select name="xdepto" id="provincia" class="form-control">
                    <option value="">Selecciona tu pais</option>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Ciudad(*):</label>
            <div class = "col-xs-4">
                <select name="xciudad" id="localidad" class="form-control">
                    <option value="">Selecciona tu departamento</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-3 control-label">Dirección:</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="xdireccion" placeholder="Ingrese Dirección de Residencia" value=""></input>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-3 control-label">Celulares(*):</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="xcelulares" placeholder="Números de Celular" value=""></input>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-3 control-label">Teléfono Fijo:</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="xtelfijo" placeholder="Número de Teléfono Fijo" value=""></input>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-3 control-label">email:</label>
            <div class="col-xs-4">
                <input type="email" class="form-control" name="xemail" placeholder="Correo Electrónico" value=""></input>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-3 control-label">Día Cumpleaños:</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="xdiacumple" placeholder="" value=""></input>
            </div>
         </div>
         <div class="form-group">
            <label class="col-xs-3 control-label">Mes Cumpleaños:</label>
            <div class = "col-xs-4">
               <select name="xmescumple" class="form-control">
                    <option value="">Seleccione Mes de Cumpleaños:</option>
                    <option value="Enero">Enero</option>
                    <option value="Febrero">Febrero</option>
                    <option value="Marzo">Marzo</option>
                    <option value="Abril">Abril</option>
                    <option value="Mayo">Mayo</option>
                    <option value="Junio">Junio</option>
                    <option value="Julio">Julio</option>
                    <option value="Agosto">Agosto</option>
                    <option value="Septiembre">Septiembre</option>
                    <option value="Octubre">Octubre</option>
                    <option value="Noviembre">Noviembre</option>
                    <option value="Diciembre">Diciembre</option>
               </select>
            </div>
        </div>
        <div class = "form-group">
            <label class = "col-xs-3 control-label">Ocupación(*):</label>
            <div class = "col-xs-4">
                <select name="xocupacion" id="ocupacion" class="form-control">
                    <option value="">Ocupación</option>
                    <?php
                    foreach ($ocupaciones as $fila) {
                        ?>
                        <option value="<?php echo $fila->codigo ?>"><?php echo $fila->nombre ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
       <div class = "form-group">
            <label class = "col-xs-3 control-label">Sexo(*):</label>
            <div class = "col-xs-6">
                <div class = "radio">
                    <label>
                        <input type = "radio" name = "xgenero" value = "M" /> Masculino
                    </label>
                </div>
                <div class = "radio">
                    <label>
                        <input type = "radio" name = "genero" value = "F" /> Femenino
                    </label>
                </div>
            </div>
        </div>
        <div class = "form-group">
            <div class = "col-xs-9 col-xs-offset-3">
                <button type = "submit" class = "btn btn-primary" name = "reg_cliente" value = "Sign up">Agregar</button>
            </div>
        </div>

    </form>

    <div><?php $mensaje ?></div>
</div><!--/#page-wrapper -->


<?php
$this->load->view('veterinario/vwFooter');
?>
