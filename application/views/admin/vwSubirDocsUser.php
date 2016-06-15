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
            <h1>Subir / Ver  <small>Documentación Conductores</small></h1>               
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
                    <li class="active"><i class="icon-file-alt"></i> Cédula de ciudadania</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <form action="<?= base_url() . 'index.php/Registros/subir_foto_cc_user' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="foto_doc" src="<?= base_url() ?>uploads/<?php
                foreach ($registro as $row) {
                    echo $row->foto_cedula;
                }
                ?>" alt="Sin documento"/></div>
            <div align="center">
                <label>Seleccione examinar  y click en enviar</label>
                <input type="file"  name="userfile" />
                <input type="hidden"  name="id" value="<?php echo $row->id?>"/>
                <input type="submit" name="update_doc" value="Actualizar"/>
            </div>
        </form>

        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="icon-file-alt"></i> Licencia de conducción</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

        <form action="<?= base_url() . 'index.php/Registros/subir_foto_lic_user' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="foto_lic" src="<?= base_url() ?>uploads/<?php
                foreach ($registro as $row) {
                    echo $row->foto_licencia;
                }
                ?>" alt="Sin documento"/></div>
            <div align="center">
                <label>Seleccione examinar  y click en enviar</label>
                <input type="file"  name="userfile" />
                <input type="hidden"  name="id" value="<?php echo $row->id?>"/>
                <input type="submit" name="update_lic" value="Actualizar"/>
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
        <form action="<?= base_url() . 'index.php/Registros/subir_pdf_user' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><h4>Documento actual: <a href="<?= base_url() . 'uploads/' . $row->pdf ?>"><?php
                        echo $row->pdf;
                        ?></a></h4></div>
            <div align="center">                
                <label>Seleccione examinar  y click en enviar</label>
                <input type="file"  name="userfile" />
                <input type="hidden"  name="id" value="<?php echo $row->id?>"/>
                <input type="submit" name="update_pdf" value="Actualizar"/>
            </div>
        </form>
    </div>


</div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>