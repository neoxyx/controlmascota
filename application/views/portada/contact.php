<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Control Mascota, todo para nuestras mascotas y veterinarios</title>
        <link href="<?= base_url() . 'assets/css_portada/style.css' ?>" rel="stylesheet" type="text/css" media="all" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href='//fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
        <!--slider-->
        <link href="<?= base_url() . 'assets/css_portada/slider.css' ?>" rel="stylesheet" type="text/css" media="all"/>
        <script type="text/javascript" src="<?= base_url() . 'assets/js_portada/jquery-1.9.0.min.js' ?>"></script>
        <script type="text/javascript" src="<?= base_url() . 'assets/js_portada/jquery.nivo.slider.js' ?>"></script> 
        <!--light-box-->
        <script type="text/javascript" src="<?= base_url() . 'assets/js_portada/jquery.lightbox.js' ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css_portada/lightbox.css' ?>" media="screen">
        <script type="text/javascript">
            $(function () {
                $('.gallery a').lightBox();
            });
        </script>    
        <script type="text/javascript" src="<?= base_url() . 'assets/js_portada/resp-menu.js' ?>"></script>
        <script type="text/javascript">$(document).ready(function () {
                $(".resp-menu").flexymenu({speed: 400, indicator: true});
            });</script>
    </head>
    <body>
        <div class="header">                                                                                  
            <div class="wrap">                                                                                
                <div class="header-top">	                                                                      
                    <div class="logo">                                                                        
                        <a href="<?= base_url() . 'index.php/Portal' ?>"><img src="<?= base_url() . 'assets/images_portada/logo1.png' ?>" alt=""/></a>                                             
                    </div>                                                                                    
                    <div class="phone">                                                                       
                        <span class="order">Ordene en linea:</span><br>                                          
                        <h5 class="ph-no">+57 310 405 6824</h5>		                                          
                    </div>                                                                                    
                    <div class="clear"></div>                                                                 
                </div>                                                                                        
            </div>                                                                                            
            <div class="header-bottom">                                                                       
                <div class="wrap">	                                                                          
                    <div class="banner-navigation">
                        <div class="banner-nav">
                            <ul class="resp-menu orange nav1">
                                <li class="cap"><a href="<?= base_url() . 'index.php/Portal' ?>">Inicio</a></li>
                                <li><a href="<?= base_url() . 'index.php/Portal/nosotros' ?>">Sobre Nosotros</a></li>
                                <li class=""><a href="JavaScript:void(0)">Plataforma</a>
                                    <ul>
                                        <li><a href="<?= base_url() . 'index.php/Login' ?>">Acceso</a></li>

                                        <li><a href="<?= base_url() . 'index.php/Portal/services' ?>">Conoce nuestro software</a></li>
                                    </ul>
                                </li>
                                <li class="active"><a href="<?= base_url() . 'index.php/Portal/contact' ?>">Contactenos</a></li>
                            </ul>
                            <div class="clear"> </div>
                        </div>
                    </div>                                                                                   
                    <div class="clear"></div>                                                                     
                </div>                                                                                          
            </div>                                                                                             
        </div>                                                                                                
        <div class="main">
            <div class="top-box">
                <div class="wrap">
                    <div class="content-top">
                        <div class="intro">
                            <h2 class="title">Contactenos</h2>
                            <h3 class="subtitle">¿Deseas recibir información acerca de nuestros productos o servicios? Encuentra aquí varias maneras de contactarnos cualquier sea tu necesidad. Estamos a  tu disposición.</h3>                           
                        </div>
                        <?php echo validation_errors(); ?><?php echo $mensaje ?>
                        <?php                       
                        echo form_open("Mail/send_mail");
                        ?>                     
                            <div class="to">
                                <input type="text" name="nombre" class="text" value="Nombre" onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = 'Nombre';
                                        }">
                                <input type="text" name="email" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = 'Email';
                                        }" style="margin-left: 10px">
                            </div>
                            <div class="to">
                                <input type="text" name="web" class="text" value="Tu pagina Web" onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = 'Tu pagina Web';
                                        }">
                                <input type="text" name="subject" class="text" value="Asunto" onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = 'Asunto';
                                        }" style="margin-left: 10px">
                            </div>
                            <div class="text">
                                <textarea name="message" value="Mensaje:" onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = 'Mensaje';
                                        }">Mensaje:</textarea>
                            </div>
                            <div>
                                <input type="submit" class="submit" value="Enviar">
                            </div>

                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div>



        <div class="map">
            <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.3945272196815!2d-75.69287928577859!3d4.522732844435627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e38f5955ffe43dd%3A0x89032d76b468da81!2sCra.+22+%2347-17%2C+Armenia%2C+Quind%C3%ADo%2C+Colombia!5e0!3m2!1ses!2sin!4v1447124022110;output=embed"></iframe><br><small><a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.3945272196815!2d-75.69287928577859!3d4.522732844435627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e38f5955ffe43dd%3A0x89032d76b468da81!2sCra.+22+%2347-17%2C+Armenia%2C+Quind%C3%ADo%2C+Colombia!5e0!3m2!1ses!2sin!4v1447124022110" style="color:#666;text-align:left;font-size:12px"> </a></small>
        </div>
        <div class="footer">
            <div class="wrap">
                <div class="copy">
                    <p> © 2013 4Pets . All rights Reserved | Design by <a href="http://w3layouts.com">W3Layouts</a></p>
                </div>
                <ul class="follow_icon">
                    <li><a href="#" style="opacity: 1;"><img src="<?= base_url() . 'assets/images_portada/fb.png' ?>" alt=""></a></li>
                    <li><a href="#" style="opacity: 1;"><img src="<?= base_url() . 'assets/images_portada/tw.png' ?>" alt=""></a></li>
                    <li><a href="#" style="opacity: 1;"><img src="<?= base_url() . 'assets/images_portada/rss.png' ?>" alt=""></a></li>
                    <li><a href="#" style="opacity: 1;"><img src="<?= base_url() . 'assets/images_portada/g+.png' ?>" alt=""></a></li>
                </ul>
                <div class="clear"></div> 
            </div>
            <div class="footer-bot">
                <a href="#toTop" class="toTop">&uarr;</a>
                <script type="text/javascript">
                    $('.toTop ').click(function () {
                        $("html, body").animate({scrollTop: 0}, 600);
                        return false;
                    });
                    $('.toBottom').click(function () {
                        $('html,body').animate({scrollTop: $(document).height()}, 600);
                        return false;
                    });
                </script>
            </div>
            <div class="clear"></div>
        </div>
    </body>
</html>

