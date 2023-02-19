<?php
switch($_POST["FormType"]){
    case "addtocart":
        if ($conn->query("SELECT code, product_id FROM Lakshya WHERE product_id = $id AND code = '$code'") ->num_rows > 0) {
            print("Product has been already added to the cart");
        } else {
            $conn->query("INSERT INTO Lakshya (code, product_id, quantity) VALUES ('$code', '$id', '1')") === TRUE ?
            print("added_to_cart:") : print($conn->error);
        }
        $conn->close();
        break;
    case "deletefromcart":
        $conn->query("DELETE FROM Lakshya WHERE product_id = '$id' AND code = '$code'") === TRUE ?
        print("deleted_from_cart:") : print($conn->error);
        break;
    default:
        die("Not allowed");
        break;
}

?>
