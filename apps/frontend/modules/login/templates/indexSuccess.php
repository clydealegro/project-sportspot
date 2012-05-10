<?php if ($sf_user->hasFlash('loginerror')): ?>
  <div ><?php echo $sf_user->getFlash('loginerror') ?></div>
<?php endif ?>
<form action="<?php echo url_for('login/submit') ?>" method="POST">
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" />
      </td>
    </tr>
  </table>
</form>