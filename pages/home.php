<?php
    include '../servidor/session_start.php';
    $query_info = "SELECT foto,nombre,apellido FROM usuario where user_name='$sesion'";
    $query_info_r = mysqli_query($conex, $query_info);
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
<div class="cuerpo" id="window_home">
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