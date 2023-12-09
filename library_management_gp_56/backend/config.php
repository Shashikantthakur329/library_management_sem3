<?php
    date_default_timezone_set('Asia/Kolkata');
    $servername = "localhost:8084";
    $username = "root";
    $password = "";
    $database = "library_management";
   
    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);
   
    // Die if connection was not successful
   
    if (!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
?>