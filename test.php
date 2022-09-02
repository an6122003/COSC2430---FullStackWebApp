<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="group" content="31">
    <title>Customer Main</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <header>
        <?php 
            include 'header.php';
        ?>
    </header>

    <main>
        <form class="row" method="post">
            <input type="number" name="minPrice" id="minPrice" class="col-lg-6" placeholder="Minimum Price" value="10">
            <input type="number" name="maxPrice" id="maxPrice" class="col-lg-6" placeholder="Maximum Price">
        </form>

        <?php
            echo $_REQUEST("minPrice");
        ?>