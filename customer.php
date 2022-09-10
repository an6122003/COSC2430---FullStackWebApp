<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="group" content="31">
    <title>Customer Main</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    
</head>
<body>
    <header>
        <?php 
            include 'customer_header.php';
        ?>
    </header>

    <main>
        <div class="container">
            <div class="row background">
                <div class="col-lg-3 ">
                    <h2>Price Range</h2>
                    <form class="row" method="post" action="customer.php">
                        <input type="text" name="nameFilter" id="nameFilter" placeholder="Product Search">
                        <input type="number" name="minPrice" id="minPrice" class="col-lg-6" placeholder="Min Price">
                        <input type="number" name="maxPrice" id="maxPrice" class="col-lg-6" placeholder="Max Price">
                        <input type="submit" name="submit" value="Submit">
                    </form>
                </div>
                <div class="col-lg-9">
                    <?php
                        function readFromFile(){
                            $file_name = 'products.csv';
                            $fp = fopen($file_name, 'r');
                            // first row => field names
                            $first = fgetcsv($fp);
                            $products = [];
                            while ($row = fgetcsv($fp)) {
                                $i = 0;
                                $product = [];
                                foreach ($first as $col_name) {
                                    $product[$col_name] =  $row[$i];
                                    // treat sizes differently
                                    // make it an array
                                    if ($col_name == 'Description') {
                                        $product[$col_name] = explode(',', $product[$col_name]);
                                    }
                                    $i++;
                                }

                                // check for min price
                                if (isset($_POST['minPrice']) && is_numeric($_POST['minPrice'])) {
                                    if ($product['price'] < $_POST['minPrice']) {
                                        continue;
                                    }
                                }

                                // check for max price
                                if (isset($_POST['maxPrice']) && is_numeric($_POST['maxPrice'])) {
                                    if ($product['price'] > $_POST['maxPrice']) {
                                        continue;
                                    }
                                }

                                // name search
                                if (isset($_POST['nameFilter']) && !empty($_POST['nameFilter'])) {
                                    if (strpos($product['name'], $_POST['nameFilter']) === false) {
                                        continue;
                                    }
                                }

                                // product display
                                echo "<div class='productDisplay text-bg-light colSplit btn' id='btn" . $product['id'] . "'>
                                    <img src=" . $product['image_dir'] . ">
                                    <p class='fs-2'>" . $product['name'] . "</p>
                                    <p class='fs-4'>$" . $product['price'] . "</p>
                                </div>";

                                // modal box template
                                echo "<div class='modal' id='modal" . $product['id'] . "'>
                                    <div class='modal-dialog modal-xl '>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='btn-close' id='closeBtn'" . $product['id'] . "></button>
                                            </div>
                                            <div class='row px-5 py-5'>
                                            
                                                <div class='col-lg-8'>
                                                    <img src=" . $product['image_dir'] . ">
                                                </div>
                                                <div class='col-lg-4'>
                                                    <p class='fs-2'>" . $product['name'] . "</p>
                                                    <p class='fs-4'>$" . $product['price'] . "</p>
                                                    <p class='fs-6'>" . $product['description'] . "</p>
                                                    <div class='d-grid gap-2'>
                                                        <button class='btn btn-secondary' id='cart" . $product['id'] . "' type='button'>Add to Cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";

                                $products[] = $product;
                            }
                            // overwrite the session variable
                            $_SESSION['products'] = $products;
                        }

                        readFromFile();
                        
                    ?>

                    <script type="text/javascript">
                        /* script to parse php value into js */
                        var prodCount = <?php echo count($_SESSION['products']); ?>;

                        /* script to prevent form resubmission */
                        if ( window.history.replaceState ) {
                            window.history.replaceState( null, null, window.location.href );
                        }
                    </script>
                    <!-- activate modal box js -->
                    <script src="js/customer_modal.js"></script>
                    <!-- activate cart adding script -->
                    <script src="js/customer_cart_icon.js"></script>
                </div>
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
