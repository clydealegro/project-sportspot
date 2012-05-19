<div>
	<table>
		<tr>
			<td>Name:</td>
			<td><?php echo $requestedlisting->getName(); ?></td>
		</tr>
		<tr>
			<td>Complete Address:</td>
			<td><?php echo $requestedlisting->getCompleteAddress(); ?></td>
		</tr>
		<tr>
			<td>Details:</td>
			<td><?php echo $requestedlisting->getDetails(); ?></td>
		</tr>
		<tr>
			<td>Contact Person:</td>
			<td><?php echo $requestedlisting->getContactPerson(); ?></td>
		</tr>
		<tr>
			<td>Contact Number:</td>
			<td><?php echo $requestedlisting->getContactNumber(); ?></td>
		</tr>
		<tr>
			<td>Category:</td>
			<td>
			<?php echo implode(',', $sf_data->getRaw('listingCategory')) ?>
			</td>
		</tr>
		<tr>
			<td>Region:</td>
			<td><?php echo $requestedlisting->getMapInfo()->getRegion() ?></td>
		</tr>
		<tr>
			<td>City/Municipality:</td>
			<td><?php echo $requestedlisting->getMapInfo()->getCityMunicipality() ?></td>
		</tr>
		<tr>
			<td>Goole Latitude:</td>
			<td><?php echo $requestedlisting->getMapInfo()->getGoogleLatitude() ?></td>
		</tr>
		<tr>
			<td>Google Longitude:</td>
			<td><?php echo $requestedlisting->getMapInfo()->getGoogleLongitude() ?></td>
		</tr>
	</table>
</div>

<div id="map_canvas" style="width:500px; height:300px"></div>

<div>
	<table>
		<tr>
			<td><a href="<?php echo url_for('listings/edit?id='.$requestedlisting->getListingId()) ?>">Edit</a></td>
			<td><a href="javascript:confirmDelete(<?php echo $requestedlisting->getListingId() ?>)" >Delete</a></td>
		</tr>
	</table>
</div>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA7fszUfLwSkbdvGQ-qnC1KSbBlPrlbAMk&sensor=false"></script>

<script type="text/javascript">
	$(document).ready(function(){
		initialize('<?php echo $requestedlisting->getName() ?>', <?php echo $requestedlisting->getMapInfo()->getGoogleLatitude() ?>, <?php echo $requestedlisting->getMapInfo()->getGoogleLongitude() ?>);
	});
</script>