<h3 style="text-align:center;margin-top:20px;">Carrinho de Compras</h3><br/>
<?php //print_r($productsInCart); ?><br/><br/>
<?php //print_r($options_prod_cart); ?><br/><br/> 





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




		


		


		<?php foreach($options_prod_cart as $cartProd): ?>
		<?php foreach($cartProd as $prodAllInformation): ?>
		<?php print_r($prodAllInformation['product_info']); ?>
		 <tr>
		 	

				

				
					
				
				
			
				
				
				
				<td ><img  style="width:100px;height:100px;" src="<?php echo BASE_URL; ?>assets/images/prod/<?php echo $prodAllInformation['product_info']['image']; ?>" /></td>
				<td><?php echo utf8_encode($prodAllInformation['product_info']['name']); ?></td>
				
				
				
					
				<?php 
					$subtotal += (floatval($prodAllInformation['product_info']['price']) * intval($prodAllInformation['qt']));
				?>


				<td><?php echo $prodAllInformation['color']; ?></td>
				<td><?php echo $prodAllInformation['tamanho']; ?></td>
				<td><?php echo $prodAllInformation['qt']; ?></td> 
			
				
			<td>R$ <?php echo number_format($prodAllInformation['product_info']['price'], 2, ',', '.'); ?></td>	
																															
							
		</tr>
	<?php endforeach; ?>	
	<?php endforeach; ?>
	<?php //endforeach; ?>
	<?php //endforeach; ?>	


	</tbody> 
</table>
<div style="float:right;margin-right:70px;margin-top:-25px;">
	<p><strong>Subtotal: R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></strong><p>
</div>

