document.addEventListener('DOMContentLoaded', function(){
    const passwd = document.getElementById('passwd');
    passwd.addEventListener('keyup', function(event){
        console.log("Validando contraseña");
        if( event.target.value.length > 0 ) {

            /**
             * Valido que la contraseña no tenga espacios y sea mayor a 8 caracteres
             */
            let flag = true;
            let cadena = event.target.value;
            if( cadena.length >= 8 ) {
                for(let i = 0; i < cadena.length; i++){
                    if(cadena.charAt(i) == " " && cadena.length > 8)flag = false;
                }
                if(flag) {
                    isValid('passwd', 'passwd', 'Contraseña valida.');
                }else {
                    isInvalid('passwd', 'passwd', 'La contraseña no puede tener espacios.');
                }
            }else {
                isInvalid('passwd', 'passwd', 'La contraseña debe tener minimo 8 caracteres.');
            }
        } else {
            resetField('passwd', 'passwd');
        }
    }, false);
}, false);