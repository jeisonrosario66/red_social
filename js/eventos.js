// Ajax con javascrip puro
let objRequest = new XMLHttpRequest();


// Opciones del header
const header_perfil = document.getElementById ("header_perfil");
const header_perfil_opcs =  document.getElementById ("header_perfil_opcs");
let interructor_header_perfil_opcs = false
header_perfil.addEventListener( "click", function() {
    if (interructor_header_perfil_opcs === false) {
        header_perfil_opcs.classList.add("header_perfil_opcs-none");
        interructor_header_perfil_opcs = true
    } else {
        header_perfil_opcs.classList.remove("header_perfil_opcs-none"); 
        interructor_header_perfil_opcs = false
    }
});