<?php
$this->load->view('conductor/vwHeader');
?>
<!--  
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Ofertas de Carga <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url().'index.php/conductor/Dashboard'?>"><i class="fa fa-home"></i></a></li>
                <li class="active"><i class="fa fa-opencart"></i> Ofertas</li>
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->



    <div class="table-responsive">
        <table class="table table-hover tablesorter">
            <thead>
                <tr>
                    <th class="header">No. <i class="fa fa-sort"></i></th>
                    <th class="header">Empresa <i class="fa fa-sort"></i></th>
                    <th class="header">Ori/Dest<i class="fa fa-sort"></i></th>
                    <th class="header">Teléfonos<i class="fa fa-sort"></i></th>
                    <th class="header">Cantidad<i class="fa fa-sort"></i></th>
                    <th class="header">Contratados<i class="fa fa-sort"></i></th>
                    <th class="header">Fecha<i class="fa fa-sort"></i></th>
                    <th class="header">Aplicar<i class="fa fa-sort"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!$ofertas) {
                    echo $mensaje;
                } else {
                    foreach ($ofertas as $row) {
                        echo "<tr>";
                        echo"<td>" . $row->id . "</td>";
                        echo"<td>" . $row->nombre_empresa . "</td>";
                        echo"<td>" . $row->origen . " / " . $row->destino . "</td>";
                        echo"<td>" . $row->telefono . " / " . $row->fax . "</td>";
                        echo"<td>" . $row->cantidad . "</td>";
                        echo"<td>" . $row->contratados . "</td>";
                        echo"<td>" . $row->fecha . "</td>";
                        echo"<td>" . anchor(base_url() . 'index.php/conductor/Ofertas/aplicar_oferta/',"<button type='button' class='btn btn-warning'>Aplicar</button>"). "</td>";
                        echo "</tr>";
                    }
                }
                ?>
                </tbody>
                </table>
                </div>

    


                </div><!--/#page-wrapper -->

                <?php
                $this->load->view('conductor/vwFooter');
                ?>