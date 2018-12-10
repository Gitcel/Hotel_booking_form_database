<?php

    require "config.php";

    global $server, $user, $password, $port, $db, $getContents;

    $connection = mysqli_connect($server, $user, $password, "", $port);

    if (!$connection) {
        die("Connection failed: ".mysqli_connect_error()."<br>");

    } else {
        echo "Connected.<br>";

    }

    if (mysqli_multi_query($connection, $getContents)) {        
        echo "Database and tables were created.<br>";  

    } else {
        echo "The database and/or tables couldn't be created.<br>";

    }

    mysqli_close($connection);

?>