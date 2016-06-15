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
            <h1>Contratar <small> Conductor</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/empresa/Perfil/get_conductores' ?>"><i class="icon-dashboard"></i> Volver Atras</a></li>
                <li class="active"><i class="icon-file-alt"></i> Datos del contratante</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>



    <form method="post" action="<?= base_url() . 'index.php/empresa/Perfil/contratar_conductor' ?>" id="basicBootstrapForm" class="form-horizontal">
        <div class="form-group">
            <input type="hidden" name="user_id" value="<?php
            $query = $this->db->get_where('users', array('usuario' => $_SESSION['usuario']));
            if ($query->num_rows() != 0) {
                foreach ($query->result() as $row) {
                    echo $row->id;
                    $v = $row->id;
                }
            }
            ?> "/>
            <label class="col-xs-3 control-label">Nombre</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" value="<?php
                echo $row->nombre;
                ?>" disabled/>
            </div>
        </div>        

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Apellidos</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" value="<?php
                echo $row->apellidos;
                ?>" disabled/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Email</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" value="<?php
                echo $row->email;
                ?>" disabled/>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">            
                <ol class="breadcrumb">

                    <li class="active"><i class="icon-file-alt"></i> Datos del Contratista</li>

                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>
       
            <div class="form-group">
                <label class="col-xs-3 control-label">Nombre</label>
                <div class="col-xs-4">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php
                    foreach ($conxid as $fila) {
                        echo $fila->nombre;
                    }
                    ?>" disabled/>
                </div>
            </div>

            <input type="hidden" name="id" value="<?php
            foreach ($conxid as $fila) {
                echo $fila->id;
            }
            ?>"/>

            <div class = "form-group">
                <label class = "col-xs-3 control-label">Apellidos</label>
                <div class = "col-xs-4">
                    <input type = "text" class = "form-control" name = "apellidos" value="<?php
                    foreach ($conxid as $fila) {
                        echo $fila->apellidos;
                    }
                    ?>" disabled/>
                </div>
            </div>

            <div class = "form-group">
                <label class = "col-xs-3 control-label">Email</label>
                <div class = "col-xs-4">
                    <input type = "text" class = "form-control" name = "email" value="<?php
                    foreach ($conxid as $fila) {
                        echo $fila->email;
                    }
                    ?>" disabled/>
                </div>
            </div>

            <div class = "form-group">
                <label class = "col-xs-3 control-label">Asignar Vehiculo</label>
                <div class = "col-xs-4">
                    <select name="vehiculo" class="form-control"> 
                        <option>Vehiculos disponibles</option>
                        <option value="">No asignar vehiculo</option>
                        <?php
                        $consulta = $this->db->get_where('sf_vehiculo', array('user_id' => $v, 'estado' => 'libre'));

                        if ($consulta->num_rows() != 0) {
                            foreach ($consulta->result() as $row) {                   
                                echo "<option>" . $row->placa . "</option>";
                            }
                        }
                        ?>	
                    </select>                                                                                   
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
                    <button type = "submit" class = "btn btn-primary" name = "update_reg" value = "Sign up">Contratar</button>
                </div>
            </div>

        </form>


        <div><?php $mensaje ?></div>
</div><!--/#page-wrapper -->


<?php
$this->load->view('empresa/vwFooter');
?>
