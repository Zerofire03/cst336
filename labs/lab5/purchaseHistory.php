<?php

    include 'dbConnection.php';
    
    $conn = getDatabaseConnection();

    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false)
    {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $dbname = substr($url["path"], 1);
        //$dbname = 'heroku_53322df5e83175d';
    }
    else
    {
        $dbname = 'ottermart';
    }
    
    $productId = $_GET['productId'];
    
    $sql = "SELECT * FROM " . $dbname . ".om_product NATURAL JOIN " . $dbname . ".om_purchase WHERE productId = :pId";
    print $sql;
            
    $np = array();
    $np[":pId"] = $productId;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo $records[0]['productName'] . "<br/>";
    echo "<img src='" . $records[0]['productImage'] . "' width='200'/><br/>";
    
    foreach($records as $record)
    {
        echo "Purchase Date: ". $record["purchaseDate"] . "<br/>";
        echo "Unit Price: ". $record["unitPrice"] . "<br/>";
        echo "Quantity: ". $record["quantity"] . "<br/>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>OtterMart Product History</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Galada" rel="stylesheet">
    </head>
    <body>
    </body>
</html>