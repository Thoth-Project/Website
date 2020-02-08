<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');
 
/* Attempt to connect to MySQL database */
$link_b = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
 
// Check connection
if($link_b === false){
    die("Server ERROR: Could not connect. Server " . mysqli_connect_error());
}else{
    if(!($link_b->multi_query('
            CREATE DATABASE  IF NOT EXISTS `demo`;
            USE demo;
            SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
            SET AUTOCOMMIT = 1;
            START TRANSACTION;
            SET time_zone = "+00:00";
            CREATE TABLE IF NOT EXISTS  `users` (
              `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
              `username` varchar(50) NOT NULL,
              `password` varchar(65) NOT NULL
            );')))
        {
            die("couldn't autoCreate DB and tables");
        }
    mysqli_close($link_b);
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_NAME);
    if(!$link){
        die("Database/Server ERROR: Could not connect. to DEMO db" . mysqli_connect_error());
    }
    }
?>