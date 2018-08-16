class Usuarios{
    constructor(){

    }
    //metodo loginUser
    loginUser(email, password){
        //verifica que el campo email contenga datos.
        if(email == ""){
            //el .focus útil para posicionarnos en un campo concreto de un formulario, ya sea al principio del formulario 
            //o por validaciones que vayamos haciendo y que nos hagan ir a otro campo del formulario.
            document.getElementById("email").focus();
            //toast para mandar mensajes
            M.toast({ html: 'Ingrese el email', classes: 'rounded'});
        }else{
            //si el campo del email tiene datos verifica el de la pasword
            if(password == ""){
                document.getElementById("password").focus();
                M.toast({ html: 'Ingrese el Password', classes: 'rounded'});
            }else{
                //valida utilizan la funcion validarEmail que esta en Funciones 
                //verificar si el email es valido
                if(validarEmail(email)){
                    if(6 <= password.length){
                        //para enviar nuestros datos por post al servidor
                        //le enviamos como parametro la ruta del controlador
                        //y optenemos respuesta atraves de response.
                        $.post("Index/userLogin", {email,password}, (response)=>{
                            console.log(response);
                            try{
                                //paso los datos del vector response que envian desde el servidor
                                //con JSON para manejarlos en la vista.
                                var item = JSON.parse(response);
                                //Verifico que el idUsuario sea mayor a 0 para verificar que el inicio de 
                                //session sea valido.
                                if(0 < item.IdUsuario){
                                    //si el inicio de session es correcto lo enviamos al controlador Principal
                                    //para que abra la vista principal
                                    window.location.href = URL + "Principal/principal";
                                }else{
                                    //de lo contrario mostramos un mensaje de error
                                    document.getElementById("indexMessage").innerHTML = "Email o Contraseña Incorrectos";

                                }
                            }catch(error){
                                //por si susece algun error en el proceimiento
                                document.getElementById("indexMessage").innerHTML = response;
                            }
                        });
                    }else{
                        document.getElementById("password").focus();
                        M.toast({ html: 'Introducce al menos 6 caracteres en su contraseña', classes: 'rounded'});
                    }
                }else{
                     document.getElementById("email").focus();
                     M.toast({ html: 'Ingrese Una Direccion de Correo Valida.', classes: 'rounded'});
                }       
            }
        }
    }
}