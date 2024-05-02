<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blogdb";
    $conn = mysqli_connect("localhost","root","","blogdb");
    if($conn === false){
        die("ERROR: Could not connect." .mysqli_connect_error());
    }
    ?>