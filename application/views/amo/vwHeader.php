<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="abhishek@devzone.co.in">

        <title>Control Mascotas</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/calendar/jquery-ui.css'?>" />
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-ui-1.12.1/jquery-ui.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.ui.datepicker-es.js' ?>"></script>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>" rel="stylesheet">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
        <!-- Add custom CSS here -->
        <link href="<?php echo base_url() . 'assets/css/arkadmin.css' ?>" rel="stylesheet">
        <!-- JavaScript -->
        <script src="<?php echo base_url() . 'assets/js/das.js' ?>"></script>
        <link href="<?php echo base_url() . 'assets/css/img.css' ?>" rel="stylesheet">
        <!-- alertify -->
        <link href="<?php echo base_url() . 'assets/css/alertify.min.css'?>" rel="stylesheet" type="text/css">
        <script src="<?php echo base_url() . 'assets/js/alertify.min.js'?>"></script>
        <!-- funciones -->
        <script src="<?php echo base_url() . 'assets/js/mascotas.js'?>"></script>

        <script language="javascript" type="text/javascript">
            $(document).ready(function () {
                $(".subida").hide();
                $("#combito").change(function () {
                    $(".subida").hide();
                    $("#div_" + $(this).val()).show();
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#pais").change(function () {
                    $("#pais option:selected").each(function () {
                        pais = $('#pais').val();
                        $.post("<?php echo base_url() . 'index.php/Paises/llena_provincias' ?>", {
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
                        $.post("<?php echo base_url() . 'index.php/Paises/llena_localidades' ?>", {
                            provincia: provincia
                        }, function (data) {
                            $("#localidad").html(data);
                        });
                    });
                })
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#especies").change(function () {
                    $("#especies option:selected").each(function () {
                        especies = $('#especies').val();
                        $.post("<?php echo base_url() . 'index.php/amo/Mascotas/llena_razas' ?>", {
                            especies: especies
                        }, function (data) {
                            $("#raza").html(data);
                        });
                    });
                })
            });
        </script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
<script src="<?php echo HTTP_JS_PATH; ?>html5shiv.js"></script>
<script src="<?php echo HTTP_JS_PATH; ?>respond.min.js"></script>
<![endif]-->
        <!--  

Author : Abhishek R. Kaushik 
Downloaded from http://devzone.co.in
-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Sidebar -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand">
                        <i class="fa fa-paw"> Control Mascotas</i></div>
                </div>
                <?php
                // Define a default Page
                $pg = isset($page) && $page != '' ? $page : 'dash';
                ?>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li><a href="<?php echo base_url() . 'index.php/amo/Dashboard' ?>"><i class="fa fa-dashboard"></i> Tablero</a></li>                                     
                        <li <?php echo $pg == 'user' ? 'class="active"' : '' ?>><a href="<?php echo base_url() . 'index.php/amo/Mascotas' ?>"><i class="fa fa-paw"></i> Mis Mascotas</a></li>
                        <li <?php echo $pg == 'ofers ' ? 'class="active"' : '' ?>><a href="<?php echo base_url() . 'index.php/amo/Ofertas' ?>"><i class="fa fa-newspaper-o"></i> Anuncios</a></li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown messages-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Mensajes <span class="badge">1</span> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">1 Nuevos mensajes</li>
                                <li class="message-preview">
                                    <a href="#">
                                        <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                        <span class="name">Admin:</span>
                                        <span class="message">Bienvenido a Control Mascota, estamos encantados de ser su plataforma para el cuidado y control de su mascota, como agradecimiento por elegirnos disfrutaras de 1 mes de afiliación gratuita. </span>
                                        <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                                    </a>
                                </li>
                                <li class="divider"></li>

                                <li><a href="#">View Inbox <span class="badge">1</span></a></li>
                            </ul>
                        </li>

                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['usuario'] ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url() . 'index.php/amo/Perfil/get_perfil' ?>"><i class="fa fa-user"></i>  Mi Perfil</a></li>
                                <li class = "divider"></li>
                                <li><a href = "<?php echo base_url() . 'index.php/Login/logout' ?>"><i class = "fa fa-power-off"></i> Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.navbar-collapse -->
            </nav>
