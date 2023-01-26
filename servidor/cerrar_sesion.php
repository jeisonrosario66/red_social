<?php 
    #DESTRUYE LA SESION CREADA
    session_start();
    session_destroy();
    header("location: ../index.html");
?>