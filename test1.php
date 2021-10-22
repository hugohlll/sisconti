<?php
    $mysqli = new mysqli("mysql","root","root","db_EDX");

    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    }
    echo "hugo leonardo!!!"."\n"."leite lima";

?> 