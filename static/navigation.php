<!-- Static navigation bar for all pages. -->
<div class="headerWrapper">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img class="headerSlides" src="img/ChristWindows.jpg" alt="test">
            </div>

            <div class="item">
                <img class="headerSlides" src="img/window.jpg" alt="test">
            </div>

            <div class="item">
                <img class="headerSlides" src="img/Postcard.jpeg" alt="test">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



<div id="navBar" class="col-md-12">
	<div class="col-md-2 col-md-offset-2">
		<a href="index.php">Home</a>
	</div>
	<div class="col-md-2">
			<a href="index.php">History</a>
    </div>
    <div class="col-md-2">
        <a href="albums.php">Photo Gallery</a>
    </div>
    <div class="col-md-4">
        <a href="index.php">Contact</a>
    </div>
</div>

<!--            --><?php

//greet user and provide logout if user is logged in

//        TODO: Login

//if (isset($_SESSION['logged_user'])) {
//    echo '<div class="section">';
//    echo 'WELCOME, ' . $_SESSION['logged_user'] . '!';
//    echo '</div>';
//
//    echo '<div class="section">';
//    echo '<a href="logout.php"> Log Out</a>';
//    echo '</div>';
//}
//user is not logged in, give a link
//            else {
//                echo '<div class="section">';
//                echo '<a href="login.php"> Log In</a>';
//                echo '</div>';}
//?>
