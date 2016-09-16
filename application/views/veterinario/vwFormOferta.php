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
            <h1>Crear <small> Oferta</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/empresa/Ofertas' ?>"><i class="fa fa-level-up"></i></a></li>
                <li class="active"><i class="fa fa-info"></i> Información</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

    <form method="post" action="<?php echo base_url() . 'index.php/empresa/Ofertas/guardar_oferta_empresa' ?>" id="basicBootstrapForm" class="form-horizontal">
        <div class="form-group">
            <?php
            $query = $this->db->get_where('users', array('usuario' => $_SESSION['usuario']));
            if ($query->num_rows() != 0) {
                foreach ($query->result() as $row) {
                    $id_emp = $row->id_empresa;
                }
                $cons = $this->db->get_where('sf_empresa', array('id' => $id_emp));
                if ($cons->num_rows() != 0) {
                    foreach ($cons->result() as $row) {
                        $id = $row->id;
                    }
                }
            }
            ?>
            <input type="hidden" class="form-control" name="empresa_id" value="<?php
            echo $id;
            ?> "/>

        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Origén(*):</label>
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
            <label class = "col-xs-3 control-label"></label>
            <div class = "col-xs-4">
                <select name="provincia" id="provincia" class="form-control">
                    <option value="">Selecciona tu pais</option>	
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label"></label>
            <div class = "col-xs-4">
                <select name="origen_id" id="localidad" class="form-control">
                    <option value="">Selecciona tu departamento</option>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Destino(*):</label>
            <div class = "col-xs-4">
                <select name="pais" id="pais1" class="form-control"> 
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
            <label class = "col-xs-3 control-label"></label>
            <div class = "col-xs-4">
                <select name="provincia" id="provincia1" class="form-control">
                    <option value="">Selecciona tu pais</option>	
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label"></label>
            <div class = "col-xs-4">
                <select name="destino_id" id="localidad1" class="form-control">
                    <option value="">Selecciona tu departamento</option>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Tipo de Vehiculo</label>
            <div class = "col-xs-4">
                <select class="form-control" name="tipo_vehiculo_id">    
                    <option value="">Selecciona</option>
                    <?php
                    foreach ($tipo as $val) {
                        ?>
                        <option value="<?php echo $val->id ?>"><?php echo $val->nombre_tv ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Carroceria</label>
            <div class = "col-xs-4">
                <select class = "form-control" name = "carroceria_id">
                    <option value="">Selecciona</option>
                    <?php
                    foreach ($carr as $val) {
                        ?>
                        <option value="<?php echo $val->id ?>"><?php echo $val->nombre_carr ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Cantidad de Vehiculos requeridos(*):</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "cantidad" placeholder = "No Vehiculos Req." />
            </div>
        </div>


        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fecha de cargue(*):</label>
            <div class = "col-xs-4">
                <input type = "text" readonly name = "fecha">
                <button type = "button"  onclick = "displayCalendar(document.forms[0].fecha, 'yyyy/mm/dd', this)"><i class="fa fa-calendar"></i></button>
            </div>
        </div>


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
                <button type = "submit" class = "btn btn-primary" name = "submit_reg" value = "Sign up">Crear</button>
            </div>
        </div>
    </form>

    <div><?php $mensaje ?></div>
</div><!--/#page-wrapper -->


<?php
$this->load->view('empresa/vwFooter');
?>
