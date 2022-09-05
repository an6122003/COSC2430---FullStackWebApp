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
    <?php
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
if ($userInfo[0] == "shipper"){
    echo '<main>
    <div class = "container">
        <form>
        <h1 class="font-weight-bold py-4 px-3">Hello '.$_SESSION['username'] . '</h1>
        <h4 class="px-3 py-4">Personal Information</h4>
            <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label">Role:</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="role" value="' .$userInfo[0] .'">
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username:</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="username" value="'.$userInfo[1].'">
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Profile Image:</label>
                <div class="col-sm-3">
                <img id= "image" class= "img-thumbnail" src="'.$userInfo[3].'"></img>
                <div class="modal fade" id="modal" >
                    <div class="modal-dialog modal-dialog-centered" >
                        <div class="modal-content">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close Modal">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal" class="btn btn-dark login_btn">Change Profile Picture</button>
                </div>
            </div>
            <div class="form-group row">
                <label for="distributionHub" class="col-sm-2 col-form-label">Distribution Hub:</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="distributionHub" value="'.$userInfo[4].'">
                </div>
            </div>
        </form>
    </div> 
    </main>';
}

if ($userInfo[0] == "customer"){
    echo '<main>
    <div class = "container">
        <form>
        <h1 class="font-weight-bold py-4 px-3">Hello '.$_SESSION['username'] . '</h1>
        <h4 class="px-3 py-4">Personal Information</h4>
            <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label">Role:</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="role" value="' .$userInfo[0] .'">
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username:</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="username" value="'.$userInfo[1].'">
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Profile Image:</label>
                <div class="col-sm-3">
                <img id= "image" class= "img-thumbnail" src="'.$userInfo[3].'"></img>
                <div class="modal fade" id="modal" >
                    <div class="modal-dialog modal-dialog-centered" >
                        <div class="modal-content">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close Modal">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal" class="btn btn-dark login_btn">Change Profile Picture</button>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="name" value="'.$userInfo[4].'">
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address:</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="address" value="'.$userInfo[5].'">
                </div>
            </div>
        </form>
    </div> 
    </main>';
}

if ($userInfo[0] == "vendor"){
    echo '<main>
    <div class = "container">
        <form>
        <h1 class="font-weight-bold py-4 px-3">Hello '.$_SESSION['username'] . '</h1>
        <h4 class="px-3 py-4">Personal Information</h4>
            <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label">Role:</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="role" value="' .$userInfo[0] .'">
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username:</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="username" value="'.$userInfo[1].'">
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Profile Image:</label>
                <div class="col-sm-3">
                <img id= "image" class= "img-thumbnail" src="'.$userInfo[3].'"></img>
                <div class="modal fade" id="modal" >
                    <div class="modal-dialog modal-dialog-centered" >
                        <div class="modal-content">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close Modal">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal" class="btn btn-dark login_btn">Change Profile Picture</button>
                </div>
            </div>
            <div class="form-group row">
                <label for="businessName" class="col-sm-2 col-form-label">Business Name:</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="businessName" value="'.$userInfo[4].'">
                </div>
            </div>
            <div class="form-group row">
                <label for="businessAddress" class="col-sm-2 col-form-label">Business Address:</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="businessAddress" value="'.$userInfo[5].'">
                </div>
            </div>
        </form>
    </div> 
    </main>';
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>