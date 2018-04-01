<?php

        $host = 'localhost';
        $dbname = 'Users_Data';
        $username = 'admin_bd';
        $password = '251502html';


        $conn = new mysqli($host,$user,$password,$dbname);
        if ($conn->connect_error) {
            echo "Fail!" . $conn->connect_error;
        }else {
            echo "Success!";
        }