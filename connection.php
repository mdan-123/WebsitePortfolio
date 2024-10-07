<?php

    $host = "localhost";
    $username = "danish";
    $password = "";
    $dbname = "phase2";

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



?>