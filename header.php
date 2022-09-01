<?php
    session_start();
?>

<nav>
    <?php 
        if(isset($_SESSION['loggedin'])){
            echo "<a href='#'>My Account</a>";
        } else{
            echo "<a href='login.php'>Login</a>";
        }
    ?>
</nav>