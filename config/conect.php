<?php
    $conn = new mysqli("localhost","root", "", "modelshirts");
    if($conn->connect_errno){
        echo "Fallo al conectar a MySql ". $conn->connect_errno . $conn->connect_error;
    }

    //echo $conn->host_info;  