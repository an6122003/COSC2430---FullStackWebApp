<?php 
    if (isset($_POST['productIds'])){
        addOrder();
        header('location: ../www/cart.php');
    }

    function addOrder(){
        $file = fopen("../data/orders.csv","a");
        fputcsv($file, array(count(file('../data/orders.csv')), $_POST['hubId'], $_POST['productIds'], $_POST['totalPrice'], $_POST['address'], $_POST['status']), ",");
        fclose($file);
    }
?>