<h5 style="text-align:center;background-color:#161414;color:#FFF;">Filtro</h5>

<form method="POST">

	
		<div class="filtercontent">
			<?php foreach($viewData['filters']['options'] as $option): ?>
				<strong><?php echo $option['name']; ?></strong><br/>
				<?php foreach($option['options'] as $op): ?>

					<div class="filteritem">
						<input type="checkbox" name="filter[options][]"  <?php echo (isset($viewData['filters_selected']['options']) && in_array($op['value'], $viewData['filters_selected']['options']))?'checked="checked"':''; ?> id="filter_brand<?php echo $op['id']; ?>"  value="<?php echo $op['value']; ?>"/> 
						<label for="filter_options<?php echo $op['id']; ?>"><?php echo $op['value']; ?></label>
						<span style="float:right">(<?php echo $op['count']; ?>)</span>
					</div>	
				<?php endforeach; ?>
				<br/>


			<?php endforeach; ?>
		</div>

</form>
