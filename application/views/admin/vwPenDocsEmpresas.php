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
            <h1>Empresas<small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/Registros/registros_pen_docs_total' ?>"><i class="fa fa-level-up"></i></a></li>
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
                    <th class="header">Empresa</th>                    
                    <th class="header">Rut</th>
                    <th class="header">Camara de comercio</th>
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
                        echo"<td>" . $row->nombre_empresa ."</td>";                                                                   
                        if ($row->rut == NULL) {
                            echo"<td>" . "No presenta" . "</td>";
                        } else {
                            echo"<td>" . $row->rut . "</td>";
                        }
                        if ($row->camaracomercio == NULL) {
                            echo"<td>" . "No presenta" . "</td>";
                        } else {
                            echo"<td>" . $row->camaracomercio . "</td>";
                        }
                        if ($row->pdf == NULL) {
                            echo"<td>" . "No presenta" . "</td>";
                        } else {
                            echo"<td>" . $row->pdf . "</td>";
                        }
                        echo"<td>" . anchor(base_url() . 'index.php/Registros/get_pendocs_emp_xid/' . $row->id, '<button type="button" class="btn btn-warning">DOCUMENTOS</button>') . "</td>";
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
