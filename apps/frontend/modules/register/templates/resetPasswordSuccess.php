<form method="post">
	<?php echo $form->renderHiddenFields()?>

	<ul>
		<legend>Reset Password</legend>
		<li>
			<label>Password</label>
			<?php echo $form['password']->render()?>
		</li>
		<li>
			<label>Confirm Password</label>
			<?php echo $form['confirm_password']->render()?>
		</li>
		<li>
			<input type="submit" value="Save">
		</li>
	</ul>
</form>