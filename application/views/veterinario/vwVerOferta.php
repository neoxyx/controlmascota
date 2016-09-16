<?php
$this->load->view('empresa/vwHeader');
?>
<!--  
Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->
<!-- Page Specific Plugins -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
<!-- Page Specific CSS -->
<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">

<style type="text/css">

    #sidebar{
        position: absolute;
        width: 100px;
        height: 600px;
        background: #F7E000;
        color: #fff;
        margin-left: 860px;
        margin-top: -600px;
        border: 1px solid #F7E000;
    }
    ul{
        padding: 0;
        text-align: justify;		
    }

    #li_side{
        cursor: pointer;
        border-top: 1px solid #fff;
        background: #000000; 
        list-style: none;
        color: #F7E000
    }
    #li_side:hover{
        background: #F7E000;
        color: black;                 
    }
</style>

<script src="<?php echo base_url() . 'assets/js/morris/chart-data-morris.js' ?>"></script>
<script type="text/javascript">
    function datos_marker(lat, lng, marker)
    {
        var mi_marker = new google.maps.LatLng(lat, lng);
        map.panTo(mi_marker);
        google.maps.event.trigger(marker, 'click');
    }
</script>
<?php echo $map['js'] ?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Enturne <small>Empresas</small></h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-shopping-cart"></i></li>
                <li class="active"><i class="icon-file-alt"></i> Datos de oferta</li>


                <a href="<?php echo base_url() . 'index.php/empresa/Ofertas' ?>"><button class="btn btn-info" type="button" style="float:right;" id="add_pais">Volver a ofertas</button></a>
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->



    <div class="table-responsive">
        <table class="table table-hover tablesorter">
            <thead>
                <tr>                   
                    <th class="header">Origen</th>
                    <th class="header">Destino</th>
                    <th class="header">Tipo de vehiculo</th>
                    <th class="header">Carroceria</th>
                    <th class="header">Fecha</th>
                    <th class="header">Cupos</th>
                    <th class="header">Estado</th>
                    <th class="header">Aplicando</th>
                    <th class="header">Contratados</th>
                    <th class="header">Distancia</th>
                    <th class="header">Tiempo estimado</th>
                    <th class="header">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($oferta as $row) {
                    ?>
                <form  action="<?php echo base_url() . 'index.php/empresa/Ofertas/update_oferta/' . $row->id ?>"  method="post" >
                    <tr>
                        <td><?php echo $row->origen ?></td>
                        <td><?php echo $row->destino ?></td>
                        <td><?php echo $row->nombre_tv ?></td>
                        <td><?php echo $row->nombre_carr ?></td>
                        <td><?php echo $row->fecha ?></td>
                        <td><input type="text" class="form-control" value="<?php echo $row->cantidad ?>" name="cantidad"/></td>
                        <td><?php /* echo $row->estado */ ?></td>
                        <td><?php /* echo $row->aplicando */ ?></td>
                        <td><?php echo $row->contratados ?></td>
                        <td><?php /* echo $row->distancia */ ?></td>
                        <td><?php /* echo $row->tiempo */ ?></td>
                        <td><input type='submit' class='btn btn-warning' id='edit' value="Editar"/><br><br><a href="<?php echo base_url() . 'index.php/empresa/Ofertas/delete_oferta/' . $row->id ?>"><button type="button" class="btn btn-danger" >Eliminar</button></a></br></br></td>
                    </tr><?php
                }
                ?> 
            </form>
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-map"></i> En el siguiente mapa solo se muestran los vehiculos que tienen su satelital con Enturne SAS</li>               
            </ol>
        </div>
    </div><!-- /.row -->

    <div class="table-responsive">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-map"></i> </h3>
                    </div>
                    <div class="panel-body">
                        <div id="morris-chart-area"><?php echo $map['html'] ?>
                            <div id="sidebar">
                                <ul>
                                    <?php
                                    foreach ($datos as $marker_sidebar) {
                                        ?><li id="li_side" onclick="datos_marker(<?php echo $marker_sidebar->pos_y ?>,<?php echo $marker_sidebar->pos_x ?>, marker_<?php echo $marker_sidebar->id ?>)">
                                            <?php echo $marker_sidebar->id; ?>&nbsp;&nbsp;<?php echo substr($marker_sidebar->infowindow, 0, 14) ?></li><?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div><!--/.row -->
    </div>


    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-truck"></i> Vehiculos Enturnados</li>               
            </ol>
        </div>
    </div><!-- /.row -->
    <div class="table-responsive">
        <table class="table table-hover tablesorter">
            <thead>
                <tr>                   
                    <th class="header">No</th>
                    <th class="header">Placa</th>
                    <th class="header">GPS</th>
                    <th class="header">Conductor - Telefonos</th>
                    <th class="header">Ranking</th>
                    <th class="header">Detalle</th>
                    <th class="header">Opciones</th>                    
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-truck"></i> Vehiculos Aplicando</li>               
            </ol>
        </div>
    </div><!-- /.row -->
    <div class="table-responsive">
        <table class="table table-hover tablesorter">
            <thead>
                <tr>                   
                    <th class="header">No</th>
                    <th class="header">Placa</th>
                    <th class="header">Conductor - Telefonos</th>
                    <th class="header">Ranking</th>
                    <th class="header">Detalle</th>
                    <th class="header">Convenir</th>                    
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

</div><!-- /#page-wrapper -->

<?php
$this->load->view('empresa/vwFooter');
?>
