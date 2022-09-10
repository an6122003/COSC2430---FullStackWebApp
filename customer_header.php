<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/index.php">E-Commerce Website</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"><span class="navbar-toggler-icon"></span></button> <!--tag for responsive navbar bootstrap-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto"> <!--auto margin-->
                    <li class="nav-item"><a class="nav-link"href="index.php">Home</a></li>
                    <?php 
                    if(isset($_SESSION['loggedin'])){
                        if (isset($_SESSION['role']) && $_SESSION['role'] == 'customer'){
                            echo "<li class='nav-item'><a class='nav-link' href='customer.php'>Platform</a></li>";
                        }
                        if (isset($_SESSION['role']) && $_SESSION['role'] == 'vendor'){
                            echo "<li class='nav-item'><a class='nav-link' href='vendor.php'>View products</a></li>";
                        }
                        if (isset($_SESSION['role']) && $_SESSION['role'] == 'shipper'){
                            echo "<li class='nav-item'><a class='nav-link' href='shipper.php'>View orders</a></li>";
                        }
                        echo '<li class="nav-item"><a class="nav-link" href="my_account.php">My Account</a></li>';
                        echo"<li class='nav-item'> 
                                <form method='post' action='process/logout_process.php'>
                                    <button class='nav-link btn btn-link' type='submit' name='logout' value='Logout'>Log out</button>
                                </form>
                            </li>";
                    } else{
                        echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                    }
                ?>
                </ul>
                

                <a href="cart.php">
                    <button type="button" id="cartBtn" class="btn btn-outline-dark" action="cart.php">
                        <span>Cart</span>
                        <span id="cartCounter" class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </a>
                    

                <!-- activate cart adding script -->
                <script src="js/customer_cart_icon.js"></script>
            </div>
        </div>
    </nav>
