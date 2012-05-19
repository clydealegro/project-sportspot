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
				<a href="javascript:confirmDelete(<?php echo $listing->getListingId() ?>)">Delete</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>

<a href="<?php echo url_for('listings/new') ?>">Create Listing</a>

