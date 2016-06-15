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
            <h1>Vehiculos <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/admin/Users' ?>"><i class="fa fa-level-up"></i></a></li>
                <li class="active"><i class="fa fa-truck"></i> Datos Vehiculos</li>


                <a href="<?= base_url() . 'index.php/admin/Vehiculos/add_vehiculo' ?>"><button class="btn btn-primary" type="button" style="float:right;" id="add_pais">Añadir Vehiculo</button></a>
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>


    <div class="table-responsive">
        <table class="table table-hover tablesorter">
            <thead>
                <tr> 
                    <th class="header">No</th>                   
                    <th class="header">Placa</th>   
                    <th class="header">Estado</th>
                    <th class="header">Tipo - Carroceria</th>
                    <th class="header">Venc. SOAT</th>
                    <th class="header">Venc. T.M</th>
                    <th class="header">Creado</th>                                                        
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
                        echo"<td>" . $row->idv . "</td>";
                        echo"<td>" . $row->placa . "</td>";
                        echo"<td>" . $row->activo . "</td>";
                        echo"<td>" . $row->nombre_tv . " - ".$row->nombre_carr."</td>";                    
                        echo"<td>" . $row->vence_soat . "</td>";
                        echo"<td>" . $row->vence_rtecnomecanica . "</td>";
                        echo"<td>" . $row->created_at . "</td>";
                        echo"<td>" . anchor(base_url() . 'index.php/admin/Vehiculos/get_vehiculo_xid/' . $row->idv, '<button type="button" class="btn btn-warning">VER - EDITAR</button>') . "</td>";
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
