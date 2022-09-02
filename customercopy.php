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
                        <input type="number" name="minPrice" id="minPrice" class="col-lg-6" placeholder="Minimum Price">
                        <input type="number" name="maxPrice" id="maxPrice" class="col-lg-6" placeholder="Maximum Price">
                        <input type="submit" value="Submit">
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
                            while ($counter <= count($_SESSION['products'])) {
                                // getting all the variables
                                $imageDir = $_SESSION['products'][$counter-1]['Image Dir'];
                                $prodName = $_SESSION['products'][$counter-1]['Name'];
                                $prodPrice = $_SESSION['products'][$counter-1]['Price'];

                                if(isset($_POST['submit'])){
                                    checkPrice();
                                } 
                                // price filter
                                if ($prodPrice>=$_SESSION['minPrice'] && $prodPrice<=$_SESSION['maxPrice']){
                                    echo "<div class='productDisplay text-bg-light col-lg-4'>
                                        <img src=$imageDir>
                                        <p>$prodName</p>
                                        <p>$prodPrice</p>
                                    </div>";
                                    $counter++;
                                }
                                else{
                                    $counter++;
                                }
                            }
                        }

                        function checkPrice(){
                            // check if min price is empty
                            if (is_null($_POST['maxPrice'])){
                                $maxPrice = 9999999;
                            }
                            else{
                                $maxPrice = $_POST['maxPrice'];
                            }
                            if (is_null($_POST['minPrice'])){
                                $minPrice = 0;
                            }
                            else{
                                $minPrice = $_POST['minPrice'];
                            }
                            $_SESSION['minPrice'] = $minPrice;
                            $_SESSION['maxPrice'] = $maxPrice;
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