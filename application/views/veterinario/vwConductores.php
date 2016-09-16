<?php
$this->load->view('empresa/vwHeader');
?>

<!--  
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->

<div id="page-wrapper">    
    <div class="row">
        <div class="col-lg-12">
            <h1>Conductores <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/empresa/Perfil/get_conductores_contratados' ?>"><i class="icon-dashboard"></i> Volver Atras</a></li>
                <li class="active"><i class="icon-file-alt"></i> Conductores buscando empleo</li>               
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
                    <th class="header">Ciudad / Dirección</th> 
                    <th class="header">Telefonos</th>
                    <th class="header">Licencia</th>
                    <th class="header">Ranking</th>
                    <th class="header">Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (!$conductor) {
                    echo "<tr>";
                    echo "<td>" . $mensaje . "</td>";
                    echo "</tr>";
                } else {
                    foreach ($conductor as $row) {
                        echo "<tr>";
                        echo"<td>" . $row->id . "</td>";
                        echo"<td>" . $row->nombre . "  " . $row->apellidos . "</td>";
                        echo"<td>" . $row->nombre_ciudad . " / " . $row->direccion . "</td>";
                        echo"<td>" . $row->telefono . " / " . $row->celular . "</td>";
                        echo"<td>" . $row->categoria_lic . " " . $row->licencia_conduccion . "</td>";

                        if ($row->ranking == 0)
                            echo "<td>" . '<i class="fa fa-star-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' .
                            "</td>";
                        if ($row->ranking == 0.5)
                            echo "<td>" . '<i class="fa fa-star-half-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' .
                            "</td>";
                        if ($row->ranking == 1)
                            echo "<td>" . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' .
                            "</td>";
                        if ($row->ranking == 1.5)
                            echo "<td>" . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star-half-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' .
                            "</td>";
                        if ($row->ranking == 2)
                            echo "<td>" . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' .
                            "</td>";
                        if ($row->ranking == 2.5)
                            echo "<td>" . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star-half-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' .
                            "</td>";
                        if ($row->ranking == 3)
                            echo "<td>" . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' .
                            "</td>";
                        if ($row->ranking == 3.5)
                            echo "<td>" . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star-half-o">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' .
                            "</td>";
                        if ($row->ranking == 4)
                            echo "<td>" . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star-o">' . '</i>' .
                            "</td>";
                        if ($row->ranking == 4.5)
                            echo "<td>" . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star-half-o">' . '</i>' .
                            "</td>";
                        if ($row->ranking == 5)
                            echo "<td>" . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star">' . '</i>' . '<i class="fa fa-star">' . '</i>' .
                            "</td>";
                        echo"<td>" . anchor(base_url() . 'index.php/empresa/Perfil/get_conductor_xid/' . $row->id, '<button type="button" class="btn btn-warning">Contratar</button>') . "</td>";
                        echo "</tr>";
                    }
                }
                ?>                
            </tbody>

        </table>


    </div>


</div><!-- /#page-wrapper -->

<?php
$this->load->view('empresa/vwFooter');
?>

