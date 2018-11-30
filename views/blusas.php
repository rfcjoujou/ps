<div class="row">
	<div class="col-sm-3">
		<div class="sidebar">

			<?php $this->loadView('sidebar', array('filters' => $filters, 'filters_selected' => $filters_selected)); ?>

		</div>
	</div>
	


	<?php 
	$a = 0;
	$q = 0;
	?>

		<?php foreach($products as $product): ?>
		<div class="col-sm-3" style="margin-top:15px;">
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

