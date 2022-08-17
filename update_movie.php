<?php
    $updated = 0;
    $connectionString=mysqli_connect('localhost','awais','test1234','moontastic_cinema');
    if($connectionString)
    {
        $MovieID=mysqli_real_escape_string($connectionString,$_POST['updatemovie']);
        $MovieName=mysqli_real_escape_string($connectionString,$_POST['moviename']);
       
        $sqlQuery="UPDATE movie SET Name = '$MovieName' WHERE id = $MovieID";

        $singleRawResult=mysqli_query($connectionString,$sqlQuery);
        if($singleRawResult)
        {
            $updated = 1;
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
        <title>Update Movie</title>
        <script src="js/style.js"></script>
    </head>
    <body>
        <?php
            if($updated == 1)
            {
                header("Location:control.php");
            }
        ?>
    </body>
</html>