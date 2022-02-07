document.addEventListener("DOMContentLoaded", function(){
    const email = document.getElementById('email');
    email.addEventListener('keyup', function(event){

        if(event.target.value.length > 0){

            /**
            * Email valido
            */
            if( validateEmail(event.target.value) ) {

                $.ajax({
                    url:'/register/validate/email',
                    data:{'email' : event.target.value},
                    type: 'GET',
                    dataType: 'json',
                    success: function(response){
                        switch (response.message) {
                            case 'success' :
                                isValid('email', 'email', 'Correo electrónico disponible.');
                            break;
                            case 'error' :
                                isInvalid('email', 'email', 'Ya existe una cuenta con este correo electrónico.');
                            break;
                        } 
                    },
                    error: function(){
                        console.log("Error de comunicacion");
                    }
                });

            } else {
                /**
                 * Email in valido
                 */
                 isInvalid('email', 'email', 'El correo electrónico no es valido.');
            }
            
        }else{
            resetField('email', 'email'); 
        }
        
    }, false);
}, false);

