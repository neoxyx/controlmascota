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
            <h1>Subir / Ver  <small>Documentación Vehiculos</small></h1>               
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/Registros/registros_pen_docs_total' ?>"><i class="fa fa-level-up"></i></a></li>
                <li class="active"><i class="icon-file-alt"></i> <select id="combito">
                        <option>Seleccione tipo de archivos</option>
                        <option value="1">Foto x Foto</option>
                        <option value="2">zip - rar - pdf - docx - txt</option>                   
                    </select></li> 
                <div style="clear: both;"></div>
            </ol>

        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>


    <div id="div_1" class="subida">

        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">                    
                    <li class="active"><i class="icon-file-alt"></i> Rut</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <form action="<?= base_url() . 'index.php/Registros/subir_soat' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="soat" src="<?= base_url() ?>uploads/<?php
                foreach ($registro as $row) {
                    echo $row->soat;
                }
                ?>" alt="Sin documento"/></div>
            <div align="center">
                <label>Seleccione examinar  y click en enviar</label>
                <input type="file"  name="userfile" />
                <input type="hidden"  name="id" value="<?php echo $row->idv ?>"/>
                <input type="submit" name="update_soat" value="Actualizar"/>
            </div>
        </form>

        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="icon-file-alt"></i> Revisión tecnomecanica</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

        <form action="<?= base_url() . 'index.php/Registros/subir_rtecno' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="rtecno" src="<?= base_url() ?>uploads/<?php
                foreach ($registro as $row) {
                    echo $row->rtecnomecanica;
                }
                ?>" alt="Sin documento"/></div>
            <div align="center">
                <label>Seleccione examinar  y click en enviar</label>
                <input type="file"  name="userfile" />
                <input type="hidden"  name="id" value="<?php echo $row->idv ?>"/>
                <input type="submit" name="update_rtecno" value="Actualizar"/>
            </div>
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

        <form action="<?= base_url() . 'index.php/Registros/subir_ltransito' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="ltran" src="<?= base_url() ?>uploads/<?php
                foreach ($registro as $row) {
                    echo $row->licenciatransito;
                }
                ?>" alt="Sin documento"/></div>
            <div align="center">
                <label>Seleccione examinar  y click en enviar</label>
                <input type="file"  name="userfile" />
                <input type="hidden"  name="id" value="<?php echo $row->idv ?>"/>
                <input type="submit" name="update_ltransito" value="Actualizar"/>
            </div>
        </form>       

        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="icon-file-alt"></i> Cedula propietario</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

        <form action="<?= base_url() . 'index.php/Registros/subir_ccprop' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="ccprop" src="<?= base_url() ?>uploads/<?php
                foreach ($registro as $row) {
                    echo $row->cedulapropietario;
                }
                ?>" alt="Sin documento"/></div>
            <div align="center">
                <label>Seleccione examinar  y click en enviar</label>
                <input type="file"  name="userfile" />
                <input type="hidden"  name="id" value="<?php echo $row->idv ?>"/>
                <input type="submit" name="update_ccprop" value="Actualizar"/>
            </div>
        </form>

        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="icon-file-alt"></i> RUT propietario</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

        <form action="<?= base_url() . 'index.php/Registros/subir_rutprop' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="rutprop" src="<?= base_url() ?>uploads/<?php
                foreach ($registro as $row) {
                    echo $row->rutpropietario;
                }
                ?>" alt="Sin documento"/></div>
            <div align="center">
                <label>Seleccione examinar  y click en enviar</label>
                <input type="file"  name="userfile" />
                <input type="hidden"  name="id" value="<?php echo $row->idv ?>"/>
                <input type="submit" name="update_rutprop" value="Actualizar"/>
            </div>
        </form>

        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="icon-file-alt"></i> Carnet afiliación</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

        <form action="<?= base_url() . 'index.php/Registros/subir_carnet' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="carnet" src="<?= base_url() ?>uploads/<?php
                foreach ($registro as $row) {
                    echo $row->carnetafiliacion;
                }
                ?>" alt="Sin documento"/></div>
            <div align="center">
                <label>Seleccione examinar  y click en enviar</label>
                <input type="file"  name="userfile" />
                <input type="hidden"  name="id" value="<?php echo $row->idv ?>"/>
                <input type="submit" name="update_carnet" value="Actualizar"/>
            </div>
        </form>

    </div>

    <div id="div_2" class="subida">
        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">

                    <li class="active"><i class="icon-file-alt"></i> Subir PDF</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>
        <input type="hidden" name="pdf" value=""/>
        <form action="<?= base_url() . 'index.php/Registros/subir_pdf_vehiculo' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><h4>Documento actual: <a href="<?= base_url() . 'uploads/' . $row->pdf ?>"><?php
                        echo $row->pdf;
                        ?></a></h4></div>
            <div align="center">                
                <label>Seleccione examinar  y click en enviar</label>
                <input type="file"  name="userfile" />
                <input type="hidden"  name="id" value="<?php echo $row->idv ?>"/>
                <input type="submit" name="update_pdfv" value="Actualizar"/>
            </div>
        </form>
    </div>


</div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>
