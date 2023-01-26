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

#Recolecta la info del usario
$query_info_propia = "SELECT foto, nombre, apellido,
YEAR(CURDATE())-YEAR(fecha_nacimiento) + 
IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(fecha_nacimiento,'%m-%d'), 0 , -1 ) 
AS edad_p FROM usuario
WHERE user_name='$sesion'";
$query_result_p = mysqli_query($conex, $query_info_propia);
while($row_p = mysqli_fetch_assoc($query_result_p)) {
    $foto = $row_p["foto"];
    $nombre_propio = $row_p["nombre"];
    $apellido_propio = $row_p["apellido"];
   # $fecha_nacimiento_p = $row_p["fecha_nacimiento"];
   # $fecha_registro_p = $row_p["registro_date"];
    $edad_p = $row_p["edad_p"];
};

#Devuelve la info de los paises
$query_paises = "SELECT id_pais, pais_nombre FROM pais";
$query_paises_result = mysqli_query($conex, $query_paises);

$query_estado = 'SELECT pais_nombre, estado_nombre
    FROM estado
	LEFT JOIN pais ON pais.id_pais = estado.pais_id
	WHERE pais_nombre = ""';

$query_estado_2 = "SELECT estado_nombre
    FROM estado
    WHERE pais_id = 1";

$query_estado_2_result = mysqli_query($conex, $query_estado_2);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos/estilos.css">
    <link rel="stylesheet" href="../../estilos/perfil.css">

    <title>Red Social -Editar Perfil</title>
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
                    <img src="../../<?php echo $foto; ?>" alt="foto perfil: <?php echo $nombre_propio." ".$apellido_propio; ?>">
                    <p>Descripcion Breve: Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nisi recusandae cumque a tempore sapiente labore dolorum architecto rem 
                    tenetur debitis assumenda maiores adipisci,
                    earum molestias amet repudiandae reiciendis vero dicta.</p>
                </div>
                <form action="../../servidor/edit_perfil_servidor.php" method="post" enctype="multipart/form-data">
                <ul>
                    <input type="file" accept="image/png, image/jpeg" name="foto_perfil">
                    <li><?php echo $nombre_propio." ".$apellido_propio ?></li>
                    <li>Edad:   </li>
                    <li>ubicacion: </li>

                    <select name="pais" id="pais_select">
                        <option value="">Pais</option>
                        <?php
                            while($row = mysqli_fetch_assoc($query_paises_result)) { ?>
                            <option value="<?php echo $row["id_pais"]; ?>">
                                <?php echo $pais = $row["pais_nombre"]; ?>
                            </option>
                            <?php }
                            var_dump($pais);
                            mysqli_free_result($query_paises_result);?>
                    </select>
                    <li>Son amigos?</li>
                    <li>Enviar Mensaje</li>
                    <li>Sus publicaciones</li>
                </ul>
                <button type="submit">Actualizar</button>
                </form>

            </div>

            <!-- Menu lateral Con varias opciones -->
            <aside class="lateral">
                <h2>Menu</h2>
                <ul>
                    <li><a href="../../bienvenida.php">Inicio</a></li>
                    <li>Perfil</li>
                    <li><a href="../amigos.php">Amigos</a></li>
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

