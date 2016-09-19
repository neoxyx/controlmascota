<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Control Mascotas V 1.0.0</title>
        <!--link the bootstrap css file-->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

        <style type="text/css">
            body{
                background-image: url('../assets/images_portada/fondo_login.jpg')
            }
            .colbox {
                margin-left: 0px;
                margin-right: 0px;
            }
            .panel{
                background: rgba(217, 237, 247, 0.4);
            }
        </style>
    </head>
    <body>

        <div class="container">    
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Acceso Plataforma</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Olvido su contraseña</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                        <?php echo '<h5 style="color:red">' . validation_errors() . '</h5>'; ?>
                        <?php echo '<h4 style="color:red">' . $mensaje . '</h4>' ?>
                        <?php
                        $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                        echo form_open("Login/very_sesion", $attributes);
                        ?>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" placeholder="Usuario">                                        
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Contraseña">
                        </div>



                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Recordarme
                                </label>
                            </div>
                        </div>


                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <div class="pager">
                                    <input type="submit" id="btn-login" class="btn btn-success" name="submit_login" value="Ingresar"/>

                                    <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->


                                    <li class="previous"><a href="<?php echo base_url() . 'index.php/Portal' ?>"><span aria-hidden="true">&larr;</span> Volver</a></li>                                        
                                </div>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    <h4>No tengo cuenta!</h4> 
                                    <a href="<?php echo base_url() . 'index.php/Registros' ?>">
                                        <h3>Registrarme</h3>
                                    </a>
                                </div>
                            </div>
                        </div>                             
                    </div>                     
                </div> 
            </div>
            <?php echo form_close(); ?>

        </div>

        <!--load jQuery library-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!--load bootstrap.js-->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </body>
</html>

