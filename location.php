
<!DOCTYPE html>
<html>
  <head>
      <?php require 'static/head.php';?>
    <style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>
    
  </head>
  <body>
      <?php require 'static/navigation.php';?>
    <h3>Church Location:  42 East Main St. 
Waterloo, NY 13165</h3>
    <div id="map">
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
      </div>
  </body>
</html>