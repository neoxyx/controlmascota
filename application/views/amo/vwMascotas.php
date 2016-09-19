<?php
$this->load->view('amo/vwHeader');
?>

<!--
Author : Abhishek R. Kaushik
Downloaded from http://devzone.co.in
-->

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Mis Mascotas <small></small></h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'index.php/amo/Dashboard' ?>"><i class="fa fa-home"></i></a></li>
                <li class="active"><i class="icon-file-alt"></i> Mis Mascotas</li>
                <button class="btn btn-info" type="button" style="float:right;" data-toggle="modal" data-target="#modalAddMascota">Añadir Mascota</button>
                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <!-- Modal -->
    <div class="modal fade" id="modalAddMascota" tabindex="-1" role="dialog" 
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" 
                            data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Cerrar</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Crear Mascota
                    </h4>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <form method="post" action="javascript:addMascota()" id="addMascotaForm" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-xs-3 control-label">Nombre</label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" required></input>
                        </div>
                        </div>

                    <div class = "form-group">
                        <label class = "col-xs-3 control-label">Fecha de nacimiento</label>
                        <div class = "col-xs-4">
                            <input type = "text" id = "fecha_nac" readonly class="form-control"  required>
                        </div>
                    </div>

                    <div class = "form-group">
                        <label class = "col-xs-3 control-label">Especie(*):</label>
                        <div class = "col-xs-4">
                            <select name="especies" id="especies" class="form-control" required>
                                <option value="">Seleccionar:</option>
                                <?php
    foreach ($especies as $fila) {
                                ?>
                                <option value="<?php echo $fila->id ?>"><?php echo $fila->nombre_especie ?></option>
                                <?php
    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class = "form-group">
                        <label class = "col-xs-3 control-label">Raza(*):</label>
                        <div class = "col-xs-4">
                            <select name="raza" id="raza" class="form-control" required>
                                <option value="">Seleccione Raza</option>
                            </select>
                        </div>
                    </div>

                    <div class = "form-group">
                        <label class = "col-xs-3 control-label">Sexo</label>
                        <div class = "col-xs-6">
                            <div class = "radio">
                                <label>
                                    <input type = "radio" id = "gender" value = "Macho" /> Macho
                                </label>
                            </div>
                            <div class = "radio">
                                <label>
                                    <input type = "radio" id = "gender" value = "Hembra" /> Hembra
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class = "form-group">
                        <label class = "col-xs-3 control-label">Esterilizado:</label>
                        <div class = "col-xs-6">
                            <div class = "radio">
                                <label>
                                    <input type = "radio" id = "esteril" value = "Si" /> Si
                                </label>
                            </div>
                            <div class = "radio">
                                <label>
                                    <input type = "radio" id = "esteril" value = "No" /> No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class = "form-group">
                        <label class = "col-xs-3 control-label">Alergias</label>
                        <div class = "col-xs-4">
                            <textarea class = "form-control" id = "alergias"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <ol class="breadcrumb">
                                <li class="active"><i class="icon-file-alt"></i> Datos Chip</li>

                                <div style="clear: both;"></div>
                            </ol>
                        </div>
                    </div><!-- /.row -->

                    <div class = "form-group">
                        <label class = "col-xs-3 control-label">Numero de chip</label>
                        <div class = "col-xs-4">
                            <input type = "text" class = "form-control" id = "chip" placeholder = "# Chip" required/>
                        </div>
                    </div>

                    <div class = "form-group">
                        <label class = "col-xs-3 control-label">Fecha de instalación</label>
                        <div class = "col-xs-4">
                            <input type = "text" class="form-control" readonly id = "fecha_chip" required>
                        </div>
                    </div>

                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary" name = "submit_reg">
                        Guardar
                    </button>
                </div>
                </form>
        </div>
    </div>
</div>

<div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>


<div class="table-responsive">
    <table class="table table-hover tablesorter">
        <thead>
            <tr>
                <th class="header">Nombre</th>
                <th class="header">Edad</th>
                <th class="header">Especie</th>
                <th class="header">Raza</th>
                <th class="header">Sexo</th>
                <th class="header">Esterilizado</th>
                <th class="header">Alergias</th>
                <th class="header">Foto</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (!$mascota) {
                echo "<tr>";
                echo "<td>" . $mensaje . "</td>";
                echo "</tr>";
            } else {
                foreach ($mascota as $row) {
            ?>
            <tr>
                <td><?php echo $row->nombre ?> </td>
                <td><?php echo $row->EDAD_ACTUAL ?> Meses </td>
                <td><?php echo $row->nombre_especie ?></td>
                <td><?php echo $row->nombre_raza ?></td>
                <td><?php echo $row->sexo ?> </td>
                <td><?php echo $row->esterilizado ?> </td>
                <td><?php echo $row->alergias ?></td>
                <td><img id="foto_perfil" src="<?php echo base_url() ?>uploads/<?php echo $row->foto_mascota ?>"/></td>
                <td><?php echo anchor(base_url() . 'index.php/amo/Mascotas/historia_clinica/' . $row->id, '<i class="fa fa-stethoscope fa-2x"></>', array('title' => 'Historia Clinica')) ?></td>
                <td><?php echo anchor(base_url() . 'index.php/amo/Mascotas/edit_form/' . $row->id, '<i class="fa fa-pencil fa-2x"></>', array('title' => 'Editar')) ?></td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

</div>




</div><!-- /#page-wrapper -->

<?php
$this->load->view('amo/vwFooter');
?>
