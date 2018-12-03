<div class="row">
	<div class="col-sm-6" style="background-color:black;margin-top:20px;border-radius:10px;border-top:15px solid #000;border-bottom:15px solid #000">


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
	<div class="col-sm-6" style="margin-top:80px;">
		<div class="information_prod">
			<h5><?php echo utf8_encode($products['name']); ?></h5>
			<hr/>
			<p><?php echo utf8_encode($products['description']); ?></p>
			<hr/>
			
			<form method="POST" class="addtocartfrom" action="<?php echo BASE_URL; ?>cart/add">

				<label style="float:left;text-align:center;">Cor</label>
				<select name="option_cor" class="form-control" style="margin-top:-2px;height:70%;float:left;">
					<option></option>
					<?php foreach($quantity_stock_option as $stock_option): ?><br/>
					
					<?php if($stock_option['id_option'] == 2 && $stock_option['option_stock'] > 0): ?>
					
					<option  value="<?php echo $stock_option['p_value']; ?>"><?php echo $stock_option['p_value']; ?>
						<?php if($stock_option['option_stock']  == '1'): ?>
						<span>(<?php echo $stock_option['option_stock'] ?> item no estoque)</span>
						<?php else: ?>
						<span>(<?php echo $stock_option['option_stock'] ?> itens no estoque)</span>
						<?php endif; ?>

					</option>


					
					<?php endif; ?>
					<?php endforeach; ?>
					
				</select>

				<hr/><br/>
				<label style="float:left;text-align:center;">Tamanho</label>
				<select name="option_tamanho" class="form-control" style="margin-top:-2px;height:70%;float:left;">
					<option></option>
					<?php foreach($quantity_stock_option as $stock_option): ?><br/>
					
					<?php if($stock_option['id_option'] == 1 && $stock_option['option_stock'] > 0): ?>
					
					<option  value="<?php echo $stock_option['p_value']; ?>"><?php echo $stock_option['p_value']; ?>
						<?php if($stock_option['option_stock']  == '1'): ?>
						<span>(<?php echo $stock_option['option_stock'] ?> item no estoque)</span>
						<?php else: ?>
						<span>(<?php echo $stock_option['option_stock'] ?> itens no estoque)</span>
						<?php endif; ?>

					</option>


					
					<?php endif; ?>
					<?php endforeach; ?>
					
				</select>
				<hr/>

				De: <span class="price_from"><?php echo 'R$ '.number_format($products['price_from'],2, ',', '.'); ?></span><br/>
				<span class="price_original">Por: <strong style="font-size:24px;"><?php echo 'R$ '.number_format($products['price'],2, ',', '.'); ?></strong></span>
				<hr/>
				
					
						<input type="hidden" name="id_product" value="<?php echo $products['id']; ?>" />
						<input type="hidden" name="option_color" />
						<input type="hidden" name="qt_product" value="1" />

						<p style="float:left;margin-right:4px;margin-top:3px;">Quantidade:</p>
						<button data-action="decrease" >-</button><input type="text" name="qt" value="1" class="addtocart_qt" disabled/><button data-action="increase" >+</button>
						
						<input class="btn addtocart_submit" type="submit" value="Comprar" />
			</form>
			
		</div>
	</div>
</div>

