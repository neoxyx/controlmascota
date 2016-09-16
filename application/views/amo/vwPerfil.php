<?php
$this->load->view('amo/vwHeader');
foreach ($edad as $value) {
    $edad_user=$value->EDAD_ACTUAL;
}
?>

<!--  
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Amo <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url().'index.php/amo/Dashboard'?>"><i class="fa fa-home"></i></a></li>
                <li class="active"><i class="icon-file-alt"></i> Datos Personales</li>
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
                    <th class="header">Documento</th>
                    <th class="header">Edad</th>                                     
                    <th class="header">Telefonos</th>
                    <th class="header">Email</th>
                    <th class="header">Dirección</th>                    
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
                    echo"<td>" . $edad_user . " Años". "</td>";                   
                    echo"<td>" . $row->telefono ."<br>". $row->celular . "</td>";
                    echo"<td>" . $row->email . "</td>";
                    echo"<td>" . $row->direccion . "</td>";                    
                    echo"<td>" . anchor(base_url() . 'index.php/amo/Perfil' ,  '<i class="fa fa-pencil fa-2x"></>') . "</td>"; 
                    echo "</tr>";
                }
                ?>   
            </tbody>
        </table>

    </div>
    <form action="<?php echo base_url() . 'index.php/amo/Perfil/edit_foto_user' ?>" enctype="multipart/form-data" method="post">
        <div align="center"><img id="foto_perfil" src="<?php echo base_url() ?>uploads/<?php echo $row->foto_ruta ?>" /></div>
        <div align="center">
            <label>Seleccione examinar si desea cambiar su foto de perfil y click en actualizar</label>
            <input type="file"  name="userfile" />
            <input type="submit" name="update_foto" value="Actualizar"/>
        </div>
    </form>

</div><!-- /#page-wrapper -->

<?php
$this->load->view('amo/vwFooter');
?>