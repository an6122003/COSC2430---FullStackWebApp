<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="group" content="31">
    <title>Cart</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    
</head>
<body>
    <header>
        <?php 
            include 'header.php';
        ?>
    </header>

    <script>

    </script>
    <main>
        <div class="container">
                <?php
                    $file_name = 'products.csv';
                    $fp = fopen($file_name, 'r');
                    // first row => field names
                    $first = fgetcsv($fp);
                    $products = [];
                    while ($row = fgetcsv($fp)) {
                        $i = 0;
                        $product = [];
                        foreach ($first as $col_name) {
                            $product[$col_name] = $row[$i];
                            $i++;
                        }
                        echo "
                            <div id=box" . $product['id'] . " class='align-items-center background cartBoxes'>
                                <div class='col-lg-4'>
                                    <img src=" . $product['image_dir'] . ">
                                </div>
                                <div class='col-lg-4'>
                                    <p class='fs-2'>" . $product['name'] . "</p>
                                </div>
                                <div class='col-lg-3'>
                                    <p id=price" . $product['id'] . " class='fs-3'>$" . $product['price'] . "</p>
                                </div>
                                <div>
                                    <p class='btn' id=del" . $product['id'] . ">Delete<p>
                                </div>
                            </div>
                            ";
                        $products[] = $product;
                    }
                    $_SESSION['products'] = $products;  
                ?>
                <div class="background">
                    <form>
                        <?php 
                        echo count(file('products.csv'));
                        ?> 
                        <br>
                        Name: <input type='text' name='name'> <br>
                        Price: <input type='text' id='price' name='price'> <br>
                        Image: <input type='file' name='image'> <br>
                        Description: <input type='text' name='description' id='description'> <br>
                        <input type='submit' name='addP' value='Save and Add'>
                        <input type="button" value="Cancel" onclick="history.back()">
                        <span class="fs-2">Total Price: $</span>
                        <span class="fs-2" id="priceField">0</span>
                        <button class='btn btn-secondary float-end' type='button'>Add to Cart</button>
                    </form>
                    
                </div>             
            </div>
        </div>

        <script type="text/javascript">
            var prodCount = <?php echo count($_SESSION['products']); ?>;
        </script> 
        <script src="js/customer_cart.js"></script>
        <script src="js/customer_cart_icon.js"></script>
    </main>

    <footer>
        <?php 
            include 'footer.php';
        ?>
    </footer>
</body>
</html>
