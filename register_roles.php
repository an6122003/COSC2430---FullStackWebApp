<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="group" content="31">
    <title>Register Roles</title>
    <link rel="stylesheet" href="css/design.css">
</head>
<body>
    <header>
        <?php 
            include 'header.php';
        ?>
    </header>
    <main>
        Choose your role: 
        <button><a href="register_fields/register_vendor.php">Vendor</a></button>
        <button><a href="register_fields/register_customer.php">Customer</a></button>
        <button><a href="register_fields/register_shipper.php">Shipper</a></button>
    </main>
    <?php 
        if (isset($_GET['message'])){
            if($_GET['message'] == 'succeed'){
                echo "<div class='succeedMessage'><p>Register successfully!</p><div/>";
            }
            else if ($_GET['message'] == 'fail'){
                echo "<div class='errorMessage'<p>Register fail! Username already exist.</p><div/>";
            }
        }
    ?>

    <footer>
        <?php 
            include 'footer.php';
        ?>
    </footer>
</body>
</html>