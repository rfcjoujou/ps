

<div class="row">
	<?php if(!empty($filters) OR !empty($filters_selected)): ?> 
	<div class="col-sm-3">



		<div class="sidebar">

			<?php $this->loadView('sidebar', array('filters' => $filters, 'filters_selected' => $filters_selected)); ?>

		</div>
		
		
		
		

		

	</div>
	<?php else: ?>
	<div class="col-sm" style="text-align:center;">
		<div class="alert alert-warning" style="max-width:600px;margin:auto;margin-top:20px;">Não há produtos em Promoção hoje</div>
	</div>
	<?php endif; ?>

	<?php 
	$a = 0;
	$q = 0;
	?>

		<?php foreach($products as $product): ?>
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

