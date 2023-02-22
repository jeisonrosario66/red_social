<?php
    include '../servidor/session_start.php';
    // Recibo el id del usuraio mediante GET 
    $id = $_GET["iduser"];
    $query_user = "SELECT nombre, apellido, foto FROM usuario WHERE id_usuario = '$id'";

    $query_user_result = mysqli_query($conex,$query_user);
    while ($row = mysqli_fetch_assoc($query_user_result)) {
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $foto_perfil = "../".$row['foto'];
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/estilos.css">
    <script src="https://kit.fontawesome.com/a29143056b.js" crossorigin="anonymous"></script>
    <title>Amigos | Red Social</title>
</head>
<body>
    <?php include("header.php") ?>
    <div class="cuerpo cuerpo_perfil">
        <div class="portada">
            <div class="perfil_portada">
                <img src="<?php echo $foto_perfil; ?>" alt="perfil: <?php echo "$nombre $apellido"; ?>"> 
            </div>
            <div class="portada_info">
                <div>
                    <p Class="nombres"><?php echo "$nombre $apellido"; ?></p>
                    <p class="amigos_counter">Enviar solicitud +</p>
                </div>
            </div>
            <div class="ctnd_separador"></div>
            <ul>
                <li>Publicaciones</li>
                <li>Informacion</li>
                <li>Amigos</li>
                <li>Fotos</li>
                <li>Videos</li>
            </ul>
        </div>

    </div>
</body>
</html>