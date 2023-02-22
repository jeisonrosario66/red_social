<?php
session_start();
include 'servidor/conex_db.php';
$sesion = $_SESSION['usuario'];
if(!isset($sesion)) {
    echo '
    <script>
        alert("Debe Iniciar secion para acceder...")
        window.location = "index.html";
    </script>
    ';
};
# Devulve la informacion del usuario
$query_info = "SELECT foto,nombre,apellido FROM usuario where user_name='$sesion'";
$query_info_r = mysqli_query($conex, $query_info);
/*if ($query_info_r) {
    # retorna el numero de  filas encontradas
    $rowcount=mysqli_num_rows($query_info_r);
    printf("Resultado: %d Registros.\n",$rowcount);
};*/
if (mysqli_num_rows($query_info_r) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($query_info_r)) {
        $foto_perfil = $row["foto"];
        $nombre = $row["nombre"];
        $apellido = $row["apellido"];
    }
  } else {
    echo "0 results";
  };
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Social</title>
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="stylesheet" href="estilos/normalize.css">
    <script src="https://kit.fontawesome.com/a29143056b.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container_home">
        <?php include("pages/header.php") ?>
        <div class="header_perfil_opcs" id="header_perfil_opcs">
            <div class="header_perfil_opcs_perfil">
                <img src="<?php echo $foto_perfil; ?>" alt="perfil: <?php echo "$nombre $apellido"; ?>">
                <div class="info">
                    <p><?php echo "$nombre $apellido"; ?></p>
                    <button id="ver_perfil">Ver perfil</button>
                </div>
            </div>
            <div class="ctnd_separador"></div>
            <a href="servidor/cerrar_sesion.php">Cerrar sesión</a>
        </div>
        <div id="window">
        </div>
    </div>
</body>
<script src="js/eventos.js"></script>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/jqueryEventos.js"></script>
</html>