<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="group" content="31">
    <title>Cart</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    
</head>
<body>
    <header>
        <?php 
            include 'header.php';
        ?>
    </header>

    <script>

    </script>
    <main>
        <div class="container">
            <div class="row background">
                <?php
                    $cartProductsId='<script type="text/javascript">document.write(localStorage.getItem("data"););</script>';
                    echo $cartProductsId;
                ?>
                <div class="col-lg-2">

                </div>
            </div>
        </div>
    </main>

    <footer>
        <?php 
            include 'footer.php';
        ?>
    </footer>
</body>
</html>
