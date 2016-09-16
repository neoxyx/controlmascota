<?php
$this->load->view('veterinario/vwHeader');
?>

<!--  
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->

<div id="page-wrapper">    
    <div class="row">
        <div class="col-lg-12">
            <h1>Empleados <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/veterinario/Perfil/get_empleados' ?>"><i class="fa fa-home"></i></a></li>            
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
                    <th class="header">Ciudad / Dirección</th> 
                    <th class="header">Telefonos</th>
                    <th class="header">Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (!$empleado) {
                    echo "<tr>";
                    echo "<td>" . $mensaje . "</td>";
                    echo "</tr>";
                } else {
                    foreach ($empleado as $row) {
                        echo "<tr>";
                        echo"<td>" . $row->id . "</td>";
                        echo"<td>" . $row->nombre . "  " . $row->apellidos . "</td>";
                        echo"<td>" . $row->nombre_ciudad . " / " . $row->direccion . "</td>";
                        echo"<td>" . $row->telefono . " / " . $row->celular . "</td>";                        
                        echo"<td>" . anchor(base_url() . 'index.php/veterinario/Perfil/get_empleado_xid/' . $row->id, '<button type="button" class="btn btn-warning">Editar</button>') . "</td>";
                        echo "</tr>";
                    }
                }
                ?>                
            </tbody>

        </table>


    </div>


</div><!-- /#page-wrapper -->

<?php
$this->load->view('veterinario/vwFooter');
?>

