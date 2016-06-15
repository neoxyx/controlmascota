
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
            <h1>Crear usuario principal Empresa <small></small></h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-building"></i> Datos Registro</li>

                <div style="clear: both;"></div>
            </ol>
        </div>
    </div><!-- /.row -->

    <div id="dialog_mi_popup" style="display: none" title="Nueva Ventana"></div>

    <form method="post" action="<?= base_url() . 'index.php/admin/Empresas/guardar_usuario_empresa' ?>" id="basicBootstrapForm" class="form-horizontal">

        <div class="row">
            <div class="col-lg-12">

                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-building"></i> Datos Personales</li>

                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Nombre(*):</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "nombre" placeholder="Nombre"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Apellidos(*):</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "apellidos" placeholder="Apellidos"/>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-xs-3 control-label">Tipo documento(*):</label>
            <div class="col-xs-4">
                <select name="tipo_doc" class="form-control">
                    <option value="CC">Cédula</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="TM">Libreta Militar</option>
                </select>
            </div>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "cc" placeholder = "No de Cédula" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Fecha de nacimiento</label>
            <div class="col-xs-2">
                <input type="text" class="form-control"  readonly name="theDate"/>               
            </div>
            <div class="col-xs-0">
                <button type="button" onclick="displayCalendar(document.forms[0].theDate, 'yyyy/mm/dd', this)"><i class="fa fa-calendar"></i></button>
            </div>
        </div>
        
        <div class = "form-group">
            <label class = "col-xs-3 control-label">Estado Civil</label>
            <div class = "col-xs-4">
                <select class="form-control" name="estado_civil">
                    <option value="">Seleccione estado civil a continuación:</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                    <option value="Unión Libre">Unión Libre</option>
                    <option value="Separado">Separado</option>
                    <option value="Viudo">Viudo</option>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Sexo</label>
            <div class = "col-xs-4">
                <div class = "radio">
                    <label>
                        <input type = "radio" name = "gender" value = "Masculino" /> Masculino
                    </label>
                </div>
                <div class = "radio">
                    <label>
                        <input type = "radio" name = "gender" value = "Femenino" /> Femenino
                    </label>
                </div>
                <div class = "radio">
                    <label>
                        <input type = "radio" name = "gender" value = "Otro" /> Otro
                    </label>
                </div>
            </div>
        </div>
        
        <div>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i></li>
                <li class="active"><i class="icon-file-alt"></i> Información Residencial</li>

                <div style="clear: both;"></div>
            </ol>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">País</label>
            <div class = "col-xs-4">
                <select name="pais" id="pais" class="form-control">  
                    <option>Seleccione Pais:</option>
                    <?php
                    foreach ($paises as $fila) {
                        ?>
                        <option value="<?= $fila->id ?>"><?= $fila->nombre_pais ?></option>
                        <?php
                    }
                    ?>	
                </select>                                                                                   
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Departamento</label>
            <div class = "col-xs-4">
                <select name="provincia" id="provincia" class="form-control">
                    <option>Selecciona tu pais</option>	
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Ciudad</label>
            <div class = "col-xs-4">
                <select name="localidad" id="localidad" class="form-control">
                    <option>Selecciona tu departamento</option>
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Dirección</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "direccion" placeholder="Dirección"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Tipo de vivienda</label>
            <div class = "col-xs-4">
                <select class="form-control" name="tipo_vivienda">                                      
                    <option value="Propia">Propia</option>
                    <option value="Arrendada">Arrendada</option>                    
                </select>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Tiempo en meses</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "meses_vivienda" placeholder="Meses En vivienda" />
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Teléfono</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "phone" placeholder="Telefono"/>
            </div>
        </div>      

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Celular</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "celphone" placeholder="Celular"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Email(*)</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "email" placeholder="Email"/>
            </div>
        </div>

        <div>
            <ol class="breadcrumb">
                <li><i class="fa fa-photo"></i></li>
                <li class="active"><i class="icon-file-alt"></i> Licencia de conducción</li>

                <div style="clear: both;"></div>
            </ol>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Nº licencia de conducción(*)</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "licencia_conduccion" placeholder="No Licencia de conducción"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Categoria</label>
            <div class = "col-xs-4">
                <select class="form-control" name="categoria_lic">                    
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="B1">B1</option>
                    <option value="B2">B2</option>
                    <option value="B3">B3</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                    <option value="C3">C3</option>
                </select>                
            </div>
            
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Vence(*)</label>
            <div class="col-xs-2">
                <input type="text" class="form-control" readonly name="theDatev"/>               
            </div>
            <div class="col-xs-0">
                <button type="button" onclick="displayCalendar(document.forms[0].theDatev, 'yyyy/mm/dd', this)"><i class="fa fa-calendar"></i></button>
            </div>
        </div>
        

        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-user-plus"></i> Datos Acceso</li>

                    <div style="clear: both;"></div>
                </ol>
            </div>
        </div><!-- /.row -->

        <div class = "form-group">
            <input type="hidden" name="id_emp" value="<?php
            $this->db->select_max('id');
            $consulta = $this->db->get('sf_empresa');
            if ($consulta->num_rows() > 0) {
                foreach ($consulta->result()as $row) {
                    $id_emp = $row->id;
                    echo $id_emp;
                }
            }
            ?>"/>
            <label class = "col-xs-3 control-label">Usuario(*):</label>
            <div class = "col-xs-4">
                <input type = "text" class = "form-control" name = "usuario" placeholder="Usuario"/>
            </div>
        </div>       

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Contraseña(*):</label>
            <div class = "col-xs-4">
                <input type = "password" class = "form-control" name = "password" placeholder="Contraseña"/>
            </div>
        </div>

        <div class = "form-group">
            <label class = "col-xs-3 control-label">Repita Contraseña(*):</label>
            <div class = "col-xs-4">
                <input type = "password" class = "form-control" name = "rpassword" placeholder="Repetir Contraseña"/>
            </div>
        </div>

        <div class = "form-group">
            <div class = "col-xs-9 col-xs-offset-3">
                <input type = "submit" class = "btn btn-primary" name = "reg_usuario_emp" value="Guardar"/>
            </div>
        </div>
    </form>
</div><!--/#page-wrapper -->


<?php
$this->load->view('admin/vwFooter');
?>