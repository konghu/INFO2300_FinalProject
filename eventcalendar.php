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
<body>
    
    <div class="calendar">
        <iframe src="https://calendar.google.com/calendar/embed?src=cornell.edu_ojkn840kmpjkaspqkjeiohqaa4%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
        <!-- once a css file is created, will move the style part to css -->
    
    </div>
    
</body>

<?php require 'static/footer.php';?>

</html>
