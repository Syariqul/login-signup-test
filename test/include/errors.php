<?php if (count($errors) > 0): ?>
	<div class="error mb-2 text-danger">
		<?php foreach ($errors as $error): ?>
			<p class="m-0">*<?php echo $error; ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>