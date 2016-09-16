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
                <li><a href="<?php echo base_url() . 'index.php/veterinaria/Dashboard' ?>"><i class="fa fa-home"></i></a></li>
                <li class="active"><i class="icon-file-alt"></i> Clientes</li>
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
                    <th class="header">Acciones</th>
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
                        echo "<tr>";
                        echo"<td>" . $row->id_cliente . "</td>";
                        echo"<td>" . $row->tipodoc . "</td>";
                        echo"<td>" . $row->identifica . "</td>";
                        echo"<td>" . $row->apellidos ." " . $row->nombres . "</td>";
                        echo"<td>" . $row->nombre_ciudad . " / " . $row->direccion . "</td>";
                        echo"<td>" . $row->telfijo . " / " . $row->celulares . "</td>";
                        echo"<td>" . $row->email . "</td>";
                        echo"<td>" . $row->nomocupa . "</td>";
                        echo"<td>" . $row->mescumple . "/" . $row->diacumple . "</td>";
                        echo"<td>" . anchor(base_url() . 'index.php/veterinario/Clientes/get_clientexid/' . $row->id_cliente, '<button type="button" class="btn btn-warning">Ver</button>') . "</td>";
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
