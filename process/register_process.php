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

    function saveCustomerToFile(){
        $file = fopen('../accounts.db',"a");
        fwrite($file, $_POST['role'] . '@@@' . $_POST['username'] . '@@@' . password_hash($_POST['password'], PASSWORD_DEFAULT) . '@@@' . $_POST['name'] . '@@@' . $_POST['address'] . PHP_EOL);
        fclose($file);
    }

    function saveShipperToFile(){
        $file = fopen('../accounts.db',"a");
        fwrite($file, $_POST['role'] . '@@@' . $_POST['username'] . '@@@' . password_hash($_POST['password'], PASSWORD_DEFAULT) . '@@@' . $_POST['distributionHub'] . PHP_EOL);
        fclose($file);
    }

    function saveVendorToFile(){
        $file = fopen('../accounts.db',"a");
        fwrite($file, $_POST['role'] . '@@@' . $_POST['username'] . '@@@' . password_hash($_POST['password'], PASSWORD_DEFAULT) . '@@@' . $_POST['businessName'] . '@@@' . $_POST['businessAddress'] . PHP_EOL);
        fclose($file);
    }

    function simplifyString($str){
        $new_str = str_replace(' ', '_', strtolower($str));
        return $new_str;
    }
    
    function saveAvatar(){
        $fileName = simplifyString($_POST['username']);
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/avatars/'.$fileName.'.png');
    }

    if (isset($_POST['act'])){
        $isUnique = checkUniqueness(1,'username');
        if ($isUnique == true){
            //store customer info
            if($_POST['role'] == 'customer'){
                saveCustomerToFile();
                saveAvatar();
                header('location: ../register_roles.php?message=succeed');
            }
            //store shipper info
            else if($_POST['role'] == 'shipper'){
                saveShipperToFile();
                saveAvatar();
                header('location: ../register_roles.php?message=succeed');
            }
            //store vendor info
            else if($_POST['role'] == 'vendor'){
                $uniBusinessName = checkUniqueness(3, 'businessName');
                $uniBusinessAddress = checkUniqueness(4, 'businessAddress');
                if ($uniBusinessName && $uniBusinessAddress){
                    saveVendorToFile();
                    saveAvatar();
                    header('location: ../register_roles.php?message=succeed');
                } else{
                    header('location: ../register_fields/register_vendor.php?message=business_exist');
                }
            }
        } else{
            header('location: ../register_roles.php?message=fail');
        }
}
?>