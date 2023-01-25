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

$query_info_propia = "SELECT user_name, nombre, apellido FROM usuario
WHERE user_name='$sesion'";

$query_result_p = mysqli_query($conex, $query_info_propia);

while($row_p = mysqli_fetch_assoc($query_result_p)) {
    $nombre_propio = $row_p["nombre"];
    $apellido_propio = $row_p["apellido"];
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="../estilos/perfil.css">

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
        </header>
        <div class="cuerpo">

            <div class="cuerpo_perfil">
                <div class="perfil_descripcion">
                    <img src="../recursos/imgs/perfil_mscln.png" alt="">
                    <p>Descripcion Breve: Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nisi recusandae cumque a tempore sapiente labore dolorum architecto rem 
                    tenetur debitis assumenda maiores adipisci,
                    earum molestias amet repudiandae reiciendis vero dicta.</p>
                </div>
                <ul>
                    <li><?php echo $nombre_propio." ".$apellido_propio ?></li>
                    <li>Edad</li>
                    <li>Ciudad</li>
                    <li>Son amigos?</li>
                    <li>Enviar Mensaje</li>
                    <li>Sus publicaciones</li>
                </ul>
                <button>Editar perfil</button>
            </div>

            <!-- Menu lateral Con varias opciones -->
            <aside class="lateral">
                <h2>Menu</h2>
                <ul>
                    <li><a href="../bienvenida.php">Inicio</a></li>
                    <li><a href="../pages/pefil.php">Perfil</a></li>
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
