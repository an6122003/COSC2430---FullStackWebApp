<?php 
    session_start();
    function addProduct(){
        $file = fopen("../data/products.csv","a");
        fputcsv($file, array(count(file('../data/products.csv')), $_SESSION['username'], $_POST['name'], $_POST['price'], '../images/products/'.count(file('../data/products.csv')).'.png', $_POST['description']), ",");
        fclose($file);
    }

    function saveImage(){
        $file = $_FILES['image']['tmp_name'];
        move_uploaded_file($file, '../images/products/'.count(file('../data/products.csv')).'.png');
    }    
    if (isset($_POST['addP'])){
        saveImage();
        addProduct();
        header('location: ../www/vendor.php');
    }
?>