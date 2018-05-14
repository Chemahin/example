

<div class="col-sm-8 col-sm-offset-2">
<?php 
	for ($i=0; $i < count($m); $i++): ?>
	
		<h2> <?= $m[$i]['name'] ?> </h2> 
		<p> <?= $m[$i]['info']?> </p>
	
		


<?php	endfor;
?>
</div>
<form action="<?= URL ?>/film/add" method="post" class="col-sm-6 col-sm-offset">
	<input type="submit" value="Show more" name="more" class="btn btn-info">
</form>