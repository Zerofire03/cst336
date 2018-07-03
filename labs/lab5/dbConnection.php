<?php

function getDatabaseConnection($dbname = 'ottermart')
{
    //Cloud9 db info
    $host = 'localhost'; //cloud9
    //$dbname = 'tcp';
    $username = 'root';
    $password = '';
    
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false)
    {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbName = "heroku_53322df5e83175d";
        print($dbName . " ");
        $username = $url["user"];
        //$password = $url["pass"];
        $password = "fbe93cf6";
    } 

    
    //creates db connection
    print($host . " " . $dbName . " " . $username . " " . $password);
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}

?>