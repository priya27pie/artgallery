<?php
$servername = "localhost";
$username = "bharatsa_db";
$password = "hackit_321";
try {
    $con = new PDO("mysql:host=$servername;dbname=bharatsa_db", $username, $password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    
    ?>