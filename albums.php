<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <!--Gets static head and required assets-->
    <?php require 'static/head.php'; ?>

</head>

    <body>


    <!--Gets static navigation bar-->
    <?php require 'static/navigation.php'; ?>

        <!--Gets static PHP functions-->
        <?php require 'static/main.php'; ?>

        <?php

        require_once 'static/config.php'; ?>

        <?php

        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        ?>

        <?php

        if (isset($_SESSION['logged_user'])) {
            //display forms
//                echo '
//            <div class="functions">
//                <div class="create">
//                    <a href="createAlbums.php">Create</a>
//                </div>
//                <div class="upload">
//                    <a href="uploadPhotos.php">Upload</a>
//                </div>
//            </div>'


            echo '<div class="hiddenContent">
            Create an Album
            <form action="createAlbums.php" method="post">
                <input type="text" name="caption" placeholder="Caption">
                <input type="date" name="date">
                <input class="submit" name="submit" type="submit" value="Submit">
            </form>
           
            </div>'
            ;}


        ?>

    <?php
    if (isset($_POST['submit'])) {
        //Get injection-safe _POST data
        $caption = htmlentities($_POST['caption']);
        $date = htmlentities($_POST['date']);

        $insertAlbums = $mysqli->query("INSERT INTO albums VALUES (DEFAULT , '$caption','$date', '0' )");

        $mysqli->query("update albums set minuteID = albumID ");

        echo("<div class='hiddenContent'> Album successfully added. </div>");
    }

    ?>

<div id="content">
        <div class="wrapper">

            <?php
            //Display all albums

            $albums = $mysqli->query('SELECT * FROM albums');

            while ($album = $albums->fetch_assoc()) {
                $albumID = $album['albumID'];
                $caption = $album['caption'];
                $date = $album['date'];
                $minuteID = $album['minuteID'];

                $photos = $mysqli->query("select * from contains where albumID = '" . $albumID . "' ");
                $photo = $photos->fetch_assoc();
                $photoID = $photo['photoID'];
                $viewPhotos = $mysqli->query("select * from photos where photoID = '" . $photoID . "' ");
                $viewPhoto = $viewPhotos->fetch_assoc();
                ?>
                <div class="col-md-5 col-md-offset-1">
                    <div class="col-md-12">
                        <a href="viewphotos.php?aid=<?php echo $albumID; ?>">
                            <img class="thumbnail"
                                 src="<?php echo $viewPhoto['url'] ?>">
                        </a>
                    </div>
                    <div class="col-md-12">
                        Date: <?php echo $date ?>
                    </div>
                    <div class="col-md-12">
                        Caption: <?php echo $caption ?>
                    </div>
                </div>

                <?php
            }

            ?>
        </div>
    </div>

</body>
<?php require 'static/footer.php';?>
</html>

