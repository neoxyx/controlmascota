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
            <h1>Subir <small>Documentación</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/conductor/Perfil/comp_info' ?>">Volver Atras</a></li>
                <li class="active"><i class="icon-file-alt"></i> SOAT</li>               
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>



    <form action="<?php echo base_url() . 'index.php/conductor/Perfil/edit_foto_soat' ?>" enctype="multipart/form-data" method="post">
        <div align="center"><img id="foto_soat" src="<?php echo base_url() ?>uploads/<?php
            foreach ($doc as $row) {
                echo $row->soat;
            }
            ?>" alt="Sin documento"/></div>
        <div align="center">
            <label>Seleccione examinar si desea cambiar su doc SOAT y click en actualizar</label>
            <input type="file"  name="userfile" />
            <input type="submit" name="update_soat" value="Actualizar"/>
        </div>
    </form>

    <div class="row">
        <div class="col-lg-12">
            <h1> <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/conductor/Perfil/comp_info' ?>">Volver Atras</a></li>
                <li class="active"><i class="icon-file-alt"></i> Revisión Tecnomecanica</li>               
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>
    
    <form action="<?php echo base_url() . 'index.php/conductor/Perfil/edit_foto_rtecno' ?>" enctype="multipart/form-data" method="post">
        <div align="center"><img id="foto_rtm" src="<?php echo base_url() ?>uploads/<?php
                                 foreach ($rtec as $row) {
                                     echo $row->rtecnomecanica;
                                 }
                                 ?>" alt="Sin documento"/></div>
        <div align="center">
            <label>Seleccione examinar si desea cambiar su documento de RTM y click en actualizar</label>
            <input type="file"  name="userfile" />
            <input type="submit" name="update_rtm" value="Actualizar"/>
        </div>
    </form>
    
    <div class="row">
        <div class="col-lg-12">
            <h1> <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/conductor/Perfil/comp_info' ?>">Volver Atras</a></li>
                <li class="active"><i class="icon-file-alt"></i> Licencia de transito</li>               
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>
    
    <form action="<?php echo base_url() . 'index.php/conductor/Perfil/edit_foto_lict' ?>" enctype="multipart/form-data" method="post">
        <div align="center"><img id="foto_lict" src="<?php echo base_url() ?>uploads/<?php
                                 foreach ($lict as $row) {
                                     echo $row->licenciatransito;
                                 }
                                 ?>" alt="Sin documento"/></div>
        <div align="center">
            <label>Seleccione examinar si desea cambiar su documento licencia de transito y click en actualizar</label>
            <input type="file"  name="userfile" />
            <input type="submit" name="update_lict" value="Actualizar"/>
        </div>
    </form>
    
    <div class="row">
        <div class="col-lg-12">
            <h1> <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/conductor/Perfil/comp_info' ?>">Volver Atras</a></li>
                <li class="active"><i class="icon-file-alt"></i> Cedula del Propietario</li>               
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>
    
    <form action="<?php echo base_url() . 'index.php/conductor/Perfil/edit_foto_cedp' ?>" enctype="multipart/form-data" method="post">
        <div align="center"><img id="foto_cedp" src="<?php echo base_url() ?>uploads/<?php
                                 foreach ($cedp as $row) {
                                     echo $row->cedulapropietario;
                                 }
                                 ?>" alt="Sin documento"/></div>
        <div align="center">
            <label>Seleccione examinar si desea cambiar el documento cedula del propietario y click en actualizar</label>
            <input type="file"  name="userfile" />
            <input type="submit" name="update_cedp" value="Actualizar"/>
        </div>
    </form>
    
    <div class="row">
        <div class="col-lg-12">
            <h1> <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/conductor/Perfil/comp_info' ?>">Volver Atras</a></li>
                <li class="active"><i class="icon-file-alt"></i> RUT del propietario</li>               
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>
    
    <form action="<?php echo base_url() . 'index.php/conductor/Perfil/edit_foto_rutp' ?>" enctype="multipart/form-data" method="post">
        <div align="center"><img id="foto_rutp" src="<?php echo base_url() ?>uploads/<?php
                                 foreach ($rutp as $row) {
                                     echo $row->rutpropietario;
                                 }
                                 ?>" alt="Sin documento"/></div>
        <div align="center">
            <label>Seleccione examinar si desea cambiar el documento RUT del propietario y click en actualizar</label>
            <input type="file"  name="userfile" />
            <input type="submit" name="update_rutp" value="Actualizar"/>
        </div>
    </form>
    
    <div class="row">
        <div class="col-lg-12">
            <h1> <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/conductor/Perfil/comp_info' ?>">Volver Atras</a></li>
                <li class="active"><i class="icon-file-alt"></i> Carnet de Afiliación</li>               
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>
    
    <form action="<?php echo base_url() . 'index.php/conductor/Perfil/edit_foto_carnet' ?>" enctype="multipart/form-data" method="post">
        <div align="center"><img id="foto_carnet" src="<?php echo base_url() ?>uploads/<?php
                                 foreach ($carnet as $row) {
                                     echo $row->carnetafiliacion;
                                 }
                                 ?>" alt="Sin documento"/></div>
        <div align="center">
            <label>Seleccione examinar si desea cambiar el documento Carnet de Afiliación y click en actualizar</label>
            <input type="file"  name="userfile" />
            <input type="submit" name="update_carnet" value="Actualizar"/>
        </div>
    </form>

</div><!-- /#page-wrapper -->

<?php
$this->load->view('conductor/vwFooter');
?>