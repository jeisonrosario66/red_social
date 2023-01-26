<?php  
include 'conex_db.php';
/* Datos introducidos por el usuario */
$username = $_POST['username'];
$password = $_POST['pass'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$genero = $_POST['genero'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$fecha_nacimiento_format  = date_create("$fecha_nacimiento");
$fecha_nacimiento_format_ = date_format($fecha_nacimiento_format,"Y/m/d");
$fecha_registro = date("y/m/d");

/*muestra las vcariables enviada desde el form de registro
estos datos muestran informacion para debuguear
*/
$perfil_m ="../recursos/perfil/perfil_m.png";
$perfil_f ="../recursos/perfil/perfil_f.png";
$foto_perfil = "";
if ($genero=='m') {
    $foto_perfil = $perfil_m;
}else {
    $foto_perfil = $perfil_f;
};

/* Inserta los datos en la base de datos */
$query_1 = "INSERT INTO red_social.usuario
(foto,
user_name,
password,
nombre,
apellido,
genero,
fecha_nacimiento,
registro_date)
VALUES
('$foto_perfil',
'$username',
'$password',
'$nombre',
'$apellido',
'$genero',
'$fecha_nacimiento_format_',
'$fecha_registro')";

/* var_dump($query_1); 
 */

$query1_result_1 = mysqli_query($conex, $query_1);
mysqli_close ($conex);  
echo '
    <script>
        window.location = "../index.html";
    </script>';

    
?>