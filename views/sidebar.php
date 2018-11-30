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

						<?php foreach($viewData['filters']['options'] as $option): ?>
							<strong><?php echo $option['name']; ?></strong><br/>
							<?php foreach($option['options'] as $op): ?>

								<div class="filteritem">
									
									<a href="" style="color:#000;text-decoration:none;" id="filter_options<?php echo $op['id']; ?>">
										<input type="checkbox" <?php echo (isset($viewData['filters_selected']['options']) && in_array($op['value'], $viewData['filters_selected']['options']))?'checked="checked"':''; ?> name="filter[options][]"   id="filter_option<?php echo $op['id']; ?>"  value="<?php echo $op['value']; ?>"/> 
										
										<label for="filter_options<?php echo $op['id']; ?>"><?php echo $op['value']; ?></label>
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
