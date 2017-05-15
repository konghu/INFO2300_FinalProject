<!-- Static navigation bar for all pages. -->

<div class="loginButton">

    <a href="login.php">Login</a>
</div>

<div class="headerWrapper">

    <div class="slider" id="main-slider"><!-- outermost container element -->
        <div class="slider-wrapper"><!-- innermost wrapper element -->
            <img src="img/images.jpg" alt="First" class="slide" /><!-- slides -->
            <img src="img/church.jpg" alt="Second" class="slide" />
            <img src="img/d_glass.jpg" alt="Third" class="slide" />
        </div>
    </div>

    <h1> First Presbyterian Church of Waterloo
    </h1>

</div>


<div id="navBar" class="col-md-12">

    <div class="col-md-2">

        <a href="index.php">Home</a>
    </div>

    <div class="col-md-2">
        <a href="albums.php">Photos</a>
    </div>

    <?php

    //provide upload photo feature if user is logged in
    if (isset($_SESSION['logged_user'])) {
        echo '<div class="col-md-2">
        <a href="uploadPhotos.php">Upload Photos</a>
        </div>';
    }
    ?>


    <div class="col-md-2">
        <a href="contact.php">Contact</a>
    </div>
    <div class="col-md-2">
        <a href="eventcalendar.php">Calendar</a>
    </div>

    <div class="col-md-2">
        <a href="minutes.php">Meeting Minutes</a>
    </div>
</div>