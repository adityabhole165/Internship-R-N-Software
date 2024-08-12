<?php
    $server= "localhost";
    $username = "root";
    $password = "";
    $dbname = "college1";
    // Create connection
    $con = new mysqli($server,$username,$password,$dbname);
    // cheack connection
    if($con -> connect_error){
        echo " Error connecting to server" . mysqli_connect_error();
    }else{
        // echo "Connecting to the server";
    }
   
    
   
?>