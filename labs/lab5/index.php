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

function displayCategories()
{
    global $conn;
    global $dbname;
    
    $sql = "SELECT catId, catName from " . $dbname . ".om_category ORDER BY catName";
    print $sql;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    
    foreach($records as $record)
    {
        echo "<option value='".$record["catId"]."' >" . $record["catName"] . "</option>";
    }
}

function displaySearchResults()
{
    global $conn;
    global $dbname;
    
    if(isset($_GET['searchForm']))
    {
        //checks whether user has submitted the form
        echo "<h3>Products Found: </h3>";
        echo "<div id='results'>";
        
        //Query bellow prevents SQL Injection
        $namedParameters = array();
        
        $sql = "SELECT * FROM " . $dbname . ".om_product WHERE 1";
        
        if(!empty($_GET['product']))
        {
            //checks whether user has typed something in the "product" text box
            $sql .= " AND productName LIKE :productName";
            $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
        }
        
        if(!empty($_GET['category']))
        {
            //checks whether user has selected a category
            $sql .= " AND catId = :categoryId";
            $namedParameters[":categoryId"] = $_GET['category'];
        }
        
        if(!empty($_GET['priceFrom']))
        {
            //checks wheher user has typed something in the price from text box
            $sql .= " AND price >= :priceFrom";
            $namedParameters[":priceFrom"] = $_GET['priceFrom'];
        }
        
        if(!empty($_GET['priceTo']))
        {
            $sql .= " AND price <= :priceTo";
            $namedParameters[":priceTo"] = $_GET['priceTo'];
        }
        
        if(isset($_GET['orderBy']))
        {
            if($_GET['orderBy'] == "price")
            {
                $sql .= " ORDER BY price";
            }
            else
            {
                $sql .= " ORDER BY productName";
            }
        }
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record)
        {
            echo "<a href=\"purchaseHistory.php?productId=".$record["productId"]. "\">History</a>";
            echo $record["productName"] . " " .$record["productDescription"] . " $" . $record["price"] . "<br /><br />";
        }
        echo "</div>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>OtterMart Product Search</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Galada" rel="stylesheet">
    </head>
    <body>
        <div id="form">
            <h1>OtterMart Product Search</h1>
            <form>
                Product: <input type="text" name="product" />
                <br>
                Category:
                    <select name="category">
                        <option value="">Select One</option>
                        <?=displayCategories()?>
                    </select>
                <br>
                
                Price: From <input type="text" name="priceFrom" size="7"/>
                       To <input type="text" name="priceTo" size="7" />
                <br>
                Order result by:
                <br>
                
                <input type="radio" name="orderBy" value="price"/>Price<br>
                <input type="radio" name="orderBy" value="name"/>Name<br>
                
                <br>
                <input type="submit" value="Search" name="searchForm" />
            </form>
            <br/>
        </div>
        <hr>
        <?= displaySearchResults() ?>
    </body>
</html>