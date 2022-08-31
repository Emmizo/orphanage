<?php
include '../connect.php';
include './PaypalCheckout.php';
$payment = new PaypalCheckout();
if (isset($_SESSION['user_id'])) {
    if ($_POST['tid'] != null) {
        if ($payment->pay($_SESSION['user_id'], $_POST['tid'], 10, $_POST['state']) == true) {
            echo "success";
        } else {
            // header("location:index.php");
            alert('Not worked');
        }
    }
}
