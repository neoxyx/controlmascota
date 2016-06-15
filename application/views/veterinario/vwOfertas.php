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
            <h1>Enturne <small>Empresas</small></h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-shopping-cart"></i></li>
              <li class="active"><i class="icon-file-alt"></i> Ofertas de carga</li>
              
              
              <a href="<?= base_url() . 'index.php/empresa/Ofertas/crear_oferta' ?>"><button class="btn btn-info" type="button" style="float:right;" id="add_pais">Crear Oferta</button></a>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div><!-- /.row -->

        
            
            <div class="table-responsive">
              <table class="table table-hover tablesorter">
                <thead>
                  <tr>
                    <th class="header">No</th>
                    <th class="header">Orig</th>
                     <th class="header">Destino</th>
                    <th class="header">Tipo de vehiculo - Carroceria</th>
                    <th class="header">Cantidad</th>
                    <th class="header">Contratados</th>
                    <th class="header">Fecha Cargue</th>
                    <th class="header">Detalles</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                if (!$ofertas) {
                    echo "<tr>";
                    echo "<td>" . $mensaje . "</td>";
                    echo "</tr>";
                } else {
                    foreach ($ofertas as $row) {

                        echo "<tr>";
                        echo"<td>" . $row->id . "</td>";
                        echo"<td>" . $row->origen . "</td>";
                        echo"<td>" . $row->destino . "</td>";
                        echo"<td>" . $row->nombre_tv ."-".$row->nombre_carr. "</td>";
                        echo"<td>" . $row->cantidad . "</td>";                         
                        echo"<td>" . $row->contratados . "</td>";
                        echo"<td>" . $row->fecha . "</td>";                       
                        echo"<td>" . anchor(base_url() . 'index.php/empresa/Ofertas/get_oferta_xid/' . $row->id, '<button type="button" class="btn btn-warning">Ver</button>') . "</td>";
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