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
    <div id="staff">
        <h1> Staff Introduction </h1>
        <div class="Row">
            <div class="Cell">
                <img src="img/staff_sarah.jpg" alt="Church Pastor - Rev. Sarah West">
            </div>
            <div class="Cell">
                <p>Has been serving as our pastor since 2007. She has a B.A. in English from Bethany College as well as a M.Div. and M.A. in Social Service Administration from the University of Chicago. She is an ordained minister in the Christian Church (Disciples of Christ) with dual standing in the United Church of Christ. She and her husband and their three children live in Ithaca, NY.  In her free time Sarah enjoys going for walks in the woods, music, dancing, reading and baking.</p>
            </div>
        </div>
        <div class="Row">
            <div class="Cell">
                <img src="img/staff_carol.jpg" alt="Church Secretary - Carol Gibbs">
            </div>
            <div class="Cell">
                <p>Carol has been church secretary since January 2008, and a member of our church for over 50 years.  She and husband, Brent, live in Seneca Falls, and have owned the VanCleef Homestead Bed and Breakfast since August 2006.  They have two married children and two beautiful granddaughters.  Carol is a graduate of Freeman Business School, and her previous 35 years of employment experience included Seneca Army Depot and Phelps Family Dentistry.  She enjoys family time and tending to her flower gardens in her "spare" time! </p>
            </div>
        </div>
    </div>
    <div id="contact form">
		<?php

	$nameBlank = $emailBlank = $commentBlank = "";
	$name = $email = $comment = "";

	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		if (empty($_POST["name"])) {
			$nameBlank = "Name is required";
		} else {
			$name = test_input($_POST["name"]);
    // check that there are only letters and whitespace in name
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$nameBlank = "Only letters and white space allowed"; 
			}
		}

		if (empty($_POST["email"])) {
			$emailBlank = "Email is required";
		} else {
			$email = test_input($_POST["email"]);
    // check if e-mail address is in the right format
			//PHP conditionals
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailBlank = "Invalid email format"; 
			}
		}

		if (empty($_POST["comment"])) {
			$commentBlank="Please enter a comment";
		} else {
			$comment=test_input($_POST["comment"]);
		}

	}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>

        <h1>Contact Form</h1>

        <p><span class="error padding">*Required fields.</span></p>
        <form class="align" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
            Name: <input type="text" name="name" value="<?php echo $name;?>">
            <span class="error">* <?php echo $nameBlank;?></span>
            <br><br>
            E-mail: <input type="text" name="email" value="<?php echo $email;?>">
            <span class="error">* <?php echo $emailBlank;?></span>
            <br><br>
            Comment/Event Feedback: <br><textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
            <span class="error">* <?php echo $commentBlank;?></span>
            <br><br>
            <input type="submit" name="submit" value="Submit">  
            <br><br>
        </form>
        <!-- PHP Conditionals -->
        <?php
        if ((!empty($_POST["email"]))&&(filter_var($email, FILTER_VALIDATE_EMAIL))&&(!empty($_POST["comment"]))&&(!empty($_POST["name"]))){
            echo "<p class='padding'>Your Submission:</p>";
            //mail function
            $to='mds349@cornell.edu';
            $subj='User Submission';
            $messageDisplayed= "Name: ".$name."<br>"."Email: ".$email."<br>"."Comment: ".$comment;
            $message= "Name: ".$name."\n\n"."Email: ".$email."\n\n"."Comment: ".$comment;
            echo $messageDisplayed;
            mail($to, $subj, $message);
            echo"<h1>Thank you for your input! It will be taken into consideration!</h1>";
        }
        ?>
    </div>
</div>
</body>
<?php require 'static/footer.php';?>
</html>

