var validations = {
    email : true,
    username : true,
    passwd : true
};

function setStatusButtonSubmit(){
    let flag = true;
    for(properties in validations){
        let val = validations[properties];
        if(!val) {
            flag = false;
        }
    }
    
    switch(flag){
        case true :
            document.getElementById('submit').classList.remove('disabled');
        break;
        case false:
            document.getElementById('submit').classList.add('disabled');
        break;
    }

}

function setPropertyValidations( property, flag ) {
    switch(property){
        case 'username' :
            validations.username = flag;
        break;
        case 'email' :
            validations.email = flag;
        break;
        case 'passwd' :
            validations.passwd = flag;
        break;
    }
}
function resetField( el, property ){
    
    document.getElementById(el).classList.remove('is-valid');
    document.getElementById(el).classList.remove('is-invalid');

    setPropertyValidations(property, true);
    setStatusButtonSubmit();

}

function isValid( el, property , message = ''){
    document.getElementById(el).classList.remove('is-invalid');
    document.getElementById(el).classList.add('is-valid');

    setStatusValidateField(el, message, true);
    setPropertyValidations(property, true);
    setStatusButtonSubmit();
}

function isInvalid( el, property, message = '' ){
    document.getElementById(el).classList.remove('is-valid');
    document.getElementById(el).classList.add('is-invalid');

    setStatusValidateField(el, message, false);
    setPropertyValidations(property, false);
    setStatusButtonSubmit();
}

function isInvalidEmail( el, property, message = '' ) {
    document.getElementById(el).classList.remove();
    document.getElementById(el).classList.add();

    setStatusValidateField(el, message, true);
    setPropertyValidations(property, false);
    setStatusButtonSubmit();
}

function setStatusValidateField( el, message, status ){

    var elemento = document.getElementById(el);
    
    switch(status) {
        case true:
            elemento.nextElementSibling.classList.remove('invalid-feedback');
            elemento.nextElementSibling.classList.add('valid-feedback');
            elemento.nextElementSibling.innerHTML = message;
        break;
        case false:
            elemento.nextElementSibling.classList.remove('valid-feedback');
            elemento.nextElementSibling.classList.add('invalid-feedback');
            elemento.nextElementSibling.innerHTML = message;
        break;
    }
    
}

function validateEmail( email ) {
    let flag = false;
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if( emailRegex.test(email) ) {
        flag = true;
    }
    return flag;
}