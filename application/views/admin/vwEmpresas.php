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
            <h1>Enturne <small>Administrador</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/admin/Users' ?>"><i class="fa fa-level-up"></i></a></li>
                <li class="active"><i class="fa fa-building-o"></i> Datos Empresas</li>


                <a href="<?php echo base_url() . 'index.php/admin/Empresas/add_empresa' ?>"><button class="btn btn-primary" type="button" style="float:right;" id="add_pais">Añadir Empresa</button></a>
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
                    <th class="header">NIT </th>
                    <th class="header">Telefonos</th>
                    <th class="header">Email</th>                  
                    <th class="header">Web</th>
                    <th class="header">Fecha Creación</th>                    
                    <th class="header">Acciones</th>                                       
                </tr>
            </thead>
            <tbody>
                <?php
                if (!$datos) {
                    echo "<tr>";
                    echo "<td>" . $mensaje . "</td>";
                    echo "</tr>";
                } else {
                    foreach ($datos as $row) {
                        echo "<tr>";
                        echo"<td>" . $row->nombre_empresa . "</td>";
                        echo"<td>" . $row->nit . "</td>";
                        echo"<td>" . $row->telefono . " " . $row->fax . "</td>";
                        echo"<td>" . $row->email . "</td>";
                        echo"<td>" . $row->web . "</td>";
                        echo"<td>" . $row->created_at . "</td>";
                        echo"<td>" . anchor(base_url() . 'index.php/admin/Empresas/edit_empresaxnit/' . $row->nit, '<button type="button" class="btn btn-warning">VER - EDITAR</button>') . "</td>";
                        echo "</tr>";
                    }
                }
                ?>   
            </tbody>
        </table>

    </div>

</div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>
