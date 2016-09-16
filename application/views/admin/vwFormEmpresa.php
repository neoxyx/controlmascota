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
            <h1>Empresa <small>Ver / Editar </small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/admin/Empresas' ?>"><i class="fa fa-level-up"></i></a></li>
                <li class="active"><i class="fa fa-building"></i> Datos Empresa</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>
    
    <form method="post" action="<?php echo base_url() . 'index.php/admin/Perfil/update_empresa' ?>" id="basicBootstrapForm" class="form-horizontal">
        <div class="form-group">

            <label class="col-xs-3 control-label">Nombre</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="nombre"  value="<?php
                foreach ($datos as $key) {
                    echo $key->nombre_empresa;
                }
                ?>"/>
            </div> 
            <label class="col-xs-1 control-label">Logo</label>
            <div class="col-xs-4">
                <img id="foto_carnet" src="<?php echo base_url() ?>uploads/<?php
                echo $key->logo
                ?>" width="80px" height="50px" alt="Sin logo"/>
            </div> 
        </div>

        <div class="form-group">           
            <label class="col-xs-3 control-label">Siglas</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="siglas"  value="<?php echo $key->siglas ?>"/>
            </div>
        </div>
        
        <div class = "form-group">
            <label class = "col-xs-3 control-label">Nit</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "nit" value="<?php echo $key->nit ?>"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">País</label>
            <div class = "col-xs-4">
                <select name="pais" id="pais" class="form-control"> 
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
                    <option value="<?php echo $key->ciudad_id ?>">Selecciona tu departamento</option>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Dirección</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "direccion" value="<?php echo $key->direccion ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">           
                <ol class="breadcrumb">               
                    <li class="active"><i class="fa fa-envelope"></i> Datos De Contacto</li>
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->
        
        <div class = "form-group">
            <label class = "col-xs-3 control-label">Teléfono</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "telefono" value="<?php echo $key->telefono ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fax</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "fax" value="<?php echo $key->fax ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Email</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "email" value="<?php echo $key->email ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Web</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "web" value="<?php echo $key->web ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Representante legal</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "replegal" value="<?php echo $key->rlegal ?>"/>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">           
                <ol class="breadcrumb">               
                    <li class="active"><i class="fa fa-paper-plane"></i> Documentación</li>
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->
        
        <div class = "form-group">
            <label class = "col-xs-3 control-label">Rut</label>
            <div class = "col-xs-4">
                <a href="<?php echo base_url() . 'uploads/' . $key->rut ?>" target="parent"><?php
                    if ($key->rut) {
                        echo $key->rut;
                        ?></a><?php } else {
                        ?>
                    <a href="#"><?php echo 'No presenta';
                        ?></a><?php }
                    ?>

            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Camara de comercio</label>
            <div class = "col-xs-4">
                <a href="<?php echo base_url() . 'uploads/' . $key->camaracomercio ?>" target="parent"><?php
                    if ($key->camaracomercio) {
                        echo $key->camaracomercio;
                        ?></a><?php } else {
                        ?>
                    <a href="#"><?php echo 'No presenta';
                        ?></a><?php }
                    ?>

            </div>
        </div>

        <div class = "form-group">
            <div class = "col-xs-9 col-xs-offset-3">
                <button type = "submit" class = "btn btn-primary" name = "update_reg" >Actualizar</button>
            </div>
        </div>
    </form>

    <div><?php $mensaje ?></div>
</div><!--/#page-wrapper -->


<?php
$this->load->view('admin/vwFooter');
?>
