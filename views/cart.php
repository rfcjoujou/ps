<h3 style="text-align:center;margin-top:20px;">Carrinho de Compras</h3><br/>
<?php print_r($productsInCart); ?><br/><br/>
<?php print_r($options_prod_cart); ?><br/><br/> 

?>



<table class="table table-hover">
	<thead >
		<tr>
			<th width="100px">Imagem</th>
			<th >Nome</th>
			
			<th width="60">Cor</th>
			<th width="50">Tamanho</th>
			<th width="50">Qtd.</th>
			<th width="130">Preço</th>

			<th  width="24"></th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$subtotal = 0;
	?>
	
	<?php foreach($productsInCart as $prod_cart): ?>
	<?php 

	$subtotal += (floatval($prod_cart['price']) * intval($prod_cart['qt']));
	?>
		
			<?php foreach($options_prod_cart as $cartProd): ?>
			<?php foreach($cartProd as $value_option): ?>
			<tr>
				


				
				
				<td ><img  style="width:100px;height:100px;" src="<?php echo BASE_URL; ?>assets/images/prod/<?php echo $prod_cart['image']; ?>" /></td>
				<td><?php echo utf8_encode($prod_cart['name']); ?></td>

					
						
						
					

							<td><?php echo $value_option['color']; ?></td>
							<td><?php echo $value_option['tamanho']; ?></td>
					

					
				
				<td><?php echo $prod_cart['qt']; ?></td>
				<td>R$ <?php echo number_format($prod_cart['price'], 2, ',', '.'); ?></td>
				
			</tr>
			<?php endforeach; ?>
			<?php endforeach; ?>
	<?php endforeach; ?>

	</tbody>
</table>
<div style="float:right;margin-right:70px;margin-top:-25px;">
	<p><strong>Subtotal: R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></strong><p>
</div>

