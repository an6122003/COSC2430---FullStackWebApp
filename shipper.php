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
        function saveToFile($fname, $orders) {
            $file_name = $fname;
            $fp = fopen($file_name, 'w');
            $fields = ['hub', 'order_id', 'products_id', 'total_price', 'address'];
            fputcsv($fp, $fields);
            if (is_array($orders)) {
              foreach ($orders as $order) {
                // for the sizes, store them as a comma separated string
                $order['products_id'] = implode(',', $order['products_id']);
                fputcsv($fp, $order);
              }
            }
        }

        function readFromFile($fname) {
            $file_name = $fname;
            $fp = fopen($file_name, 'r');
            // first row => field names
            $first = fgetcsv($fp);
            $orders = [];
            while ($row = fgetcsv($fp)) {
            $i = 0;
            $order = [];
            foreach ($first as $col_name) {
                $order[$col_name] =  $row[$i];
                // treat sizes differently
                // make it an array
                if ($col_name == 'products_id') {
                $order[$col_name] = explode(',', $order[$col_name]);
                }
                $i++;
            }
            $orders[] = $order;
            }
           return $orders;
        }
    ?>

    <main>
        <?php 
            $orders = readFromFile('orders.csv');
            $products = readFromFile('products.csv');
            foreach ($orders as $order){
                if ($order['hub'] == $_SESSION['hub']){
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
                    echo "<form method='post' action='shipper.php'>
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
<?php 
    if (isset($_POST['act'])){
        $newOrders = [];
        $orders = readFromFile('orders.csv');
        foreach ($orders as $order){
            if ($order['order_id'] == $_POST['id']){
                continue;
            } else{
                $newOrders[] = $order;
            }
        }
        saveToFile('orders.csv', $newOrders);
        header ('location: shipper.php');
    }
?>

</html>