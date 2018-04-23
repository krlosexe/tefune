<!-- banner -->
	<div class="banner jarallax">
		<div class="header">
			<div class="header-left">
				<div class="search-grid">
				
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="w3-header-bottom">
			<div class="w3layouts-logo">
				<h1>
				    
					<a href="<?= base_url()?>"><img src="<?= base_url()?>assets/home/images/logo.png" height="52" width="220"> </a>
				</h1>
			</div>
			<div class="top-nav">
				<nav class="navbar navbar-default">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="first-list"><a class="active" href="index.html"></a></li>
							<li><a href="#about" class="scroll">Servicios</a></li>
							
						
							<li><a href="#blog" class="scroll">Topos de Informe</a></li>
							<li><a href="#rate" class="scroll">Estadistica</a></li>
							<li><a href="#contact" class="scroll">Contacto</a></li>
							
							
							<li><a href="#modal_login" data-toggle="modal" class="scroll btn btn-primary">Entrar</a></li>
						</ul>	
						<div class="clearfix"> </div>
					</div>	
				</nav>		
			</div>
			<div class="agileinfo-social-grids">
				<ul>
					<li><a href="https://www.facebook.com/Te-Fune-135280053980305/" target="_blank"><i class="fa fa-facebook"></i></a></li>
					<li><a href="https://twitter.com/SocialesTefune" target="_blank"><i class="fa fa-twitter"></i></a></li>
					
					<li><a href="https://www.instagram.com/sociales.tefune" target="_blank"><i class="fa fa-instagram"></i></a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="banner-info">
			<div class="container">
				<div class="w3-banner-info">
					<div class="slider">
						<div class="callbacks_container">
							<ul class="rslides callbacks callbacks1" id="slider4">
								<li>
									<div class="w3layouts-banner-info">
										<h3>Deudores<span></span></h3>
										<p></p>
										<div class="w3ls-button"><h3>
											<a href="#modal_registro" data-toggle="modal" class="scroll btn btn-primary">Registro</a></h3>
										</div>
									</div>
								</li>
								<li>
									<div class="w3layouts-banner-info">
										<h3>Publicación de<span></span></h3>
										<p></p>
										<div class="w3ls-button"><h3>
											<a href="#modal_registro" data-toggle="modal" class="scroll btn btn-primary">Registro</a></h3>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div class="clearfix"> </div>
							<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider4").responsiveSlides({
									auto: true,
									pager:true,
									nav:false,
									speed: 400,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>
							<!--banner Slider starts Here-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //banner -->