<?php
    
    if(isset($_GET['data']))
    {
        $a =  $_GET['data'];
        $a = explode("|",$a);
        $MovieID = $a[0];
        $MovieTimeId = $a[1];
    }    
?>

<?php
    $connectionString=mysqli_connect('localhost','awais','test1234','moontastic_cinema');
    if($connectionString)
    {
        $sqlQuery="SELECT B.id FROM seats as B WHERE B.DT_id = $MovieTimeId and B.screen_id in (select A.id from screen as A where A.movie_id = '$MovieID' and A.DT_id = '$MovieTimeId')";

        $singleRawResult=mysqli_query($connectionString,$sqlQuery);
        if($singleRawResult)
        {
            $informationArray=mysqli_fetch_all($singleRawResult, MYSQLI_ASSOC);
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

    session_start();
    $_SESSION['MovieID']=$MovieID;
    $_SESSION['MovieTimeId']=$MovieTimeId;
?>



<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <title>Booking</title>
    
        <meta name="viewport" content="width=device-width">  
        <link rel="stylesheet" href="CSS/seatStyle.css">
        <link rel="stylesheet" href="CSS/style.css">
    </head>

    <body>
        <form  id="reservation" method = "post" action="booked.php">
            <div style="margin-left: 10%; margin-top: 5%;"> 
                <ol>
                    <li class="row row--1">
                        <ol class="seats" type="A">

                            <li class="seat">
                                <input type="checkbox" id="1A" value = "1A" name="seat[]">
                                <label for="1A">1A</label>
                            </li>

                            <li class="seat">
                                <input type="checkbox" id="1B" value = "1B" name="seat[]">
                                <label for="1B">1B</label>
                            </li>

                            <li class="seat">
                                <input type="checkbox" id="1C" value = "1C" name="seat[]">
                                <label for="1C">1C</label>
                            </li>

                            <li class="seat">
                                <input type="checkbox" id="1D" value = "1D" name="seat[]">
                                <label for="1D">1D</label>
                            </li>

                            <li class="seat">
                                <input type="checkbox" id="1E" value = "1E" name="seat[]">
                                <label for="1E">1E</label>
                            </li>

                            <li class="seat">
                                <input type="checkbox" id="1F" value = "1F" name="seat[]">
                                <label for="1F">1F</label>
                            </li>
                        </ol>
                    </li>

                    <li class="row row--2">
                    <ol class="seats" type="A">
                        <li class="seat">
                        <input type="checkbox" id="2A" value = "2A" name="seat[]">
                        <label for="2A">2A</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="2B" value = "2B" name="seat[]">
                        <label for="2B">2B</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="2C" value = "2C" name="seat[]">
                        <label for="2C">2C</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="2D" value = "2D" name="seat[]">
                        <label for="2D">2D</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="2E" value = "2E" name="seat[]">
                        <label for="2E">2E</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="2F" value = "2F" name="seat[]">
                        <label for="2F">2F</label>
                        </li>
                    </ol>
                    </li>
                    <li class="row row--3">
                    <ol class="seats" type="A">
                        <li class="seat">
                        <input type="checkbox" id="3A" value = "3A" name="seat[]">
                        <label for="3A">3A</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="3B" value = "3B" name="seat[]">
                        <label for="3B">3B</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="3C" value = "3C" name="seat[]">
                        <label for="3C">3C</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="3D" value = "3D" name="seat[]">
                        <label for="3D">3D</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="3E" value = "3E" name="seat[]">
                        <label for="3E">3E</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="3F" value = "3F" name="seat[]">
                        <label for="3F">3F</label>
                        </li>
                    </ol>
                    </li>
                    <li class="row row--4">
                    <ol class="seats" type="A">
                        <li class="seat">
                        <input type="checkbox" id="4A" value = "4A" name="seat[]">
                        <label for="4A">4A</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="4B" value = "4B" name="seat[]">
                        <label for="4B">4B</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="4C" value = "4C" name="seat[]">
                        <label for="4C">4C</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="4D" value = "4D" name="seat[]">
                        <label for="4D">4D</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="4E" value = "4E" name="seat[]">
                        <label for="4E">4E</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="4F" value = "4F" name="seat[]">
                        <label for="4F">4F</label>
                        </li>
                    </ol>
                    </li>
                    <li class="row row--5">
                    <ol class="seats" type="A">
                        <li class="seat">
                        <input type="checkbox" id="5A" value = "5A" name="seat[]">
                        <label for="5A">5A</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="5B" value = "5B" name="seat[]">
                        <label for="5B">5B</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="5C" value = "5C" name="seat[]">
                        <label for="5C">5C</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="5D" value = "5D" name="seat[]">
                        <label for="5D">5D</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="5E" value = "5E" name="seat[]">
                        <label for="5E">5E</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="5F" value = "5F" name="seat[]">
                        <label for="5F">5F</label>
                        </li>
                    </ol>
                    </li>
                    <li class="row row--6">
                    <ol class="seats" type="A">
                        <li class="seat">
                        <input type="checkbox" id="6A" value = "6A" name="seat[]">
                        <label for="6A">6A</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="6B" value = "6B" name="seat[]">
                        <label for="6B">6B</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="6C" value = "6C" name="seat[]">
                        <label for="6C">6C</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="6D" value = "6D" name="seat[]">
                        <label for="6D">6D</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="6E" value = "6E" name="seat[]">
                        <label for="6E">6E</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="6F" value = "6F" name="seat[]">
                        <label for="6F">6F</label>
                        </li>
                    </ol>
                    </li>
                    <li class="row row--7">
                    <ol class="seats" type="A">
                        <li class="seat">
                        <input type="checkbox" id="7A" value = "7A" name="seat[]">
                        <label for="7A">7A</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="7B" value = "7B" name="seat[]">
                        <label for="7B">7B</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="7C" value = "7C" name="seat[]">
                        <label for="7C">7C</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="7D" value = "7D" name="seat[]">
                        <label for="7D">7D</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="7E" value = "7E" name="seat[]">
                        <label for="7E">7E</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="7F" value = "7F" name="seat[]">
                        <label for="7F">7F</label>
                        </li>
                    </ol>
                    </li>
                    <li class="row row--8">
                    <ol class="seats" type="A">
                        <li class="seat">
                        <input type="checkbox" id="8A" value = "8A" name="seat[]">
                        <label for="8A">8A</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="8B" value = "8B" name="seat[]">
                        <label for="8B">8B</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="8C" value = "8C" name="seat[]">
                        <label for="8C">8C</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="8D" value = "8D" name="seat[]">
                        <label for="8D">8D</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="8E" value = "8E" name="seat[]">
                        <label for="8E">8E</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="8F" value = "8F" name="seat[]">
                        <label for="8F">8F</label>
                        </li>
                    </ol>
                    </li>
                    <li class="row row--9">
                    <ol class="seats" type="A">
                        <li class="seat">
                        <input type="checkbox" id="9A" value = "9A" name="seat[]">
                        <label for="9A">9A</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="9B" value = "9B" name="seat[]">
                        <label for="9B">9B</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="9C" value = "9C" name="seat[]">
                        <label for="9C">9C</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="9D" value = "9D" name="seat[]">
                        <label for="9D">9D</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="9E" value = "9E" name="seat[]">
                        <label for="9E">9E</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="9F" value = "9F" name="seat[]">
                        <label for="9F">9F</label>
                        </li>
                    </ol>
                    </li>
                    <li class="row row--10">
                    <ol class="seats" type="A">
                        <li class="seat">
                        <input type="checkbox" id="10A" value = "10A" name="seat[]">
                        <label for="10A">10A</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="10B" value = "10A" name="seat[]">
                        <label for="10B">10B</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="10C" value = "10A" name="seat[]">
                        <label for="10C">10C</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="10D" value = "10A" name="seat[]">
                        <label for="10D">10D</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="10E" value = "10A" name="seat[]">
                        <label for="10E">10E</label>
                        </li>
                        <li class="seat">
                        <input type="checkbox" id="10F" value = "10A" name="seat[]">
                        <label for="10F">10F</label>
                        </li>
                    </ol>
                    </li>
                </ol>
            </div>
            <br>
            <div class = "container">
                <label for="id">Enter Your ID: </label>
                <input type="number" name="id" placeholder="Enter ID here." required>
                <br>
                <label for="name">Enter Your Name: </label>
                <input type="text" name="name" placeholder="Enter name here." maxlength="30" required>
                <br>
                <input id = "submit" type="submit" value="Submit" style="display:none">
            </div>
        </form>

        <br>
        <div class = "container">
            <form  id="cancel" action="index.php">
                <input id = "cancel" type="submit" value="Cancel">
            </form>
        </div>



        <script src="js/style.js" type="text/javascript" language="javascript"></script>

        <script type="text/javascript" language="javascript">

            <?php 
                foreach($informationArray as $val)
                { ?>
                    myFunction('<?php echo $val['id']; ?>');
                <?php 
                } 
            ?>
        </script>
    </body>
</html>