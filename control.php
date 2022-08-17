<?php
    $connectionString=mysqli_connect('localhost','awais','test1234','moontastic_cinema');
    if($connectionString)
    {
        $sqlQuery="select id, Name from movie WHERE id not in(SELECT movie_id FROM screen) and id not in(SELECT movie_id FROM coming_soon)";
        
        $RawResult=mysqli_query($connectionString,$sqlQuery);
        if($RawResult)
        {
            $MovieArrayRemovable=mysqli_fetch_all($RawResult, MYSQLI_ASSOC);
        }
        else
        {
            echo 'Data not Found 1';
        }

        $sqlQuery="select id, Name from movie WHERE id not in(SELECT movie_id FROM coming_soon) and
        ( id not in(SELECT movie_id FROM screen) or id in(SELECT movie_id FROM screen where DT_id in (select id from date_time where DT < CURRENT_TIMESTAMP()) ) )";
        
        $RawResult=mysqli_query($connectionString,$sqlQuery);
        if($RawResult)
        {
            $MovieArrayComing=mysqli_fetch_all($RawResult, MYSQLI_ASSOC);
        }
        else
        {
            echo 'Data not Found 1';
        }

        $sqlQuery="select id, Name from movie";
        
        $RawResult=mysqli_query($connectionString,$sqlQuery);
        if($RawResult)
        {
            $MovieArray=mysqli_fetch_all($RawResult, MYSQLI_ASSOC);
        }
        else
        {
            echo 'Data not Found 1';
        }

        $sqlQuery="select id, Name from movie where id in(select Movie_id from coming_soon)";
        
        $RawResult=mysqli_query($connectionString,$sqlQuery);
        if($RawResult)
        {
            $ComingMovieArray=mysqli_fetch_all($RawResult, MYSQLI_ASSOC);
        }
        else
        {
            echo 'Data not Found 1';
        }

    }
    else
    {
        echo 'Fails to connect to database:'.mysqli_connect_error();
    }
?>

<html>
    <head>
        <title>Control</title>
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
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
        <br>

        <div class="container">
            <form action = "add_movie.php" method = "POST">

                <label for="moviename">Add Movie Name, Image Name should be exact same as Movie Name</label>
                <input type="text" id="moviename" name="moviename" required>

                <input type="submit" value="Add Movie">
            </form>
        </div>

        <br>

        <div class="container">
            <form action = "Update_movie.php" method = "POST">

                <label for="updatemovie">Select Movie to Update:</label>
                <select name="updatemovie" id="updatemovie" required>
                    <option value="">None</option>
                    <?php
                        foreach($MovieArray as $singleMovie)
                        {
                            echo "<option value=".$singleMovie['id'].">".$singleMovie['Name']."</option>";
                        }
                    ?>
                </select>
                <br><br>
                <label for="moviename">Enter Movie Name</label>
                <input type="text" id="moviename" name="moviename" required>

                <input type="submit" value="Update Movie">
            </form>
        </div>
        
        <br>

        <div class="container">
            <form action = "coming_movie.php" method = "POST">

                <label for="comingmovie">Select Movie to Add in Coming Soon:</label>
                <select name="comingmovie" id="comingmovie" required>
                    <option value="">None</option>
                    <?php
                        foreach($MovieArrayComing as $singleMovie)
                        {
                            echo "<option value=".$singleMovie['id'].">".$singleMovie['Name']."</option>";
                        }
                    ?>
                </select>
                <br>

                <input type="submit" value="Add Coming Movie">
            </form>
        </div>
        
        <br>

        <div class="container">
            <form action = "removeComing_movie.php" method = "POST">

                <label for="removecoming">Select Movie to Remove from Coming Soon:</label>
                <select name="removecoming" id="removecoming" required>
                    <option value="">None</option>
                    <?php
                        foreach($ComingMovieArray as $singleMovie)
                        {
                            echo "<option value=".$singleMovie['id'].">".$singleMovie['Name']."</option>";
                        }
                    ?>
                </select>
                <input type="submit" value="Remove Coming Movie">
            </form>
        </div>

        <br>

        <div class="container">
            <form action = "remove_movie.php" method = "POST">

                <label for="removemovie">Select Movie to Remove:</label>
                <select name="removemovie" id="removemovie" required>
                    <option value="">None</option>
                    <?php
                        foreach($MovieArrayRemovable as $singleMovie)
                        {
                            echo "<option value=".$singleMovie['id'].">".$singleMovie['Name']."</option>";
                        }
                    ?>
                </select>
                <input type="submit" value="Remove Movie">
            </form>
        </div>

        <br>

        <div class="container">
            <form action = "Add_screen.php" method = "POST">

                <label for="addmovie">Select Movie to Add:</label>
                <select name="addmovie" id="addmovie" required>
                    <option value="">None</option>
                    <?php
                        foreach($MovieArray as $singleMovie)
                        {
                            echo "<option value=".$singleMovie['id'].">".$singleMovie['Name']."</option>";
                        }
                    ?>
                </select>
                <br><br>

                <label for="screen">Select Screen:</label>
                <select name="screen" id="screen" required>
                    <option value="">None</option>
                    <?php
                        for($i = 1; $i <= 8; $i++)
                        {
                            echo "<option value=".$i.">".$i."</option>";
                        }
                    ?>
                </select>
                <br><br>
                
                <label for="DateTime">Select Date Time:</label>
                <input type="datetime-local" id="DateTime" name="DateTime" required>

                <input type="submit" value="Add Screen">
            </form>
        </div>
    </body>
</html>