<header class="navbar navbar-expand-sm fixed-top">
	<button type="button" class="navbar-toggler" data-toggle="collapse"
		aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fa fa-fw fa-bars"></i>
	</button>
	<a class="navbar-brand" href="<?= esc_url(home_url("/")); ?>">
		<img src="<?= get_stylesheet_directory_uri()."/assets/images/brand.png" ?>">
	</a>
	<div class="navbar-backdrop hidden-sm hidden-md hidden-lg" data-toggle="collapse"></div>
	<div class="navbar-collapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="#">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Espacios de pauta</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Regístrate</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Ingresa</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Vende tus espacios</a>
			</li>
		</ul>
	</div>
</header>
