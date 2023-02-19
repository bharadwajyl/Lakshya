<?php
//Check session
session_start();
if (isset($_SESSION['LakshyaURS']) && !empty($_SESSION['LakshyaURS'])) {
    @include_once('./root/db.php');
    $result = $conn->query("SELECT a.product_id, a.quantity, b.product, b.price FROM Lakshya as a INNER JOIN LakshyaProducts as b ON a.product_id = b.id WHERE a.code = '".$_SESSION["LakshyaURS"]."'");
    $array = array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<!--TITLE-->
<title>Lakshya Shopping Platform || Cart</title>

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
<link rel="stylesheet" href="assets/css/cart.css" />

</head>
<body id="body">

<main class="padding_2x">
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price (<i class="fa fa-rupee"></i>)</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $product = "".$row["product"]."";
                    $quantity = "".$row["quantity"]."";
                    $price = "".$row["price"]."";
                    $product_id = "".$row["product_id"]."";
                    $total_price = $price * $quantity;
                    array_push($array, $total_price);
                    echo'<tr>
                                <td>'.$product.'</td>
                                <td>'.$quantity.'</td>
                                <td>'.$total_price.'</td>
                                <td><i class="fa fa-trash" onclick="Cart(&quot;deletefromcart&quot;, '.$product_id.')"></i></td>
                            </tr>';
                }
            } else {
                print($conn->error);
            }
            $final_price = array_sum($array);
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td  colspan="3">Total</td>
                <td><?php print($final_price); ?></td>
            </tr>
        </tfoot>
    </table>
</main>

<!--JAVASCRIPT-->
<script type="text/javascript" src="assets/js/main.js"></script>
<script type="text/javascript" src="assets/js/home.js"></script>
</body>
</html>
