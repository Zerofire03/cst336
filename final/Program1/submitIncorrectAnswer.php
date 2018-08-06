<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

$superhero = $_POST['name'];

//Obtain number correct from DB
$sql = "SELECT incorrect
        FROM answers
        WHERE name = :name";
$np = array(":name" => $superhero);
$stmt = $connect->prepare($sql);
$stmt->execute($np);
$numIncorrect = $stmt->fetch(PDO::FETCH_ASSOC);

//Update num correct
$sql = "UPDATE answers
        SET incorrect=:incorrect
        WHERE name=:name";
$np = array(
    ":incorrect"=>$numIncorrect['incorrect']+1,
    ":name"=>$superhero);
$stmt = $connect->prepare($sql);
$stmt->execute($np);

//Array for feedback
$sql = "SELECT correct, incorrect, superhero.name
        FROM answers
        INNER JOIN superhero ON answers.name=superhero.image
        WHERE answers.name=:name";
$np = array(":name" => $superhero);
$stmt = $connect->prepare($sql);
$stmt->execute($np);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);
?>