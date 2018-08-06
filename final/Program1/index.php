<?php
    session_start();
    
    include 'connect.php';
    $connect = getDBConnection();
    
    function selectSuperhero($id)
    {
        global $connect;
        $sql = "SELECT * FROM superhero
                        WHERE id=:id";
        $np = array(":id" => $id);
        $stmt = $connect->prepare($sql);
        $stmt->execute($np);
        $superhero = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<img src=img/superheroes/" . $superhero['image'] . ".png alt=" . $superhero['image'] . ">";
        $_SESSION['superhero'] = $superhero['name'];
    }

    
    function displayRandomSuperhero()
    {
        
        $randNum = rand(1,15);
        selectSuperhero($randNum);
    }
    
    function displayRealNames()
    {
        global $connect;
        $sql = "SELECT DISTINCT firstName, lastName, image FROM superhero ORDER BY firstName, lastName ASC";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $realNames = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        foreach ($realNames as $realName)
        {
            echo "<option value='" . $realName['firstName'] . " " . $realName['lastName'] ."' id='" . $realName['image'] . "'>". $realName['firstName'] . " " . $realName['lastName'] . "</option>";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Name That Superhero</title>
        <link href="styles.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div>
            <h1>What is the real name of the following superhero?</h1>
            <?php displayRandomSuperhero(); ?>
            <form>
                <select id="superheroRealNames">
                    <option value>Select One</option>
                    <?php displayRealNames(); ?>
                </select>
                <br>
                <input type="submit" value="Submit">
                
                <!--Will display the "loading" or "spinning" animated gif-->
                <div id="waiting"></div>
            </form>
        </div>
        <div id="questionFeedback"></div>
        <div id="feedback">
            <h4>Times the real name of <span id="superheroname"></span> was answered correctly: <span id="correct"></span></h4><br>
            <h4>Times it was answered incorrectly: <span id="incorrect"></span></h4>
        </div>
        
           
  <table border="1" width="600" cellpadding="10px">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
     <tr style="background-color:#99E999">
      <td>1</td>
      <td>A random image of a superhero is displayed when refreshing the page <br></td>
      <td width="20" align="center">15</td>
     </tr>     
     <tr style="background-color:#99E999">
      <td>2</td>
      <td><p>The "real names" of the superheroes in the dropdown menu come from the database (without duplicates and in alphabetical order) <br>
        </p></td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#99E999">
      <td>3</td>
      <td>An error message is displayed if the user clicks on the "Check Answer" button without selecting anything. <br></td>
      <td width="20" align="center">10</td>
    </tr>     
     <tr style="background-color:#99E999">
      <td>4</td>
      <td>The right color-coded feedback (correct or incorrect) is displayed upon clicking on the "Check Answer" button <br></td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#99E999">
      <td>5</td>
      <td>The number of times the real name for the specific superhero has been answered correctly and incorrectly is stored in the database, via AJAX (you'll need to create a new table, you decide the structure)<br></td>
      <td width="20" align="center">15</td>
    </tr>     

     <tr style="background-color:#99E999">
      <td>6</td>
      <td>The updated number of times for total of correct and incorrect answers (for the specific superhero) is displayed, via AJAX <br></td>
      <td width="20" align="center">15</td>
    </tr>
     
     <tr style="background-color:#99E999">
      <td>7</td>
      <td>The spinning images (indicating that data is being loaded) are displayed and replaced when the data is retrieved, via AJAX</td>
      <td width="20" align="center">5</td>
    </tr> 

     <tr style="background-color:#99E999">
      <td>8</td>
      <td>This rubric is properly included AND UPDATED</td>
      <td width="20" align="center">2</td>
    </tr>
        
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center">&nbsp;</td>
    </tr> 
  </tbody></table>
        
        
    </body>
    <!--Javascript File-->
    <script type="text/javascript" src="superhero.js"></script>
</html>
