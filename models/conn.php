<?php

#Variables con datos para la conexion a la base de datos
$host = "localhost";
$database = "crud";
$username = "root";
$password = "";

#Conexion a la base de datos
$conn = new mysqli($host, $username, $password, $database);
$conn->set_charset('utf8');

#Si no conecta muestra el error
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}