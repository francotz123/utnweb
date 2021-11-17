 <header class="main-header">
 	
	<!--=====================================
	LOGOTIPO
	======================================-->
	<a href="inicio" class="logo">
		
		<!-- logo mini -->
		<span class="logo-mini">
			
			<img src="vistas/img/utn.png" class="img-responsive" style="padding:10px">

		</span>

		<span class="logo-lg">
			
			<img src="vistas/img/logo-utn.png" class="img-responsive"  style="padding:-5px 0px">

		</span>
	</a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botón de navegación -->

	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	
        	<span class="sr-only">Toggle navigation</span>
      	
      	</a>

		<!-- perfil de usuario -->

		<div class="navbar-custom-menu">
				
			<ul class="nav navbar-nav">
				
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						
						<img src="vistas/img/AVATAR.png" class="user-image">

						<span class="hidden-xs"><?php echo($_SESSION["usuario"]["usuario"]) ?></span>

					</a>

					<!-- Dropdown-toggle -->

					<ul class="dropdown-menu">

					<li class="user-body">
							
							<div class="pull-right">
								
								<a href="salir" class="btn btn-default btn-flat">Mi Perfil</a>

							</div>

						</li>
						
						<li class="user-body">
							
							<div class="pull-right">
								
								<a href="salir" class="btn btn-default btn-flat">Salir</a>

							</div>

						</li>

					</ul>

				</li>

			</ul>

		</div>

	</nav>

 </header>