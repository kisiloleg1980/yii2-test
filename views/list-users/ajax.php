<?php foreach ($Models as $value ) : ?>
	<?= $this->render('_item', ['Model' => $value]) 	?>
<?php endforeach; ?>