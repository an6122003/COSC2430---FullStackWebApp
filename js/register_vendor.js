function validate(){
    let userName = document.querySelector('#username').value;
    let password = document.querySelector('#password').value;
    let businessName = document.querySelector('#businessName').value;
    let businessAddress = document.querySelector('#businessAddress').value;
    let errorMessage = "";

    if(userName.match("^[a-zA-Z0-9]{8,15}$") == null){
        errorMessage += "Invalid user name (only letters and digits, 8-15)<br>";
    }

    if(password.match("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,20}$") == null){
        errorMessage += "Invalid password (at least 1 lower case, upper case, digit, special characters, 8-20) <br>";
    }

    if((businessName.match("^.{5,}$") == null) || (businessAddress.match("^.{5,}$") == null)){
        errorMessage += "Invalid business name or address (at least 5 characters) <br>";
    }



    if(errorMessage == ""){
        return true;
    } else{
        let validateMessage = document.querySelector(".validateMessage");
        validateMessage.innerHTML = errorMessage;
        return false;
    }
}

function init(){
    let form = document.querySelector(".registerForm");
    form.onsubmit = validate;
}

window.onload = init;