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
            include 'header.php';
        ?>
    </header>

    <main>
        <div class="container pt-100 pb-100">
            <div class="row background">
                <div class="col-lg-3 ">
                    <h2>Price Range</h2>
                    <form class="row" method="post" action="customercopy.php">
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
                                $products[] = $product;
                            }
                        // overwrite the session variable
                        $_SESSION['products'] = $products;
                        }
                        readFromFile();
                        
                        function displayProducts(){
                            $counter = 1;
                            // loop to display products as individual divs
                            while ($counter <= count($_SESSION['products'])) {
                                // getting all the variables
                                $imageDir = $_SESSION['products'][$counter-1]['Image Dir'];
                                $prodName = $_SESSION['products'][$counter-1]['Name'];
                                $prodPrice = $_SESSION['products'][$counter-1]['Price'];

                                checkPrice();
                                checkName();
                                // compare filter price to item prices
                                if ($prodPrice>=$_SESSION['minPrice'] && $prodPrice<=$_SESSION['maxPrice']){
                                    if (str_contains($prodName, $_SESSION['nameFiltered']) && !empty($_SESSION['nameFiltered'])){
                                        // display the products
                                        echo "<div class='productDisplay text-bg-light col-lg-4 col-md-6 '>
                                            <img src=$imageDir>
                                            <p>$prodName</p>
                                            <p>$prodPrice</p>
                                        </div>";
                                        $counter++;
                                    }

                                    elseif (empty($_SESSION['nameFiltered'])){
                                        echo "<div class='productDisplay text-bg-light col-lg-4 col-md-6 '>
                                            <img src=$imageDir>
                                            <p>$prodName</p>
                                            <p>$prodPrice</p>
                                            bbb
                                        </div>";
                                        $counter++;
                                    }

                                    else{
                                        $counter++;
                                    }
                                
                                }
                                else {
                                    $counter++;
                                }
                            }
                        }

                        function checkPrice(){
                            // check if price is empty
                            if (empty($_POST['maxPrice'])){
                                $maxPrice = 99999;
                            }
                            else{
                                $maxPrice = $_POST['maxPrice'];
                            }
                            if (empty($_POST['minPrice'])){
                                $minPrice = 0;
                            }
                            else{
                                $minPrice = $_POST['minPrice'];
                            }
                            $_SESSION['minPrice'] = $minPrice;
                            $_SESSION['maxPrice'] = $maxPrice;
                        }

                        function checkName(){
                            if (empty($_POST['nameFilter'])){
                                $nameFiltered = '';
                            }
                            else{
                                $nameFiltered = $_POST['nameFilter'];
                            }
                            $_SESSION['nameFiltered'] = $nameFiltered;
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
