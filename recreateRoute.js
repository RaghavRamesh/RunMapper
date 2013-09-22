var map;
var markersArray = [];
var num = 0;
var distance=0.0;
var address;
var url = "1.2948797163688504;103.77526760101318;1.2948797163688504;103.77526760101318;1.2958665170332695;103.77694129943848;1.2961882997755085;103.77955913543701;1.2946866466287008;103.77994537353516;1.2921767386694738;103.77882957458496;1.2946222900453814;103.77563238143921";
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
          console.log(values.join());
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
			console.log("num="+num);		
			if(num ==0 )
			{
				getLocation();
				initStreet();
			}
			if(num>0)
			{	console.log("Bragavalli ");
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
					console.log(distance);
					
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

            //markersArray.push(marker);
        }

google.maps.event.addDomListener(window, 'load', initMap);