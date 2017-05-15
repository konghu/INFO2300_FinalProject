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
?>

    <div class="col-md-12">

        <div class="row">

            <?php

            if (isset($_SESSION['logged_user'])) {

                ?>
                <div class="hiddenContent">
            		<form action="viewphotos.php?aid=<?php echo $_GET['aid']?>" method="post">
                        <input type="submit" name="delete" value="Delete This Album" />
		            </form>
                </div>

            <?php
            }

            ?>

            <?php
            if (isset($_POST['delete'])) {

                //update DB
                $delete = $mysqli->query("DELETE FROM albums WHERE albumID = '".$_GET['aid']."';");

            $photos =$mysqli->query("select * from contains where albumID = '".$_GET['aid']."' ");

            while ($photo = $photos->fetch_assoc()) {
                $photoID = $photo['photoID'];
                $delete2 = $mysqli->query("DELETE FROM photos WHERE photoID = '".$photoID."' ");

            }


                $delete3 = $mysqli->query("DELETE FROM contains WHERE albumID = '".$_GET['aid']."' ");

                //feedback
                if ($delete && $delete2 && delete3) {
                    echo ('<div class="notice">Album deleted successfully. <a href="albums.php">Go Back</a></div>');
                    return;
                } else {
                    echo ('<div class="notice">Error: album could not be deleted. <a href="albums.php">Go Back</a></div>');
                }
            }

            ?>



    <?php


    $photos =$mysqli->query("select * from contains where albumID = '".$_GET['aid']."' ");
//    echo '<div class="col-md-5 col-md-offset-4>';
    while ($photo = $photos->fetch_assoc()) {
        $photoID = $photo['photoID'];
        $viewPhotos = $mysqli->query("select * from photos where photoID = '".$photoID."' ");
        $viewPhoto = $viewPhotos->fetch_assoc();
        ?>
        <div class="col-md-4 ">
            <img class="photos" src="<?php echo $viewPhoto['url']?>">
        </div>
        <?php
    }

    ?>


        </div>
    </div>

</body>
<?php require 'static/footer.php';?>
</html>