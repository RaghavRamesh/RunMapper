<?php include("header.php"); ?><hr>
<div id="mapview">
	<div id="map-canvas"></div>
</div><br>
<h3 style="text-align:left;">
	<?php
	// Create connection
	$con = mysql_connect("runmapperdb.db.10834469.hostedresource.com", "runmapperdb", "Devweekend#1");
	mysql_select_db("runmapperdb", $con);		

	// routeID, creator and startTime
	//echo $_GET['routeID'];
	$titleQuery = "SELECT route.name FROM route WHERE route.routeID = ".$_GET['routeID'];

	$titleTuple = mysql_query($titleQuery);
	$title = mysql_fetch_array($titleTuple);


	$urlQuery = "SELECT route.url FROM route WHERE route.routeID = ".$_GET['routeID'];
	$urlTuple = mysql_query($urlQuery); 
	$url = mysql_fetch_array($urlTuple);
	$lats = $url['url'];
	// <span id='url'>$url</span>
	?>
	
	<script>
		var myUrl = <?php echo json_encode($lats); ?>;
		console.log(myUrl);
		
var map;
var markersArray = [];
var num = 0;
var distance=0.0;
var address;
var url = myUrl ;
      function initMap()
      {
          var latlng = new google.maps.LatLng(1.2950, 103.778);
          var myOptions = {
              zoom: 16,
              center: latlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
          geocoder = new google.maps.Geocoder();

          // add a click event handler to the map object
          
          var values = url.split(";");
          var i = values.length;
          var j = 0;
          for(j=0; j<i; j=j+2) {
          	markersArray[j/2] = new google.maps.LatLng(values[j],values[j+1]);
          }
          i=i/2;
          for(num=0;num<i;num++)
          {
              // place a marker
              placeMarker(markersArray[num]);	
			if(num ==0 )
			{
				getLocation();
				//initStreet();
			}
			if(num>0)
			{	
				distance = distance + google.maps.geometry.spherical.computeDistanceBetween(markersArray[num-1], markersArray[num]);
				var flightPlanCoordinates = [
         			new google.maps.LatLng(markersArray[num-1].lat(), markersArray[num-1].lng()),
  	  				new google.maps.LatLng(markersArray[num].lat(), markersArray[num].lng())
					];
					var flightPath = new google.maps.Polyline({
				    path: flightPlanCoordinates,
  					strokeColor: '#000080',
  					strokeOpacity: 1.0,
  					strokeWeight: 5
					});					
					flightPath.setMap(map);
			}
          }
      }
      
      function initStreet()
		{
			var panoramaOptions = {
			position: markersArray[0],
			pov: {
			heading: 34,
			pitch: 10
			}
			};
			var panorama = new  google.maps.StreetViewPanorama(document.getElementById('pano'),panoramaOptions);
			map.setStreetView(panorama);
		}
		  
      function getLocation() {
			geocoder.geocode({ 'latLng': markersArray[0] }, function (results, status) {
					if (status !== google.maps.GeocoderStatus.OK) {
						alert(status);
					}
					// This is checking to see if the Geoeode Status is OK before proceeding
					if (status == google.maps.GeocoderStatus.OK) {
						console.log(results[0].formatted_address);
						address = (results[0].formatted_address);
					}
			});	
		}      
		
        function placeMarker(location) {
            var marker = new google.maps.Marker({
                position: location, 
                map: map
            });
        }
google.maps.event.addDomListener(window, 'load', initMap);
	</script>
	
</h3><br> 
<div class="container" style="width:100%;">
  <div class="row" style="text-align:center;">
  	<div class="span5">
		<div class="box" style="text-align:left;">
		<label class="headingtext">Creator: </label>
		<?php
		echo $_GET['creator'];
		?>
		<br />
		<label class="headingtext">Start Time: </label>
		<?php
		echo $_GET['starttime'];
		?>
		<br/>
		<label class="headingtext">Duration: </label>
		<?php
		$durationQuery = "SELECT run.duration FROM run, route WHERE route.routeID=".$_GET['routeID'];
		$durationTuple = mysql_query($durationQuery);
		$duration = mysql_fetch_array($durationTuple);
		echo $duration['duration'];
		?>
		<br/>

		</div>
  	</div>
  	<div class="span3">
  		<?php
  		$routeID = $_GET['routeID'];
  		$creator=$_GET['creator'];
  		$starttime=$_GET['starttime'];
  		?>
  			<a class="btn btn-large btn-primary" type="submit" href="success.php?routeID=<?php echo $routeID; ?>&creator=<?php echo $creator; ?>&starttime=<?php echo $starttime; ?>" style="width:200px;">Join</a><br><br>
  		<div class="box">
  		<?php 
  			echo $_GET['creator'];
  		?>
  		</div>
  	</div>
  </div>
</div>
<?php include("footer.php") ?>
