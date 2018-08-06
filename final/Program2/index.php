<?php
    include 'connect.php';
    $connect = getDBConnection();

    function displaySuperheroNames()
    {
        global $connect;
        $sql = "SELECT DISTINCT name, image FROM superhero ORDER BY name ASC";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $names = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        foreach ($names as $name)
        {
            echo "<option value='" . $name['name'] ."' id='" . $name['image'] . "'>". $name['name']  . "</option>";
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Superhero Movie API</title>
        <!--<link href="styles.css" rel="stylesheet" type="text/css" />-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <h1>Select a Superhero:</h1>
        <form>
            <select id="superheroName">
                <?php displaySuperheroNames(); ?>
            </select>
            <br><br>
            <input type="button" value="Search Movies!" name="searchmovies">
            <br><br>
            <input type="button" value="Superhero Details" name="details">
        </form>
        <a href="history.php">See search history</a>
        <div id="movieResults"></div>
        
         
   <table border="1" width="600" cellpadding="10">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>The list of the superheroes in the dropdown menu is retrieved from the database (ordered alphabetically, no duplicates)<br></td>
      <td width="20" align="center">10</td>
    </tr> 
    <tr style="background-color:#FFC0C0">
      <td>2</td>
      <td>When clicking on the "Search Movies" button, the OMDB API is used to display the list of movies (<strong>poster</strong> and <strong>title</strong>) for the superhero selected<br></td>
      <td width="20" align="center">15</td>
    </tr>  
     <tr style="background-color:#99E999">
      <td>3</td>
      <td> When clicking on the "Search Movies" button, the superhero selected is stored in a Session variable using AJAX<br></td>
      <td width="20" align="center">15</td>
    </tr>
     <tr style="background-color:#FFC0C0">
      <td>4</td>
      <td> When clicking on the "See Search History" link, the superheroes whose movies have been searched are displayed within an iFrame</td>
      <td width="20" align="center">15</td>
    </tr>   
     <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td> When clicking on the "Superhero Details" button, an AJAX call is made to display all corresponding info (name, image, and pob)<br></td>
      <td width="20" align="center">15</td>
    </tr>  
     <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>When clicking on the "Superhero Details" button, the name and images of the superhero's enemies are displayed<br></td>
      <td width="20" align="center">10</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>7</td>
      <td>This rubric is properly included AND UPDATED</td>
      <td width="20" align="center">2</td>
    </tr>       
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center">&nbsp;</td>
    </tr> 
  </tbody></table>
  
        
        <!--Javascript File-->
    <script type="text/javascript" src="searchsuperhero.js"></script>
    </body>
</html>