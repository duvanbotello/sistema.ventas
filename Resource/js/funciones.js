var validarEmail = (email)=>{

    //expresion regex de javascript para poder validar los caracteres de un email.
    let regex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    // utiliza la expresion regular para validar el email, retorna true o false.
    if(regex.test(email)){
        return true;
    }else{
        return false;
    }
}