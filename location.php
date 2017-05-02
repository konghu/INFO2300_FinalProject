
<!DOCTYPE html>
<html>
  <head>
    <style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>
    
  </head>
  <body>
    <h3>Church Location</h3>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 42.501588, lng: -92.333287};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaHTwaa6in6RGmY-8vlFpB1iJQOEi7ce0&callback&callback=initMap">
    </script>
  </body>
</html>