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
            <h1>Veterinario<small>  Crear Clinica</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/veterinario/Perfil/get_empresa' ?>"><i class="fa fa-home"></i></a></li>
                <li class="active"><i class="icon-file-alt"></i> Datos Clinica</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>



    <form  action="<?= base_url() . 'index.php/veterinario/Perfil/guardar_empresa' ?>" enctype="multipart/form-data" method="post" id="basicBootstrapForm" class="form-horizontal" >
        <input type="hidden" name="id" value="<?php
        foreach ($user as $key) {
            echo $key->id;
        }
        ?>">
        <input type="hidden" name="rlegal" value="<?php
        echo $key->nombre . " " . $key->apellidos;
        ?>">
        <div class="form-group">
            <label class="col-xs-3 control-label">Nombre(*):</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="name" placeholder="Nombre"></input>
            </div>           
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">Siglas(*):</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="siglas" placeholder="Siglas"></input>
            </div>           
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">Nit(*):</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="nit" placeholder="Nit"></input>
            </div>           
        </div>

        <div>
            <ol class="breadcrumb">
                <li class="active"><i class="icon-file-alt"></i> Datos De Contacto</li>

                <div style="clear: both;"></div>
            </ol>
        </div>       

        <div class = "form-group">
            <label class = "col-xs-3 control-label">País</label>
            <div class = "col-xs-4">
                <select name="pais" id="pais" class="form-control"> 
                    <option>Seleccione pais:</option>

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
                    <option>Selecciona tu pais</option>	
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Ciudad</label>
            <div class = "col-xs-4">
                <select name="localidad" id="localidad" class="form-control">
                    <option>Selecciona tu departamento</option>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Dirección(*):</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "direccion" placeholder="Dirección"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Teléfono(*):</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "telefono" placeholder="telefono"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fax(*):</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "fax" placeholder="Fax"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Email(*):</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "email" placeholder="Correo Electronico"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Web(*):</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "web" placeholder="Web"/>
            </div>
        </div>
        
        <div class = "form-group">
            <label class = "col-xs-3 control-label">Representante legal:</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "rlegal" placeholder="Representante legal"/>
            </div>
        </div>

        <!--<div>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-upload"></i></li>

                <div style="clear: both;"></div>
            </ol>
        </div> 

        <div class = "form-group"> 
            <label class = "col-xs-3 control-label">Tipo de subida:</label>
            <div class = "col-xs-4">
                <select id="combito" class="form-control">
                    <option>Seleccione tipo de archivos</option>
                    <option value="1">Foto x Foto</option>
                    <option value="2">zip - rar - pdf - docx - txt</option>                   
                </select>
            </div>
        </div>

        <div id="div_1" class="subida">
            <div class = "form-group">
                <label class = "col-xs-3 control-label">Rut(*):</label>
                <div class = "col-xs-4">
                    <input type = "file"  name = "rut" />
                </div>
            </div>
            <div class = "form-group">
                <label class = "col-xs-3 control-label">Camara de comercio(*):</label>
                <div class = "col-xs-4">
                    <input type = "file"  name = "camara" />
                </div>
            </div>
            <div class = "form-group">
                <label class = "col-xs-3 control-label">Logo:</label>
                <div class = "col-xs-4">
                    <input type = "file"  name = "logo" />
                </div>
            </div>
        </div>

        <div id="div_2" class="subida">
            <div class = "form-group">
                <label class = "col-xs-3 control-label">Documentos en un solo archivo:</label>
                <div class = "col-xs-4">
                    <input type = "file"  name = "pdf" />
                </div>
            </div>           
        </div>-->

        <div class = "form-group">
            <div class = "col-xs-6 col-xs-offset-3">
                <div class = "checkbox">
                    <label>
                        <input type = "checkbox" name = "agree" value = "agree" /> Acepto los terminos y condiciones
                    </label>
                </div>
            </div>
        </div>

        <div class = "form-group">
            <div class = "col-xs-9 col-xs-offset-3">
                <button type = "submit" class = "btn btn-primary" name = "reg_empresa" value = "Sign up">Guardar</button>
            </div>
        </div>
    </form>
</div><!--/#page-wrapper -->


<?php
$this->load->view('veterinario/vwFooter');
?>
