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
            <h1>Clientes <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/veterinario/Dashboard' ?>"><i class="fa fa-home"></i></a></li>
                <li class="active"><i class="icon-file-alt"></i> Clientes</li>
                <a href="<?php echo base_url() . 'index.php/veterinario/Clientes/add_cliente' ?>"><button class="btn btn-info" type="button" style="float:right;" id="add_pais">Añadir Cliente</button></a>
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>


    <div class="table-responsive">
        <table class="table table-hover tablesorter">
            <thead>
                <tr>
                   <th class="header">Nro.</th>
                    <th class="header">Tipo Doc.</th>
                    <th class="header">Identificación</th>
                    <th class="header">Apellidos y Nombres</th>
                    <th class="header">Ciudad / Dirección</th>
                    <th class="header">Telefonos</th>
                    <th class="header">email</th>
                    <th class="header">Ocupación</th>
                    <th class="header">Cumpleaños</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!$clientes) {
                    echo "<tr>";
                    echo "<td>" . $mensaje . "</td>";
                    echo "</tr>";
                } else {
                    foreach ($clientes as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->id_cliente ?> </td>
                            <td><?php echo $row->tipodoc ?> </td>
                            <td><?php echo $row->identifica ?></td>
                            <td><?php echo $row->apellidos ." ". $row->nombres ?> </td>
                            <td><?php echo $row->nombre_ciudad . " / " . $row->direccion ?></td>
                            <td><?php echo $row->telfijo . "</br>" . $row->celulares ?></td>
                            <td><?php echo $row->email ?></td>
                            <td><?php echo $row->nomocupa ?></td>
                            <td><?php echo $row->mescumple . "</br>" . $row->diacumple ?></td>
                            <td><?php echo anchor(base_url() . 'index.php/veterinario/Clientes/form_clientes/' . $row->id_cliente, '<i class="fa fa-pencil fa-2x"></>', array('title' => 'Editar')) ?></td>
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
