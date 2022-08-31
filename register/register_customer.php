<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="group" content="31">
    <title>Customer Register</title>
    <link rel="stylesheet" href="../css/design.css">
</head>
<body>
    <header>
        <?php 
            include '../header.php';
        ?>
    </header>

    <main>
        <h1>Registration Form</h1>
        <form enctype='multipart/form-data' method='post' action='register.inc.php'>
            Role: <input type='text' name='role' value='customer' readonly> <br>
            Username: <input type='text' name='username' required> <br>
            Password: <input type='text' name='password' required> <br>
            Picture: <input type='file' name='picture'> <br>
            Name: <input type='text' name='name' required> <br>
            Address: <input type='text' name='address' required> <br>
            <input type='submit' name='act' value='register'>
        </form>
    </main>

    <footer>
        <?php 
            include '../footer.php';
        ?>
    </footer>
</body>
</html>