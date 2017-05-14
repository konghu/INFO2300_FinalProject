<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!--Gets static head and required assets-->
    <?php require 'static/head.php';?>

</head>

  <body>
      
       

    <!--Gets static navigation bar-->
	<?php require 'static/navigation.php';?>

<div id="content">
    <p>The First Presbyterian Church of Waterloo is a moderate size congregation located in the Finger Lakes. </p>

    <div id="map">
        <script>
            function initMap() {
                var uluru = {lat: 42.501588, lng: -92.333287};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 13,
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

</div>
</body>

<?php require 'static/footer.php';?>
</html>



