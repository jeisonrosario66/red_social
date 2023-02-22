<?php 
    session_start();
    $sesion = $_SESSION['usuario'];
    include '../servidor/conex_db.php';
    $query_info_2 = "SELECT id_usuario, foto, nombre, apellido FROM usuario WHERE user_name != '$sesion'";
    $query_result_2 = mysqli_query($conex, $query_info_2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<div class="cuerpo" id="window_friend">
            <aside class="lateral lateral_friend">
                <div class="lateral_friend_list">
                    <p><i class="fa-solid fa-user-group"></i>Buscar amigo</p>
                    <div class="ctnd_separador"></div>
                    <p><i class="fa-solid fa-user-plus"></i>Solicitudes enviadas</p>
                    <div class="ctnd_separador"></div>
                    <p><i class="fa-solid fa-user"></i>Solicitudes recibidas</p>
                    <div class="ctnd_separador"></div>
                    <p><i class="fa-regular fa-user"></i>Todos tus amigos</p>

                </div>
            </aside>
            <!-- contenido de las publicaciones -->
            <!-- Posteriormente conectar con una 
            tabla donde se almacenen los post de otros usuarios -->

            <div class="contenido contenido_friend">
                    <div class="ctnd_card_container ctnd_card_container_friend">
                        <?php
                        while($row=mysqli_fetch_assoc($query_result_2)) { ?>
                            <div class="card_friend">
                                <?php $id_usuario = $row['id_usuario'];?>
                                <img src="<?php echo $row['foto']; ?>" alt="">
                                <div class="info_friend">
                                    <p class="friend_nombre"><?php echo $row["nombre"]." ".$row["apellido"]; ?></p>
                                    <button>Enviar Solicitud</button>
                                    <button ><a href='<?php echo "pages/perfil_user.php?iduser=$id_usuario" ?>'>Ver perfil</a></button>
                                </div>
                            </div>
                        <?php } mysqli_free_result($query_result_2);?>
                    </div>
            </div>
            <a href='<?php echo "project_index.php?idproject=$id"; ?>' class="enlace_contenedor">
            
        </div>

        <!-- <?php echo "perfil.php?id_user=$id_usuario"; ?> -->
