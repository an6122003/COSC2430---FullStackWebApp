function validate(){
    let userName = document.querySelector('#username').value;
    let password = document.querySelector('#password').value;
    let businessName = document.querySelector('#business_name').value;
    let businessAddress = document.querySelector('#business_address').value;
    let errorMessage = "";

    if(userName.match("^[a-zA-Z0-9]{8,15}$") == null){
        errorMessage += "Invalid user name (letters and digits, 8-15)<br>";
    }

    if(password.match("/////") == null){
        errorMessage += "Invalid password (at least 1 lower case, upper case, digit, special characters, 8-20) <br>";
    }

    if((businessName.match("^.{5,}$") == null) || (businessAddress.match("^.{5,}$") == null)){
        errorMessage += "Invalid business name or address (at least 5 characters) <br>";
    }



    if(errorMessage == ""){
        return true;
    } else{
        let validateMessage = document.querySelector(".validate_message");
        validateMessage.innerHTML = errorMessage;
        return false;
    }
}

function init(){
    let form = document.querySelector(".register_form");
    form.onsubmit = validate;
}

window.onload = init;