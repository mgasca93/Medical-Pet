document.addEventListener("DOMContentLoaded", function(){
    const username = document.getElementById('username');
    username.addEventListener('keyup', function(event){
        
        if( event.target.value.length > 0 ) {
            $.ajax({
                url:'/register/validate/username',
                data:{'username' : event.target.value},
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    switch (response.message) {
                        case 'success' :
                            isValid('username', 'username', 'Username disponible.');
                        break;
                        case 'error' :
                            isInvalid('username', 'username', 'El username ya se encuentra en uso.');
                        break;
                    } 
                },
                error: function(){
                    console.log("Error de comunicacion");
                }
            });
        }else{
            resetField('username', 'username'); 
        }
       
    }, false);
}, false);

