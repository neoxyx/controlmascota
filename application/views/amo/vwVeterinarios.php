<?php
$this->load->view('amo/vwHeader');
?>

<!--  
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->

<div id="page-wrapper">    
    <div class="row">
        <div class="col-lg-12">
            <h1>Centros Medicos Veterinarios<small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/amo/Dashboard' ?>"><i class="fa fa-home"></i></a></li>
                <li class="active"><i class="icon-file-alt"></i> Veterinarios</li>
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
                    <th class="header">Dirección</th> 
                    <th class="header">Telefonos</th>                    
                    <th class="header">Email</th>
                    <th class="header">Web</th>
                    <th class="header">Especialidades</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (!$veterinarios) {
                    echo "<tr>";
                    echo "<td>" . $mensaje . "</td>";
                    echo "</tr>";
                } else {
                    foreach ($veterinarios as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->nombre_empresa ?> </td>
                            <td><?php echo $row->direccion ?> </td>
                            <td><?php echo $row->telefono ?></td>
                            <td><?php echo $row->email ?> </td>
                            <td><?php echo $row->web ?></td>
                            <td><?php echo $row->especialidades ?></td>
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