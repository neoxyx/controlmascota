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
            <h1><?php
                if (!$empresa) {
                    echo $mensaje;
                } else {
                    foreach ($empresa as $row) {
                        echo $row->nombre_empresa;
                    }
                }
                ?>  <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/veterinario/Dashboard' ?>"><i class="fa fa-home"></i></a></li>
                <li class="active"><i class="icon-file-alt"></i> Datos Empresa</li>
               <a href="<?php echo base_url() . 'index.php/veterinario/Perfil/add_emp' ?>"><
                  <?php
                   if(!$empresa){
                      //ocultar el boton si laclinica ya està creada
                       echo "<button class='btn btn-primary' type='button' style='float:right;' id='add_pais'";
                    }
                  ?>
                  >Añadir Clinica</button></a>
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>


    <div class="table-responsive">
        <table class="table table-hover tablesorter">
            <thead>
                <tr>
                    <th class="header">Razón Social</th>
                    <th class="header">NIT</th>
                    <th class="header">Ciudad</th>
                    <th class="header">Dirección</th>
                    <th class="header">Telefono</th>
                    <th class="header">Rep. Legal</th>
                    <th class="header">Email</th>
                    <th class="header">Web</th>
                    <th class="header">Acciones</th>
                </tr>
            </thead>
            <tbody>

<?php
if (!$empresa) {
    echo "<tr>";
    echo "<td>" . $mensaje . "</td>";
    echo "</tr>";
} else {
    foreach ($empresa as $row) {

        echo "<tr>";
        echo"<td>" . $row->nombre_empresa . "</td>";
        echo"<td>" . $row->nit . "</td>";
        echo"<td>" . $row->nombre_ciudad . "</td>";
        echo"<td>" . $row->direccion . "</td>";
        echo"<td>" . $row->telefono . "</td>";
        echo"<td>" . $row->nombre . " " . $row->apellidos . "</td>";
        echo"<td>" . $row->email . "</td>";
        echo"<td>" . "<a href='$row->web' target='parent'>" . $row->web . "</a>" . "</td>";
        echo"<td>" . anchor(base_url() . 'index.php/veterinario/Perfil/get_vetxid/' . $row->id, '<button type="button" class="btn btn-warning">Ver - Editar</button>') . "</td>";
        echo "</tr>";
    }
}
?>
                </form>
            </tbody>
        </table>

    </div>


</div><!-- /#page-wrapper -->

<?php
$this->load->view('veterinario/vwFooter');
?>
