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
    <title>Cart</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    
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
                    $file_name = '../data/products.csv';
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
                                    <img alt=image of " . $product['name'] . " src=" . $product['image_dir'] . ">
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

                    function getCusAddress(){
                        $address = '';
                        if (isset($_SESSION['username'])){
                            $lines = file('../data/accounts.db');
                            foreach($lines as $line){
                                $lineArray = explode('@@@', $line);
                                if($lineArray[1] == $_SESSION['username']){
                                    $address = $lineArray[5];
                                }
                            }
                        }
                        return $address;
                    }

                    $address = getCusAddress();
                ?>
                <div class="background">
                    <form enctype='multipart/form-data' method='post' action='../process/cart_add_order.php'>
                         
                        <input type='number' class='d-none' id='orderId' name='orderId' value='<?php echo count(file("../data/orders.csv"))?>'>
                        <input type='number' class='d-none' id='hubId' name='hubId'>
                        <input type='text' class='d-none' id='productIds' name='productIds'>
                        <input type='text' class='d-none' id='totalPrice' name='totalPrice'>
                        <input type='text' class='d-none' id='address' name='address' value='<?php echo $address?>'>
                        <input type='text' class='d-none' id='status' name='status'>

                        <span class="fs-2">Total Price: $</span>
                        <span class="fs-2" id="priceField">0</span>
                        <button class='btn btn-secondary float-end' id="orderSubmitButton" type='submit'>Submit order</button>
                    </form>
                    
                </div>             
            </div>
        </div>

        <script type="text/javascript">
            var prodCount = <?php echo count($_SESSION['products']); ?>;
        </script> 
        <script src="../js/customer_cart.js"></script>
        <script src="../js/customer_cart_icon.js"></script>
        <script src="../js/customer_order_submit.js"></script>
    </main>

    <footer>
        <?php 
            include 'footer.php';
        ?>
    </footer>
</body>
</html>
