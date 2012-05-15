<!--<?php use_javascript('confirmationHandler.js') ?>  -->

<!--code will be transferred to client/modules/listing/templates/createSuccess-->
<!--code will be revised in order to separate js and css codes-->

<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
	</style>
</head>
<body onload="initialize('<?php echo $requestedlisting->getName() ?>', '<?php echo $listingMapInfo->getGoogleLatitude() ?>', '<?php echo $listingMapInfo->getGoogleLongitude() ?>')">
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
		</table>
	</div>
 	<div id="map_canvas" style="width:500px; height:300px"></div>
	<div>
		<table>
			<tr>
				<td><a href="<?php echo url_for('listings/edit?id='.$requestedlisting->getListingId()) ?>">Edit</a></td>
				<td><a href="javascript:confirmation(<?php echo $requestedlisting->getListingId(); ?>)">Delete</a></td>
			</tr>
		</table>
	</div>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA7fszUfLwSkbdvGQ-qnC1KSbBlPrlbAMk&sensor=false"></script>
<script type="text/javascript">
	function confirmation(ID) {
		var answer = confirm("Delete entry?")
		if (answer){
			window.location = "../listings/delete?id="+ID;
		}
	}
	function initialize(name, mapLatitude, mapLongitude) {
        var myOptions = {
          center: new google.maps.LatLng(mapLatitude,mapLongitude),
          zoom: 16,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
      
       var marker = new google.maps.Marker({
	      position: new google.maps.LatLng(mapLatitude,mapLongitude),
	      map: map,
	      title: name
	  });
	}
</script>

</body>