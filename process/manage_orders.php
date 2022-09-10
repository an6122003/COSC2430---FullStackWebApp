<?php 
    require 'order_functions.php';

    if (isset($_POST['act'])){
        $newOrders = [];
        $orders = readFromFile('../data/orders.csv');
        foreach ($orders as $order){
            if ($order['orderID'] == $_POST['id']){
                $order['status'] = $_POST['act'];
            }
            $newOrders[] = $order;
        }
        saveToFile('../data/orders.csv', $newOrders);
        header ('location: ../www/shipper.php');
    }
?>