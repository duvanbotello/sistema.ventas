/**
 * CODIGO DE USUARIOS
 */
var usuarios = new Usuarios();
//creamos una funcion para optener los datos y enviarlos al servidor.
var loginUser = () =>{
    //optenemos los datos del formulario login.
    //se traen los input del formulario con id "email" y "pasword"
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    //utilizamos el metodo loginuser de la clase usuario y le pasos el email y el password
    usuarios.loginUser(email,password);
}

//utilizando jquery
$().ready(()=>{
    //Todo lo que nosotros coloquemos dentro de estas llaves se ejecutara automaticamente.
    //estamos validando los campos de texto que estan dentro del formulario con la id = login
    //utilizando jquery validation
    $("#login").validate()
});