<?php 
    if (isset($_POST['productIds'])){
        addOrder();
        header('location: cart.php');
    }

    function addOrder(){
        $file = fopen("order.csv","a");
        fputcsv($file, array(count(file('order.csv')), $_POST['hubId'], $_POST['productIds'], $_POST['totalPrice'], $_POST['address'], $_POST['status']), ",");
        fclose($file);
    }
?>