<?php
    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">  
</head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/index.php">E-Commerce Website</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"><span class="navbar-toggler-icon"></span></button> <!--tag for responsive navbar bootstrap-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto"> <!--auto margin-->
                    <li class="nav-item"><a class="nav-link"href="/index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/index.php">About</a></li>
                    <?php 
                    if(isset($_SESSION['loggedin'])){
                        echo '<li class="nav-item"><a class="nav-link" href="/my_account.php">My Account</a></li>';
                        echo"<li class='nav-item'> 
                                <form method='post' action='process/logout_process.php'>
                                    <button class='nav-link btn btn-link' type='submit' name='logout' value='Logout'>Log out</button>
                                </form>
                            </li>";
                    } else{
                        echo '<li class="nav-item"><a class="nav-link" href="/login.php">Login</a></li>';
                    }
                ?>
                </ul>
                
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
