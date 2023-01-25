<?php  
include 'conex_db.php';
/* Datos introducidos por el usuario */
$username = $_POST['username'];
$password = $_POST['pass'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$genero = $_POST['genero'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$fecha_registro = date("y/m/d");


/*muestra las vcariables enviada desde el form de registro
estos datos muestran informacion para debuguear
echo $fecha_registro;
echo "<pre>";
var_dump($_POST);
echo "</pre>";
*/

/* Inserta los datos en la base de datos */
$query_1 = "INSERT INTO red_social.usuario
(user_name,
password,
nombre,
apellido,
genero,
fecha_nacimiento,
registro_date)
VALUES
('$username',
'$password',
'$nombre',
'$apellido',
'$genero',
'$fecha_nacimiento',
'$fecha_registro')";

/* var_dump($query_1); */
$query1_result_1 = mysqli_query($conex, $query_1);
mysqli_close ($conex);  
echo '
    <script>
        window.location = "../index.html";
    </script>';

?>