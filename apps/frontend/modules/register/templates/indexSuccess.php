<script src="/js/jquery-ui/js/jquery-ui-1.8.20.custom.min.js"></script> 

<h1>Register</h1>
<?php if ($sf_user->hasFlash('notice')): ?>
  <div ><?php echo $sf_user->getFlash('notice') ?></div>
<?php endif ?><br/>

<?php include_partial('form', array('form' => $form)) ?>
<a href="javascript:void(0)">Reset Password</a>
<div id="forgotPassword" style="display:none">
	<div clas="">
		<form method="post" action="<?php echo url_for('@account-request-reset-password')?>">
			<label>Input Email</label>
			<input name="email" type="text" placeHolder="sample@mail.com" />
			<input type="submit" value="reset password" />
		</form>
	</div>
</div>

<script type="text/javascript">
	$('a').click(function(){
		$('div#forgotPassword').dialog();
	});
</script>