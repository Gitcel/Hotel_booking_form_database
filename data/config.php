<?php

    $server = "localhost"; // 127.0.0.1 is common.
    $port = "3306"; // 8888 for XAMPP & 3306 for WAMP.
    $user = "root"; // Root is for public access. Otherwise, change it if you have a user name.
    $password = ""; // Change this if you have a password.
    $db = "hotel_bookings"; // Change the database name if you want.
    $getContents = null;

    if ($getContents) {
        $getContents = file_get_contents("../data/init_database.sql"); // The SQL intallation script for the database.
    }
    
    $connection; // Global access to the connection.
    $query_result; // Global access to the queried info.

?>