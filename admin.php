<?php
    
    $connectionString=mysqli_connect('localhost','awais','test1234','moontastic_cinema');
    if($connectionString)
    {
        $sqlQuery="SELECT user, password FROM admin";

        $singleRawResult=mysqli_query($connectionString,$sqlQuery);
        if($singleRawResult)
        {
            $informationArray=mysqli_fetch_all($singleRawResult, MYSQLI_ASSOC);
            session_start();

            $_SESSION["username"] = $informationArray[0]['user'];
            $_SESSION["password"] = $informationArray[0]['password'];
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

<script>
    
</script>

<html>
    <head>
        <title>Admin</title>
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
                <li><a href="coming_soon.php">Coming Soon</a><i class="fa fa-hourglass-half"></i></li>                
                <li class = "active"><a href="admin.php">Admin Login</a></li>
            </ul>
        </div>

        <div class="container">
            <form action = "control.php" method = "POST" 
            onSubmit = "return checkPassword(this, '<?php echo $_SESSION["username"]; ?>', '<?php echo $_SESSION["password"]; ?>')">

                <label for="usrname">Username</label>
                <input type="text" id="username" name="username" required>

                <label for="psw">Password</label>
                <input type="password" id="password" name="password" required>
                
                <input type="submit" value="Log In">
                <input type="reset" value="Reset">
            </form>
        </div>

        <div class="links2">
            <p>Ⓒ 2020 Copyright, All rights reserved.</p>
        </div>

    </body>
</html>