<?php
    session_start();
    
    include 'dbConnection.php';

    $conn = getDatabaseConnection();
    
    if(!isset($_SESSION['adminName']))
    {
        header("Location:login.php");
    }
    
    $sql = "DELETE FROM om_product WHERE productId = " . $_GET['productId'];
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location:admin.php");

?>