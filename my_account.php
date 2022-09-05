<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $user = $_SESSION['username'];
    $userInfo = [];
    if ($file = fopen("accounts.db", "r")) {
        while(!feof($file)) {
            $line = fgets($file);
            $temp = explode('@@@',$line);

            if ($user == $temp[1]){
                $userInfo = $temp;
                // print_r($userInfo);
                break;
            }
        }
        fclose($file);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="group" content="31">
    <title>Customer Register</title>
    <link rel="stylesheet" href="../css/design.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="../js/register_customer.js"></script>
</head>
<body>
    <header>
        <?php 
            include_once('header.php'); 
        ?>
    </header>
    <main>
    <div class = "container">
        <form>
        <h1 class="font-weight-bold py-4 px-3">Hello <?php echo $_SESSION['username'] ?></h1>
        <h4 class="px-3 py-4">Personal Information</h4>
            <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label">Role:</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="role" value="<?php echo $userInfo[0] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username:</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="username" value="<?php echo $userInfo[1] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address:</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="address" value="<?php echo $userInfo[3] ?>">
                </div>
            </div>
        </form>
    </div> 
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>