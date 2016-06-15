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
            <h1>Clinica<small>  Crear personal</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/veterinario/Perfil/get_personal' ?>"><i class="icon-dashboard"></i> Volver</a></li>
                <li class="active"><i class="icon-file-alt"></i> Datos Personales</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>



    <form method="post" action="<?= base_url() . 'index.php/veterinario/Perfil/guardar_personal' ?>" id="basicBootstrapForm" class="form-horizontal">
        <div class="form-group">
            <label class="col-xs-3 control-label">Nombre Completo(*):</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre"></input>
            </div>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "apellidos" placeholder = "Apellidos" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">Tipo documento(*):</label>
            <div class="col-xs-4">
                <select name="tipo_doc" class="form-control">
                    <option value="CC">Cédula</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="TM">Libreta Militar</option>
                </select>
            </div>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "cedula" placeholder = "No de Cédula" />
                <input type="hidden" name="id_empresa" value="<?php
                foreach ($empresa as $value) {
                    echo $value->id;
                }
                ?>"/>
            </div>
        </div>

        <div>
            <ol class="breadcrumb">
                <li><a href=""><i class="icon-dashboard"></i> Datos De Contacto</a></li>
                <li class="active"><i class="icon-file-alt"></i> Datos De Contacto</li>

                <div style="clear: both;"></div>
            </ol>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">País</label>
            <div class = "col-xs-4">
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
            <label class = "col-xs-3 control-label">Departamento</label>
            <div class = "col-xs-4">
                <select name="provincia" id="provincia" class="form-control">
                    <option value="">Selecciona tu pais</option>	
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Ciudad</label>
            <div class = "col-xs-4">
                <select name="localidad" id="localidad" class="form-control">
                    <option value="">Selecciona tu departamento</option>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Dirección</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "direccion" placeholder = "Dirección" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Email(*):</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "email" placeholder="Correo electronico"/>
            </div>
        </div>
        <div class = "form-group">
            <label class = "col-xs-3 control-label">Teléfono(*):</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "telefono" placeholder="telefono"/>
            </div>
        </div>

        <div>
            <ol class="breadcrumb">
                <li><a href=""><i class="icon-dashboard"></i> Crear Usuario</a></li>
                <li class="active"><i class="icon-file-alt"></i> Datos Usuario</li>
                <div style="clear: both;"></div>
            </ol>
        </div>

        
                <input type = "hidden" name = "nivel" value="Veterinario"/>
           

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Nombre de Usuario(*):</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "username" placeholder="Usuario"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Contraseña(*):</label>
            <div class = "col-xs-4">
                <input type = "password" class = "form-control" name = "password" placeholder="Contraseña"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Confirmar Contraseña(*):</label>
            <div class = "col-xs-4">
                <input type = "password" class = "form-control" placeholder="Repita contraseña"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Permisos:</label>
            <div class = "col-xs-4">
                <select name="permisos" class="form-control">
                    <option value="Administrador">Administrador</option>
                    <option value="Empleado">Empleado</option>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <div class = "col-xs-9 col-xs-offset-3">
                <button type = "submit" class = "btn btn-primary" name = "reg_user" value = "Sign up">Guardar</button>
            </div>
        </div>
    </form>
</div><!--/#page-wrapper -->


<?php
$this->load->view('veterinario/vwFooter');
?>