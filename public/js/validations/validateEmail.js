document.addEventListener("DOMContentLoaded", function(){
    const email = document.getElementById('email');
    const submit = document.getElementById('submit');
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
                            isValidEmail();
                        break;
                        case 'error' :
                            isInvalidEmail();
                        break;
                    } 
                },
                error: function(){
                    console.log("Error de comunicacion");
                }
            });
        }else{
            console.log("Ejecuto esto");
            resetField(); 
        }
       
    }, false);
}, false);

function isValidEmail(){
    email.classList.remove('is-invalid');
    email.classList.add('is-valid');
    submit.classList.remove('disabled');
}
function isInvalidEmail(){
    email.classList.remove('is-valid');
    email.classList.add('is-invalid');
    submit.classList.add('disabled');
}
function resetField(){
    email.classList.remove('is-invalid');
    email.classList.remove('is-valid');
    submit.classList.remove('disabled');
}