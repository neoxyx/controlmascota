<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Control Mascotas</title>
        <!--link the bootstrap css file-->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

        <style type="text/css">
            body{
                background-image: url('../assets/images_portada/fondo_reg.jpg')
            }
            .colbox {
                margin-left: 0px;
                margin-right: 0px;
            }
            .panel{
                background: rgba(217, 237, 247, 0.4);
            }
        </style>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">
           $(document).ready(function () {
              $("#pais").change(function () {
                   $("#pais option:selected").each(function () {
                       pais = $('#pais').val();
                       $.post("<?= base_url() . 'index.php/Paises/llena_provincias' ?>", {
                           pais: pais
                       }, function (data) {
                           $("#provincia").html(data);
                       });
                   });
              })
           });
      </script>
      <script type="text/javascript">
           $(document).ready(function () {
              $("#provincia").change(function () {
                   $("#provincia option:selected").each(function () {
                       provincia = $('#provincia').val();
                       $.post("<?= base_url() . 'index.php/Paises/llena_localidades' ?>", {
                           provincia: provincia
                       }, function (data) {
                           $("#localidad").html(data);
                       });
                   });
              })
           });
      </script>
    </head>
    <body>
        <div class="container">
            <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Registro en Plataforma</div>

                    </div>

                    <div style="padding-top:10px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                        <?php echo '<h5 style="color:red">'. validation_errors().'</h5>'; ?>
                        <?php echo '<h4 style="color:red">'.$mensaje.'</h4>'?>
                        <?php
                        $attributes = array("class" => "form-horizontal", "id" => "singupform", "name" => "singupform");
                        echo form_open("Registros/guardar", $attributes);
                        ?>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                            <input id="login-username" type="text" class="form-control" name="nombre" value="" placeholder="Nombre">
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
                            <input  type="text" class="form-control" name="apellidos" placeholder="Apellidos">
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                            <input  type="text" class="form-control" name="telefono" placeholder="Telefono">
                        </div>

                        <div style="margin-bottom: 25px" class="select-group">
                               <select name="pais" id="pais" class="form-control">
                                    <option value="">Selecciona tu País</option>
                                    <?php
                                    foreach ($paises as $fila) {
                                        ?>
                                        <option value="<?= $fila->id ?>"><?= $fila->nombre_pais ?></option>
                                        <?php
                                    }
                                    ?>
                               </select>
                        </div>
                        <div style="margin-bottom: 25px" class="select-group">
                           <select name="provincia" id="provincia" class="form-control">
                                    <option value="">Selecciona tu Departamento</option>
                               </select>
                        </div>
                        <div style="margin-bottom: 25px" class="select-group">
                               <select name="localidad" id="localidad" class="form-control">
                                    <option value="">Selecciona tu Ciudad</option>
                               </select>
                       </div>

                       <div style="margin-bottom: 25px" class="select-group">
                            <select class="form-control" name="nivel">
                                <option>Seleccione tipo de usuario:</option>
                                <option value="Veterinario">Centro Medico Veterinario</option>
                                <option value="Amo">Propietario de Mascota</option>
                            </select>
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input  type="email" class="form-control" name="username" placeholder="E-mail Usuario">
                        </div>

                        <input type="hidden" name="code" value="<?php echo $code = rand(1000, 99999)?>"/>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input  type="password" class="form-control" name="password" placeholder="Contraseña">
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input  type="password" class="form-control" name="passconf" placeholder="Confirmar Contraseña">
                        </div>
                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="terminos" value="1">Acepto los <a href="#">Terminos del servicio</a> y sus<a href="#"> Politicas de Privacidad</a>
                                </label>
                            </div>
                        </div>

                        <div style="margin-top:0px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                                <div class="pager">
                                <input type="submit" id="btn-login" class="btn btn-success" value="Registrar"/>

                                <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->

                                    <li class="previous"><a href="<?= base_url() . 'index.php/Login' ?>"><span aria-hidden="true">&larr;</span> Volver</a></li>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
            <?php echo $this->session->flashdata('msg')?>


        </div>
    </div>
</div>
<!--load jQuery library-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--load bootstrap.js-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
