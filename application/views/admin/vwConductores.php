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
            <h1>Enturne <small>Administrador</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/admin/Users' ?>"><i class="fa fa-level-up"></i></a></li>
                <li class="active"><i class="fa fa-users"></i> Datos Conductores</li>


                <a href="<?= base_url() . 'index.php/admin/Conductores/add_conductor' ?>"><button class="btn btn-primary" type="button" style="float:right;" id="add_pais">Añadir Conductor</button></a>
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>


    <div class="table-responsive">
        <table class="table table-hover tablesorter">
            <thead>
                <tr>                                      
                    <th class="header">Nombre</th>
                    <th class="header">Apellidos </th>
                    <th class="header">Tipo de documento</th>
                    <th class="header">Edad</th>                                      
                    <th class="header">Telefonos</th>
                    <th class="header">Email</th>
                    <th class="header">Dirección</th>                   
                    <th class="header">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!$datos) {
                    echo "<tr>";
                    echo "<td>" . $mensaje . "</td>";
                    echo "</tr>";
                } else {
                    foreach ($datos as $row) {
                        echo "<tr>";
                        echo"<td>" . $row->nombre . "</td>";
                        echo"<td>" . $row->apellidos . "</td>";
                        echo"<td>" . $row->tipo_doc . " " . $row->cedula . "</td>";
                        echo"<td>" . $row->edad . "</td>";
                        echo"<td>" . $row->telefono . "<br>" . $row->celular . "</td>";
                        echo"<td>" . $row->email . "</td>";
                        echo"<td>" . $row->direccion . "</td>";
                        echo"<td>" . anchor(base_url() . 'index.php/admin/Conductores/get_conductor_xid/' . $row->id, '<button type="button" class="btn btn-warning">VER - EDITAR</button>') . "</td>";
                        echo "</tr>";
                    }
                }
                ?>   
            </tbody>
        </table>

    </div>

</div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>