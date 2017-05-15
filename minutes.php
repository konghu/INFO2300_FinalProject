 
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

 <?
          
          
    echo"<br>";
    if(isset($_SESSION["logged_user"])){

    if(isset($_POST['submit_logout'])){
      unset($_SESSION[ "logged_user" ] );
      print("You have been logged out.");
    }
if(!isset($_POST['submit_logout'])){
    echo"<form action= 'minutes.php' method='post'>";
    echo"<input type='submit' name='submit_logout' value='Log Out' class='please'>";
    echo"</form>";
}
  }
  if(!isset($_SESSION["logged_user"])){
    echo "<form action= 'login.php' method='post'>";
    echo"<input type='submit' name='submit_logout' value='Log In' class='please'>";
    echo"</form>";
  }
    ?>

  <h2>Upload Meeting Minutes</h2>


  <?php

  if ( isset( $_SESSION[ 'logged_user' ] ) ) {
    $logged_user = $_SESSION[ 'logged_user' ];
    print "<p>Welcome, $logged_user!</p>";

    require 'static/config.php';
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


//ADD minutes  FORM
    echo"<form action= 'minutes.php' method='post' enctype='multipart/form-data'>";

    echo"<h3>Please fill out the entries below</h3>";
    echo"<input type='file' name='newphoto'>";
    echo"Overview: <input type='text' name='name'>";
    echo"Lecturer: <input type='text' name='caption'>";

    echo"<input type = 'submit' name='submit_add' class='help'>"; 
    echo"<br><br>";
    echo"</form>";


    $name = NULL;
    $caption = NULL;
    $value_list = NULL;
    $newPhoto = NULL;
    $originalName = NULL;
    $path = NULL;
//CHECK USER INPUT

    function good($name, $caption){

      $name = filter_input( INPUT_POST, 'name', FILTER_SANITIZE_STRING );
      $caption = filter_input( INPUT_POST, 'caption', FILTER_SANITIZE_STRING );
     
      if (is_null($name) || strlen($name)==0 || strlen($name)>50  ){
        echo ( "Notes or small description is required and please limit input to 50 characters. Not uploaded.");
        echo"<br>";
        return NULL;
      }
     
      else if (is_null($caption) || strlen($caption)==0 || strlen($caption)>20 ){
        echo ( "Lecturer is required and please limit input to 20 characters. Not uploaded.");
        echo"<br>";
        return NULL;
      }
      else{
        return [$name, $caption];
      }
    }
//ADD THE INPUT

    if (isset($_POST['submit_add'])){

      $possible = good($name, $caption);
      if(!is_null($possible)){
        $value_list = implode( "','", $possible );
        $value_list =  "'". $value_list."'";
        $newPhoto=$_FILES['newphoto'];
        $originalName = $newPhoto['name'];

        $path="minute/$originalName";

        if (!empty($_FILES['newphoto']['name'])){
          $FileType = pathinfo($originalName, PATHINFO_EXTENSION);
          if ($FileType != "txt" && $FileType != "doc" && $FileType != "docx"){
            echo"The file type is not supported. (only supports .txt .doc or .docx) Minutes not uploaded.";
            echo"<br>";
            return NULL;
          }else if(file_exists($path)){
            echo"Sorry this file already exists.<br>";
            return NULL;
          }
          else{
            if ($newPhoto[ 'error' ] == 0 ) {
              $tempName = $newPhoto[ 'tmp_name' ];
              move_uploaded_file( $tempName, "minute/$originalName");
              $value_list =  $value_list.",'".$originalName."'";
  //DOESN'T WORK YET
              $mysqli->query("INSERT INTO minutes VALUES (DEFAULT, $value_list)");
           
              print("The file $originalName was uploaded successfully.");
              
            }
            else{
              print("Error: The file $originalName was not uploaded.\n");
            }
          }
        }
        else{
          print("Please select a file to upload.");
        }

      }
    }

  $result = $mysqli->query("SELECT * FROM minutes");


  while ( $row = $result->fetch_assoc() ) {
   
    echo"Overview: $row[overview]<br>";
    echo"lecturer: $row[lecturer]<br>";
    echo "$row[path]";
    echo "$row[minuteID]";
    echo("<a href='min.php?min_id=".$row['minuteID']."'>
      < src='minute/".$row['path']."' alt='Meme'></a><br>");
   
  }
  


  }
  else {
    print "<p>Please login to use this feature</p>
<p>Mahima, the meeting minutes should still be shown without logging in. Only upload feature is hidden. (Kong)  </p>";
  }

  ?>

</div>
</body>
<?php require 'static/footer.php';?>
</html>
