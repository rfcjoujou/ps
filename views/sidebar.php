<h5 style="text-align:center;background-color:#161414;color:#FFF;">Filtro</h5>

<!-- 
<?php if(!empty($viewData['filters_selected']['options'])): ?>
	<h5>Valores Filtrados:</h5>
	
 	 Ta errado!, funcionando mais errado 

	<?php foreach($viewData['filters_selected']['options'] as $filtred): ?>
	<div class="valor_filtrado">
		<?php foreach($viewData['filters']['options'] as $option): ?>
		<?php  print_r($_GET['url']); ?>-><?php echo $option['name']; ?>-><?php echo $filtred ?>
		<?php endforeach; ?>
	</div>

	<?php endforeach; ?>
<?php endif; ?> -->



<div class="filterarea">
	<form method="GET">

			<aside>
				<div class="filtercontent">

						<?php if(isset($busca) && !empty($busca)): ?>
								
								<input type="hidden" name="busca" value="<?php echo utf8_encode($busca['busca']); ?>"  /> 
							
						<?php endif; ?>

						<?php foreach($viewData['filters']['options'] as $option): ?>
							<strong><?php echo $option['name']; ?></strong><br/>
							<?php foreach($option['options'] as $op): ?>
								
								<div class="filteritem">
									<!--  To tentando fzer uma verificação caso exista algo na url entra no if e colocar o filtro junto
											Caso não tenha só passa o nome
									 -->

									<a href="" style="color:#000;text-decoration:none;" >
									

										<input type="checkbox" <?php echo (isset($viewData['filters_selected']['options']) && in_array($op['value'], $viewData['filters_selected']['options']))?'checked="checked"':''; ?> name="filter[options][]"   id="filter_option<?php echo $op['value']; ?>"  value="<?php echo $op['value']; ?>"/> 
									
										<label style="cursor:pointer;" for="filter_option<?php echo $op['value']; ?>"><?php echo $op['value']; ?></label>
										<span style="float:right">(<?php echo $op['count']; ?>)</span>
									</a>	
								</div>	
							<?php endforeach; ?>

							<br/>


						<?php endforeach; ?>										
				</div>
			</aside>

	</form>
</div>
<!--  Recebemos a variavél filters_selected, e filters -->
