<?php
    $added = 0;
    $connectionString=mysqli_connect('localhost','awais','test1234','moontastic_cinema');
    if($connectionString)
    {
        $MovieID=mysqli_real_escape_string($connectionString,$_POST['addmovie']);
        $ScreenID=mysqli_real_escape_string($connectionString,$_POST['screen']);
        $DateTime=mysqli_real_escape_string($connectionString,$_POST['DateTime']);
        $DateTime = str_replace("T"," ",$DateTime);
        
        $sqlQuery = "SELECT name FROM movie WHERE id = '$MovieID'";
        $RawResult=mysqli_query($connectionString,$sqlQuery);
        $MovieName=mysqli_fetch_all($RawResult, MYSQLI_ASSOC);
        $MovieName = $MovieName[0]['name'];

        $sqlQuery = "SELECT id FROM date_time WHERE DT = '$DateTime'";
        $RawResult=mysqli_query($connectionString,$sqlQuery);
        $DateTimeID=mysqli_fetch_all($RawResult, MYSQLI_ASSOC);
        if(!$DateTimeID)
        {
            $sqlQuery = "DELETE FROM coming_soon WHERE movie_id = '$MovieID'";
            $RawResult=mysqli_query($connectionString,$sqlQuery);
            
            $sqlQuery="INSERT INTO date_time (DT) VALUES ('$DateTime')";
            $RawResult=mysqli_query($connectionString,$sqlQuery);

            $sqlQuery = "SELECT id FROM date_time WHERE DT = '$DateTime'";
            $RawResult=mysqli_query($connectionString,$sqlQuery);
            if($RawResult)
            {
                $DateTimeID=mysqli_fetch_all($RawResult, MYSQLI_ASSOC);
            }
            
        }
        
        $id = $DateTimeID[0]['id'];
        
        


        $sqlQuery="INSERT INTO screen (id, movie_id, DT_id) VALUES ('$ScreenID', '$MovieID','$id')";
        $RawResult=mysqli_query($connectionString,$sqlQuery);
        if($RawResult)
        {
            
            $added = 1;
        }
        else
        {
            $added = 0;
        }
    }
    else
    {
        echo 'Fails to connect to database:'.mysqli_connect_error();
    }
?>

<html>
    <head>
        <title>Add Screen</title>
        <link rel="stylesheet" href="CSS/style.css">
        <script src="js/style.js"></script>
    </head>
    <body>
        <div class="menu_bar">
            <img src="pics/logo_transparent.png" alt="logo" class="menu_img">
        </div>
        <hr>
        
        <div class="container">
            <?php
                if($added == 1)
                {
                    echo '<h1>Movie added to Screen Sucecssfully</h1>';
                    echo "<h1>$MovieName<h1>";
                    $MovieName = $MovieName.".jpg";
                    echo "<img style = 'width: 30%; height: 50%;' src = 'pics/".$MovieName."'>";
                    echo "<h1>Seceen ID: $ScreenID</h1>";
                    echo "<h1>Date-Time: $DateTime</h1>";
                }
                else
                {
                    echo '<h1>You are not allowed to add movie at same existing screen and time</h1>';
                }
                
            ?>
            <br>
            <form action="control.php">
                <input type="submit" value="Return Back">
            </form>
        </div>
    </body>
</html>