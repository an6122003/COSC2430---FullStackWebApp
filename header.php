<?php
    session_start();
?>

<nav>
    <?php 
        if(isset($_SESSION['loggedin'])){
            echo "<a href='my_account.php'>My Account</a>";
            echo"<form method='post' action='process/logout_process.php'>
                    <input type='submit' name='logout' value='Logout'>
                </form>";
        } else{
            echo "<a href='login.php'>Login</a>";
        }
    ?>
</nav>

