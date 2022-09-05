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
            include '../header.php';
        ?>
    </header>
    <main>
        <div class="validateMessage"></div>
        <section class="form mx-5 my-4">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5"><img src="..//images/login_page/login_image.jpg" alt="" class="img-fluid"></div>
                <div class="col-lg-7 px-5 py-5">
                    <h1 class="font-weight-bold py-4 px-3">Welcome to our webpage</h1>
                    <h4 class="px-3">Register your account</h4>
                    <form enctype='multipart/form-data' method='post' action='../process/register_process.php' class="registerForm">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" name='role' value='customer' placeholder="Role" readonly class="form-control p-3 my-4 mx-3"> 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input input type='text' id='username' name='username' required placeholder="Username" class="form-control p-3 my-4 mx-3"> 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input input type='password' id='password' name='password' required placeholder="Password" class="form-control p-3 my-4 mx-3"> 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input input type='file' name='image' placeholder="Image" required class="form-control p-3 my-4 mx-3"> 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input input type='text' id='name' name='name' required placeholder="Name" class="form-control p-3 my-4 mx-3"> 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input input type='text' id='address' name='address' required placeholder="Address" class="form-control p-3 my-4 mx-3"> 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button input type='submit' name='act' value='register' class="login_btn p-3 mx-3">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>