<?php
    session_start();

    function checkLogin(){
        $check = false;
        $lines = file('../accounts.db');
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
                $lines = file('../accounts.db');
                foreach($lines as $line){
                    $lineArray = explode('@@@', $line);
                    if($lineArray[1] == $_POST['username']){
                        $_SESSION['role'] = $lineArray[0];
                        if ($lineArray[0] = 'shipper'){
                            $_SESSION['hub'] = $lineArray[4];
                        }
                    }
                }
                header('location: ../index.php');
            } else{
                echo '<script>alert("Login failed, Incorrect username or password.")</script>';
            }
    }
?>