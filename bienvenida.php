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
                <img src="<?php echo $foto_perfil; ?>" alt="perfil: <?php echo "$nombre $apellido"; ?>">
                <p><?="$nombre $apellido";?></p>
            </div>
        </header>
        
        <div class="cuerpo">
            <!-- contenido de las publicaciones -->
            <!-- Posteriormente conectar con una 
            tabla donde se almacenen los post de otros usuarios -->
            <article class="contenido">
                <h2>Publicaciones</h2>
                <article>
                    <h3>Articulo: Titulo</h3>
                    <p>Vista previa del post: Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                        Quaerat harum beatae nesciunt ducimus. Illo provident possimus dolorum, 
                        aliquid exercitationem aspernatur impedit qui harum cumque esse sequi et soluta iure totam.
                        <p>Usuario</p>
                        <p>Comentarios #</p>
                        <p>Fecha Publicacion</p>
                    </p>
                </article>
                <article>
                    <h3>Articulo: Titulo</h3>
                    <p>Vista previa del post: Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                        Quaerat harum beatae nesciunt ducimus. Illo provident possimus dolorum, 
                        aliquid exercitationem aspernatur impedit qui harum cumque esse sequi et soluta iure totam.
                        <p>Usuario</p>
                        <p>Comentarios #</p>
                        <p>Fecha Publicacion</p>
                    </p>
                </article>
                <article>
                    <h3>Articulo: Titulo</h3>
                    <p>Vista previa del post: Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                        Quaerat harum beatae nesciunt ducimus. Illo provident possimus dolorum, 
                        aliquid exercitationem aspernatur impedit qui harum cumque esse sequi et soluta iure totam.
                        <p>Usuario</p>
                        <p>Comentarios #</p>
                        <p>Fecha Publicacion</p>
                    </p>
                </article>
                <article>
                    <h3>Articulo: Titulo</h3>
                    <p>Vista previa del post: Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                        Quaerat harum beatae nesciunt ducimus. Illo provident possimus dolorum, 
                        aliquid exercitationem aspernatur impedit qui harum cumque esse sequi et soluta iure totam.
                        <p>Usuario</p>
                        <p>Comentarios #</p>
                        <p>Fecha Publicacion</p>
                    </p>
                </article>
            </article>

            <!-- Menu lateral Con varias opciones -->
            <aside class="lateral">
                <h2>Menu</h2>
                <ul>
                    <li>Inicio</li>
                    <li><a href="pages/perfil.php">Perfil</a></li>
                    <li><a href="pages/amigos.php">Amigos</a></li>
                    <li>Configuraciones</li>
                </ul>
                <p><a href="servidor/cerrar_sesion.php">Cerrar sesión</a></p>
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