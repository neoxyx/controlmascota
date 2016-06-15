<!--esign baytsrapndex
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Control Mascota, todo para nuestras mascotas y veterinarios</title>
<link href="<?= base_url().'assets/css_portada/style.css'?>" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<!--slider-->
<link href="<?= base_url().'assets/css_portada/slider.css'?>" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="<?= base_url().'assets/js_portada/jquery-1.9.0.min.js'?>"></script>
<script type="text/javascript" src="<?= base_url().'assets/js_portada/jquery.nivo.slider.js'?>"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
<!--light-box-->
<script type="text/javascript" src="<?= base_url().'assets/js_portada/jquery.lightbox.js'?>"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url().'assets/css_portada/lightbox.css'?>" media="screen">
	<script type="text/javascript">
		$(function() {
			$('.gallery a').lightBox();
		});
   </script>   
<script type="text/javascript" src="<?= base_url().'assets/js_portada/resp-menu.js'?>"></script>
<script type="text/javascript">$(document).ready(function(){$(".resp-menu").flexymenu({speed: 400, indicator: true});});</script>
</head>
<body>
<div class="header">
	<div class="wrap">   
	   <div class="header-top">	
	        <div class="logo">
                    <a href="<?= base_url().'index.php/Portal'?>"><img src="<?= base_url().'assets/images_portada/logo1.png'?>" alt=""/></a>
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
							<li class="cap active"><a href="<?= base_url().'index.php/Portal'?>">Inicio</a></li>
                                                        <li class=""><a href="<?= base_url().'index.php/Portal/nosotros'?>">Sobre Nosotros</a></li>
							<li class=""><a href="JavaScript:void(0)">Plataforma</a>
								<ul>
                                                                    <li><a href="<?= base_url().'index.php/Login'?>">Acceso</a></li>
                                                   
                                                                    <li><a href="<?= base_url().'index.php/Portal/services'?>">Conoce nuestro software</a></li>
								</ul>
							</li>
							<li class=""><a href="<?= base_url().'index.php/Portal/contact'?>">Contactenos</a></li>
						</ul>
					<div class="clear"> </div>
				</div>
		</div>
		<div class="clear"></div> 
	  </div>
   </div>
