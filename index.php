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
    <p>The First Presbyterian Church of Waterloo is a warm and welcoming community of

faith located in the heart of downtown Waterloo, NY. We are dedicated to spreading

the love of God through service to our community and the nurturing of our

congregation. </p>
       <p>Location: 42 East Main St.</p>
       <p>Sunday Worship Hours: 10am</p>
    
    <h1>
            What we do
        </h1>
    
    <p>Worship:
    </p>
    <p>
        Sunday services incorporate traditional liturgy and personal sharing in a relaxed

and warm atmosphere. The music is a blend of traditional and contemporary styles.

Children and youth are valued participants in our worship and we welcome their

curious energy. Communion is celebrated the first Sunday of every month and on

special holy days.
    </p><br>
    <p>Christian Education:
    </p>
    <p>
        Sunday School – For grades 1-5 offered during worship

Teen Group – For Middle and High School Youth offered during worship

Ecumenical Bible Study – Fridays at 1 pm in the church lounge
    </p><br>
    <p>Community Outreach
    </p>
    <p>Friday Free Lunch:
    </p>
    <p>From September through June we provide a free meal every Friday for the

community. We have many “regulars” as well as visitors who come to enjoy a hot

meal and socialize with one another.
    </p><br>
    <p>
        Betsy’s Playroom:
    </p>
    <p>Betsy’s playroom is a play space located at the Five Points Correctional Facility

where small children can receive supervised care while their family members are

visiting loved ones at the facility. It is named after Betsy Patsos whose vision it was

to build and host this playroom. The church continues to coordinate a group of

volunteers who staff the playroom on Saturdays during visiting hours. We are

always looking for new volunteers willing to help with this important outreach

effort.
    </p><br>
    <p>Harmony Food Pantry:
    </p>
    <p>Founded and directed by Josh McKimm, the Harmony Food Pantry was created to

serve families who needed a pantry they could access on the weekend. The church

serves as host site for this pantry which is open on Saturdays from 10am – 12 noon.

For more information please contact Josh McKimm or visit their facebook page

(@harmonyfp).
    </p>

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



