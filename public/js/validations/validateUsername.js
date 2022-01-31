document.addEventListener("DOMContentLoaded", function(){
    const username = document.getElementById('username');
    const submit = document.getElementById('submit');
    username.addEventListener('keyup', function(event){
        
        if(event.target.value.length > 0){
            $.ajax({
                url:'/register/validate/username',
                data:{'username' : event.target.value},
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    switch (response.message) {
                        case 'success' :
                            isValidUsername();
                        break;
                        case 'error' :
                            isInvalidUsername();
                        break;
                    } 
                },
                error: function(){
                    console.log("Error de comunicacion");
                }
            });
        }else{
            resetField(); 
        }
       
    }, false);
}, false);

function isValidUsername(){
    username.classList.remove('is-invalid');
    username.classList.add('is-valid');
    submit.classList.remove('disabled');
}
function isInvalidUsername(){
    username.classList.remove('is-valid');
    username.classList.add('is-invalid');
    submit.classList.add('disabled');
}
function resetField(){
    username.classList.remove('is-invalid');
    username.classList.remove('is-valid');
    submit.classList.remove('disabled');
}