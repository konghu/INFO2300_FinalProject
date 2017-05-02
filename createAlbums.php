<?php session_start();?>

    <!DOCTYPE html>
    <head>

        <!--Gets static head and required assets-->
        <?php require 'static/head.php';?>

    </head>

    <body>

    <!--Gets static navigation bar-->
<?php require 'static/navigation.php';?>

    <!--Gets static PHP functions-->
<?php require 'static/main.php';?>


<?php

require_once 'static/config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

echo '
        <div class="upload">
            <form action="createAlbums.php" method="post">
                <input type="text" name="caption" placeholder="Caption">
                <input type="date" name="date">
                <p class="info">Caption</p>
                <input class="submit" name="submit" type="submit" value="Submit">
            </form>';

//Check if form was submitted
if (isset($_POST['submit'])) {
    //Get injection-safe _POST data
    $caption = htmlentities($_POST['caption']);
    $date = htmlentities($_POST['date']);

    $insertAlbums = $mysqli->query("INSERT INTO albums VALUES (DEFAULT , '$caption','$date', '0' )");

    $mysqli->query("update albums set minuteID = albumID ");

    echo("<br> Album successfully added.");
}

?>

</body>

</html>