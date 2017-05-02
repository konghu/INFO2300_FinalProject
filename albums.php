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

<!--Gets static PHP functions-->
<?php require 'static/main.php';?>

<?php

require_once 'static/config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



//Display all albums

    $albums = $mysqli->query('SELECT * FROM albums');

    while ($album = $albums->fetch_assoc()) {
        $albumID = $album['albumID'];
        $caption = $album['caption'];
        $date = $album['date'];
        $minuteID = $album['minuteID'];

        $photos =$mysqli->query("select * from contains where albumID = '".$albumID."' ");
        $photo = $photos->fetch_assoc();
            $photoID = $photo['photoID'];
            $viewPhotos = $mysqli->query("select * from photos where photoID = '".$photoID."' ");
            $viewPhoto = $viewPhotos->fetch_assoc();
            ?>
        <a href="viewphotos.php?aid=<?php echo $albumID;?>">
            <img src="<?php echo $viewPhoto['url']?>">
        </a>

            <?php

        ?>
        <?php
    }

?>

</div>


</body>

</html>

