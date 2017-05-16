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

        <div id="staff">
            <h1> Staff Introduction </h1>
            <div class="Row">
                <div class="Cell">
                    <img src="img/staff_sarah.jpg" alt="Church Pastor - Rev. Sarah West">
                </div>
                <div class="Cell">
                    <p>Has been serving as our pastor since 2007. She has a B.A. in English from Bethany College as well as a M.Div. and M.A. in Social Service Administration from the University of Chicago. She is an ordained minister in the Christian Church (Disciples of Christ) with dual standing in the United Church of Christ. She and her husband and their three children live in Ithaca, NY.  In her free time Sarah enjoys going for walks in the woods, music, dancing, reading and baking.</p>
                </div>
            </div><br>
            <div class="Row">
                <div class="Cell">
                    <img src="img/staff_carol.jpg" alt="Church Secretary - Carol Gibbs">
                </div>
                <div class="Cell">
                    <p>Carol has been church secretary since January 2008, and a member of our church for over 50 years.  She and husband, Brent, live in Seneca Falls, and have owned the VanCleef Homestead Bed and Breakfast since August 2006.  They have two married children and two beautiful granddaughters.  Carol is a graduate of Freeman Business School, and her previous 35 years of employment experience included Seneca Army Depot and Phelps Family Dentistry.  She enjoys family time and tending to her flower gardens in her "spare" time! </p>
                </div>
            </div>
        </div>

    <p>Hours: </p>

    <div id="map">
        <script>
            function initMap() {
                var uluru = {lat: 42.904084, lng: -76.860867};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
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



