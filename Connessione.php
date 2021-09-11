<?php
        $conn = mysqli_connect("localhost", "root", "root", "progetto");

        if (!$conn) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            die ('impossibile connettersi a vasia : ' . mysqli_error($link));
        }
?>