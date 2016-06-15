<?php
$this->load->view('conductor/vwHeader');
?>

<!--  
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Mi Documentación<small></small></h1>               
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/conductor/Perfil/comp_info' ?>">Volver Atras</a></li>
                <!--<li class="active"><i class="icon-file-alt"></i> <select id="combito">
                        <option>Seleccione tipo de archivos</option>
                        <option value="1">Foto x Foto</option>
                        <option value="2">zip - rar - pdf - docx - txt</option>                   
                    </select></li> -->
                <div style="clear: both;"></div>
            </ol>

        </div>
    </div><!-- /.row -->
    
    <div class="row">
        <div class="col-lg-12">                     
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/conductor/Correo' ?>"><button type="button" class="btn btn-warning">Enviar correo para solicitar cambio de documentos y/o datos bloqueados</button></a></li>
                <!--<li class="active"><i class="icon-file-alt"></i> <select id="combito">
                        <option>Seleccione tipo de archivos</option>
                        <option value="1">Foto x Foto</option>
                        <option value="2">zip - rar - pdf - docx - txt</option>                   
                    </select></li> -->
                <div style="clear: both;"></div>
            </ol>

        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>


    <div>

        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">                    
                    <li class="active"><i class="icon-file-alt"></i> Cédula de ciudadania</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <form action="<?= base_url() . 'index.php/conductor/Perfil/edit_foto_doc' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="foto_doc" src="<?= base_url() ?>uploads/<?php
                foreach ($doc as $row) {
                    echo $row->foto_cedula;
                }
                ?>" alt="Sin documento"/></div>
            <!--<div align="center">
                <label>Seleccione examinar si desea cambiar su foto de cedula y click en actualizar</label>
                <input type="file"  name="userfile" />
                <input type="submit" name="update_doc" value="Actualizar"/>
            </div>-->
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

        <form action="<?= base_url() . 'index.php/conductor/Perfil/edit_foto_lic' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><img id="foto_lic" src="<?= base_url() ?>uploads/<?php
                foreach ($lic as $row) {
                    echo $row->foto_licencia;
                }
                ?>" alt="Sin documento"/></div>
            <!--<div align="center">
                <label>Seleccione examinar si desea cambiar su documento de licencia y click en actualizar</label>
                <input type="file"  name="userfile" />
                <input type="submit" name="update_lic" value="Actualizar"/>
            </div>-->
        </form>
    </div>

    <div>
        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">

                    <li class="active"><i class="icon-file-alt"></i> Documentos en pdf</li>               
                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>
        <input type="hidden" name="pdf" value="<?php
        foreach ($perfil as $row) {
            echo $row->pdf;
        }
        ?>"/>
        <form action="<?= base_url() . 'index.php/conductor/Perfil/edit_user_pdf' ?>" enctype="multipart/form-data" method="post">
            <div align="center"><h4>Documento Actual:<a href="<?= base_url() . 'uploads/' . $row->pdf ?>" target="parent"> <?php echo $row->pdf?></a></h4></div>
            <!--<div align="center">                
                <label>Seleccione examinar si desea cambiar el PDF y click en actualizar</label>
                <input type="file"  name="userfile" />
                <input type="submit" name="update_pdf" value="Actualizar"/>
            </div>-->
        </form>
    </div>


</div><!-- /#page-wrapper -->

<?php
$this->load->view('conductor/vwFooter');
?>