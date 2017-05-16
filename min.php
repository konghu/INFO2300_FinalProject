 
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

 require 'static/config.php';

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$newresult = $mysqli->query("SELECT * FROM minutes");
	echo $mysqli->error;


	$url = $_SERVER['REQUEST_URI'];
	$index = strpos($url, '=');
	$wantID =  substr($url, $index+1);
	$name1 = NULL;
	$caption1 = NULL;
	$credit1= NULL;
	$filepath1 = NULL;
	?>


	<?
	echo"<br>";
	if(isset($_SESSION["logged_user"])){

		if(isset($_POST['submit_logout'])){
			unset($_SESSION[ "logged_user" ] );
			print("You have been logged out.");
		}
		if(!isset($_POST['submit_logout'])){
			echo"<form action= 'min.php?min_id=$wantID' method='post'>";
			echo"<input type='submit' name='submit_logout' value='Log Out' class='please'>";
			echo"</form>";
		}
	}
	if(!isset($_SESSION["logged_user"])){
		echo "<form action= 'index.php' method='post'>";
		echo"<input type='submit' name='submit_logout' value='Log In' class='please'>";
		echo"</form>";
	}
	?>


	<h2>Meeting Minutes</h2>
	<?
	$file_pointer = NULL;
	$data_file_name = NULL;

	$result = $mysqli -> query("SELECT * FROM minutes WHERE minutes.minuteID = $wantID");
	while ( $row = $result->fetch_assoc() ) {
		$data_file_name = "minute/".$row['path']."";
//		$data_file_name ="minute/'why.txt'";
		//print ($data_file_name);


        $file = fopen($data_file_name,"r");

        while(! feof($file))
        {
            echo fgets($file). "<br />";
        }

        fclose($file);


	}


?>
</body>
<html>