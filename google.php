<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
    <style type="text/css">

      #map-canvas { height: 100% }
      
      #box {height:20px; width:20px;}
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBZV0ITsQZZqUE3jzmO3FRBcZYTNN-0Zg&sensor=false">
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(1.2950, 103.780),
          zoom: 16,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        //var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>

  	<div id="box">

    </div>
  </body>
</html>