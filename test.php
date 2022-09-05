<?php
    $file_name = 'product.csv';
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
            if ($col_name == 'description') {
                $product[$col_name] = explode(',', $product[$col_name]);
            }
            $i++;
        }
        $products[] = $product;
    }
    print_r($products[2]['id']);
?>
