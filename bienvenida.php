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
$query_result = mysqli_query($conex, $query_info);
/*if ($query_result) {
    # retorna el numero de  filas encontradas
    $rowcount=mysqli_num_rows($query_result);
    printf("Resultado: %d Registros.\n",$rowcount);
};*/
if (mysqli_num_rows($query_result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($query_result)) {
        $foto_perfil = $row["foto"];
        $nombre = $row["nombre"];
        $apellido = $row["apellido"];
    }
  } else {
    echo "0 results";
  };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto - Jeison Rosario</title>
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="stylesheet" href="/estilos/normalize.css">
    <script src="https://kit.fontawesome.com/a29143056b.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <!-- header Cabezera con informacion sencilla -->
        <header class="cabezera">
            <form action="#" method="post" class="header_buscar">
                <div class="icon_logo"></div>
                <input type="search" name="" id="" placeholder="Buscar">
            </form>
            <div class="header_secciones">
                <a href="#">Inicio<i class="fa-solid fa-house"></i></a>
                <a href="#">Usuarios<i class="fa-solid fa-users"></i></a>
                <a href="#">Mensajes<i class="fa-solid fa-message"></i></a>
                <a href="#">Notificaciones<i class="fa-solid fa-bell"></i></a>
                <div class="header_perfil">
                    <img src="<?php echo $foto_perfil; ?>" alt="perfil: <?php echo "$nombre $apellido"; ?>">
                    <p>Yo<i class="fa-solid fa-bars"></i></p>
                </div>
            </div>
        </header>
        <div class="header_perfil_opcs">
        <a href="servidor/cerrar_sesion.php">Cerrar sesión</a>
        </div>
        <div class="cuerpo" >
            <aside class="lateral">
                <div class="lateral_1">
                    <div class="ltr_perfil">
                        <img src="<?php echo $foto_perfil; ?>" alt="perfil: <?php echo "$nombre $apellido"; ?>">
                        <p class="nombre"><?php echo "$nombre $apellido"; ?></p>
                    </div>
                    <div class="ctnd_separador"></div>
                    <div class="ltr_contacto">
                        <p>Amigos #</p>
                        <p>Conoce amigos</p>
                    </div>
                </div>
            </aside>
            <!-- contenido de las publicaciones -->
            <!-- Posteriormente conectar con una 
            tabla donde se almacenen los post de otros usuarios -->

            <div class="contenido">
                    <div class="ctnd_header">
                        <div class="ctnd_header_lv1">
                            <form action="#" method="post">
                                <img src="<?php echo $foto_perfil; ?>" alt="perfil: <?php echo "$nombre $apellido"; ?>">
                                <input type="search" placeholder="Crear publicacion" id="">
                            </form>
                        </div>
                        <div class="ctnd_header_lv2">
                            <p><i class="fa-regular fa-image" style="color:#41b2df;"></i>Foto</p>
                            <p><i class="fa-solid fa-video" style="color:#109744;"></i>Video</p>
                            <p><i class="fa-solid fa-arrow-right" style="color:#b6781a;"></i>Publicar</p>
                        </div>
                    </div>

                    <div class="ctnd_separador"></div>
                    <div class="ctnd_card_container">
                        <div class="info_autor">
                            <div class="img_autor"></div>
                            <p class="nombre_autor">Nombre Autor</p>
                            <i class="fa-solid fa-ellipsis opcs"></i>
                        </div>
                        <div class="ctnd_separador"></div>
                        <p>Texto</p>
                        <div class="ctnd_imagen_publicacion"></div>
                        <div class="ctnd_valoraciones">
                            <p>Like #</p>
                            <p>Dislike #</p>
                            <p>Comentarios #</p>
                        </div>
                        <div class="ctnd_separador"></div>
                        <div class="ctnd_opciones">
                            <p><i class="fa-solid fa-thumbs-up"></i>Me gusta</p>
                            <p><i class="fa-solid fa-thumbs-up" style="    transform: rotate(180deg);"></i>No me gusta</p>
                            <p><i class="fa-solid fa-comment"></i>Comentar</p>
                            <p><i class="fa-solid fa-paper-plane"></i></i>Enviar</p>
                        </div>
                    </div>
            </div>
            
            <footer class="footer">
                <div class="ftr_1">
                    <p>Alguna inaformacion</p>
                    <p>Proyecto Red social.
                        Escrito por <a href="#">Jeison Rosario.</a>
                        Desarrollador Junior.
                        Estudiante Platzi
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>