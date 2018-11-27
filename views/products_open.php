<div class="row">
	<div class="col-sm">
		<div class="mainphoto">
			<img src="<?php echo BASE_URL; ?>assets/images/prod/<?php echo $prod_images[0]['url']; ?>" />
		</div>
	</div>
	<div class="col-sm-6">
		<div class="information_prod">
			<h5><?php echo utf8_encode($prod_info['name']); ?></h5>
			
			<p><?php echo utf8_encode($prod_info['description']); ?></p>


			<strong></strong>
		</div>
	</div>
</div>



<?php print_r($prod_info); ?>
<br/><br/>

<?php print_r($prod_images); ?>
<br/><br/>
<?php print_r($prod_options); ?>