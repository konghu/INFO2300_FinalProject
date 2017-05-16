<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
    
<head>

    <!--Gets static head and required assets-->
    <?php require 'static/head.php';?>

</head>

<!--Gets static navigation bar-->
<?php require 'static/navigation.php';?>
<body>
    
    <div id="content">
        <h1>
            Events
        </h1>
        <p>
            <b>Friday Free Lunch:</b>

From September through June we provide a free meal every Friday for the

community. We have many “regulars” as well as visitors who come to enjoy a hot

meal and socialize with one another.
        </p>
        <p>
            <b>Harmony Food Pantry:</b> Open Saturdays from 10 am – 12 noon

Founded and directed by Josh McKimm, the Harmony Food Pantry was created to

serve families who needed a pantry they could access on the weekend. The church

serves as host site for this pantry which is open on Saturdays from 10am – 12 noon.

For more information please contact Josh McKimm or visit their facebook page

(@harmonyfp).
        </p>
    
    <div class="calendar">
        <h1>
            Calendar
        </h1>
        <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=cornell.edu_ojkn840kmpjkaspqkjeiohqaa4%40group.calendar.google.com&amp;color=%232952A3&amp;ctz=America%2FNew_York" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
        <!-- once a css file is created, will move the style part to css -->
    
    </div>
    
    </div>
</body>

<?php require 'static/footer.php';?>

</html>
