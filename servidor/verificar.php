<?php
session_start();
#conexion base de datos
include 'conex_db.php';
# Datos del usuario
$usuario = $_POST['user'];
$password = $_POST['pass'];

#consulta a base de datos
# funciones pendites por agregar
# Auntenticacion con correo/usario
$query_login = "SELECT user_name, password FROM usuario where user_name='$usuario' 
and password='$password'";

$query_login_result = mysqli_query($conex, $query_login);
if (mysqli_num_rows($query_login_result) > 0) {
  $_SESSION['usuario'] = $usuario;
  header("location: ../bienvenida.php");
  exit;
}else{
  echo '
  <script>
      alert("usuario no existe, por favor verifique los datos introducidos");
      window.location = "index.html";
  </script>
  ';
  exit;
};


  
