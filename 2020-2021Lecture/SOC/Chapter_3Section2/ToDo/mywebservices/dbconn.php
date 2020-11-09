<?php

$host         = "localhost";
$username     = "root";
$password     = "mysql";
$dbname       = "dbbookstore";

try {
    $dbconn = new PDO('mysql:host=localhost;dbname=dbbookstore', $username, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
