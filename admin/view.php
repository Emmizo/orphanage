 <?php
include '../connect.php';
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
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Orphanage</title>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    </head>

    <body>
        <!-- navigation -->
        <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand " href="#">Welcome <?php echo $username; ?></a>
                <a class="navbar-brand offset-4" href="#">CENTRE RAMIRO</a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="./index.php"><span
                                    class="fa fa-home fa-lg"></span>Home</a></li>
                        <li class="nav-item "><a class="nav-link" href="./aboutus.php"><span
                                    class="fa fa-info fa-lg"></span>About</a></li>
                                    <li class="nav-item "><a class="nav-link" href="./change_password.php"><span
                                    class="fa fa-info fa-lg"></span>Change  Password</a></li>

                    </ul>
                    <button type="button" data-html="true" class="btn  nav-link btn-warning text-white"><span class="navbar-textn ">
                        <a href="../logout.php" style="text-decoration: none; color:white;">
                            <span class="fa fa-sign-out text-white"></span>Sign out</a>
                    </span></button>
                </div>
            </div>
        </nav>
        <header class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="cl-12 col-sm-6">
                        <h1>Online HIV Orphanage Sponsoring System </h1>
                        <i>
                        <p>We make a living by what we get but we make a life by what we give</p>
                        <p>Heal the world, Make it a better place for you and for me and the entire human race</p>
                    </i>
                    </div>

                    <!-- <div class="col-12 col-sm">
                        <img src="../img/logo.jpg" class="img-fluid" width="80" height="100">
                    </div> -->

                </div>
            </div>
        </header>

 <?php
if (isset($_GET['id'])) {
    $orphan_id = $_GET['id'];
    $spon = mysqli_query($conn, "SELECT sponsor.sponsor_name,orphan.f_name,orphan.l_name FROM sponsor
    join user on sponsor.user_id=user.id
    join support_for_one on support_for_one.sponsor_id=user.id
    join orphan on support_for_one.orphan_id=orphan.id
    where support_for_one.orphan_id=$orphan_id") or die(mysqli_error($conn));
    while ($a = mysqli_fetch_assoc($spon)) {
        $sponsor = $a['sponsor_name'];
        $fname = $a['f_name'];
        $lname = $a['l_name'];
    }
    ?>
 <div class="body text-center">
      <div class="alert alert-secondary col-md-6 text-center" role="alert">sponsor:<?=$sponsor?>(<?=$fname . ' ' . $lname?>)</div>
<?php
$qr = mysqli_query($conn, "SELECT * FROM `support_for_one` WHERE comment_orphan IS NOT NULL AND support_for_one.orphan_id=$orphan_id ORDER BY `created_at` DESC") or die(mysqli_error($conn));
    
    if (mysqli_num_rows($qr) <= 0) {
        echo "<center><p style='color:red;'><b>No message</b></p> </center>";
    } else {
        $i=0;
        while ($row = mysqli_fetch_assoc($qr)) {
            $i++;
            $sms = $row['comment_orphan'];

            ?>

       <div class="row"><div class="alert alert-success col-md-1 text-center"><?php if($i==1){
        echo "Latest(1)";
       }else{
        echo $i;
       }?></div><div class="alert alert-success col-md-6 text-center" role="alert"><?=$sms?></div></div>
      </div>

<?php
}
    }}
?>