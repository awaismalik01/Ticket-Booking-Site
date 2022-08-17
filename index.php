<?php
    $connectionString=mysqli_connect('localhost','awais','test1234','moontastic_cinema');
    if($connectionString)
    {
        $sqlQuery="select A.Name, A.id, B.DT_id, C.DT from movie as A, screen as B, date_time as C where A.id = B.movie_id and B.DT_id = C.id and C.DT > CURRENT_TIMESTAMP()";

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
                <li class="active"><a href="index.php">Now Playing</a><i class="fa fa-home"></i></li>
                <li><a href="coming_soon.php">Coming Soon</a><i class="fa fa-hourglass-half"></i></li>
                <li><a href="admin.php">Admin Login</a></li>
            </ul>
        </div>
      
        <div class="w3-content w3-display-container">
            
            <img class="mySlides" src="pics/p1.jpeg" style="width:100%" height="70%">
            <img class="mySlides" src="pics/p2.jpeg" style="width:100%" height="70%">
            <img class="mySlides" src="pics/p3.jpeg" style="width:100%" height="70%">
            <img class="mySlides" src="pics/p4.jpeg" style="width:100%" height="70%">
            

            <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
        </div>

        <script>
            var slideIndex = 1;
            showDivs(slideIndex);
            
            function plusDivs(n)
            {
                showDivs(slideIndex += n);
            }
        </script>
        
        <section class = "movies">
            <div class = "containerM">

                <?php
                    if(isset($informationArray))
                    {
                        $prev = "none";
                        $size = sizeof($informationArray);
                        for($i = 0; $i < $size; $i++)
                        {
                            $t = 0;

                            $name = $informationArray[$i]['Name'];
                            $time = $informationArray[$i]['DT'];
                            $timeID = $informationArray[$i]['DT_id'];
                            $id = $informationArray[$i]['id'];
                                
                            echo " <div class = 'movie'>";
                                echo "<div class = 'movie-image'>
                                        <img src = 'pics/".$name.".jpg' class = 'movie-image'>
                                    </div>";
                                
                                echo "<div class = 'movie-Description'> 
                                        <h2>".$name."</h2>
                                    </div>";
                                
                                echo "<div class = 'movie-times'> ";
                                    
                                    do
                                    {
                                        if($t >= 1)
                                            $i++;
                                        
                                        
                                        echo "<a class = 'btn' href='booking.php?data=".$id."|".$timeID."'>$time</a>
                                        <br>";
                                        $t++;
                                    }while(($i + 1) < $size && $name == $informationArray[$i + 1]['Name']);

                                echo "</div>";

                            echo "</div>";

                            $t = 0;
                        }
                    }
                ?>

            </div>
        </section>

        <div class="links2">
            <p>Ⓒ 2020 Copyright, All rights reserved.</p>
        </div>

    </body>
</html>