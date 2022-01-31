var validations = {
    email : true,
    username : true
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

function setPropertyValidations(property, flag){

    switch(property){
        case 'username' :
            validations.username = flag;
        break;
        case 'email' :
            validations.email = flag;
        break;
    }
}
function resetField(el, property){
    
    document.getElementById(el).classList.remove('is-valid');
    document.getElementById(el).classList.remove('is-invalid');

    setPropertyValidations(property, true);
    setStatusButtonSubmit();

}

function isValid(el, property){
    document.getElementById(el).classList.remove('is-invalid');
    document.getElementById(el).classList.add('is-valid');

    setPropertyValidations(property, true);
    setStatusButtonSubmit();
}

function isInvalid(el, property){
    document.getElementById(el).classList.remove('is-valid');
    document.getElementById(el).classList.add('is-invalid');

    setPropertyValidations(property, false);
    setStatusButtonSubmit();
}