<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="" method="POST">
  <table id="listing_form">
	<tfoot>
		<tr>
			<td colspan="2">
				<input type="submit" value="Save Listing" />
			</td>
		</tr>
	</tfoot>
	<tbody>
		<?php echo $form['name']->renderRow() ?>
		<?php echo $form['complete_address']->renderRow() ?>
		<?php echo $form['details']->renderRow() ?>
		<?php echo $form['contact_person']->renderRow() ?>
		<?php echo $form['contact_number']->renderRow() ?>
		<?php echo $form['categories']->renderRow() ?>
		<?php echo $form['map']->renderRow() ?>
		<?php echo $form->renderHiddenFields() ?>
	</tbody>
  </table>
</form>
