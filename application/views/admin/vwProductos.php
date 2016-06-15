<?php
$this->load->view('admin/vwHeader');
?>
<!--  
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Productos <small>Listado</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url() . 'index.php/admin/Dashboard/licencias' ?>"><i class="fa fa-level-up"></i></a></li>
                <li class="active"><i class="icon-file-alt"></i> Productos</li>
                <a href="<?= base_url() . 'index.php/admin/Productos/add_producto' ?>"><button class="btn btn-primary" type="button" style="float:right;">Añadir Producto</button></a>
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->



    <div class="table-responsive">
        <table class="table table-hover tablesorter">
            <thead>
                <tr>
                    <th class="header">#</th>
                    <th class="header">Código - Nombre (Categorias)</th>
                    <th class="header"><i class="fa fa-user"></i></th>
                    <th class="header">Estado</th>                   
                    <th class="header"><i class="fa fa-calendar"></i></th>
                    <th class="header">Acciones </th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!$product) {
                    echo "<tr>";
                    echo "<td>" . $mensaje . "</td>";
                    echo "</tr>";
                } else {
                    foreach ($product as $row) {

                        echo "<tr>";
                        echo"<td>" . $row->id . "</td>";
                        echo"<td>" . $row->codigo . "-" . $row->nombre_producto . " (" . $row->descripcion . ")" . "</td>";
                        echo"<td>" . $row->tipouser . "</td>";
                        if ($row->activo == 0) {
                            echo"<td>" . anchor(base_url() . 'index.php/admin/Productos/activar/'.$row->id , '<button type="button" class="btn btn-danger">No Activo</button>')
                            . "</td>";
                        }
                        if ($row->activo == 1) {
                            echo"<td>" . anchor(base_url() . 'index.php/admin/Productos/desactivar/'.$row->id , '<button type="button" class="btn btn-success">Activo</button>')
                            . "</td>";
                        }

                        echo"<td>" . $row->updated_at . "</td>";
                        echo"<td>" . anchor(base_url() . 'index.php/admin/Productos/get_producto_xid/' . $row->id, '<button type="button" class="btn btn-warning">EDITAR</button>') . "</td>";
                        echo "</tr>";
                    }
                }
                ?>  
            </tbody>
        </table>
    </div>

    <ul class="pagination pagination-sm">
        <li class="disabled"><a href="#"><<</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">>></a></li>
    </ul>


</div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>
