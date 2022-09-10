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
    <title>Shipper page</title>
    <link rel="stylesheet" href="../css/design.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>
    <header>
        <?php 
            include 'header.php';
        ?>
    </header>

    <?php 
        require '../process/order_functions.php';
    ?>

    <main>
        <?php 
            $orders = readFromFile('../data/orders.csv');
            $products = readFromFile('../data/products.csv');
            
            foreach ($orders as $order){
                if ($order['hubID'] == $_SESSION['hubID'] && $order['status'] == 'active'){
                    echo '<div style="margin: auto; width: 50%;  font-size: 30px;">'.'Order number: '. $order["orderID"].'</div>';
                    foreach ($order['productIds'] as $proid){
                        foreach ($products as $product){
                            if ($product['id'] == $proid){
                                $proName = $product['name'];
                                $imageDir = '../' . $product['image_dir'];
                                echo '<div class="card d-flex" style="width: 18rem;">';
                                echo "<img class='card-img-top' src ='" . $imageDir . "' alt='product'/> <br>";
                                echo '<div class="h4">'. $proName . '</div><br>';
                                echo '</div>';
                            }
                        }
                    }
                    echo 'total price:' . $order['totalPrice'] . '<br>';
                    echo 'address: ' . $order['address'] . '<br>';
                    echo "<form method='post' action='../process/manage_orders.php'>
                            <input name='id' type='text' hidden value = '" . $order['orderID'] . "'/>
                            <input type='submit' name='act' value='delivered' class='btn btn-primary'/>
                            <input type='submit' name='act' value='canceled' class='btn btn-primary'/>
                        </form>";
                    echo '<hr>';
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