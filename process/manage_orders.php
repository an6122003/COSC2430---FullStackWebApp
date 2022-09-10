<?php 
    require 'order_functions.php';

    if (isset($_POST['act'])){
        $newOrders = [];
        $orders = readFromFile('../orders.csv');
        foreach ($orders as $order){
            if ($order['order_id'] == $_POST['id']){
                $order['status'] = $_POST['act'];
            }
            $newOrders[] = $order;
        }
        saveToFile('../orders.csv', $newOrders);
        header ('location: ../shipper.php');
    }
?>