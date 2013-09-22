var map;
var markersArray = [];
var num = 0;
var distance=0.0;
var address;
var url = 0;

      function initMap()
      {
          var latlng = new google.maps.LatLng(1.2950, 103.778);
          var myOptions = {
              zoom: 16,
              center: latlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
          geocoder = new google.maps.Geocoder();

          // add a click event handler to the map object
          google.maps.event.addListener(map, "click", function(event)
          {
              // place a marker
              placeMarker(event.latLng);	
			if(num ==0 )
			{
				getLocation();
				initStreet();
				url = markersArray[0].getPosition().lat().toString()+";"+markersArray[0].getPosition().lng().toString();
			}
			if(num>0)
			{
				distance = distance + google.maps.geometry.spherical.computeDistanceBetween(markersArray[num-1].getPosition(), markersArray[num].getPosition());

				var flightPlanCoordinates = [
         			new google.maps.LatLng(markersArray[num-1].getPosition().lat(), markersArray[num-1].getPosition().lng()),
  	  				new google.maps.LatLng(markersArray[num].getPosition().lat(), markersArray[num].getPosition().lng())
					];
					var flightPath = new google.maps.Polyline({
				    path: flightPlanCoordinates,
  					strokeColor: '#000080',
  					strokeOpacity: 1.0,
  					strokeWeight: 5
					});
					
					flightPath.setMap(map);
					console.log(distance);
				}
			url = url.concat(";"+markersArray[num].getPosition().lat().toString()+";"+markersArray[num].getPosition().lng().toString());	
			num = num + 1;
			
			$('#submitRoute').on('click', function() {
			document.getElementById("distance").innerHTML = (Math.floor(distance).toFixed(0))/1000;	
			console.log("Something happens");
			});
			$('#submitRoute').on('click', function() {
			document.getElementById("address").innerHTML = address;	
			console.log("Something happens");
			});
			$('#submitRoute').on('click', function() {
			document.getElementById("url").innerHTML = url;	
			console.log("Something happens");
			});
          });
      }
      
      function initStreet()
		{
			var panoramaOptions = {
			position: markersArray[0].getPosition(),
			pov: {
			heading: 34,
			pitch: 10
			}
			};
			var panorama = new  google.maps.StreetViewPanorama(document.getElementById('pano1'),panoramaOptions);
			map.setStreetView(panorama);
		}
		  
      function getLocation() {
			geocoder.geocode({ 'latLng': markersArray[0].getPosition() }, function (results, status) {
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

            markersArray.push(marker);
        }

google.maps.event.addDomListener(window, 'load', initMap);
