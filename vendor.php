<?php 
    session_start();
?>

 <?php 
$file = fopen("products.csv","r");
$data = fgetcsv($file, 1000,",");
$all_data = [];
while( ($data = fgetcsv($file, 1000,",")) !==FALSE )
    if ($data[1]==$_SESSION['username'])
{$all_data[] = $data;}
fclose($file);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="group" content="31">
    <title>Vendor: View my products</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <header>
        <?php 
            include 'header.php';
        ?>
    </header>
    <main>
        <section class='form'>
            <div class='container'>
                <div class='row background my-4'>
                    <div class='col-lg-10'>
                        <h2>My Products</h2>
                        <p style='text-align:right'>Total: <?php echo count($all_data)?></p>
                        <table class='table'>
                            <theader>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th></th>
                            </theader>
                            <?php
                            foreach ($all_data as $rec){ ?>
                            <tbody>
                                <td class="id"><?=$rec[0] ?></td>
                                <td class="name"><?=$rec[2] ?></td>
                                <td class="price"><?=$rec[3] ?></td>
                                <td>
                                    <div><img class="img" src="<?=$rec[4] ?>" alt="#" style="display:none"></div>
                                    <div class="description" style="display:none"><?=$rec[5] ?></div>
                                    <button class='btnDetail'>see details</button>
                                </td>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="col-lg-2">
                        <button class='addPbutton'><a class='btnA' href="vendor_add.php"><h1>+</h1><h4>New product</h4></a></button>
                    </div>

                    <div class="popup" id="pop">
                    </div>       
                        
                </div>
            </div>
        </section>

        <script src="js/vendor_popup.js"></script>

    </main>       

    <footer>
        <?php 
            include 'footer.php';
        ?>
    </footer>
</body>
</html>
