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


    <div class="col-md-12">
    <?php
    require_once 'static/config.php';
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $photos =$mysqli->query("select * from contains where albumID = '".$_GET['aid']."' ");
//    echo '<div class="col-md-5 col-md-offset-4>';
    while ($photo = $photos->fetch_assoc()) {
        $photoID = $photo['photoID'];
        $viewPhotos = $mysqli->query("select * from photos where photoID = '".$photoID."' ");
        $viewPhoto = $viewPhotos->fetch_assoc();
        ?>
        <img class="rounded mx-auto d-block" src="<?php echo $viewPhoto['url']?>">
        <?php
    }

    ?>
    </div>

</body>

</html>