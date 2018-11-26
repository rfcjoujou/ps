<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="utf-8" />
		<title>Loja</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css" />

		<!-- Jquery/ javascript -->
		

		
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
							<a href="<?php echo BASE_URL; ?>"> <img height="28px" width="28px" src="<?php echo BASE_URL; ?>assets/media/menu_icone/heart.png" /></a>
							<a href="<?php echo BASE_URL; ?>"> <img height="28px" width="28px" src="<?php echo BASE_URL; ?>assets/media/menu_icone/bag.png" /></a>
							<a href="<?php echo BASE_URL; ?>login" ><img  onmove="touch_item()" height="28px" width="28px" src="<?php echo BASE_URL; ?>assets/media/menu_icone/user.png" /></a>
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

		<section>
			<?php if($viewName == 'home'): ?>
					
			<div class="container-fluid" style="background-color:black;border-bottom:15px solid #000;margin-bottom:5px;">		
					<?php $this->loadViewInTemplate($viewName, $viewData); ?>
			</div>
			<?php else :?>

			<div class="container">	
					<?php $this->loadViewInTemplate($viewName, $viewData); ?>
			</div>
			<?php endif; ?>
		</section>
		
		<footer class="page-footer font-small teal pt-4">

    		<!-- Footer Text -->
    		<div class="container-fluid text-center text-md-left" id="footerint" style="background-color:white;">
    			<div class="row">
    				<div class="col-sm" style="color:white">

    					<!-- Primeiro bloco do footer-->

    					<div class="tituloFooter" >
    						<h5 style="font-size:20px;">Pagamento</h5>
    						<img src=""/>
    					</div>

    					<div class="tituloFooter2">

    						<h5 class="text-uppercase" style="font-size:20px;">Compra segura</h5>
    						<p >E oq</p>
    					</div>

    					<div class="tituloFooter3">

    						<h5 class="text-uppercase" style="font-size:18px;">Descontos</h5>


    					</div>

    				</div>
    				<div class="col-sm" style="color:white">
    					<!-- Segundo bloco do footer-->
    					<div class="tituloFooter">

    						<h5 style="text-uppercase;font-size:20px;" >Duvida</h5>
    						<p style="text-transform:none;" id="itemfooterp"><a href="#" style="text-decoration:none;color:white;">Frete/prazo</a></p>
    						
	    					<p style="text-transform:none;" id="itemfooter"><a href="#" style="text-decoration:none;color:white;">Lojas</a></p>

	    					<p style="text-transform:none;" id="itemfooter"><a href="#" style="text-decoration:none;color:white;">Sobre</a></p>

	    					<p style="text-transform:none;" id="itemfooter"><a href="#" style="text-decoration:none;color:white;">Como comprar</a></p>
	    					
    						

    					</div>

    				
    				</div>


    				<div class="col-sm" style="color:white">
    					<!-- Penultimo bloco do footer-->

    					<div class="tituloFooter">
    						<h5 class="text-uppercase" style="font-size:20px;">Pagamento</h5>
    						
    						<p >b</p>
    						

    					</div>

    					<div class="tituloFooter2" >

    						<h5 class="text-uppercase" style="font-size:20px;"><a href="" style="color:white">Trocas e Devoluções</a></h5>

    						<div class="footersubitem" style="background-color:white;">

    						</div>

    					</div>

    					<div class="tituloFooter3">


    						<h5 class="text-uppercase" style="font-size:20px;">Pagamento</h5>
    						<div class="footersubitem" style="background-color:white;">


    						</div>
    					</div>
    				</div>

    					<!-- Ultimo bloco do footer-->
    				<div class="col-sm" style="color:white">
    					<!-- Para enviar notificação -->
    					<div class="tituloFooter">

    						<h5 class="text-uppercase" style="font-size:18px;;">Notificações</h5>
    						<div class="footersubitem" style="background-color:#110d0d;">
	    						<input type="text" placeholder="Seu e-mail..." name="assinatura" id="assinatura"/>
	    						<input type="submit" value="Assine"/>
	    					</div>
    					</div>

    					<div class="tituloFooter2">

    						<h5 class="text-uppercase" style="font-size:20px;">Contatos</h5>
    						

    						<a href="https://www.instagram.com/arrazoblend/?hl=pt-br"><img src="assets/images/instagraam.png"/></a>
    						<p></p>

    						
    						

    					</div>


    					<div class="tituloFooter3">

    						<h5 class="text-uppercase" style="font-size:20px;">....</h5>


    					</div>

    					
    				</div>

    			</div>

    			<!-- Segunda linha de endereço -->
    			<div class="row">
    				<div class="col-sm" id="enderecoint">
    					<div class="endereco">
    						<p>Rua major Joaquim A. De Campos 5810 -Santo Amaro da Imperatriz, SC-CEP: 88140000</p>
    					<div class="email">
    						<p>Contato: arrazoblend@gmail.com</p>
    					<div>
    					</div>

    				</div>
    			</div>
    		</div>


		</footer>		

		<!-- Jquery/ javascript -->
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script> 
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>

	</body>
</html>