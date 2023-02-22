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
<div class="cuerpo cuerpo_perfil">
    <div class="portada">
        <div class="perfil_portada">
            <img src="<?php echo $foto_perfil; ?>" alt="perfil: <?php echo "$nombre $apellido"; ?>"> 
        </div>
        <div class="portada_info">
            <button><i class="fa-solid fa-user-pen"></i>Editar perfil</button>
            <div>
                <p Class="nombres"><?php echo "$nombre $apellido"; ?></p>
                <p class="amigos_counter"># Amigo</p>
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