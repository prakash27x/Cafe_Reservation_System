<?php
 // Create a connection to the database
 $host = "localhost";
 $username = "root";
 $password = "";
 $dbname = "cs1.6";

 $conn = new mysqli($host, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
?>
