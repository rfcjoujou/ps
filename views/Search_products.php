<?php print_r($FilterSearch); ?>


<div class="row">
	<div class="col-sm-3">
		<div class="sidebar">
		

			<?php $this->loadView('sidebar', array('filters' => $FilterSearch['filters'], 'filters_selected' => $FilterSearch['filters_selected'])); ?>

		</div>
	</div>
		



	<?php 
	$a = 0;
	$q = 0;
	?>

		<?php foreach($FilterSearch['products'] as $product): ?>
		<div class="col-sm-3" style="margin-top:30px;">
		<?php $this->loadView('container_prod', $product); ?>
		</div>


		<?php
						
		if($a >= 3) {
			$a = 0;
			$q++;

			echo '</div><div class="row">';


		} elseif ($a < 2) {
			$a++;


		}

		?>
		

			


		
	<?php endforeach; ?>
</div>

