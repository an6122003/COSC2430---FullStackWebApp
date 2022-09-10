<?php 
        function saveToFile($fname, $orders) {
            $file_name = $fname;
            $fp = fopen($file_name, 'w');
            $fields = ['orderID', 'hubID', 'productIds', 'totalPrice', 'address', 'status'];
            fputcsv($fp, $fields);
            if (is_array($orders)) {
              foreach ($orders as $order) {
                // for the sizes, store them as a comma separated string
                $order['productIds'] = implode(',', $order['productIds']);
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
                if ($col_name == 'productIds') {
                $order[$col_name] = explode(',', $order[$col_name]);
                }
                $i++;
            }
            $orders[] = $order;
            }
           return $orders;
        }
?>