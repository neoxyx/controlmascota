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
                <li><a href="<?=base_url().'index.php/admin/Users'?>"><i class="fa fa-level-up"></i></a></li>
                <li class="active"><i class="fa fa-user"></i> Datos Personal</li>


                <button class="btn btn-primary" type="button" style="float:right;" id="add_pais">Añadir Personal</button>
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
                    <th class="header">Apellidos </th>
                    <th class="header">Tipo de documento</th>
                    <th class="header">Edad</th>                  
                    <th class="header">Ciudad</th>
                    <th class="header">Telefono</th>
                    <th class="header">Email</th>
                    <th class="header">Dirección</th>
                    <th class="header">Celular</th>
                    <th class="header">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($perfil as $row) {
                    echo "<tr>";
                    echo"<td>" . $row->nombre . "</td>";
                    echo"<td>" . $row->apellidos . "</td>";
                    echo"<td>" . $row->tipo_doc . " " . $row->cedula . "</td>";
                    echo"<td>" . $row->edad . "</td>";
                    echo"<td>" . $row->nombre_ciudad . "</td>";
                    echo"<td>" . $row->telefono . "</td>";
                    echo"<td>" . $row->email . "</td>";
                    echo"<td>" . $row->direccion . "</td>";
                    echo"<td>" . $row->celular . "</td>";
                    echo"<td>" . anchor(base_url() . 'index.php/admin/Perfil', 'Ver/Completar') . "</td>";
                    echo "</tr>";
                }
                ?>   
            </tbody>
        </table>

    </div>
    <form action="<?= base_url() . 'index.php/admin/Perfil/edit_foto_user' ?>" enctype="multipart/form-data" method="post">
        <div align="center"><img id="foto_perfil" src="<?= base_url() ?>uploads/<?php echo $row->foto_ruta ?>" /></div>
        <div align="center">
            <label>Seleccione examinar si desea cambiar su foto de perfil y click en actualizar</label>
            <input type="file"  name="userfile" />
            <input type="submit" name="update_foto" value="Actualizar"/>
        </div>
    </form>
</div><!-- /#page-wrapper -->

<?php
$this->load->view('admin/vwFooter');
?>