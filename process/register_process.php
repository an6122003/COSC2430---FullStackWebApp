<?php
    //the function take input index which stands for index in each line after exploding, comparedValue used for taking value from POST method
    function checkUniqueness($index,$comparedValue){
        $check = true;
        $lines = file('../accounts.db');
        foreach($lines as $line){
            $lineArray = explode('@@@', $line);
            if (array_key_exists($index, $lineArray)){
                if($lineArray[$index] == $_POST[$comparedValue]){
                    $check = false;
                    break;
                }
            }
        }
        return $check;
    }

    include 'avatar_process.php';

    function saveToFile($role,$imagePath){
        $file = fopen('../accounts.db',"a");
        if ($role == 'customer'){
            fwrite($file, $_POST['role'] . '@@@' . $_POST['username'] . '@@@' . password_hash($_POST['password'], PASSWORD_DEFAULT) . '@@@' . $imagePath . '@@@' . $_POST['name'] . '@@@' . $_POST['address'] . PHP_EOL);
        } else if ($role == 'shipper'){
            fwrite($file, $_POST['role'] . '@@@' . $_POST['username'] . '@@@' . password_hash($_POST['password'], PASSWORD_DEFAULT) . '@@@' . $imagePath . '@@@' . $_POST['distributionHub'] . PHP_EOL);
        } else if($role == 'vendor'){
            fwrite($file, $_POST['role'] . '@@@' . $_POST['username'] . '@@@' . password_hash($_POST['password'], PASSWORD_DEFAULT) . '@@@' . $imagePath . '@@@' . $_POST['businessName'] . '@@@' . $_POST['businessAddress'] . PHP_EOL);
        }
        fclose($file);
    }

    function validateInput($username,$password,$businessName,$businessAddress,$cusName,$cusAddress){
        $validated = true;

        if(!preg_match("/^[a-zA-Z0-9]{8,15}$/", $username)){
            $validated = false;
            return $validated;
        }
        if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,20}$/", $password)){
            $validated = false;
            return $validated;
        }
        if($businessName !== 'none'){
            if(!preg_match("/^.{5,}$/", $businessName)){
                $validated = false;
                return $validated;
            }
        }
        if($businessAddress !== 'none'){
            if(!preg_match("/^.{5,}$/", $businessAddress)){
                $validated = false;
                return $validated;
            }
        }
        if($cusName !== 'none'){
            if(!preg_match("/^.{5,}$/", $cusName)){
                $validated = false;
                return $validated;
            }
        }
        if($cusAddress !== 'none'){
            if(!preg_match("/^.{5,}$/", $cusAddress)){
                $validated = false;
                return $validated;
            }
        }
        return $validated;
    }

    if (isset($_POST['act'])){
        $isUnique = checkUniqueness(1,'username');
        if ($isUnique == true){
            //store customer info
            if($_POST['role'] == 'customer'){
                if(validateInput($_POST['username'], $_POST['password'], 'none', 'none', $_POST['name'], $_POST['address'])){
                    $avatarPath = saveAvatar();
                    saveToFile($_POST['role'], $avatarPath);
                    header('location: ../register_roles.php?message=succeed');
                }
            }
            //store shipper info
            else if($_POST['role'] == 'shipper'){
                if(validateInput($_POST['username'], $_POST['password'], 'none', 'none', 'none', 'none')){
                    $avatarPath = saveAvatar();
                    saveToFile($_POST['role'], $avatarPath);
                    header('location: ../register_roles.php?message=succeed');
                }
            }
            //store vendor info
            else if($_POST['role'] == 'vendor'){
                $uniBusinessName = checkUniqueness(4, 'businessName');
                $uniBusinessAddress = checkUniqueness(5, 'businessAddress');
                if ($uniBusinessName && $uniBusinessAddress){
                    if(validateInput($_POST['username'], $_POST['password'], $_POST['businessName'], $_POST['businessAddress'], 'none', 'none')){
                        $avatarPath = saveAvatar();
                        saveToFile($_POST['role'], $avatarPath);
                        header('location: ../register_roles.php?message=succeed');
                    }
                } else{
                    header('location: ../register_fields/register_vendor.php?message=business_exist');
                }
            }
        } else{
            header('location: ../register_roles.php?message=fail');
        }
}
?>