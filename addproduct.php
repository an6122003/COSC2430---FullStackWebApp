<?php 
    function addProduct(){
        $file = fopen("products.csv","a");
        fputcsv($file, array(count(file('products.csv')), $_POST['username'], $_POST['name'], $_POST['price'], 'images/products/'.count(file('products.csv')).'.png', $_POST['description']), ",");
        fclose($file);
    }

    function saveImage(){
        $file = $_FILES['image']['tmp_name'];
        move_uploaded_file($file, 'images/products/'.count(file('products.csv')).'.png');
    }    
    if (isset($_POST['addP'])){
        saveImage();
        addProduct();
        header('location: ../vendor.php');
    }
?>