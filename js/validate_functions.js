export function validateUsername(userName){
    if(userName.match("^[a-zA-Z0-9]{8,15}$") == null){
        return false;
    } else{
        return true;
    }
}

export function validatePassword(passWord){
    if(passWord.match("/////") == null){
        return false;
    } else{
        return true;
    }
}

export function validateOtherFields(otherField){
    if(otherField.match("^[a-zA-Z]{5,}$") == null){
        return false;
    } else{
        return true;
    }
}