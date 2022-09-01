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
                            $output = $products[1]['Name'];
                            echo $output;
                        // overwrite the session variable
                        //$_SESSION['products'] = $products;
                        }
                        readFromFile();
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