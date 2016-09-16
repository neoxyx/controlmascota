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
            <h1>Añadir Empresa <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/admin/Empresas' ?>"><i class="fa fa-level-up"></i></a></li>
                <li class="active"><i class="fa fa-building"></i> Datos Empresa</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

    <form method="post" action="<?php echo base_url() . 'index.php/admin/Empresas/guardar_empresa' ?>" id="basicBootstrapForm" class="form-horizontal">
        <div class="form-group">
            <label class="col-xs-3 control-label">Nombre</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre Empresa"/>
            </div> 
        </div>

        <div class="form-group">           
            <label class="col-xs-3 control-label">Siglas</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="siglas"  placeholder="Siglas"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Nit</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "nit" placeholder="NIT"/>
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
                    <option>Selecciona tu departamento</option>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Dirección</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "direccion" placeholder="Dirección"/>
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
                <input type = "text" class = "form-control" name = "telefono" placeholder="Teléfono" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fax</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "fax" placeholder="Fax" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Email</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "email" placeholder="Email" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Web</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "web" placeholder="Pagina Web"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Representante legal</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "replegal" placeholder="Representante legal"/>
            </div>
        </div>

        <div class = "form-group">
            <div class = "col-xs-9 col-xs-offset-3">
                <input type = "submit" class = "btn btn-primary" name = "reg_empresa" value="Guardar"/>
            </div>
        </div>
    </form>

    <div><?php $mensaje ?></div>
</div><!--/#page-wrapper -->


<?php
$this->load->view('admin/vwFooter');
?>