</div>
	<!------ Slider ------------>
		 <div class="slider">
	      	<div class="slider-wrapper theme-default">
	            <div id="slider" class="nivoSlider">
	                <img src="<?= base_url().'assets/images_portada/banner4.jpg'?>" alt="" />
	                <img src="<?= base_url().'assets/images_portada/banner3.jpg'?>" alt="" />
	                <img src="<?= base_url().'assets/images_portada/banner2.jpg'?>" alt="" />
	                <img src="<?= base_url().'assets/images_portada/banner1.jpg'?>" alt="" />
	                <img src="<?= base_url().'assets/images_portada/banner5.jpg'?>" alt="" />
	            </div>
	       </div>
         </div>
  <!------End Slider ------------>
 	<div class="main">
 	 <div class="top-box">
	  <div class="wrap">
		 <div class="content-top">
			<div class="section group">
				<div class="col_1_of_3 span_1_of_3">
					<div class="grid_4">
	                    <div class="box-1">
	                        <img src="<?= base_url().'assets/images_portada/pic3.jpg'?>" alt="" class="wrapper">
	                        <div class="inside">
	                            <h2 class="v1">Cuidados de tu mascota</h2>
	                            <p class="desc">En nuestra plataforma podras registrar todos los cuidados especiales de tu mascota.</p>
	                            <a href="#"><div class="clearfix"><span class="box-btn"></span></div></a>
	                        </div>
	                    </div>
                	</div>
                </div>
				<div class="col_1_of_3 span_1_of_3">
					<div class="grid_4">
	                    <div class="box-1">
	                        <img src="<?= base_url().'assets/images_portada/pic4.jpg'?>" alt="" class="wrapper">
	                        <div class="inside">
	                            <h2 class="v1">Controles Medicos</h2>
	                            <p class="desc">Lleva el control de todas las visitas al veterinario y manten tu mascota saludable.</p>
	                            <a href="#"><div class="clearfix"><span class="box-btn"></span></div></a>
	                        </div>
	                    </div>
                	</div>
                </div>
				<div class="col_1_of_3 span_1_of_3">
					<div class="grid_4">
	                    <div class="box-1">
	                        <img src="<?= base_url().'assets/images_portada/pic5.jpg'?>" alt="" class="wrapper">
	                        <div class="inside">
	                            <h2 class="v1">Fechas especiales</h2>
	                            <p class="desc">Registra todos tus recuerdos y celebralos con tu mascota.</p>
	                            <a href="#"><div class="clearfix"><span class="box-btn"></span></div></a>
	                        </div>
	                    </div>
                	</div>
                </div>
				<div class="clear"></div> 
			</div>
		</div>
	  </div>
	</div>
	<div class="content-middle">
		<div class="wrap">
			<h5 class="head">Modulos especiales</h5>
		       <div class="middle-top">
				<div class="col_1_of_3 span_1_of_3">
					<div class="dc-head">
						<div class="dc-head-img">
							<a href="#"><img src="<?= base_url().'assets/images_portada/pic.jpg'?>" title="dc-name"></a>
						</div>
						<div class="dc-head-info">
							<h3>Alimentación</h3>
							<span>Control de dietas</span>
						</div>
						<div class="clear"> </div>
						<div class="dc-profile">
							<p>Controla la dieta de tu mascota con nuestro software.</p>
							<!--<button class="btn btn-6 btn-6a">Read More</button>-->
						</div>
					</div>
				</div>
				<div class="col_1_of_3 span_1_of_3">
					<div class="dc-head">
						<div class="dc-head-img">
							<a href="#"><img src="<?= base_url().'assets/images_portada/pic1.jpg'?>" title="dc-name"></a>
						</div>
						<div class="dc-head-info">
							<h3>Adiestramiento</h3>
							<span>Nuestra plataforma te dara tips sobre adiestramiento canino.</span>
						</div>
						<div class="clear"> </div>
						<div class="dc-profile">
							<p>Aprende como enseñar a tu mascota a ser un perro bien educado.</p>
							<!--<button class="btn btn-6 btn-6a">Read More</button>-->
						</div>
					</div>
				</div>
				<div class="col_1_of_3 span_1_of_3">
					<div class="dc-head">
						<div class="dc-head-img">
							<a href="#"><img src="<?= base_url().'assets/images_portada/pic2.jpg'?>" title="dc-name"></a>
						</div>
						<div class="dc-head-info">
							<h3>Ejercicios Especiales</h3>
							<span>Ejercita tu mascota correctamente.</span>
						</div>
						<div class="clear"> </div>
						<div class="dc-profile">
							<p>Nuestra plataforma te enseñara como ejercitar de forma correcta tu mascota dependiendo de su raza.</p>
							<!--<button class="btn btn-6 btn-6a">Read More</button>-->
						</div>
					</div>
				</div>
				<div class="clear"></div> 
		   </div>
		</div>
	</div>
	<div class="top-box">
	  <div class="wrap">
		 <div class="content-top">
			<div class="middle-top">
				<h5 class="head">Mascotas de la semana</h5>
				<div class="gallery">
					<ul>
						<li><a href="<?= base_url().'assets/images_portada/t-pic6.jpg'?>" class="magnifier"><img src="<?= base_url().'assets/images_portada/pic6.jpg'?>" alt=""><span></span></a>
							<div class="dc-head1">
								<h3></h3>
								<span></span>
						   </div></li>
						<li><a href="<?= base_url().'assets/images_portada/t-pic7.jpg'?>" class="magnifier"><img src="<?= base_url().'assets/images_portada/pic7.jpg'?>" alt=""><span></span></a> 
							<div class="dc-head1">
								<h3></h3>
								<span></span>
						    </div></li>
						<li class="last"><a href="<?= base_url().'assets/images_portada/t-pic8.jpg'?>" class="magnifier"><img src="<?= base_url().'assets/images_portada/pic8.jpg'?>" alt=""><span></span></a>
							<div class="dc-head1">
								<h3></h3>
								<span></span>
						    </div></li>
						<div class="clear"> </div>
					</ul><br>
				</div>
				<div class="clear"></div> 
		   </div>
		</div>
	  </div>
	</div>
    </div>
	<div class="footer-box">
	    <div class="wrap">
	     	<h4 class="f-head">
				Lorem ipsum dolor
			</h4>	
	        <div id="slideshow">
			 	<div class="f-desc1">
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse</p>
				</div>
				<div class="f-desc1">
			 		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse</p>
				</div>
		    </div>
		<script>
			$("#slideshow > div:gt(0)").hide();
			setInterval(function() { 
			  $('#slideshow > div:first')
			    .fadeOut(00)
			    .next()
			    .fadeIn(500)
			    .end()
			    .appendTo('#slideshow');
			},  2000);
		</script>
	  </div>
	</div>
	<div class="footer">
	   <div class="wrap">
		 <div class="copy">
			<p> © 2015 ControlMascota. All rights Reserved | Design by <a href="http://www.hosting4world.com">EVS Tecnologias</a></p>
		</div>
		<ul class="follow_icon">
		   <li><a href="#" style="opacity: 1;"><img src="<?= base_url().'assets/images_portada/fb.png'?>" alt=""></a></li>
		   <li><a href="#" style="opacity: 1;"><img src="<?= base_url().'assets/images_portada/tw.png'?>" alt=""></a></li>
		   <li><a href="#" style="opacity: 1;"><img src="<?= base_url().'assets/images_portada/rss.png'?>" alt=""></a></li>
		   <li><a href="#" style="opacity: 1;"><img src="<?= base_url().'assets/images_portada/g+.png'?>" alt=""></a></li>
		</ul>
		<div class="clear"></div> 
	</div>
	<div class="footer-bot">
 		<a href="#toTop" class="toTop">&uarr;</a>
			<script type="text/javascript">
				$('.toTop ').click(function(){
					$("html, body").animate({ scrollTop: 0 }, 600);
					return false;
				});
				$('.toBottom').click(function(){
					$('html,body').animate({scrollTop: $(document).height()}, 600);
					return false;
				});
			</script>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>

