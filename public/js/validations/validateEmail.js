document.addEventListener("DOMContentLoaded", function(){
    const email = document.getElementById('email');
    email.addEventListener('keyup', function(event){

        if(event.target.value.length > 0){
            $.ajax({
                url:'/register/validate/email',
                data:{'email' : event.target.value},
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    switch (response.message) {
                        case 'success' :
                            isValid('email', 'email');
                        break;
                        case 'error' :
                            isInvalid('email', 'email');
                        break;
                    } 
                },
                error: function(){
                    console.log("Error de comunicacion");
                }
            });
        }else{
            resetField('email', 'email'); 
        }
       
    }, false);
}, false);

