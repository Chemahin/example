
<form action="<?= URL ?>/book/create" method="POST" class="col-sm-6 col-sm-offset">
	<div class="form-group">
    	<label for="name">NAME:</label>
    	<input type="text" class="form-control" id="name" name="name">
  	</div>
  	<div class="form-group">
    	<label for="price">PRICE:</label>
    	<input type="text" class="form-control" id="price" name="price">
  	</div>
  	<div class="form-group">
    	<label for="category">CATEGORY:</label>
    	<select class="form-control" id="category" name="category">
			<?php foreach ($categories as $cat): ?>
				<option><?= $cat?></option>
			<?php endforeach; ?>
    	</select>
  	</div>

  	<div class="form-group">
    	<label for="themes">THEMES:</label>
    	<select class="form-control" id="themes" name="themes">
			<?php foreach ($themes as $thems): ?>
				<option><?= $thems?></option>
			<?php endforeach; ?>
    	</select>
  	</div>

  	<div class="checkbox">
    <label><input type="checkbox" value="1" name="new"> NEW BOOK</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>

</form>

