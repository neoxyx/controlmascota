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
            <h1>Conductores <small></small></h1>
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
                    <th class="header">No</th>                                         
                    <th class="header">Usuario</th> 
                    <th class="header">Email</th>
                    <th class="header">Telefonos</th>
                    <th class="header">Foto cédula</th>
                    <th class="header">Foto Licencia</th>
                    <th class="header">Docs en pdf</th>
                    <th class="header">Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if ($registros) {
                    foreach ($registros as $row) {
                        echo "<tr>";
                        echo"<td>" . $row->id . "</td>";
                        echo"<td>" . $row->usuario ."</td>";
                        echo"<td>" . $row->email . "</td>";
                        echo"<td>" . $row->telefono ." ". $row->celular . "</td>";                                             
                        if ($row->foto_cedula == NULL) {
                            echo"<td>" . "No presenta" . "</td>";
                        } else {
                            echo"<td>" . $row->foto_cedula . "</td>";
                        }
                        if ($row->foto_licencia == NULL) {
                            echo"<td>" . "No presenta" . "</td>";
                        } else {
                            echo"<td>" . $row->foto_licencia . "</td>";
                        }
                        if ($row->pdf == NULL) {
                            echo"<td>" . "No presenta" . "</td>";
                        } else {
                            echo"<td>" . $row->pdf . "</td>";
                        }
                        echo"<td>" . anchor(base_url() . 'index.php/Registros/get_pendocsxid/' . $row->id, '<button type="button" class="btn btn-warning">DOCUMENTOS</button>') . "</td>";
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
