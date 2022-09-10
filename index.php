<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="group" content="31">
    <title>Group 31 Website</title>
    <link rel="stylesheet" href="css/design.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <header>
        <?php 
            include 'header.php';
        ?>
    </header>

    <main>
        <h1>Welcome to our wesite</h1>
        <?php 
            if (isset($_SESSION['loggedin'])){
                echo "<p>Logged in ! Experience yourself..</p>";
            } else {
                echo "<p>Have not had account? Register <a href='register_roles.php'>here</a>.</p>";
            }
        ?>
    </main>

    <footer>
        <?php 
            include 'footer.php';
        ?>
    </footer>
</body>
</html>