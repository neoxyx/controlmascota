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
                <li><a href="<?php echo base_url() . 'index.php/empresa/Dashboard' ?>"><i class="icon-dashboard"></i> Volver Atras</a></li>
                <li class="active"><i class="icon-file-alt"></i> Mis Conductores Actuales</li>


                <a href="<?php echo base_url() . 'index.php/empresa/Perfil/get_conductores' ?>"><button class="btn btn-info" type="button" style="float:right;" id="add_pais">Conductores buscando empleo</button></a>
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
                    <th class="header">Conductor</th>   
                    <th class="header">Telefonos</th> 
                    <th class="header">Ranking</th>                    
                    <th class="header">Creado</th>
                    <th class="header">Detalle</th>
                    <th class="header">Finalizar Contrato</th>
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
                        echo"<td>" . $row->telefono . " / " . $row->celular . "</td>";
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
                        echo"<td>" . $row->fecha_creacion . "</td>";
                        echo"<td>" . anchor(base_url() . 'index.php/empresa/Perfil/ver_conductor_xid/' . $row->id, '<button type="button" class="btn btn-warning">VER</button>') . "</td>";
                        echo"<td>" . anchor(base_url() . 'index.php/empresa/Perfil/finalizar_contrato_conductorxid/' . $row->id, '<button type="button" class="btn btn-warning">FINALIZAR CONTRATO</button>') . "</td>";
                        echo "</tr>";
                    }
                }
                ?>                
            </tbody>
        </table>

        <div class="row">
            <div class="col-lg-12">
                <h1> <small></small></h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url() . 'index.php/empresa/Dashboard' ?>"><i class="icon-dashboard"></i> Volver Atras</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Mis Conductores Anteriores</li>



                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->
    </div>


</div><!-- /#page-wrapper -->

<?php
$this->load->view('empresa/vwFooter');
?>
