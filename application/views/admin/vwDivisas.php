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
            <h1>Divisas <small>Listado</small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url().'index.php/admin/Dashboard/config'?>"><i class="fa fa-level-up"></i></a></li>
                <li class="active"><i class="icon-file-alt"></i> Divisas</li>


                <button class="btn btn-primary" type="button" style="float:right;">Añadir Divisa</button>
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->



    <div class="table-responsive">
        <table class="table table-hover tablesorter">
            <thead>
                <tr>
                    <th class="header">No</th>                    
                    <th class="header">País <i class="fa fa-flag"></i></th>
                    <th class="header">Moneda <i class="fa fa-money"></i></th>   
                    <th class="header">Descripción</th> 
                    <th class="header">Simbolo I</th>   
                    <th class="header">Simbolo D</th>   
                    <th class="header"><i class="fa fa-calendar"></i></th>
                    <th class="header">Detalle</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($datos as $row) {
                    echo "<tr>";
                    echo"<td>" . $row->id . "</td>";
                    echo"<td>" . $row->pais_id . "</td>";
                    echo"<td>" . $row->moneda . "</td>";
                    echo"<td>" . $row->descripcion . "</td>";
                    echo"<td>" . $row->simbolo_left . "</td>";
                    echo"<td>" . $row->simbolo_right . "</td>";                
                    echo"<td>" . $row->created_at . "</td>";
                    echo"<td>" . $row->updated_at . "</td>";
                    echo"<td></td>";
                    echo "</tr>";
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
