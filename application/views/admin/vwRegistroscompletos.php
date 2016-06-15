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
            <h1>Registros <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/admin/Dashboard' ?>"><i class="fa fa-level-up"></i></a></li>
                <li class="active"><i class="icon-file-alt"></i> Ultima semana</li>               
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
                    <th class="header">Nombre</th>   
                    <th class="header">Usuario</th> 
                    <th class="header">Email</th>
                    <th class="header">Telefono</th>
                    <th class="header">Fecha registro</th>
                    <th class="header">Estado</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if ($registros) {
                    foreach ($registros as $row) {
                        echo "<tr>";
                        echo"<td>" . $row->id . "</td>";
                        echo"<td>" . $row->nombre . "  " . $row->apellidos . "</td>";
                        echo"<td>" . $row->usuario . "</td>";
                        echo"<td>" . $row->email . "</td>";
                        echo"<td>" . $row->telefono . "</td>";
                        echo"<td>" . $row->fecha_creacion . "</td>";
                        $est0 = 'Registro no Activo';
                        $est1 = 'Registro Activado';
                        if ($row->estado == 0) {
                            echo"<td>" . $est0 . "</td>";
                        } else {
                            echo"<td>" . $est1 . "</td>";
                        }
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo "<td>" . $mensaje . "</td>";
                    echo "</tr>";
                }
                ?>                
            </tbody>

        </table>


    </div>


</div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>

