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
                <?php
                    $file_name = 'products.csv';
                    $fp = fopen($file_name, 'r');
                    // first row => field names
                    $first = fgetcsv($fp);
                    $products = [];
                    while ($row = fgetcsv($fp)) {
                        $i = 0;
                        $product = [];
                        foreach ($first as $col_name) {
                            $product[$col_name] = $row[$i];
                            $i++;
                        }
                        echo "
                            <div id=box" . $product['id'] . " class='align-items-center background cartBoxes'>
                                <div class='col-lg-4'>
                                    <img src=" . $product['image_dir'] . ">
                                </div>
                                <div class='col-lg-4'>
                                    <p class='fs-2'>" . $product['name'] . "</p>
                                </div>
                                <div class='col-lg-3'>
                                    <p id=price" . $product['id'] . " class='fs-3'>$" . $product['price'] . "</p>
                                </div>
                                <div>
                                    <p class='btn' id=del" . $product['id'] . ">Delete<p>
                                </div>
                            </div>
                            ";
                        $products[] = $product;
                    }
                    $_SESSION['products'] = $products;  
                ?>
                <div>
                    <span class="fs-2">Total Price: $</span>
                    <span class="fs-2" id="priceField">0</span>
                    
                </div>             
            </div>
        </div>

        <script type="text/javascript">
            var cartProductsID = JSON.parse(localStorage.getItem("data"));
            var prodCount = <?php echo count($_SESSION['products']); ?>;
            var box = [];
            var del = [];
            var price = [];
            var priceField = document.getElementById("priceField");
            var cartNumberItems = Number(localStorage.getItem("cartNumberItems")) || 0;

            var totalPrice = 0;

            for (let i = 1; i < prodCount + 1; i++) {
                // get modal div and product div of all the products
                box[i] = document.getElementById("box" + i);
                del[i] = document.getElementById("del" + i);
                price[i] = Number(document.getElementById("price" + i).innerHTML.replace("$", ""));
                
                

                for (let j = 0; j < cartProductsID.length; j++){
                    if (i == cartProductsID[j]){
                        // create item
                        box[cartProductsID[j]].style.display = "flex";
                        totalPrice += price[cartProductsID[j]];
                        // delete item
                        del[i].addEventListener('click', delBox);
                        function delBox(){
                            // hide box
                            box[i].style.display = "none";
                            
                            // update total price
                            totalPrice -= price[cartProductsID[j]];
                            updatePriceField()

                            // update cart number
                            cartNumberItems -= 1;
                            localStorage.setItem("cartNumberItems", cartNumberItems);
                            update();

                            // remove item from cart in local storage
                            cartProductsID.splice(j, 1);
                            localStorage.setItem("data", JSON.stringify(cartProductsID));
                        }
                    }
                }
                
            }

            function updatePriceField(){
                priceField.innerHTML = totalPrice;
            }

            function update(){
                var cartBox = document.getElementById("cartCounter");
                if (localStorage.getItem("data") == null){
                    cartBox.innerHTML = 0;
                }
                else{
                    cartBox.innerHTML = localStorage.getItem("cartNumberItems");
                }
                
            }

            updatePriceField()
            update();
        </script> 
    </main>

    <footer>
        <?php 
            include 'footer.php';
        ?>
    </footer>
</body>
</html>
