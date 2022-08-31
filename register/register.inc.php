<?php
    //the function take input index which stands for index in each line after exploding, comparedValue used for taking value from POST method
    function checkUniqueness($index,$comparedValue){
        $check = true;
        $lines = file('../accounts.db');
        foreach($lines as $line){
            $line_array = explode('@@@', $line);
            if (array_key_exists($index, $line_array)){
                if($line_array[$index] == $_POST[$comparedValue]){
                    $check = false;
                    break;
                }
            }
        }
        return $check;
    }

    if (isset($_POST['act'])){
        $isUnique = checkUniqueness(1,'username');
        if ($isUnique == true){
            //store customer info
            if($_POST['role'] == 'customer'){
                $file = fopen('../accounts.db',"a");
                fwrite($file, $_POST['role'] . '@@@' . $_POST['username'] . '@@@' . password_hash($_POST['password'], PASSWORD_DEFAULT) . '@@@' . $_POST['name'] . '@@@' . $_POST['address'] . PHP_EOL);
                fclose($file);
                header('location: register_roles.php?message=succeed');
            }

            //store shipper info
            else if($_POST['role'] == 'shipper'){
                $file = fopen('../accounts.db',"a");
                fwrite($file, $_POST['role'] . '@@@' . $_POST['username'] . '@@@' . password_hash($_POST['password'], PASSWORD_DEFAULT) . '@@@' . $_POST['distribution_hub'] . PHP_EOL);
                fclose($file);
                header('location: register_roles.php?message=succeed');
            }

            //store vendor info
            else if($_POST['role'] == 'vendor'){
                $uniBusinessName = checkUniqueness(3, 'business_name');
                $uniBusinessAddress = checkUniqueness(4, 'business_address');
                if ($uniBusinessName && $uniBusinessAddress){
                    $file = fopen('../accounts.db',"a");
                    fwrite($file, $_POST['role'] . '@@@' . $_POST['username'] . '@@@' . password_hash($_POST['password'], PASSWORD_DEFAULT) . '@@@' . $_POST['business_name'] . '@@@' . $_POST['business_address'] . PHP_EOL);
                    fclose($file);
                    header('location: register_roles.php?message=succeed');
                } else{
                    header('location: register_vendor.php?message=business_exist');
                }
            }
        } else{
            header('location: register_roles.php?message=fail');
        }
}
?>