<?php 
    require 'order_functions.php';

    if (isset($_POST['act'])){
        $newOrders = [];
        $orders = readFromFile('../order.csv');
        foreach ($orders as $order){
            if ($order['orderID'] == $_POST['id']){
                $order['status'] = $_POST['act'];
            }
            $newOrders[] = $order;
        }
        saveToFile('../order.csv', $newOrders);
        header ('location: ../shipper.php');
    }
?>