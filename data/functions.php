<?php

    function connect_to_db() {

        require "config.php";

        global $user, $password, $db, $server, $port, $connection;

        $connection = mysqli_connect($server, $user, $password, $db, $port);

        if (!$connection) {
            die("<div class='alert-message'>Connection failed: ".mysqli_connect_error()."</div>");
        }

    }

    function store_data($name, $surname, $hotel, $days, $total) {

        require "config.php";

        global $user, $password, $db, $server, $port, $connection, $query_result;

        connect_to_db();

        $query = "INSERT INTO booking(name, surname, hotel, days, total) VALUES('$name', '$surname', '$hotel', '$days', '$total')";
        $query_result = mysqli_query($connection, $query);

    }

    function check_duplicate_record($name, $surname, $hotel, $days, $total) {

        require "config.php";

        global $user, $password, $db, $server, $port, $connection;

        connect_to_db();

        global $query_result;

        $querySelect;
        $querySelect = "SELECT * FROM booking WHERE name = '$name' AND surname = '$surname'";
        $query_result = mysqli_query($connection, $querySelect);

        $message = "";

        if (mysqli_num_rows($query_result) == 1) {

            while ($row = mysqli_fetch_assoc($query_result)) {

                $message = "<div class='alert-message'>Someone who has that name and surname, made a booking already.</div>";

                if ($row['name'] != $name && $row['surname'] != $surname) {
                    store_data($name, $surname, $hotel, $days, $total);

                } else if ($row['name'] == $name && $row['surname'] == $surname) {
                    echo $message;                   
                }

            }
        
        } else {
            store_data($name, $surname, $hotel, $days, $total);
        }

    }

    function total($days, $price) {

        return $days * $price;

    }

?>