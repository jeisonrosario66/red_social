<!-- header Cabezera con informacion sencilla -->
<header class="cabezera">
            <form action="#" method="post" class="header_buscar">
                <a href="http://localhost/red_social/bienvenida.php">
                <div class="icon_logo"></div>
                </a>
                <input type="search" name="" id="" placeholder="Buscar">
            </form>
            <div class="header_secciones">
                <a id="home">Inicio<i class="fa-solid fa-house"></i></a>
                <a id="friend">Usuarios<i class="fa-solid fa-users"></i></a>
                <a href="#">Mensajes<i class="fa-solid fa-message"></i></a>
                <a href="#">Notificaciones<i class="fa-solid fa-bell"></i></a>
                <div class="header_perfil" id="header_perfil">
                    <img src="<?php echo $foto_perfil; ?>" alt="perfil: <?php echo "$nombre $apellido"; ?>">
                    <p>Yo<i class="fa-solid fa-bars"></i></p>
                </div>
            </div>
        </header>