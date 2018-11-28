	
	<div class="row" style="width:100%;margin:0px;">
		<div class="col-sm-12" style="padding:0px;">
			<div id="ex" class="slide carousel">
				<ol class="carousel-indicators">
					<li data-target="#exemplo" data-slide-to="0" class="active"></li>
					<li data-target="#exemplo" data-slide-to="1"></li>
					<li data-target="#exemplo" data-slide-to="2"></li>
					
				</ol>
				<div class="carousel-inner">
					<div  class="carousel-item active">
						<img src="<?php echo BASE_URL; ?>assets/images/prod/1.jpg" class="w-100" />
					</div>
					<div class="carousel-item">
						<img src="<?php echo BASE_URL; ?>assets/images/prod/4.jpg" class="w-100" />
					</div>
					<div class="carousel-item">
						<img src="<?php echo BASE_URL; ?>assets/images/prod/5.jpeg" class="w-100" />
					</div>
				</div>
				<div class="carousel_before">
					<a href="#ex" data-slide="prev" class="carousel-control-prev">
						<span class="carousel-control-prev-icon"></span>

					</a>
				</div>
				<div class="carousel_after">
					<a href="#ex" data-slide="next" class="carousel-control-next">
						<span class="carousel-control-next-icon"></span>

					</a>
				</div>



			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row" style="margin-left:0px;">
		<div class="col-sm">
			<div class="metodo_pag">
					
				<img src="<?php echo BASE_URL; ?>assets/media/pagamento_icone/card.png" />
				<div class="text_pag">Até {5x} sem Juros no CARTÃO.</div>

			</div>
		</div>
	</div>

	<div class="row" style="border:1px solid #ccc;margin-top:10px;">
		<?php 
		$a = 0;
		$q = 0;
		?>

	<?php foreach($products as $product): ?>
			<div class="col-sm-3" style="margin-top:30px;">
			<?php $this->loadView('container_prod', $product); ?>
			</div>


			<?php
				
			if($a >= 3) {
				$a = 0;
				$q++;

				echo '</div><div class="row" style="border:1px solid #ccc;margin-top:30px;">';


			} elseif ($a < 5) {
				$a++;


			}

			?>
	<?php endforeach; ?>

	</div>
	<div class="row" style="background-color:#000;">
		<div class="col-sm">
			<div class="inter">
				<h5 >Seu interesse</h5>
				<div class="campo_interesse">

					<!--  Queria fazer um slide show de divs como dos site de loja
					virtuais.

					<div id="ex2" class="slide carousel">
						<ol class="carousel-indicators">
							<li data-target="#exemplo" data-slide-to="0" class="active"></li>
							<li data-target="#exemplo" data-slide-to="1"></li>
							<li data-target="#exemplo" data-slide-to="2"></li>
							
						</ol>
						<div class="carousel-inner">
							<a href="" >
								<div class="se">
									
										<img src="<?php echo BASE_URL; ?>assets/images/1.jpg" class="w-100" />
								
								</div>
							</a>
							<a href="" >
								<div class="se">

										<img src="<?php echo BASE_URL; ?>assets/images/4.jpg" class="w-100" />
										
						
								</div>
							</a>
							<a href="" >
								<div class="se">
									
										<img src="<?php echo BASE_URL; ?>assets/images/3.jpg ?>" class="w-100" />
										

								</div>	
							</a>	


						</div>

						<a href="#ex2" data-slide="next" class="carousel-control-next">
							<span class="carousel-control-next-icon"></span>

						</a>

						<a href="#ex2" data-slide="next" class="carousel-control-next">
							<span class="carousel-control-next-icon"></span>

						</a>



					</div>  -->
				</div>
			</div>
		</div>
	</div>
	
	<div class="row before_footer_row">
		<div class="col-sm">

			<div class="container_before_footer">	
				<div class="before_footer">
					<a href="<?php echo BASE_URL; ?>products/open/<?php echo $products['id']; ?>" style="width:100%;height:100%;">
						<img class="img-fluid img-thumbnail" src="<?php echo BASE_URL; ?>assets/images/prod/3.jpg ?>" />
	<!-- Aqui tem um bug pois eu bnão estou pegando a image pelo id, vamos resolver depois -->
					</a>
				</div>
			</div>

		</div>
		<div class="col-sm">
<!-- Aqui tem um bug pois eu bnão estou pegando a image pelo id, vamos resolver depois -->
			
			<div class="container_before_footer">
				<div class="before_footer">
					<a href="<?php echo BASE_URL; ?>products/open/<?php echo $products['id']; ?>" style="width:100%;height:100%;">
						<img class="img-fluid img-thumbnail" src="<?php echo BASE_URL; ?>assets/images/prod/2.jpg ?>" />
					</a>
				</div>
			</div>
			
		</div>
	</div>
</div>