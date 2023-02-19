<?php
session_start();
switch($_POST["FormType"]){
    case "addtocart": case "deletefromcart":
        Lakshya::Cart(''.$_POST['Product_id'].'', ''.$_SESSION['LakshyaURS'].'');
        break;
    default:
        die("Not allowed");
        break;
}

class Lakshya{
    public static function Cart($id, $code){
        try {
            if (! @include_once("db.php")){
                throw new Exception ('Database connection error');
            } else {
                @include_once('db.php');
                @include_once('cart.php');
            }
        } catch (Exception $e){
            print($e->getMessage());
        }
    }
}
?>
