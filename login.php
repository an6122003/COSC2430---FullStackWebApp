<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="group" content="31">
    <title>Login</title>
    <link rel="stylesheet" href="css/design.css">
</head>
<body>
    <main>
        <form method="post" action="login.php">
            <input type="text" name="username" placeholder="User Name"> <br>
            <input type="text" name="password" placeholder="Password"> <br>
            <input type="submit" name="login" value="login"> 
        </form>
    </main>
</body>
<?php
    session_start();
    function checkLogin(){
        $check = false;
        $lines = file('accounts.db');
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
            header ('location: index.php');
        } else{
            echo 'login fail';
        }
    }
?>
</html>
