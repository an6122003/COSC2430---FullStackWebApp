<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="group" content="31">
    <title>Login</title>
    <link rel="stylesheet" href="/css/design.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<header>
    <?php 
        include 'header.php';
    ?>
</header>
<body>
    <section class="form mx-5 my-4">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5"><img src="images/login_page/login_image.jpg" alt="" class="img-fluid"></div>
                <div class="col-lg-7 px-5 py-5">
                    <h1 class="font-weight-bold py-4 px-3">Welcome to our webpage</h1>
                    <h4 class="px-3">Login to your account</h4>
                    <form method="post" action="login.php">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" name="username" placeholder="User Name" class="form-control p-3 my-4 mx-3"> 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password" name="password" placeholder="Password" class="form-control p-3 my-4 mx-3"> 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button name="login" value="login" class="login_btn p-3 mx-3">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
<?php
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
            $_SESSION['username'] = $_POST['username'];
            
            //store the role matching with that username
            $lines = file('accounts.db');
            foreach($lines as $line){
                $lineArray = explode('@@@', $line);
                if($lineArray[1] == $_POST['username']){
                    $_SESSION['role'] = $lineArray[0];
                }
            }
            header('location: index.php');
        } else{
            echo '<script>alert("Login failed, Incorrect username or password.")</script>';
        }
    }
?>
</html>
