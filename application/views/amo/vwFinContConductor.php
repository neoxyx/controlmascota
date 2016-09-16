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
            <h1>Finalizar Contrato <small> Conductor</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/conductor/Perfil/get_conductores_contratados' ?>"><i class="icon-dashboard"></i> Volver Atras</a></li>
                <li class="active"><i class="icon-file-alt"></i> Datos Personales</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>



    <form method="post" action="<?php echo base_url() . 'index.php/conductor/Perfil/finalizar_contrato_conductor' ?>" id="basicBootstrapForm" class="form-horizontal">
        <div class="form-group">
            <input type="hidden" name="user_id" value="<?php
            $query = $this->db->get_where('users', array('usuario' => $_SESSION['usuario']));
            if ($query->num_rows() != 0) {
                foreach ($query->result() as $row) {
                    echo $row->id;
                }
            }
            ?> "/>
            <label class="col-xs-3 control-label">Nombre</label>
            <div class="col-xs-4">
                <input type="text" class="form-control" name="nombre" value="<?php
                foreach ($conxid as $fila) {
                    echo $fila->nombre;
                }
                ?>" disabled/>
            </div>
        </div>

        <input type="hidden" name="id" value="<?php
        foreach ($conxid as $fila) {
            echo $fila->id;
            $id = $fila->id;
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
            <label class = "col-xs-3 control-label">Vehiculo Asignado</label>
            <div class = "col-xs-4">               
                <input type = "text"  class = "form-control"  value="<?php
                $consulta = $this->db->get_where('sf_vehiculo', array('conductor_id' => $id));

                if ($consulta->num_rows() != 0) {
                    foreach ($consulta->result() as $row) {
                        echo $row->placa;
                    }
                }
                else{
                    echo "Sin vehiculo";
                }
                ?>" disabled/>
                <input type = "hidden"  name="vehiculo"  value="<?php
                $consulta = $this->db->get_where('sf_vehiculo', array('conductor_id' => $id));

                if ($consulta->num_rows() != 0) {
                    foreach ($consulta->result() as $row) {
                        echo $row->placa;
                    }
                }
                else{
                    echo "Sin vehiculo";
                }
                ?>"/>
            </div>
        </div>

        <div class = "form-group">
            <div class = "col-xs-9 col-xs-offset-3">
                <button type = "submit" class = "btn btn-primary" name = "update_reg" value = "Sign up">Finalizar Contrato</button>
            </div>
        </div>

    </form>


    <div><?php $mensaje ?></div>
</div><!--/#page-wrapper -->


<?php
$this->load->view('conductor/vwFooter');
?>