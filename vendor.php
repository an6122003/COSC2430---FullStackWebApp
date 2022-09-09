<header>
    <?php 
        include 'header.php';
    ?>
</header>

 <?php 
$file = fopen("products.csv","r");
$data = fgetcsv($file, 1000,",");
$all_data = [];
while( ($data = fgetcsv($file, 1000,",")) !==FALSE )



    if ($data[1]=='Apple'//$_SESSION['username']
    )



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
    <title>Vendor main: View my products</title>
    <link rel="stylesheet" href="css/bootstrap.css">    
</head>
<body>

    <main>
        <section class='form'>
        <div class='container'>



                <h1> Vendor: Apple <?php //$_SESSION['username']?> </h1>



            <div class='row background'>
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
                            <td><?=$rec[0] ?></td>
                            <td><?=$rec[2] ?></td>
                            <td><?=$rec[3] ?></td>
                            <td><a class='Psee' href=#>see details</a></td>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
                <div class="col-lg-2">
                    <button class='addPbutton'><a class='btnA' href="vendor_add.php"><h1>+</h1><h4>New product</h4></a></button>
                </div>
            </div>
        </div>
        </section>
    </main>

    <footer>
        <?php 
            include 'footer.php';
        ?>
    </footer>
</body>
</html>
