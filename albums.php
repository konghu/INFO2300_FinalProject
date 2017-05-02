<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!--Gets static head and required assets-->
    <?php require 'static/head.php';?>

</head>

<div>

<!--Gets static navigation bar-->
<?php require 'static/navigation.php';?>
    
    <div id="content">

<!--Gets static PHP functions-->
<?php require 'static/main.php';?>


<?php

require_once 'static/config.php';?>


<?php

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



//Display all albums
echo '<div class="col-md-6 col-md-offset-3">';
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
            <img class="img-thumbnail" src="<?php echo $viewPhoto['url']?>">
        </a>

<?php echo '</div>';?>

        <br>
        <?php echo '<div class="data"> '.$caption.' 
        <br>
        <br>
        '.$date.' </div>';?>
        <br>
        <br>
        <br>
        <br>

            <?php

        ?>

        <?php
    }

?>

<!--TODO: Login-->
    <div class="upload">
<a href ="uploadPhotos.php">Upload</a>
    </div>
</div>
</div>

</body>

</html>

