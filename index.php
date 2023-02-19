<?php
//Global Variables
$cart_count = "0";

//Check session
session_start();
if (isset($_SESSION['LakshyaURS']) && !empty($_SESSION['LakshyaURS'])) {
    @include_once('./root/db.php');
    $result = $conn->query("SELECT * FROM Lakshya WHERE code = '".$_SESSION["LakshyaURS"]."'");
    $cart_count = $result->num_rows;
    if ($cart_count < 1) { $cart_count = 0; }
} else {
    @include_once('./root/functions.php');
    $_SESSION['LakshyaURS'] = Generate_AlphaNumeric(13);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<!--TITLE-->
<title>Lakshya Shopping Platform</title>

<!--SHORTCUT ICON-->
<link rel="shortcut icon" href="assets/images/logo.png">

<!--META TAGS-->
<meta charset="UTF-8">
<meta name="language" content="ES">
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<!--FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" /> 

<!--PLUGIN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!--STYLE SHEET-->
<link rel="stylesheet" href="assets/css/main.css" />
<link rel="stylesheet" href="assets/css/home.css" />

</head>
<body>

<!--NAV-->
<nav class="fixed_flex padding_2x">
    <a href="cart.php" class="cart"><sub><?php print($cart_count); ?></sub><i class="fa fa-shopping-cart"></i> Cart</a>
</nav>



<!--MAIN-->
<main>
    <!--cards-->
    <div class="flex padding_2x cards">
        <!--card begining-->
        <section class="card">
            <figure><img src="assets/images/card/01.png" alt="" loading="lazy" /></figure>
            <article class="padding_2x">
                <a href="#" class="title medium">One Plus 9 5g</a>
                <p>It is a long established fact that a reader will be distracted. </p>
                <button class="btn btn_1" onclick="Cart(&quot;addtocart&quot;, 1001)">Add to cart <strong><i class="fa fa-rupee"></i> 18999</strong></button>
            </article>
        </section>
        <!--card ends-->
        <!--card begining-->
        <section class="card">
            <figure><img src="assets/images/card/02.png" alt="" loading="lazy" /></figure>
            <article class="padding_2x">
                <a href="#" class="title medium">Oppo A53s 5g</a>
                <p>It is a long established fact that a reader will be distracted. </p>
                <button class="btn btn_1" onclick="Cart(&quot;addtocart&quot;, 1002)">Add to cart <strong><i class="fa fa-rupee"></i> 15500</strong></button>
            </article>
        </section>
        <!--card ends-->
        <!--card begining-->
        <section class="card">
            <figure><img src="assets/images/card/03.png" alt="" loading="lazy" /></figure>
            <article class="padding_2x">
                <a href="#" class="title medium">Vivo Y75 5g</a>
                <p>It is a long established fact that a reader will be distracted. </p>
                <button class="btn btn_1" onclick="Cart(&quot;addtocart&quot;, 1003)">Add to cart <strong><i class="fa fa-rupee"></i> 20000</strong></button>
            </article>
        </section>
        <!--card ends-->
        <!--card begining-->
        <section class="card">
            <figure><img src="assets/images/card/04.png" alt="" loading="lazy" /></figure>
            <article class="padding_2x">
                <a href="#" class="title medium">Galaxy A33 5g</a>
                <p>It is a long established fact that a reader will be distracted. </p>
                <button class="btn btn_1" onclick="Cart(&quot;addtocart&quot;, 1004)">Add to cart <strong><i class="fa fa-rupee"></i> 22000</strong></button>
            </article>
        </section>
        <!--card ends-->
    </div>
</main>

<!--JAVASCRIPT-->
<script type="text/javascript" src="assets/js/main.js"></script>
<script type="text/javascript" src="assets/js/home.js"></script>
</body>
</html>
