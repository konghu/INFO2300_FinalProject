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
			echo"<form action= 'index.php' method='post'>";
			echo"<input type='submit' name='submit_logout' value='Log Out' class='please'>";
			echo"</form>";
		}
	}

	?>

	<?
	if (isset($_SESSION['logged_user'])) {
		$olduser = $_SESSION['logged_user'];
		echo"<br>Welcome $olduser you are already logged in. If you would like to log out, click the button above.<br><br>";
	} 
	else{


//password = rVTu8qHyFwLKcxLq

		require 'static/config.php';

		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$post_username = filter_input( INPUT_POST, 'username', FILTER_SANITIZE_STRING );
		$post_password = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_STRING );
		$query = ("SELECT * FROM users WHERE username = '$post_username' ");
		$result = $mysqli->query($query);
		//$hash = 'B4BFA7C761EA119F9567E287E140AA2E64985680';
		//$valid_password = password_verify( $post_password, $hash );
		$valid_password = $post_password;


		if ( $result && $result->num_rows == 1) {
			$row = $result->fetch_assoc();
			$db_hash_password = $row[ 'hashpassword' ];
			if( password_verify($post_password, $hash ) ) {
				$_SESSION['logged_user'] = $post_username;
			}
		}
		if(isset($_POST['submit_login'])){

			if ( empty( $post_username ) || empty( $valid_password ) ) {
				echo"<br>";
				echo"<p class ='space'>Please enter correct username and password</p>";
				echo"hwekko<br>";
			} 
			else if ($post_username == "fp_wildcards" && $valid_password ) {
				echo "<p class='space'>Congratulations, $post_username. You've logged in successfully!";
				$_SESSION['logged_user'] = $post_username;
			}
		}
		if((!isset($_POST['submit_logout']))&&(isset($_SESSION['logged_user'])) ){
			echo"<form action= 'index.php' method='post'>";
			echo"<input type='submit' name='submit_logout' value='Log Out' class='help'>";
			echo"</form>";
		}
	}

	if(!isset($_SESSION["logged_user"])){
// log in form		

        
        
		echo"<h3>Log In Form</h3>";
		echo"<form action='index.php' method='post'>";
		echo"<div>Username:  <input type='text' name='username' /> </div><br>";
		echo"<div>Password:  <input type='text' name='password' /> </div><br>";
		echo"<div class = 'space'><input type='submit' name='submit_login' value='Log In' class='help'></div>";
		echo"</form>";
	}

	?>
</div>
</body>
</html>



