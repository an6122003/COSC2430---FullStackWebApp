<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="group" content="31">
    <title>Shipper page</title>
    <link rel="stylesheet" href="css/design.css">
</head>


<body>
    <header>
        <?php 
            include 'header.php';
        ?>
    </header>

    <?php 
        require 'process/order_functions.php';
    ?>

    <main>
        <?php 
            $orders = readFromFile('orders.csv');
            $products = readFromFile('products.csv');
            foreach ($orders as $order){
                if ($order['hub'] == $_SESSION['hub'] && $order['status'] == 'active'){
                    foreach ($order['products_id'] as $proid){
                        foreach ($products as $product){
                            if ($product['id'] == $proid){
                                $proName = $product['name'];
                                $imageDir = $product['image_dir'];
                                echo "<img width='200' src ='" . $imageDir . "' alt='product'/> <br>";
                                echo $proName . '<br>';
                            }
                        }
                    }
                    echo 'total price:' . $order['total_price'] . '<br>';
                    echo 'address: ' . $order['address'] . '<br>';
                    echo "<form method='post' action='process/manage_orders.php'>
                            <input name='id' type='text' hidden value = '" . $order['order_id'] . "'/>
                            <input type='submit' name='act' value='delivered'/>
                            <input type='submit' name='act' value='canceled'/>
                        </form>";
                    echo '-------- <br>';
                }
              }
        ?>
    </main>
    <footer>
        <?php 
            include 'footer.php';
        ?>
    </footer>
</body>
</html>