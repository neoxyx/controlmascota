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
            <h1>Mis Mascotas <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/amo/Dashboard' ?>"><i class="fa fa-home"></i></a></li>
                <li class="active"><i class="icon-file-alt"></i> Mis Mascotas</li>


                <a href="<?= base_url() . 'index.php/amo/Mascotas/add_mascota' ?>"><button class="btn btn-info" type="button" style="float:right;" id="add_pais">Añadir Mascota</button></a>
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
                    <th class="header">Edad</th>
                    <th class="header">Especie</th>
                    <th class="header">Raza</th>
                    <th class="header">Sexo</th>
                    <th class="header">Esterilizado</th>
                    <th class="header">Alergias</th>
                    <th class="header">Foto</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (!$mascota) {
                    echo "<tr>";
                    echo "<td>" . $mensaje . "</td>";
                    echo "</tr>";
                } else {
                    foreach ($mascota as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->nombre ?> </td>
                            <td><?php echo $row->EDAD_ACTUAL ?> Meses </td>
                            <td><?php echo $row->nombre_especie ?></td>
                            <td><?php echo $row->nombre_raza ?></td>
                            <td><?php echo $row->sexo ?> </td>
                            <td><?php echo $row->esterilizado ?> </td>
                            <td><?php echo $row->alergias ?></td>
                            <td><img id="foto_perfil" src="<?= base_url() ?>uploads/<?php echo $row->foto_mascota ?>"/></td>
                            <td><?= anchor(base_url() . 'index.php/amo/Mascotas/historia_clinica/' . $row->id, '<i class="fa fa-stethoscope fa-2x"></>', array('title' => 'Historia Clinica')) ?></td>
                            <td><?= anchor(base_url() . 'index.php/amo/Mascotas/edit_form/' . $row->id, '<i class="fa fa-pencil fa-2x"></>', array('title' => 'Editar')) ?></td>
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
