<?php  
    session_start(); 
    $host = "localhost";   
    $username = "root";         
    $password = "";  
    $database = "PruebaPHP_db";               
    $conn = new mysqli($host,$username,$password,$database);
        if (!$conn) {
        die("Conexion no establecida: " . mysqli_connect_error());
        }
?>