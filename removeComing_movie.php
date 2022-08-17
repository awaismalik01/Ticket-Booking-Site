<?php
    $removed = 0;
    $connectionString=mysqli_connect('localhost','awais','test1234','moontastic_cinema');
    if($connectionString)
    {
        $MovieID=mysqli_real_escape_string($connectionString,$_POST['removecoming']);
        $sqlQuery="DELETE FROM coming_soon WHERE movie_id = $MovieID";

        $singleRawResult=mysqli_query($connectionString,$sqlQuery);
        if($singleRawResult)
        {
            $removed = 1;
        }
    }
    else
    {
        echo 'Fails to connect to database:'.mysqli_connect_error();
    }
?>



<html>
    <head>
        <title>Add Movie</title>
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="pics/favicon.png">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/style.js"></script>
    </head>
    <body>
    <?php
            if($removed == 1)
            {
                header("Location:control.php");
            }
        ?>
    </body>
</html>