<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="group" content="31">
    <title>Customer Register</title>
    <link rel="stylesheet" href="../css/design.css">
    <script src="../js/register_customer.js"></script>
</head>
<body>
    <main>
        <h1>Registration Form</h1>
        <div class="validateMessage"></div>
        <form enctype='multipart/form-data' method='post' action='../process/register_process.php' class="registerForm">
            Role: <input type='text' name='role' value='customer' readonly> <br>
            Username: <input type='text' id='username' name='username' required> <br>
            Password: <input type='text' id='password' name='password' required> <br>
            Image: <input type='file' name='image'> <br>
            Name: <input type='text' id='name' name='name' required> <br>
            Address: <input type='text' id='address' name='address' required> <br>
            <input type='submit' name='act' value='register'>
        </form>
    </main>
</body>
</html>