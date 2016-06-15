<?php
$this->load->view('admin/vwHeader');
?>

<!--  
Author : Jhon Jairo Valdés Aristizabal
http://www.hosting4world.com
-->

<div id="page-wrapper">    
    <div class="row">
        <div class="col-lg-12">
            <h1>Vehiculos <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/Registros/registros_pen_docs_total' ?>"><i class="fa fa-level-up"></i></a></li>
                <li class="active"><i class="fa fa-paper-plane"></i> Pendientes Documentación</li>               
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>


    <div class="table-responsive">
        <table class="table table-hover tablesorter">
            <thead>
                <tr> 
                    <th class="header">Placa</th>                                         
                    <th class="header">SOAT</th> 
                    <th class="header">Tecnomecanica</th>
                    <th class="header">Licencia de transito</th>
                    <th class="header">Cédula de propietario</th>
                    <th class="header">RUT Propietario</th>
                    <th class="header">Carnet de afiliación</th>
                    <th class="header">Docs en pdf</th>
                    <th class="header">Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if ($registros) {
                    foreach ($registros as $row) {
                        echo "<tr>";                        
                        echo"<td>" . $row->placa ."</td>";                                                                 
                        if ($row->soat == NULL) {
                            echo"<td>" . "No presenta" . "</td>";
                        } else {
                            echo"<td>" . $row->soat . "</td>";
                        }
                        if ($row->rtecnomecanica == NULL) {
                            echo"<td>" . "No presenta" . "</td>";
                        } else {
                            echo"<td>" . $row->rtecnomecanica . "</td>";
                        }
                        if ($row->licenciatransito == NULL) {
                            echo"<td>" . "No presenta" . "</td>";
                        } else {
                            echo"<td>" . $row->licenciatransito . "</td>";
                        }
                        if ($row->cedulapropietario == NULL) {
                            echo"<td>" . "No presenta" . "</td>";
                        } else {
                            echo"<td>" . $row->cedulapropietario . "</td>";
                        }
                        if ($row->rutpropietario == NULL) {
                            echo"<td>" . "No presenta" . "</td>";
                        } else {
                            echo"<td>" . $row->rutpropietario . "</td>";
                        }
                        if ($row->carnetafiliacion == NULL) {
                            echo"<td>" . "No presenta" . "</td>";
                        } else {
                            echo"<td>" . $row->carnetafiliacion . "</td>";
                        }
                        if ($row->pdf == NULL) {
                            echo"<td>" . "No presenta" . "</td>";
                        } else {
                            echo"<td>" . $row->pdf . "</td>";
                        }
                        echo"<td>" . anchor(base_url() . 'index.php/Registros/get_pendocs_vehiculoxid/' . $row->idv, '<button type="button" class="btn btn-warning">DOCUMENTOS</button>') . "</td>";
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
