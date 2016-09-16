<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="abhishek@devzone.co.in">

        <title>Enturne APP</title>
        <!-- Calendario-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/dhtmlgoodies_calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.css' ?>" media="screen"></LINK>
        <SCRIPT type="text/javascript" src="<?php echo base_url() . 'assets/dhtmlgoodies_calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.js' ?>"></script>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>" rel="stylesheet">
        <link href="<?php echo base_url() . 'assets/css/img.css' ?>" rel="stylesheet">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!-- Add custom CSS here -->
        <link href="<?php echo base_url() . 'assets/css/arkadmin.css' ?>" rel="stylesheet">
        <!-- JavaScript -->
        <script src="<?php echo base_url() . 'assets/js/jquery-1.10.2.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/das.js' ?>"></script>
        <script language="javascript" type="text/javascript">
            $(document).ready(function () {
                $(".subida").hide();
                $("#combito").change(function () {
                    $(".subida").hide();
                    $("#div_" + $(this).val()).show();
                });
            });
        </script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
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
            $(function () { //En cuanto esté listo el DOM, deshabilitamos la lista de partidos
                $('input#user').attr('disabled', true);
            });

            function activate_match()
            {
                var user_id = $('input#nid').val(); //Obtenemos el id del torneo seleccionado en la lista
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>index.php/admin/Vehiculos/add_vehiculo', //Realizaremos la petición al metodo list_dropdown del controlador match
                    data: 'user=' + user_id, //Pasaremos por parámetro POST el id del torneo
                    success: function (resp) { //Cuando se procese con éxito la petición se ejecutará esta función
                        //Activar y Rellenar el select de partidos
                        $('input#nid').attr('disabled', false).html(resp); //Con el método ".html()" incluimos el código html devuelto por AJAX en la lista de partidos
                    }
                });
            }
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
        <?php echo @$error ?>
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
                    <a class="navbar-brand" href="<?php echo base_url() . 'index.php/admin/Dashboard' ?>">Enturne en linea S.A.S</a>
                </div>
                <?php
// Define a default Page
                $pg = isset($page) && $page != '' ? $page : 'dash';
                ?>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li <?php echo $pg == 'dash' ? 'class="active"' : '' ?>><a href="<?php echo base_url() . 'index.php/admin/Dashboard' ?>"><i class="fa fa-dashboard"></i> Tablero</a></li>
                        <li <?php echo $pg == 'opt' ? 'class="active"' : '' ?>><a href="<?php echo base_url() . 'index.php/admin/Opciones' ?>"><i class="fa fa-cog fa-spin"></i> Opciones</a></li>              
                        <li <?php echo $pg == 'user' ? 'class="active"' : '' ?>><a href="<?php echo base_url() . 'index.php/admin/Users' ?>"><i class="fa fa-users"></i> Usuarios</a></li>
                        <li <?php echo $pg == 'ofers' ? 'class="active"' : '' ?>><a href="<?php echo base_url() . 'index.php/admin/Ofertas' ?>"><i class="fa fa-cart-plus"></i> Ofertas</a></li>
                        <li <?php echo $pg == 'gps' ? 'class="active"' : '' ?>><a href="<?php echo base_url() . 'index.php/admin/Gps' ?>"><i class="fa fa-map-marker"></i> GPS</a></li>


                    </ul>

                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown-toggle messages-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Mensajes <span class="badge"><?php
                                    $sqlQ = 'SELECT * FROM users WHERE WEEK(fecha_creacion)=WEEK(curdate())';
                                    $cons = $this->db->query($sqlQ);

                                    $count = $cons->num_rows(); //get current query record.

                                    echo $count;
                                    ?></span> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header"><?php
                                    echo $count;
                                    ?> Nuevo(s) registros(s)</li>
                                <?php
                                $sqlQ = 'SELECT * FROM users WHERE WEEK(fecha_creacion)=WEEK(curdate())';
                                $cons = $this->db->query($sqlQ);
                                if ($cons->num_rows() != 0) {
                                    foreach ($cons->result() as $row) {
                                        ?>
                                        <li class = "message-preview">
                                            <a href = "#">
                                                <span class = "name">Tipo: <?php echo $row->nivel ?></span>
                                                <span class = "name"><i class = "fa fa-user"> <?php echo $row->usuario ?></i></span>
                                                <span class = "name"><i class = "fa fa-envelope"> <?php echo $row->email ?></i></span>
                                                <span class = "name"><i class = "fa fa-phone"> <?php echo $row->telefono ?></i></span>
                                                <span class = "time"><i class = "fa fa-calendar-check-o"> <?php echo $row->fecha_creacion ?></i></span>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>                               
                                <li class = "divider"></li>

                                <li class="dropdown-header"><?php
                                    echo $count;
                                    ?> Calificaciones bajas</li>
                                <?php
                                $cons = $this->db->get_where('users', array('estado' => '0'));
                                if ($cons->num_rows() != 0) {
                                    foreach ($cons->result() as $row) {
                                        ?>
                                        <li class = "message-preview">
                                            <a href = "#">

                                                <span class = "name"><i class = "fa fa-user"> <?php echo $row->usuario ?></i></span>
                                                <span class = "name"><i class = "fa fa-star"> <?php echo $row->email ?></i></span>
                                                <span class = "message"> <?php echo $row->telefono ?></i></span>

                                        </li>
                                        <?php
                                    }
                                }
                                ?>                                                                                                                        
                                <li class = "divider"></li>

                                <li><a href = "#">Total <span class = "badge"><?php echo $count ?></span></a></li>
                            </ul>
                        </li>
                        <li class = "dropdown alerts-dropdown">
                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><i class = "fa fa-bell"></i> SOS <span class = "badge">3</span> <b class = "caret"></b></a>
                            <ul class = "dropdown-menu">
                                <li><a href = "#">Default <span class = "label label-default">Default</span></a></li>
                                <li><a href = "#">Primary <span class = "label label-primary">Primary</span></a></li>
                                <li><a href = "#">Success <span class = "label label-success">Success</span></a></li>
                                <li><a href = "#">Info <span class = "label label-info">Info</span></a></li>
                                <li><a href = "#">Warning <span class = "label label-warning">Warning</span></a></li>
                                <li><a href = "#">Danger <span class = "label label-danger">Danger</span></a></li>
                                <li class = "divider"></li>
                                <li><a href = "#">View All</a></li>
                            </ul>
                        </li>
                        <li class = "dropdown user-dropdown">
                            <a href = "" class = "dropdown-toggle" data-toggle = "dropdown"><i class = "fa fa-user"> <?php echo $_SESSION['usuario']
                                ?> </i>    
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url() . 'index.php/admin/Perfil/get_perfil' ?>"><i class="fa fa-user"></i> Mi Perfil</a></li>
                                <li><a href="#"><i class="fa fa-users"></i> Mis conductores <span class="badge">7</span></a></li>
                                <li><a href="#"><i class="fa fa-save"></i> Registrar como conductor</a></li>
                                <li><a href="#"><i class="fa fa-truck"></i> Vehiculos</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url() . 'index.php/Welcome/logout' ?>"><i class="fa fa-power-off"></i> Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
