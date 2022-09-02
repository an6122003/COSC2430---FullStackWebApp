<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="group" content="31">
    <title>Customer Main</title>
    <link rel="stylesheet" href="css/design.css">
</head>
<body>
    <header>
        <?php 
            include 'header.php';
        ?>
    </header>

    <main>
        <div class="mainContent">
            <div class="row">
                <div class="column1">
                    <h1>Price Range</h1>
                    <form>
                        <label for="minPrice">From</label>
                        <input type="number" name="minPrice" id="minPrice" class="priceField" placeholder="Minimum Price">
                        <label for="maxPrice">To</label>
                        <input type="number" name="maxPrice" id="maxPrice" class="priceField" placeholder="Maximum Price">
                    </form>
                </div>
                <div class="column2">
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
                                $products[] = $product;
                            }
                        // overwrite the session variable
                        $_SESSION['products'] = $products;
                        }
                        readFromFile();
                        
                        function displayProducts(){
                            $counter = 1;
                            while ($counter <= count($_SESSION['products'])) {
                                $imageDir = $_SESSION['products'][$counter-1]['Image Dir'];
                                $prodName = $_SESSION['products'][$counter-1]['Name'];
                                $prodPrice = $_SESSION['products'][$counter-1]['Price'];
                                echo "<div class='productDisplay'>
                                    <div class='productImageDiv'>
                                    <img class='productImage' src=$imageDir>
                                    </div>
                                    <div class='productText'>
                                        <p>$prodName</p>
                                    </div>
                                    <div class='productText'>
                                        <p>$prodPrice</p>
                                    </div>
                                </div>";
                                $counter++;
                            }
                        }
                        displayProducts()
                    ?>
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