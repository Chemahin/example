
<div class="col-sm-8 col-sm-offset-2">
	<table class="table table-srtipped">
		<?php for ($i=0; $i < count($books); $i++): ?>
		<tr>
			<td><?= ($i+1) ?></td>
			<td><?= $books[$i]['name']?></td>
			<td><?= $books[$i]['price']?></td>
			<td> <span class="changeNew glyphicon glyphicon-ok <?= ($books[$i]['new']==1)?'text-success':''; ?>" data-id="<?= $books[$i]['id']?>" data-new="<?= $books[$i]['new']?>"></span></td>
			<td><?= $books[$i]['category']?></td>
			<td><?= $books[$i]['themes']?></td>
			<td> <a href="<?= URL ?>/book/delete?id=<?=$books[$i]['id'] ?>" class="glyphicon glyphicon-remove text-danger"></a></td>
		</tr>
		<?php endfor; ?>
	</table>
</div>
	

