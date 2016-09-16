<?php
$this->load->view('amo/vwHeader');
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
            <h1>Vacunación <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/amo/Dashboard' ?>"><i class="fa fa-home"></i></a></li>
                <li class="active"><i class="icon-file-alt"></i> Mis Vacunas</li>


                <a href="<?php echo base_url() . 'index.php/amo/Mascotas/add_vacuna/'.$id_masc ?>"><button class="btn btn-info" type="button" style="float:right;" id="add_pais">Añadir Vacuna</button></a>
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
                    <th class="header">Tipo</th> 
                    <th class="header">Fecha Vacuna</th>                    
                </tr>
            </thead>
            <tbody>

                <?php
                if (!$vacunas) {
                    echo "<tr>";
                    echo "<td>" . $mensaje . "</td>";
                    echo "</tr>";
                } else {
                    foreach ($vacunas as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->nombre_vacuna ?> </td>
                            <td><?php echo $row->tipo ?> </td>
                            <td><?php echo $row->fecha_vacuna ?> </td>
                        </tr>
                        <?php
                    }
                }
                ?>                
            </tbody>
        </table>

    </div>




</div><!-- /#page-wrapper -->

<?php
$this->load->view('amo/vwFooter');
?>
