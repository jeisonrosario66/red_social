<?php
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
# query para obener la informacion del usuario
$query_info_propia = "SELECT foto, user_name, nombre, apellido FROM usuario
WHERE user_name='$sesion'";
$query_result_p = mysqli_query($conex, $query_info_propia);
#obtine los datos propios
while($row_p = mysqli_fetch_assoc($query_result_p)) {
    $foto_perfil_p = $row_p["foto"];
    $nombre_propio = $row_p["nombre"];
    $apellido_propio = $row_p["apellido"];
};

$query_info = "SELECT * FROM usuario";
$query_result = mysqli_query($conex, $query_info);
# obtiene los datos de otros usuarios
while($row = mysqli_fetch_assoc($query_result)) {
    $id = $row["id_usuario"];
    $foto_perfil = $row["foto"];
    $username = $row["user_name"];
    $nombre = $row["nombre"];
    $apellido = $row["apellido"];
    $genero = $row["genero"];
    $fecha_nacimiento = $row["fecha_nacimiento"];
    $fecha_registro = $row["registro_date"];
};

$query_info_2 = "SELECT foto, nombre, apellido FROM usuario WHERE user_name != '$sesion'";
$query_result_2 = mysqli_query($conex, $query_info_2);

$p="$foto_perfil_p";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="../estilos/amigos.css">
    <title>Red Social - Amigos</title>
</head>
<body>
<div class="container">
        <!-- header Cabezera con informacion sencilla -->
        <header class="cabezera">
              <!-- Formulario para buscar entre las publicaciones -->
              <div class="form_busqueda">
                <form action="#" method="post">
                    <h1>Red <span style="color: red;" >Social</span></h1>
                    <label for="">Busqueda</label>
                    <input type="search" name="busqueda" id="">
                    <button type="submit">Buscar</button>
                </form>
              </div>
            <div class="perfil">
                <img src='../<?php echo $foto_perfil_p; ?>' alt="Foto perfil">
                <p><?="$nombre_propio $apellido_propio";?></p>
            </div>
        </header>
        
        <div class="cuerpo">
            <!-- # Crea un bucle donde se muestras los datos seleccionados de otros usuario
            #Funciones pendientes
            # ver el perfik
            # agregar como amigo
            # indicador de estado conectado/desconectado -->
            <div class="container_amigo">
                <p>Usuarios en la Red (<?php echo mysqli_num_rows($query_result_2);?>)</p>
                <?php
                    while($row=mysqli_fetch_assoc($query_result_2)) { ?>
                        <div class="card_amigo">
                            <img src="../<?php echo $row['foto']; ?>" alt="perfil red social">
                            <ul>
                                <li><?php echo $row["nombre"]." ".$row["apellido"]; ?></li>
                                <li>Ver Perfil </li>
                                <li>Agregar</li>
                            </ul>
                        </div>
                <?php } mysqli_free_result($query_result_2);?>
            </div>        
        
            <!-- Menu lateral Con varias opciones -->
            <aside class="lateral">
                <h2>Menu</h2>
                <ul>
                    <li><a href="../bienvenida.php">Inicio</a></li>
                    <li><a href="perfil.php">Perfil</a></li>
                    <li>Amigos</li>
                    <li>Configuraciones</li>
                </ul>
                <p><a href="../servidor/cerrar_sesion.php">Cerrar sesión</a></p>
            </aside>
        </div>

        <footer>
            <p>Proyecto Red social.
                Escrito por <a href="#">Jeison Rosario.</a>
                Desarrollador Junior.
                Estudiante Platzi
            </p>
        </footer>

    </div>
    
</body>
</html>
