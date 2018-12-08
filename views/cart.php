<h3 style="text-align:center;margin-top:20px;">Carrinho de Compras</h3><br/>

<?php if(!isset($options_prod_cart) && !empty($options_prod_cart))  {
	header("Location: ".BASE_URL);
} ?>


<table class="table table-hover">
	<thead >
		<tr>
			<th width="100px">Imagem</th>
			<th >Nome</th>
			
			<th width="60">Cor</th>
			<th width="50">Tamanho</th>
			<th width="50">Qtd.</th>
			<th width="130">Preço</th>

			<th  width="20"></th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$subtotal = 0;
	?>







		


		<?php foreach($options_prod_cart as $cartProd): ?>
		<?php foreach($cartProd as $prodAllInformation): ?>
		<?php foreach($prodAllInformation as $value_ProdAll): ?>
		

		 <tr>
		 	

				

				
					
				
				
			
				
				
				
				<td ><img  style="width:100px;height:100px;" src="<?php echo BASE_URL; ?>assets/images/prod/<?php echo $value_ProdAll['product_info']['image']; ?>" /></td>
				<td><?php echo utf8_encode($value_ProdAll['product_info']['name']); ?></td>
				
				
				
					
				<?php 
					$subtotal += (floatval($value_ProdAll['product_info']['price']) * intval($value_ProdAll['qt']));
				?>


				<td><?php echo $value_ProdAll['color']; ?></td>
				<td><?php echo $value_ProdAll['tamanho']; ?></td>
				<td><?php echo $value_ProdAll['qt']; ?></td> 
			
				
			<td>R$ <?php echo number_format($value_ProdAll['product_info']['price'], 2, ',', '.'); ?></td>	
			<td><div style="width:28px;height:28px;padding:1px;padding-left:3px;" class="delete_prod"><a href="<?php echo BASE_URL; ?>cart/del/<?php echo $value_ProdAll['product_info']['id']; ?>/<?php echo $value_ProdAll['product_info']['id_sub_cor']; ?>/<?php echo $value_ProdAll['product_info']['size']; ?> "><img  style="width:22px;height:22px;" src="<?php echo BASE_URL; ?>assets/images/del.png" /></a></div></td>																											
							
		</tr>
	<?php endforeach; ?>
	<?php endforeach; ?>	
	<?php endforeach; ?>


	</tbody> 
</table>
<div style="float:right;margin-right:70px;margin-top:-25px;">
	<p><strong>Subtotal: R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></strong><p>
</div>

