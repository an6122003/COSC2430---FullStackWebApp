<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="group" content="31">
    <title>Vendor: Add new product</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    
</head>
<body>
    <header>
    <?php 
      include 'header.php';
      ?>
    </header>

    <main>
      <div class='container'>
        <h1>Vendor: <?php $_SESSION['username']?> </h1>
        <div class='row background'>
          <h2 class="font-weight-bold py-4 px-3">New product</h2>
          <form enctype='multipart/form-data' method='post' action='addproduct.php' class="addproductForm">
            <div class="form-row">
              <div class="col-lg-7">
                <h5 class="my-0 py-0 px-3">Product ID</h5>
                <input type="text" value=<?php echo count(file('products.csv'));?>  readonly class="form-control p-2 my-2 mx-3"> 
              </div>
            </div>            
            <div class="form-row">
              <div class="col-lg-7">
                <h5 class="my-0 py-0 px-3">Name</h5>
                <input type='text' name='name' required class="form-control p-2 my-2 mx-3">
              </div>
            </div>
            <div class="form-row">
              <div class="col-lg-7">
                <h5 class="my-0 py-0 px-3">Price</h5>
                <input type='text' id='price' name='price' required class="form-control p-2 my-2 mx-3">
              </div>
            </div>
            <div class="form-row">
              <div class="col-lg-7">
              <h5 class="my-0 py-0 px-3">Image</h5>
                <input input type='file' name='image' required class="form-control p-3 my-2 mx-3"> 
              </div>
            </div>
            <div class="form-row">
              <div class="col-lg-7">
                <h5 class="my-0 py-0 px-3">Description</h5>
                <input type='text' id='description' name='description' required class="form-control p-2 my-2 mx-3">
              </div>
            </div>
            <div class="form-row">
              <div class="col-lg-7">
                <button input type='submit' name='addP' value='Save and Add' class="btnVendor py-3 px-5 my-4 mx-3"><h5>Save and Add</h5></button>
                <button input type='button' value='Cancel' onclick="history.back()" class="btnVendor py-3 px-5 my-4 mx-3"><h5>Cancel</h5></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>

    <footer>
    <?php 
      include 'footer.php';
      ?>
    </footer>
</body>
</html>
