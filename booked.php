<?php
    $confirm = false;
    if(isset($_POST['seat']) && isset($_POST['name'])  && isset($_POST['id']))
    {
        session_start();
        $totalSeat = sizeof($_POST['seat']);
        
        $connectionString=mysqli_connect('localhost','awais','test1234','moontastic_cinema');

        if($connectionString)
        {
            $Name=mysqli_real_escape_string($connectionString,$_POST['name']);
            $ID=mysqli_real_escape_string($connectionString,$_POST['id']);
            
            $seatNo = [];
            
            for($i = 0; $i<$totalSeat; $i++)
            {
                $temp = mysqli_real_escape_string($connectionString, $_POST['seat'][$i]);
                array_push($seatNo, $temp);
            }
            
            $MovieID = $_SESSION['MovieID'];
            $MovieTimeID = $_SESSION['MovieTimeId'];
                    
            //Step 2: Make the query

            $sqlQuery="select id from screen where movie_id = '$MovieID' and DT_id = '$MovieTimeID'";       //always return single value.
            $queryResult=mysqli_query($connectionString,$sqlQuery);
            $informationArray=mysqli_fetch_all($queryResult, MYSQLI_ASSOC);
            
            $screenID = $informationArray[0]['id'];

            $sqlQuery="select id from customers where id = '$ID'";
            $queryResult=mysqli_query($connectionString,$sqlQuery);
            if($queryResult)
            {
                $informationArray=mysqli_fetch_all($queryResult, MYSQLI_ASSOC);
                if($informationArray)
                {
                    for($i = 0; $i < $totalSeat; $i++)
                    {
                        $sqlQuery="insert into seats values('$seatNo[$i]', '$MovieTimeID', '$screenID')";
                        $queryResult=mysqli_query($connectionString,$sqlQuery);
                        if($queryResult)
                        {
                            $confirm = true;
                        }
                        else
                        {
                            $confirm = false;
                        }
                    }
                    
                    for($i = 0; $i < $totalSeat; $i++)
                    {
                        $sqlQuery="insert into booking(movie_id, screen_id, customer_id, seat_no, DT_id) values('$MovieID','$screenID' ,'$ID', '$seatNo[$i]', '$MovieTimeID')";
                        $queryResult=mysqli_query($connectionString,$sqlQuery);
                    }
                    if($queryResult)
                    {
                        $confirm = true;
                    }
                    else
                    {
                        $confirm = false;
                    }
                }
                else
                {
                    
                    $sqlQuery="insert into customers values('$ID', '$Name')";
                    $queryResult=mysqli_query($connectionString,$sqlQuery);
                    if($queryResult)
                    {
                        $confirm = true;
                    }
                    else
                    {
                        $confirm = false;
                    }

                    for($i = 0; $i < $totalSeat; $i++)
                    {
                        $sqlQuery="insert into seats values('$seatNo[$i]', '$MovieTimeID', '$screenID')";
                        $queryResult=mysqli_query($connectionString,$sqlQuery);    
                    }
                    if($queryResult)
                    {
                        $confirm = true;
                    }
                    else
                    {
                        $confirm = false;
                    }
                    
                    for($i = 0; $i < $totalSeat; $i++)
                    {
                        $sqlQuery="insert into booking(movie_id, screen_id, customer_id, seat_no, DT_id) values('$MovieID','$screenID' ,'$ID', '$seatNo[$i]', '$MovieTimeID')";
                        $queryResult=mysqli_query($connectionString,$sqlQuery);
                    }
                    if($queryResult)
                    {
                        $confirm = true;
                    }
                    else
                    {
                        $confirm = false;
                    }

                }
            }
        }
        else
        {
            echo 'Fails to connect to database:'.mysqli_connect_error();
        }
        session_unset();
        session_destroy();
    }
    else
    {
        echo "We can not save empty value.";
    }
?>

<!DOCTYPE html>
    <head>
        <title>Booked</title>
        <link rel="stylesheet" href="CSS/style.css">
        <script src="js/style.js"></script>
    </head>
    <body>
        <div class="menu_bar">
            <img src="pics/logo_transparent.png" alt="logo" class="menu_img">
        </div>
        <hr>
        <?php
            if($confirm)
            {
                $sqlQuery="select Name from movie where id = '$MovieID'";       //always return single value.
                $queryResult=mysqli_query($connectionString,$sqlQuery);
                $informationArray=mysqli_fetch_ASSOC($queryResult);
                $MovieName = $informationArray['Name'];
                
                $sqlQuery="select DT from date_time where id = '$MovieTimeID'";       //always return single value.
                $queryResult=mysqli_query($connectionString,$sqlQuery);
                $informationArray=mysqli_fetch_ASSOC($queryResult);
                $MovieTime = $informationArray['DT'];
            }
        ?>

        <div class = "container">
            <h2>Dear Customer, Your booking has been confrimed.</h2>
            <h2>Name: <?php echo $Name; ?></h2>
            <h2>Movie Name: <?php echo $MovieName; ?></h2>
            <img style = 'width: 30%; height: 50%;' src = 'pics/<?php echo $MovieName ?>.jpg'>
            <h2>Screen No: <?php echo $screenID; ?></h2>
            <h2>Timing: <?php echo $MovieTime; ?></h2>
            <h2>Seats:
            
                <?php
                for($i = 0; $i<$totalSeat; $i++)
                {
                    echo $seatNo[$i]. " ";
                }
                echo "<br>";
                ?>
            </h2>
            
            <form  id="Home" action="index.php">
                <input id = "Home" type="submit" value="Home">
            </form>
        </div>
    </body>
</html>