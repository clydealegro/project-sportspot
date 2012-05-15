<!--<?php use_javascript('confirmationHandler.js') ?> -->
<!--javascript code temporarily here, needs to be transferred-->
<!--module needs to be transferred to client-->

<table>
	<?php foreach ($listings as $listing): ?>
		<tr>
			<td>
				<a href="<?php echo url_for('listings/view?id='.$listing->getListingId()) ?>"><?php echo $listing->getName(); ?></a>
			</td>
			<td>
				<a href="<?php echo url_for('listings/edit?id='.$listing->getListingId()) ?>">Edit</a>
			</td>
			<td>
				<a href="javascript:confirmation(<?php echo $listing->getListingId(); ?>)" >Delete</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>

<a href="<?php echo url_for('listings/new') ?>">Create Listing</a>

<script type="text/javascript">
	function confirmation(ID) {
		var answer = confirm("Delete entry?")
		if (answer){
			window.location = "../listings/delete?id="+ID;
		}
	}
</script>