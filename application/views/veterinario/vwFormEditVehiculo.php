<?php
$this->load->view('empresa/vwHeader');
?>

<!--  
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Datos <small> Vehiculo</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/empresa/Perfil/get_vehiculos' ?>"><i class="icon-dashboard"></i> Volver Atras</a></li>
                <li class="active"><i class="icon-file-alt"></i> Datos Vehiculo</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>



    <form method="post" action="<?php echo base_url() . 'index.php/empresa/Perfil/update_vehiculo' ?>" id="basicBootstrapForm" class="form-horizontal">
        <div class="form-group">
            <input type="hidden" name="user_id" value="<?php
            $query = $this->db->get_where('users', array('usuario' => $_SESSION['usuario']));
            if ($query->num_rows() != 0) {
                foreach ($query->result() as $row) {
                    echo $row->id;
                }
            }
            ?> "/>
            <label class="col-xs-3 control-label">Placa</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="placa" placeholder="Placa" value="<?php
                foreach ($vehiculo as $fila) {
                    echo $fila->placa;
                }
                ?>" disabled=""/>
            </div>
        </div>

        <input type="hidden" name="id" value="<?php
        echo $fila->idv;
        ?>"/>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Ciudad Matricula</label>
            <div class = "col-xs-4">
                <input type="text" class="form-control" value="<?php
                echo $fila->nombre_ciudad;
                ?>" disabled=""/>                                                                                                 
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Tipo de Vehiculo</label>
            <div class = "col-xs-4">
                <input type="text" class="form-control" value="<?php
                echo $fila->nombre_tv;
                ?>" disabled=""/>                                                                                                 
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Carroceria</label>
            <div class = "col-xs-4">
                <input type="text" class="form-control" value="<?php
                echo $fila->nombre_carr;
                ?>" disabled=""/>  
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Trailer</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" value="<?php
                echo $fila->trailer;
                ?>" disabled=""/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Marca Trailer</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" value="<?php
                echo $fila->trailermarca;
                ?>" disabled=""/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Satelite</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "satelite" value="<?php
                echo $fila->satelite;
                ?> " disabled=""/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Usuario Satelite</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "sateliteusuario" value="<?php
                echo $fila->sateliteusuario;
                ?>" disabled=""/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Clave Satelite</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "sateliteclave" value="<?php
                echo $fila->sateliteclave;
                ?>" disabled=""/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Repotenciación</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "repotenciacion" value="<?php
                echo $fila->repotenciacion;
                ?>" disabled=""/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Modelo</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "modelo" value="<?php
                echo $fila->modelo;
                ?>" disabled=""/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Marca</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "modelo" value="<?php
                echo $fila->marca;
                ?>" disabled=""/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Capacidad de carga</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "capacidad_carga" value="<?php
                foreach ($vehiculo as $fila) {
                    echo $fila->capacidad_carga;
                }
                ?>" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fecha de vencimiento SOAT</label>
            <div class = "col-xs-4">
                <input type = "text" class="form-control" readonly name = "vence_soat" value="<?php
                foreach ($vehiculo as $fila) {
                    echo $fila->vence_soat;
                }
                ?>" disabled/>

            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fecha de vencimiento TM</label>
            <div class = "col-xs-4">
                <input type = "text" class="form-control" readonly name = "vence_rtecnomecanica" value="<?php
                foreach ($vehiculo as $fila) {
                    echo $fila->vence_rtecnomecanica;
                }
                ?>" disabled/>

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
        </div>

        <div class = "form-group">
            <div class = "col-xs-9 col-xs-offset-3">
                <button type = "submit" class = "btn btn-primary" name = "update_reg" value = "Sign up">Actualizar</button>
            </div>
        </div>-->
    </form>

    <div class="row">
        <div class="col-lg-12">
            <h1>Documentación  <small></small></h1>               
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/conductor/Correo/send_mail' ?>"><button type="button" class="btn btn-warning">Enviar correo para solicitar cambio de documentos y/o datos</button></a></li>
                <!--<li class="active"><i class="icon-file-alt"></i> <select id="combito">
                        <option>Seleccione tipo de archivos</option>
                        <option value="1">Foto x Foto</option>
                        <option value="2">zip - rar - pdf - docx - txt</option>                   
                    </select></li>--> 
                <div style="clear: both;"></div>
            </ol>

        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

    <div>
        <div class="row">
            <div class="col-lg-12">

                <ol class="breadcrumb">

                    <li class="active"><i class="icon-file-alt"></i> SOAT</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

        <form action="<?php echo base_url() . 'index.php/empresa/Perfil/edit_foto_soat' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="foto_soat" src="<?php echo base_url() ?>uploads/<?php
                foreach ($vehiculo as $row) {
                    echo $row->soat;
                }
                ?>" alt="Sin documento"/></div>
            <!--<div align="center">
                <input type="hidden" name="idv" value="<?php echo $row->idv ?>"/>
                <label>Seleccione examinar si desea cambiar su doc SOAT y click en actualizar</label>
                <input type="file"  name="userfile" />
                <input type="submit" name="update_soat" value="Actualizar"/>
            </div>-->
        </form>

        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">

                    <li class="active"><i class="icon-file-alt"></i> Revisión Tecnomecanica</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

        <form action="<?php echo base_url() . 'index.php/empresa/Perfil/edit_foto_rtecno' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="foto_rtm" src="<?php echo base_url() ?>uploads/<?php
                echo $row->rtecnomecanica
                ?>" alt="Sin documento"/></div>
            <!--<div align="center">
                <input type="hidden" name="idv" value="<?php echo $row->idv ?>"/>
                <label>Seleccione examinar si desea cambiar su documento de RTM y click en actualizar</label>
                <input type="file"  name="userfile" />
                <input type="submit" name="update_rtm" value="Actualizar"/>
            </div>-->
        </form>

        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">

                    <li class="active"><i class="icon-file-alt"></i> Licencia de transito</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

        <form action="<?php echo base_url() . 'index.php/empresa/Perfil/edit_foto_lict' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="foto_lict" src="<?php echo base_url() ?>uploads/<?php
                echo $row->licenciatransito
                ?>" alt="Sin documento"/></div>
            <!--<div align="center">
                <input type="hidden" name="idv" value="<?php echo $row->idv ?>"/>
                <label>Seleccione examinar si desea cambiar su documento licencia de transito y click en actualizar</label>
                <input type="file"  name="userfile" />
                <input type="submit" name="update_lict" value="Actualizar"/>
            </div>-->
        </form>

        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">

                    <li class="active"><i class="icon-file-alt"></i> Cedula del Propietario</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

        <form action="<?php echo base_url() . 'index.php/empresa/Perfil/edit_foto_cedp' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="foto_cedp" src="<?php echo base_url() ?>uploads/<?php
                echo $row->cedulapropietario;
                ?>" alt="Sin documento"/></div>
            <!--<div align="center">
                <input type="hidden" name="idv" value="<?php echo $row->idv ?>"/>
                <label>Seleccione examinar si desea cambiar el documento cedula del propietario y click en actualizar</label>
                <input type="file"  name="userfile" />
                <input type="submit" name="update_cedp" value="Actualizar"/>
            </div>-->
        </form>

        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">

                    <li class="active"><i class="icon-file-alt"></i> RUT del propietario</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

        <form action="<?php echo base_url() . 'index.php/empresa/Perfil/edit_foto_rutp' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="foto_rutp" src="<?php echo base_url() ?>uploads/<?php
                echo $row->rutpropietario
                ?>" alt="Sin documento"/></div>
            <!--<div align="center">
                <input type="hidden" name="idv" value="<?php echo $row->idv ?>"/>
                <label>Seleccione examinar si desea cambiar el documento RUT del propietario y click en actualizar</label>
                <input type="file"  name="userfile" />
                <input type="submit" name="update_rutp" value="Actualizar"/>
            </div>-->
        </form>

        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">

                    <li class="active"><i class="icon-file-alt"></i> Foto remolque</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

        <form action="<?php echo base_url() . 'index.php/empresa/Perfil/edit_foto_remolque' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="foto_remol" src="<?php echo base_url() ?>uploads/<?php
                echo $row->remolque
                ?>" alt="Sin documento"/></div>
            <!--<div align="center">
                <input type="hidden" name="idv" value="<?php echo $row->idv ?>"/>
                <label>Seleccione examinar si desea cambiar foto del remolque y click en actualizar</label>
                <input type="file"  name="userfile" />
                <input type="submit" name="update_remol" value="Actualizar"/>
            </div>-->
        </form>

        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">

                    <li class="active"><i class="icon-file-alt"></i> Carnet de Afiliación</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

        <form action="<?php echo base_url() . 'index.php/empresa/Perfil/edit_foto_carnet' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="foto_carnet" src="<?php echo base_url() ?>uploads/<?php
                echo $row->carnetafiliacion
                ?>" alt="Sin documento"/></div>
            <!--<div align="center">
                <input type="hidden" name="idv" value="<?php echo $row->idv ?>"/>
                <label>Seleccione examinar si desea cambiar el documento Carnet de Afiliación y click en actualizar</label>
                <input type="file"  name="userfile" />
                <input type="submit" name="update_carnet" value="Actualizar"/>
            </div>-->
        </form>
    </div>

    <div>
        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">

                    <li class="active"><i class="icon-file-alt"></i> Documentos en PDF</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

        <form action="<?php echo base_url() . 'index.php/empresa/Perfil/edit_pdf' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><h4>Documento actual: <a href="<?php echo base_url() . 'uploads/' . $row->pdf ?>"><?php
                        echo $row->pdf;
                        ?></a></h4></div>

            <!--<div align="center">
                <input type="hidden" name="idv" value="<?php echo $row->idv ?>"/>
                <label>Seleccione examinar si desea cambiar el PDF y click en actualizar</label>
                <input type="file"  name="userfile" />
                <input type="submit" name="update_pdf" value="Actualizar"/>
            </div>-->
        </form>
    </div>

    <div><?php $mensaje
                        ?></div>
</div><!--/#page-wrapper -->


<?php
$this->load->view('empresa/vwFooter');
?>

