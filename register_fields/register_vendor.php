<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="group" content="31">
      <title>Vendor Register</title>
      <link rel="stylesheet" href="../css/design.css">
      <script src="../js/register_vendor.js"></script>
  </head>
  <body>
    <main>
        <h1>Registration Form</h1>
        <?php 
            if (isset($_GET['message'])){
                if($_GET['message'] == 'business_exist'){
                    echo "<div class='errorMessage'><p>Business already exists</p></div>";
                }
            }
        ?>
        <div class="validateMessage"></div>
        <form enctype='multipart/form-data' method='post' action='../process/register_process.php' class="registerForm">
        Role: <input type='text' name='role' value='vendor' readonly> <br>
        Username: <input type='text' id='username' name='username' required> <br>
        Password: <input type='text' id='password' name='password' required> <br>
        Image: <input type='file' name='image'> <br>
        Business Name: <input type='text' name='businessName' id='businessName' required> <br>
        Business Address: <input type='text' name='businessAddress' id='businessAddress' required> <br>
        <input type='submit' name='act' value='register'>
        </form>
    </main>
  </body>
</html>