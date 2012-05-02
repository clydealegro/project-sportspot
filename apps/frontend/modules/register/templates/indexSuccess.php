<h1>Register</h1>
<?php if ($sf_user->hasFlash('notice')): ?>
  <div ><?php echo $sf_user->getFlash('notice') ?></div>
<?php endif ?><br/>
<?php include_partial('form', array('form' => $form)) ?>