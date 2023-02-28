<?php 

//importar la base dde datos
require 'includes/app.php';
$db = conectarDB();

//email y password
$email = 'correo@correo.com';
$pasword = '123456';

$paswordHash = password_hash($pasword, PASSWORD_BCRYPT);

//crear el query
$query = "INSERT INTO usuario (email, password) VAlUES ('${email}', '${paswordHash}')";

//ejecutar 
mysqli_query($db, $query);

echo $query;



