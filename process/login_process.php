<?php
    session_start();

    function checkLogin(){
        $check = false;
        $lines = file('../data/accounts.db');
        foreach($lines as $line){
            $lineArray = explode('@@@', $line);
            if(($lineArray[1] == $_POST['username']) && (password_verify($_POST['password'], $lineArray[2]))){
                $check = true;
                break;
            }
        }
        return $check;
    }
    if(isset($_POST['login'])){
        $isLoggedin = checkLogin();
            if($isLoggedin){
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $_POST['username'];
                
                //store the role matching with that username
                $lines = file('../data/accounts.db');
                foreach($lines as $line){
                    $lineArray = explode('@@@', $line);
                    if($lineArray[1] == $_POST['username']){
                        $_SESSION['role'] = $lineArray[0];
                        if ($lineArray[0] = 'shipper'){
                            $_SESSION['hubID'] = $lineArray[4];
                        }
                    }
                }
                header('location: ../www/index.php');
            } else{
                header('location: ../www/login.php');
            }
    }
?>