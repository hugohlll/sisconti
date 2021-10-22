<?php

$mysqli = new mysqli('mysql', 'root', 'root', 'db_CRUD_1'); 
 if ($mysqli->connect_error) { 
   die("Error connecting: {$mysqli->connect_errno} {$mysqli->connect_error}\n"); 
 } 
 //else { 
 //  echo "Connected to db_CRUD\n"; 
 //}
 
 $mysqli -> set_charset("utf8");

 ?>
