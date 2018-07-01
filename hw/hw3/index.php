<!DOCTYPE html>
<html>
    <head>
        <title>Homework 3</title>
        <meta charset="utf-8">
        <style>
            @import url("css/styles.css");
            @import url('https://fonts.googleapis.com/css?family=Oswald');
            @import url('https://fonts.googleapis.com/css?family=PT+Sans+Narrow');
        </style>
    </head>
    <body>
        <header>
        </header>
        <div id='form'>
            <form method="get">
                <fieldset>
                    <legend>Enter your first and last name:</legend>
                    <input type="text" name="fname" placeholder="First Name" value="<?=$_GET['fname']?>"/>
                    <input type="text" name="lname" placeholder="Last Name" value="<?=$_GET['lname']?>"/>
                </fieldset>
                <fieldset>
                    <legend>Enter the city and you were born in:</legend>
                    <input type="text" name="city" placeholder="Birth City" value="<?=$_GET['city']?>"/>
                    <input type="text" name="country" placeholder="Birth Country" value="<?=$_GET['country']?>"/>
                </fieldset>
                <fieldset>
                    <legend>Select your birthday:</legend>
                    <input type="date" name="bdate" placeholder="Birthdate" value="<?=$_GET['bdate']?>"/>
                </fieldset>
                <fieldset>
                    <legend>Select your gender:</legend>
                    <input type="radio" name="gender" placeholder="Male" value="male" <?php if($_GET['gender'] == "male") echo "checked";?> />
                    <label for="male">Male</label>
                    <input type="radio" name="gender" placeholder="Female" value="female" <?php if($_GET['gender'] == "female") echo "checked";?> />
                    <label for="male">Female</label>
                </fieldset>
                <fieldset>
                    <legend>Select your favorite sport:</legend>
                    <input id="hockey" type="radio" name="sport" value="hockey" <?php if($_GET['sport'] == "hockey") echo "checked";?> />
                    <label for="sports">Hockey</label>
                    <input id="basketball" type="radio" name="sport" value="basketball"<?php if($_GET['sport'] == "basketball") echo "checked";?> />
                    <label for="sports">Basketball</label>
                    <input id="baseball" type="radio" name="sport" value="baseball" <?php if($_GET['sport'] == "baseball") echo "checked";?> />
                    <label for="sports">Baseball</label><br>
                    <input id="football" type="radio" name="sport" value="football" <?php if($_GET['sport'] == "football") echo "checked";?> />
                    <label for="sports">Football</label>
                    <input id="golf" type="radio" name="sport" value="golf" <?php if($_GET['sport'] == "golf") echo "checked";?> />
                    <label for="sports">Golf</label>
                    <input id="soccer" type="radio" name="sport" value="soccer" <?php if($_GET['sport'] == "soccer") echo "checked";?>/>
                    <label for="sports">Soccer</label><br>
                </fieldset>
                <fieldset>
                    <legend>Enter your favorite number:</legend>
                    <input type="number" name="fnumber" placeholder="Favorite Number" value="<?=$_GET['fnumber']?>"/>
                </fieldset>
                <br>
                <input type="submit" value="Submit"/> 
            </form>
        </div>
        <div id="playerCard">
            <?php
                if(!empty($_GET['fname'] && $_GET['lname'] && $_GET['bdate'] && $_GET['gender'] && $_GET['sport'] && $_GET['city'] && $_GET['country'] && $_GET['fnumber']))
                {
                    $fname = $_GET['fname'];
                    $lname = $_GET['lname'];
                    $bdate = $_GET['bdate'];
                    $gender = $_GET['gender'];
                    $sport = $_GET['sport'];
                    $city = $_GET['city'];
                    $country = $_GET['country'];
                    $fnumber = $_GET['fnumber'];
                    $date = new DateTime($bdate);
                    
                    
                    
                    echo "<br><br>";
                    echo "<div id='playerCardMain'>";
                    echo "<p id='bioHeader'>$fname $lname</p>";
                    if($gender == 'male')
                    {
                        echo "<img src='img/genericMale.png' alt='Generic Male'>";
                    }
                    else
                    {
                        echo "<img src='img/genericFemale.jpg' alt='Generic Female'>";
                    }
                    echo "<hr>";
                    echo "<div id='bio'>";
                    echo "<p id='bioMiddle'>DOB: $bdate</p>";
                    echo "<p id='bioMiddle'>Birth Place: $city, $country</p>";
                    echo "<hr>";
                    switch ($sport)
                    {
                        case hockey:
                            $draftDate = $date->modify('+18 years');
                            $draftDateecho = date_format($draftDate, 'Y');
                            $draftPos = rand(1, 200);
                            echo "<p>The NHL is littered with stars wearing the No. $fnumber. A native of $country, $fname $lname was drafted in the $draftDateecho draft at position $draftPos. $lname
                            spent 352 minutes in the penalty box in the last 5 seasons of play. $lname is looking forward to winning the Stanley Cup before retiring.</p>";
                        break;
                        
                        case basketball:
                            $draftDate = $date->modify('+18 years');
                            $draftDateecho = date_format($draftDate, 'Y');
                            $draftPos = rand(1, 60);
                            $randNum = rand(1,10);
                            echo "<p>The NBA is littered with stars wearing the No. $fnumber. A native of $country, $fname $lname was drafted in the $draftDateecho draft at position $draftPos. $lname
                            spent $randNum years bouncing around the D league before being a reuglar in the NBA. $lname is looking forward to winning a championship before retiring.</p>";
                        break;
                        
                        case baseball:
                            $draftDate = $date->modify('+18 years');
                            $draftDateecho = date_format($draftDate, 'Y');
                            $draftPos = rand(1, 1200);
                            $randNum = rand(1,5);
                            echo "<p>The MLB is littered with stars wearing the No. $fnumber. A native of $country, $fname $lname was drafted in the $draftDateecho draft at position $draftPos. $lname
                            played for $randNum minor league teams before landing a spot on as an MLB regular. $lname is looking forward to winning a World Series before retiring.</p>";
                        break;
                        
                        case football:
                            $draftDate = $date->modify('+18 years');
                            $draftDateecho = date_format($draftDate, 'Y');
                            $draftPos = rand(1, 256);
                            $randNum = rand(1,4);
                            echo "<p>The NFL is littered with stars wearing the No. $fnumber. A native of $country, $fname $lname was drafted in the $draftDateecho draft at position $draftPos. $lname
                            played for $randNum years in the NCAA before deciding to enter the NFL draft. $lname is looking forward to winning a Super Bowl before retiring.</p>";
                        break;
                        
                        case golf:
                            $randNum = rand(5,16);
                            echo "<p>There have been many great golfers over the year, but none as great as $fname $lname. A native of $country, $lname began playing golf when they were $randNum. $lname
                            played for 4 years on their high school team, and 4 years in college. $lname is looking forward to winning a Masters before retiring.</p>";
                        break;
                        
                        case soccer:
                            echo "<p>The MLS is littered with stars wearing the No. $fnumber. A native of $country, $fname $lname was drafted in the $draftDateecho draft at position $draftPos. $lname
                            played for $randNum years in the NCAA before deciding to enter the MLS draft. $lname is looking forward to winning an MLS Cup before retiring.</p>";
                        break;
                    }
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </body>
</html>