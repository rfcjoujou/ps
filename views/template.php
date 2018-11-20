<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Loja</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css" />

		<!-- Jquery/ javascript -->
		<script type="text/javascript" href="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
		
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row" style="height:50px;">
					<div class="col-sm-3">
						<div class="logo">
							<div class="logoint"><a href="<?php echo BASE_URL; ?>">Lady Lu</a></div>
						</div>
					</div>
					<div class="col-sm-7" id="div_busca">
						<div class="container_busca">
							<input type="text" id="busca" name="busca" class="form-control" />
						
							<button class="botao_busca btn">
								 <img src="<?php echo BASE_URL; ?>assets/media/menu_icone/search.png" /> 
							</button>
						</div>


					</div>
					<div class="col-sm-2">
						<div class="icones">
							<img height="28px" width="28px" src="<?php echo BASE_URL; ?>assets/media/menu_icone/heart.png" />
							<img height="28px" width="28px" src="<?php echo BASE_URL; ?>assets/media/menu_icone/bag.png" />
							<img height="28px" width="28px" src="<?php echo BASE_URL; ?>assets/media/menu_icone/user.png" />
						</div>
					</div>

				</div>
			</div>
		</header>

		<nav class="navbar topnav">
			<div class="container-fluid">
				<div class="row" style="width:100%;">
					<div class="col-sm-10 list_menu">


							<ul >
								<li><a class="btn" href="">Lançamento</a></li>
								<li><a class="btn " href="">Calça</a></li>
								<li><a class="btn " href="">Shorts</a></li>
								<li><a class="btn" href="">Promoções</a></li>
								<li><a class="btn" href="">Quem Somos</a></li>
							</ul>

					</div>

					<div class="col-sm-2">
						<div class="filtro">
							Filtro
						</div>
					</div>

					

				</div>
			</div>
		</nav>



		
		<?php
		//$this->loadViewInTemplate($viewName, $viewData);
		?>



		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</body>
</html>