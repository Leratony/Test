<?php

        $host = 'localhost';
        $dbname = 'Users_Data';
        $username = 'root';
        $password = 'admin';


        $conn = new mysqli($host,$user,$password,$dbname);
        if ($conn->connect_error) {
            echo "Fail!" . $conn->connect_error;
        }else {
            echo "Success!";
        }