<?php
include '../connect.php';
include './db.php';
date_default_timezone_set('Africa/Kigali');
ob_start();
session_start();
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : "";
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    $username = $_SESSION['username'];
} else {
    header("location:../index.php");
}

class PaypalCheckout
{
    private $db;
    public function __construct()
    {
        $conn = new Db();
        $this->db = $conn->Db();
    }
    public function pay($userid, $tid, $amount, $state)
    {
        $date = new DateTime;
        // $tra_date=$date->format("Y/m/d")
        if ($this->check_txt_id($id) == 0) {
            $this->db->query("INSERT INTO `sponsorship` ( `amount`, `user_id`, `tid`) VALUES ( '$amount', '$user_id', '$tid');");
            return true;
        } else {

        }
    }
    public function check_txt_id($tid)
    {
        $qr = $this->db->query("SELECT count(id) as total from  sponsorship");
        if ($qr->num_rows == 1) {
            while ($total = $query->fetch_assoc()) {
                return $total['total'];
            }
        }
    }
    // public function update_sponsorship($id){

    // }
}
