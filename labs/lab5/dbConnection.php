<?php

function getDatabaseConnection()
{
    //Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false)
    {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 
    
    //Cloud9 db info
    else
    {
        $host = 'localhost'; //cloud9
        //$dbname = 'tcp';
        $username = 'root';
        $password = '';
        $dbname = 'ottermart';
    }

    
    //creates db connection
    //print($host . " " . $dbName . " " . $username . " " . $password);
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}

?>