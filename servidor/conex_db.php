<?php
// Declaramos las variables de conexión
$ServerName = "127.0.0.1:3306";
$Username = "root";
$Password = "root";
$NameBD = "red_social";


// Creamos la conexión con MySQL
$conex = mysqli_connect($ServerName, $Username, $Password, $NameBD);
mysqli_set_charset($conex, "utf8"); 

// Revisamos la Conexión MySQL
if ($conex->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
#$conex->close();
?>
