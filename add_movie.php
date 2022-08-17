<?php
    $added = 0;
    $connectionString=mysqli_connect('localhost','awais','test1234','moontastic_cinema');
    if($connectionString)
    {
        $MovieName=mysqli_real_escape_string($connectionString,$_POST['moviename']);

        $sqlQuery="INSERT INTO movie(Name) VALUES ('$MovieName')";

        $singleRawResult=mysqli_query($connectionString,$sqlQuery);
        if($singleRawResult)
        {
            $added = 1;
        }
        else
        {
            echo 'Data not Found';
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

        
       
        <div class="container">
            <?php
                echo "<h1>$MovieName<h1>";
                $MovieName = $MovieName.".jpg";
                echo "<img style = 'width: 30%; height: 50%' src = 'pics/".$MovieName."'>";
                
            ?>
            <br>
            
            <form action="control.php">
                <input type="submit" value="Return Back">
            </form>
        </div>

        

        
    </body>
</html>