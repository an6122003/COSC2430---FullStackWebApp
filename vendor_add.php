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



          <h1>Vendor: Apple <?php //$_SESSION['username']?> </h1>



        <div class='row background'>
          <h2>New product</h2>
          <form enctype='multipart/form-data' method='post' action='addproduct.php' class="addproductForm">
              Product ID: 
              <?php 
              echo count(file('products.csv'));
              ?> 
              <br>
              Name: <input type='text' name='name' required> <br>
              Price: <input type='text' id='price' name='price' required> <br>
              Image: <input type='file' name='image' required> <br>
              Description: <input type='text' name='description' id='description' required> <br>
              <input type='submit' name='addP' value='Save and Add'>
              <input type="button" value="Cancel" onclick="history.back()">
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
