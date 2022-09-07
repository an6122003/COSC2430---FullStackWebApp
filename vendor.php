 <?php 
$file = fopen("products.csv","r");
$data = fgetcsv($file, 1000,",");
$all_data = [];
while( ($data = fgetcsv($file, 1000,",")) !==FALSE )



    if ($data[1]=='Apple' //$_POST['username']
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
    <header>
        <?php 
            include 'header.php';
        ?>
    </header>

    <main>
        <section class='form'>
        <div class='container'>



                <h1> Vendor: Apple <?php //echo $_POST['username']?> </h1>



            <div class='row background'>
                <div class='col-lg-8'>
                    <h2>My Products</h2>
                    <p style='text-align:right'>Total: 2 <?php //echo count($all_data)?></p>
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
                            <td><a href=#>see more</a></td>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
                <div class="col-lg-3">
                    <button><a href="vendor_add.php"><h3>+ Add new product</h3></a></button>
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