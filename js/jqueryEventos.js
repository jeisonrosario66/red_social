// El codigo jquey solo se ejecutara cuando se termine de cargar el documento
let loadDeaful = "pages/home.php"
function changeUrl (url){
    // Edita el url para  mostrar un url personalizado
    // Esto no funciona bien generea confictos con las rutas
    let new_url = "http://localhost/red_social/"+url;
    window.history.pushState("data","Title",new_url);
    document.title = url;
};
$("#window").load(loadDeaful);
$("#friend").click(function() {
    changeUrl("amigos")
    $("#window").load("pages/friends.php");
});
$("#home").click(function() {
    changeUrl("Inicio")
    $("#window").load("pages/home.php");
});
$("#ver_perfil").click(function() {
    $("#window").load("pages/perfil.php");
});
$("#perfil_usuario").click(function() {
    $("#windows").load("pages/perfil_user.php");
    console.log("SSS")
});
