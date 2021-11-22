
<?php
	$rol = intval( $_SESSION['usuario']['idrol']);
?>
<aside class="main-sidebar">

	 <section class="sidebar">
		<ul class="sidebar-menu">

			<li class="active">
				<a href="inicio">
					<i class="fa fa-home"></i>
					<span>Inicio</span>
				</a>
			</li>

		<?php if($rol == 1) {?>

			<li>
				<a href="usuarios">
					<i class="fa fa-user"></i>
					<span>Usuarios</span>
				</a>
			</li>
			<li>
				<a href="cursos">
					<i class="fa fa-th"></i>
					<span>Cursos</span>
				</a>
			</li>	

		<?php } ?>

		<?php if ($rol !== 1) {?>

			<li>
				<a href="misCursos">
					<i class="fa fa-graduation-cap"></i>
					<span>Mis Cursos</span>
				</a>
			</li>

		<?php } ?>

		<?php if($rol == 1) {?>

			<li>
				<a href="materias">
					<i class="fa fa-book"></i>
					<span>Materias</span>

				</a>
			</li>

			<?php } ?>

			<?php if($rol == 3) {?>

			<li>
				<a href="misMaterias">
					<i class="fa fa-book"></i>
					<span>Mis Materias</span>
				</a>
			</li>

			<?php } ?>

			<?php if($rol == 2) {?>

			<li>
				<a href="productos">
					<i class="fa fa-product-hunt"></i>
					<span>Mis Alumnos</span>
				</a>
			</li>

			<?php } ?>

		</ul>
	 </section>
</aside>