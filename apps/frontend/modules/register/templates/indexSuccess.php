<h1>Register</h1>
<?php if ($sf_user->hasFlash('notice')): ?>
  <div ><?php echo $sf_user->getFlash('notice') ?></div>
<?php endif ?><br/>
<?php include_partial('form', array('form' => $form)) ?>
<a href="javascript:void(0)">Reset Password</a>
<div id="forgotPassword" style="display:none">
	<form method="post" action="<php echo url_for('@accoount-request-reset-password')>">
		<input name="email" type="text" placeHolder="sample@mail.com">
		<input type="submit" value="reset password">
	</form>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('div#forgotPassword').dialog({
			autoOpen: true,
			width: 420
		});
	});
	$('a').click(function(){
		alert('yeah jquery');
	});
</script>