<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="group" content="31">
    <title>Customer Main</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/customer_modal.js"></script>
</head>
<body>
    <header>
        <?php 
            include 'header.php';
        ?>
    </header>

    <main>
        <div class="container pt-100 pb-100">
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
                <div class="col-lg-9 row">
                    <?php
                        $currentDir=__DIR__;

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

                                if (isset($_POST['minPrice']) && is_numeric($_POST['minPrice'])) {
                                    if ($product['price'] < $_POST['minPrice']) {
                                        continue;
                                    }
                                }
                                if (isset($_POST['maxPrice']) && is_numeric($_POST['maxPrice'])) {
                                    if ($product['price'] > $_POST['maxPrice']) {
                                        continue;
                                    }
                                }


                                if (isset($_POST['nameFilter']) && !empty($_POST['nameFilter'])) {
                                    if (strpos($product['name'], $_POST['nameFilter']) === false) {
                                        continue;
                                    }
                                }

                                // product display
                                echo "<div class='productDisplay text-bg-light col-lg-4 col-md-6' id='" . $product['id'] . "'>
                                    <img src=" . $product['image_dir'] . ">
                                    <p class='fs-2'>" . $product['name'] . "</p>
                                    <p class='fs-4'>$" . $product['price'] . "</p>
                                </div>";

                                // create modal box
                                echo "<div id='" . $product['id'] . "' class='modal'>
                                    <div class='modal-dialog'>
                                        <div class='container pt-100 pb-100'>
                                            <div class='row background'>
                                            <span class='.btn-close'>&times;</span>
                                                <div class='col-lg-8'>
                                                    
                                                    <img src=" . $product['image_dir'] . ">
                                                </div>
                                                <div class='col-lg-4'>
                                                    <p class='fs-2'>" . $product['name'] . "</p>
                                                    <p class='fs-4'>$" . $product['price'] . "</p>
                                                    <p class='fs-6'>" . $product['description'] . "</p>
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
                        console.log(count($_SESSION['products']));
                        /* for (let i = 0; i < count($_SESSION['products']); i++) {
                            text += cars[i] + "<br>";
                        }
                        var data = <?php echo json_encode("42", JSON_HEX_TAG); ?>; *>
                    </script>
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
