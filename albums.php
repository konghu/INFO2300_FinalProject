<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!--Gets static head and required assets-->
    <?php require 'static/head.php'; ?>

</head>

<div>

    <!--Gets static navigation bar-->
    <?php require 'static/navigation.php'; ?>

    <div id="content">

        <!--Gets static PHP functions-->
        <?php require 'static/main.php'; ?>

        <?php

        require_once 'static/config.php'; ?>

        <?php

        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        ?>
        <div class="row">

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
                <div class="col-md-6">
                    <div class="col-md-12">
                        <a href="viewphotos.php?aid=<?php echo $albumID; ?>">
                            <img style="height: 350px; width: 600px" class="img-thumbnail"
                                 src="<?php echo $viewPhoto['url'] ?>">
                        </a>
                    </div>
                    <div class="col-md-12">
                        Date:<?php echo $date ?>
                    </div>
                    <div class="col-md-12">
                        Caption:<?php echo $caption ?>
                    </div>
                </div>

                <?php
            }

            ?>

            <!--TODO: Login-->
            <div class="functions">
                <div class="create">
                    <a href="createAlbums.php">Create</a>
                </div>
                <div class="upload">
                    <a href="uploadPhotos.php">Upload</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

