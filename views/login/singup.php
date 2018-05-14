<?php 
	if(Session::isSetSession('message')): ?>
		<div class="alert alert-<?= Session::getMessageType()?>">
  			<?= Session::getMessageText()?>
		</div>
<?php endif; ?>






	<form action="<?= URL ?>/user/singup" method="post" class="col-sm-6 col-sm-offset">
		<div class="form-group">
			<label for="email">Email address:</label>
		    <input type="email" class="form-control" id="email" name="email" value="<?= $form->email ?>">
		</div>
		<div class="form-group">
			<label for="firstname">FirstName:</label>
		    <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $form->firstname ?>">
		</div>
		<div class="form-group">
			<label for="lastname">LastName:</label>
		    <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $form->lastname ?>">
		</div>
		<div class="form-group">
			<label for="password">Password:</label>
		    <input type="password" class="form-control" id="password" name="password">
		</div>
		<div class="form-group">
			<label for="passwordConfirm">PasswordConfirm:</label>
		    <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm">
		</div>
		  <input type="submit" value="Submit" class="btn btn-info">
		 
	</form>