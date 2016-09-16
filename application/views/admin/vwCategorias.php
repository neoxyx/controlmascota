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
            <h1>Categorias <small>Listado</small></h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url().'index.php/admin/Dashboard/licencias'?>"><i class="fa fa-level-up"></i></a></li>
              <li class="active"><i class="icon-file-alt"></i> Categorias</li>
              
              
              <a href="<?php echo base_url().'index.php/admin/Categorias/add_categoria'?>"><button class="btn btn-primary" type="button" style="float:right;">Añadir Categoria</button></a>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div><!-- /.row -->

        
            
            <div class="table-responsive">
              <table class="table table-hover tablesorter">
                <thead>
                  <tr>
                    <th class="header">No</th>
                    <th class="header">Descripción</th>
                    <th class="header">Fecha Creación <i class="fa fa-calendar"></i></th>                 
                    <th class="header">Acciones </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                if (!$cat) {
                    echo "<tr>";
                    echo "<td>" . $mensaje . "</td>";
                    echo "</tr>";
                } else {
                    foreach ($cat as $row) {
                        echo "<tr>";
                        echo"<td>" . $row->idc . "</td>";
                        echo"<td>" . $row->descripcion . "</td>";
                        echo"<td>" . $row->created_at ."</td>";
                        echo"<td>" . anchor(base_url() . 'index.php/admin/Categorias/get_categoria_xid/' . $row->idc, '<button type="button" class="btn btn-warning">EDITAR</button>') . "</td>";
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