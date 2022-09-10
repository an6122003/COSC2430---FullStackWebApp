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
        function readFromFile() {
            $file_name = 'orders.csv';
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
                if ($col_name == 'sizes') {
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
            $orders = readFromFile();
            foreach ($orders  as $order){
                if ($order['hub'] == $_SESSION['hub']){
                    echo "<p>" . $order['ord id'] . "/" . $order['products id'] . "/ " . $order['total price'] ."/ " . $order['address'] . "</p>";
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