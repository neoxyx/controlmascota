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
            <h1>Clinica <small></small></h1>
            <ol class="breadcrumb">
              <li><a href="<?=base_url().'index.php/veterinario/Dashboard'?>"><i class="fa fa-home"></i></a></li>
              <li class="active"><i class="icon-file-alt"></i> Lista de Personal</li>
              
              
              <a href="<?=base_url().'index.php/veterinario/Perfil/add_user'?>"><button class="btn btn-primary" type="button" style="float:right;">Crear Personal</button></a>
              <div style="clear: both;"></div>
            </ol>
          </div>
        </div><!-- /.row -->

        
            
            <div class="table-responsive">
              <table class="table table-hover tablesorter">
                <thead>
                  <tr>
                    <th class="header">No. <i class="fa fa-sort"></i></th>
                    <th class="header">Nombre <i class="fa fa-sort"></i></th>
                    <th class="header">Identificación <i class="fa fa-sort"></i></th>
                    <th class="header">Ciudad<i class="fa fa-sort"></i></th>
                    <th class="header">Teléfono<i class="fa fa-sort"></i></th>
                    <th class="header">Email<i class="fa fa-sort"></i></th>
                    <th class="header">Usuario<i class="fa fa-sort"></i></th>
                    <th class="header">Creado<i class="fa fa-sort"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                if (!$personal) {
                    echo "<tr>";
                    echo "<td>" . $mensaje . "</td>";
                    echo "</tr>";
                } else {
                    foreach ($personal as $row) {
                        echo "<tr>";
                        echo"<td>" . $row->id . "</td>";
                        echo"<td>" . $row->nombre ." ". $row->apellidos . "</td>";
                        echo"<td>" . $row->tipo_doc ." ". $row->cedula . "</td>";
                        echo"<td>" . $row->nombre_ciudad . "</td>";
                        echo"<td>" . $row->telefono ." ".$row->celular. "</td>";
                        echo"<td>" . $row->email . "</td>";                                                
                        echo"<td>" . $row->usuario . "</td>";                       
                        echo"<td>" . anchor(base_url() . 'index.php/veterinario/Perfil/ver_user_xid/' . $row->id, '<button type="button" class="btn btn-warning">Ver - Editar</button>') . "</td>";
                        echo "</tr>";
                    }
                }
                ?>   
                </tbody>
              </table>
            </div>
        
        
        
        
      </div><!-- /#page-wrapper -->

<?php
$this->load->view('veterinario/vwFooter');
?>