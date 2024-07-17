
<header id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="../index.php" class="navbar-brand">
            <h3 class="px-5">
            <i class="fas fa-hamburger">Online Food Ordering</i>
            </h3>
        </a>
        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-3 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-light bg-dark\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-light bg-dark\">0</span>";
                        }
                        ?>
                    </h5>
                </a>
                
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbardrop"  data-toggle="dropdown"><i class='fas fa-power-off ' style='font-size:22px;color:dark'></i></a>
                <div class="dropdown-menu ">
                <a class="dropdown-item" href="../logout.php"><b>Logout</b></a>
                </div>
            </div>
        </div>
    </nav>
</header>






