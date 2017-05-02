<?php session_start();?>

<!DOCTYPE html>
<head>

    <!--Gets static head and required assets-->
    <?php require 'static/head.php';?>

</head>

<body>


<!--Gets static PHP functions-->
<?php require 'static/main.php';?>


<?php

require_once 'static/config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


?>

<form action="uploadPhotos.php" method="post" enctype="multipart/form-data">
    <input type="file" name="newphoto" />
    <p class="info">Note</p>
    <input type="text" name="note" placeholder="Note"/>

    <select name="album">
        <?php
            $albums = $mysqli->query("select * from events");
            while ($album = $albums->fetch_assoc()) {
                ?>
                <option value=<?php echo $album['albumID']?>><?php echo $album['date']?></option>
                <?php
            }
        ?>
    </select>

    <br>
    <input type="submit" name="upload"/>
</form>

<?php

if (isset($_POST['upload'])) {

    //check if a file has been selected
    if (!empty($_FILES['newphoto'])) {

        $newPhoto = $_FILES['newphoto'];

        //sanitize originalName for URL
        $originalName = $newPhoto['name'];
        $originalName = filter_var($originalName, FILTER_SANITIZE_URL);


        //check that there are no errors
        if ($newPhoto['error'] == 0) {
            //upload selected file
            $tempName = $newPhoto['tmp_name'];
            move_uploaded_file($tempName, "img/$originalName");
            $url = "img/$originalName";
            echo $url;
            echo $_POST['album'];
            echo $_POST['note'];
            $note = $_POST['note'];
            $mysqli->query("INSERT INTO photos VALUES (DEFAULT, '$note', '$url')");

            $test = $mysqli->query("select count(*) from photos");
            $t = $test->fetch_assoc();
            $photoID = $t ["count(*)"];

            $mysqli->query("INSERT INTO contains VALUES (DEFAULT, '1', '$photoID' )");


        }
    } //error
    else {
        print("Error: The file could not be uploaded.\n");
    }
}
?>
</body>

</html>