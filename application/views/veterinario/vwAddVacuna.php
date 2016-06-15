<?php
$this->load->view('veterinario/vwHeader');
foreach ($mascota as $value) {
    $id_masc=$value->id;
}
?>

<!--  
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Añadir <small> Vacuna</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/veterinario/Dashboard' ?>"><i class="icon-dashboard"></i> Volver Atras</a></li>
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

    <form method="post" action="<?= base_url() . 'index.php/veterinario/Pacientes/guardar_vacuna' ?>" id="basicBootstrapForm" class="form-horizontal">
        <div class="form-group">
            <label class="col-xs-3 control-label">Marca</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="nombre" placeholder="Marca Vacuna" ></input>
            </div>           
        </div>
        
        <div class="form-group">
            <label class="col-xs-3 control-label">Tipo</label>
            <div class="col-xs-4">
                <select name="tipo_vacuna" class="form-control">
                    <option value="Parvovirus">Parvovirus</option>
                    <option value="Distemper">Distemper (moquillo)</option>
                    <option value="Leptospirosis">Leptospirosis</option>
                    <option value="Hepatitis">Hepatitis</option>
                    <option value="Corona">Corona</option>
                    <option value="Parainfluenza">Parainfluenza</option>
                    <option value="Rabia">Rabia</option>
                </select>
            </div>           
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fecha Vacuna:</label>
            <div class = "col-xs-4">
                <input type = "text" readonly name = "theDate">
                <button type = "button"  onclick = "displayCalendar(document.forms[0].theDate, 'yyyy/mm/dd', this)"><i class="fa fa-calendar"></i>
            </div>
        </div>
        <input type="hidden" name="id_mascota" value="<?php echo $id_masc?>"/>
        
        <div class = "form-group">
            <div class = "col-xs-9 col-xs-offset-3">
                <button type = "submit" class = "btn btn-primary" name = "submit_reg" value = "Sign up">Agregar</button>
            </div>
        </div>

    </form>

    <div><?php $mensaje ?></div>
</div><!--/#page-wrapper -->


<?php
$this->load->view('veterinario/vwFooter');
?>
