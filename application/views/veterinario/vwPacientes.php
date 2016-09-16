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
            <h1>Pacientes <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/veterinario/Dashboard' ?>"><i class="fa fa-home"></i></a></li>
                <li class="active"><i class="icon-file-alt"></i> Pacientes</li>
                <a href="<?php echo base_url() . 'index.php/veterinario/Pacientes/add_paciente' ?>"><button class="btn btn-info" type="button" style="float:right;" id="add_pais">Añadir Paciente</button></a>
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
                    <th class="header">Raza</th> 
                    <th class="header">Amo</th>
                    <th class="header">Ciudad / Dirección</th> 
                    <th class="header">Telefonos</th>                                    
                </tr>
            </thead>
            <tbody>
                <?php
                if (!$pacientes) {
                    echo "<tr>";
                    echo "<td>" . $mensaje . "</td>";
                    echo "</tr>";
                } else {
                    foreach ($pacientes as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->id ?> </td>
                            <td><?php echo $row->nombre ?> </td>
                            <td><?php echo $row->nombre_raza ?></td>
                            <td><?php echo $row->amo ." ". $row->apellidos ?> </td>
                            <td><?php echo $row->nombre_ciudad . " / " . $row->direccion ?></td>
                            <td><?php echo $row->telefono . "</br>" . $row->celular ?></td>
                            <td><img id="foto_perfil" src="<?php echo base_url() ?>uploads/<?php echo $row->foto_mascota ?>"/></td>
                            <td><?php echo anchor(base_url() . 'index.php/veterinario/Pacientes/historia_clinica/' . $row->id, '<i class="fa fa-stethoscope fa-2x"></>', array('title' => 'Historia Clinica')) ?></td>
                            <td><?php echo anchor(base_url() . 'index.php/veterinario/Pacientes/form_paciente/' . $row->id, '<i class="fa fa-pencil fa-2x"></>', array('title' => 'Editar')) ?></td>
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
$this->load->view('veterinario/vwFooter');
?>

