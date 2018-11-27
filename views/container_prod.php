
<div class="quadr_product">
	<a href="<?php echo BASE_URL; ?>products/open/<?php echo $viewData['id']; ?>" style="color:#000">												
		<img class="img-fluid"   src="<?php echo BASE_URL; ?>assets/images/prod/<?php echo $viewData['images']['url'] ?>" />
														
		<div class="price_container">
			<p>A partir de R$ <?php echo number_format($viewData['price'],2, ',', '.'); ?></p>
			<button class="btn btn_buy">Compra</button>
		</div>
	</a>
</div>
	




