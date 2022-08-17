<?php
    $connectionString=mysqli_connect('localhost','awais','test1234','moontastic_cinema');
    if($connectionString)
    {
        $sqlQuery="select A.Name from movie as A, coming_soon as B where A.id = B.movie_id";

        $singleRawResult=mysqli_query($connectionString,$sqlQuery);
        if($singleRawResult)
        {
            $informationArray=mysqli_fetch_all($singleRawResult, MYSQLI_ASSOC);
        }
    }
    else
    {
        echo 'Fails to connect to database:'.mysqli_connect_error();
    }
?>

<html>
    <head>
        <title>Moontastic Cinemas</title>
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="pics/favicon.png">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/style.js"></script>
    </head>
    <body>
        
        <div class="menu_bar">
            <img src="pics/logo_transparent.png" alt="logo" class="menu_img">
            <ul>
                <li><a href="index.php">Now Playing</a><i class="fa fa-home"></i></li>
                <li class="active"><a href="coming_soon.php">Coming Soon</a><i class="fa fa-hourglass-half"></i></li>
                <li><a href="admin.php">Admin Login</a></li>
            </ul>
        </div>

        <div class = "container">
            <div class="coming_soon_bar">
                <h2 class="coming_soon_bar">Coming Soon</h2>
            </div>
        </div>
        <br>

        <?php
            if(isset($informationArray))
            {
                foreach($informationArray as $SingleMovie)
                {
                    echo "<div class = 'container'>";
                        $MovieName = $SingleMovie['Name'];
                        echo "<h1>$MovieName<h1>";
                        $MovieName = $MovieName.".jpg";
                        echo "<img style = 'width: 30%; height: 40%;' src = 'pics/".$MovieName."'>";
                    echo "</div> <br>";
                }

            }
        ?>



        <div class="links2">
            <p>Ⓒ 2020 Copyright, All rights reserved.</p>
        </div>

    </body>
</html>