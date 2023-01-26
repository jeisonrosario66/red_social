<?php
#archivo nuevo, vastante trabajo pendinte
session_start();
include '../servidor/conex_db.php';
$sesion = $_SESSION['usuario'];
if(!isset($sesion)) {
    echo '
    <script>
        alert("Debe Iniciar secion para acceder...")
        window.location = "../index.html";
    </script>
    ';
};

$pais = $_POST["pais"];

#query devuelve info del usuario
$query_info_propia = "SELECT user_name FROM usuario
WHERE user_name='$sesion'";
$query_result_p = mysqli_query($conex, $query_info_propia);
while($row_p = mysqli_fetch_assoc($query_result_p)) {
    $user_name = $row_p["user_name"];
};

# Recibe la imagen meidante post
# y la mueve desde la ruta temporar a una ubicacion fija
$basename = $_FILES["foto_perfil"]["name"];
$archivo_temporal = $_FILES["foto_perfil"]["tmp_name"];
$ruta_subir = "../recursos/perfil/$user_name-$basename";
$ruta_consultar = "recursos/perfil/$user_name-$basename";

move_uploaded_file($archivo_temporal, $ruta_subir);

$query_insert_foto = "UPDATE usuario
                        SET foto='$ruta_consultar',
                        pais_id = '$pais'
                        WHERE user_name='$sesion'";

$query_insert_result = mysqli_query($conex, $query_insert_foto);