<div class="row">
	<div class="col-sm">
		<div class="setas_prev">
			<div class="seta-prev">&nbsp;</div>
			
		</div>
		<div class="setas_next">
			<div class="seta-next">&nbsp;</div>
		</div>

		<div class="mainphoto">
			<img src="<?php echo BASE_URL; ?>assets/images/prod/<?php echo $prod_images[0]['url']; ?>" />
		
		</div>


		<div class="gallery">
			<?php foreach($prod_images as $prod_img ): ?>
			<div class="photo_item">
				<img src="<?php echo BASE_URL; ?>assets/images/prod/<?php echo $prod_img['url']; ?>" />
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="col-sm-6" style="margin-top:60px;">
		<div class="information_prod">
			<h5><?php echo utf8_encode($prod_info['name']); ?></h5>
			<hr/>
			<p><?php echo utf8_encode($prod_info['description']); ?></p>
			<hr/>

			<?php foreach($prod_options as $product_options): ?><br/>
			<?php echo $product_options['name']; ?><select >
			<option></option>
			<option><?php echo $product_options['value']; ?></option>

			</select>
			<hr/>
			<?php endforeach; ?>
			<hr/>

			De: <span class="price_from"><?php echo 'R$ '.number_format($prod_info['price_from'],2, ',', '.'); ?></span><br/>
			<span class="price_original">Por: <strong style="font-size:24px;"><?php echo 'R$ '.number_format($prod_info['price'],2, ',', '.'); ?></strong></span>
			<hr/>
			
				<form method="POST" class="addtocartfrom">
					<p style="float:left;margin-right:4px;margin-top:3px;">Quantidade:</p>
					<button data-action="decrease" >-</button><input type="text" name="qt" value="50" class="addtocart_qt" disabled/><button data-action="increase" >+</button>
					
					<input class="btn addtocart_submit" type="submit" value="Comprar" />
				</form>
			
		</div>
	</div>
</div>



<?php print_r($prod_info); ?>
<br/><br/>

<?php print_r($prod_images); ?>
<br/><br/>
<?php print_r($prod_options); ?>