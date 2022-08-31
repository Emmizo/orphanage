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
        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
         <script
    src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.9.1.min.js"
    type="text/javascript"
  ></script>
    </head>

    <body>
        <!-- navigation -->
        <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand " href="./index.php">Welcome <?php echo $username; ?></a>
                <a class="navbar-brand offset-3" href="./index.php">CENTRE RAMIRO</a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="./index.php"><span
                                    class="fa fa-home fa-lg"></span>Home</a></li>
                        <li class="nav-item "><a class="nav-link" href="./aboutus.php"><span
                                    class="fa fa-info fa-lg"></span>About</a></li>
                         <li class="nav-item "><a class="nav-link" href="./change_password.php"><span
                                    class="fa fa-info fa-lg"></span>Change password</a></li>
                    </ul>
                    <button type="button" data-html="true" class="btn nav-link btn-warning text-white">
                        <span class="navbar-text btn-warning">
                            <a href="../logout.php">
                                <span class="fa fa-sign-out text-white"></span>Sign out</a>
                        </span>
                    </button>
                    </span>
                </div>
            </div>
        </nav>
        <header class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="cl-12 col-sm-6">
                        <h1>Online HIV orphanage Sponsoring System</h1>
                        <i>
                        <p>We make a living by what we get but we make a life by what we give</p>
                        <p>Heal the world, Make it a better place for you and for me and the entire human race</p>
                    </i>
                    </div>

                    <div class="col-12 col-sm">
                        <!-- <img src="../img/logo.jpg" class="img-fluid" width="80" height="100"> -->
                    </div>
                    <div class="col-12 col-sm">

                        <button type="button" data-html="true" class="btn btn-block nav-link btn-warning text-white"
                            data-toggle="modal" data-target="#addSupport">
                            Add your support
                        </button>


                    </div>
                </div>
            </div>
        </header>

    <!--body start from here-->
<div class="container">
    <div  class="row row-content">
        <div class="col-12" >
            <h2>CENTRE RAMIRO Orphanage</h2>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                   <a class="nav-link active" href="#mine"  role="tab" data-toggle="tab">My Orphan</a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="#adopt" role="tab" data-toggle="tab">My Adoption</a>
           </li>
                <li class="nav-item">
                    <a class="nav-link " href="#support" role="tab" data-toggle="tab">Check orphans who need your support</a>
               </li>
               <li class="nav-item">
                <a class="nav-link " href="#supportone" role="tab" data-toggle="tab">My support to one</a>
           </li>
           <li class="nav-item">
                <a class="nav-link " href="#alberto" role="tab" data-toggle="tab">Support in General</a>
            </li>
             <li class="nav-item">
                <a class="nav-link " href="#otherSupport" role="tab" data-toggle="tab">Other Support</a>
            </li>
               </ul>
               <div class="tab-content">
                   <div role="tabpanel" class="tab-pane fade show active" id="mine">
                        <div role="tabpanel" class="tab-pane fade show active " id="allowed">
                <?php
// $imagesDirectory = "picture/";
$qr = mysqli_query($conn, "SELECT DISTINCT orphan.f_name,orphan.l_name,orphan.photo,orphan.birth_year,orphan.father_full_name,orphan.father_id,orphan.phone,
                    orphan.mother_full_name,orphan.mother_id,orphan.guardian_name,orphan.address,orphan.id FROM orphan
                    INNER JOIN sponsor_orphan ON sponsor_orphan.orphan_id=orphan.id
                    INNER JOIN user ON  sponsor_orphan.sponsor_id =user.id
                    WHERE orphan.status=3  AND sponsor_orphan.sponsor_id ='$user_id' AND orphan.id ORDER BY orphan.id DESC") or die(mysqli_error($conn));
if (mysqli_num_rows($qr) <= 0) {
    echo "<center><p style='color:red;'><b>There is no new one</b></p> </center>";
} else {
    ?>
    <ul id="ul" class="row">
    <?php
while ($row = mysqli_fetch_assoc($qr)) {
        $fname = $row['f_name'];
        $lname = $row['l_name'];
        $year = $row['birth_year'];
        $photo = $row['photo'];
        $photo_src = "../picture/" . $photo;
        $father_name = $row['father_full_name'];
        $father_id = $row['father_id'];
        $mother_name = $row['mother_full_name'];
        $mother_id = $row['mother_id'];
        $phone = $row['phone'];
        $guardian = $row['guardian_name'];
        $address = $row['address'];
        $id = $row['id'];
        ?>
                <li id="li">
                <form action="" method="POST" enctype="multipart/form-data">

                <div class="row " >

                <div class="card "  style="box-shadow: 11px 8px 52px rgba(18, 18, 18, 0.35);">
                    <div class="form-row">
                        <div style="float: left;">
                            <h4 class="card-title"><?=$fname . ' ' . $lname?></h4>
                            <p class="card-text">Old years: <?=date('Y') - $year?></p>
                            <p class="card-text">Contact: <?=$phone?></p>
                            <p class="card-text">Address: <?=$address?></p>
                        </div>
                        <div style="float:right; margin-left:auto">
                            <img class="card-img-top" src='<?php echo $photo_src; ?>' alt="Card image" style="width: 100px; height:100px ">
                        </div>
                    </div>
                    <div class="card-body" style="margin:auto">
                        <p class="card-text"><b>Guardian: </b><?=$guardian?></p>
                        <p class="card-text"><b>Father name: </b> <?=$father_name?></p>
                        <p class="card-text"><b>Father ID: </b><?=$father_id;?></p>
                        <p class="card-text"><b>Mother name:  </b><?=$mother_name?></p>
                        <p class="card-text"><b>Mother ID: </b><?=$mother_id?></p>
                       <!-- <p class="card-text"><b>Approved By: </b><?=$username?></p> -->
                    </div>
                     <div>
                         <a href="#" class=" btn btn-block nav-link btn-warning text-white openID" data-id="<?=$id?>" data-toggle="modal" data-target="#loginModal">Give Support</a>
                            </div>
                </div>
                    </div>
                    </form>
                   </li>
                <?php
}
}
?>
                 </ul>
            </div>
        <!--
    support
-->
<?php
if (isset($_POST['send'])) {
    $orphan_id = $_POST['orphan_id'];
    $amount = $_POST['amount'];
    $qr = mysqli_query($conn, "INSERT INTO support_for_one (`sponsor_id`,`orphan_id`,`amount`) VALUES('$user_id','$orphan_id','$amount')") or die(mysqli_error($conn));

    echo ('<div class="alert alert-success" style="color:black;">Thank you for your support<div>');
    header('location:./index.php');
}
?>
<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header navbar-dark">
                <h4 class="modal-title"><?=$fname . ' ' . $lname?> </h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-row">
                     <input type="hidden" name="sponsor_id"  value=""/>
                      <input type="hidden" name="orphan_id" id="orphan_id"   />
                        <div class="form-group col-sm-4">
                            <label class="sr-only" for="exampleInputEmail3">amount</label>
                            <input type="number" name="amount" class="form-control form-control-sm mr-1" id="exampleInputEmail3"
                                required placeholder="Enter amount">
                        </div>
                    </div>
                    <div class="form-row">
                        <button type="button" class="btn btn-secondary btn-sm ml-auto"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" name="send" class="btn btn-primary btn-sm ml-1">send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--end here-->


               </div>
            <div  role="tabpanel" class="tab-pane fade" id="support">
                <div role="tabpanel" class="tab-pane fade show active " id="allowed">
                <?php
// $imagesDirectory = "picture/";
$qr = mysqli_query($conn, "SELECT orphan.f_name,orphan.l_name,orphan.photo,orphan.birth_year,orphan.father_full_name,orphan.father_id,orphan.phone,
                    orphan.mother_full_name,orphan.mother_id,orphan.guardian_name,orphan.address,orphan.id,user.username FROM orphan
                    INNER JOIN user ON orphan.user_id=user.id WHERE orphan.status=1 AND orphan.id ORDER BY orphan.id DESC") or die(mysqli_error($conn));
if (mysqli_num_rows($qr) <= 0) {
    echo "<center><p style='color:red;'><b>There is no new one</b></p> </center>";
} else {
    ?>
    <ul id="ul" class="row">
    <?php
while ($row = mysqli_fetch_assoc($qr)) {
        $fname = $row['f_name'];
        $lname = $row['l_name'];
        $year = $row['birth_year'];
        $photo = $row['photo'];
        $photo_src = "../picture/" . $photo;
        $father_name = $row['father_full_name'];
        $father_id = $row['father_id'];
        $mother_name = $row['mother_full_name'];
        $mother_id = $row['mother_id'];
        $phone = $row['phone'];
        $guardian = $row['guardian_name'];
        $address = $row['address'];
        $id = $row['id'];
        $username = $row['username'];
        ?>
                <li id="li">
                <form action="" method="POST" enctype="multipart/form-data">

                <div class="row " >

                <div class="card "  style="box-shadow: 11px 8px 52px rgba(18, 18, 18, 0.35);">
                    <div class="form-row">
                        <div style="float: left;">
                            <h4 class="card-title"><?=$fname . ' ' . $lname?></h4>
                            <p class="card-text">Old years: <?=date('Y') - $year?></p>
                            <p class="card-text">Phone: <?=$phone?></p>
                            <p class="card-text">Address: <?=$address?></p>
                        </div>
                        <div style="float:right; margin-left:auto">
                            <img class="card-img-top" src='<?php echo $photo_src; ?>' alt="Card image" style="width: 100px; height:100px ">
                        </div>
                    </div>
                    <div class="card-body" style="margin:auto">
                        <p class="card-text"><b>Guardian: </b><?=$guardian?></p>
                        <p class="card-text"><b>Father name: </b> <?=$father_name?></p>
                        <p class="card-text"><b>Father ID: </b><?=$father_id;?></p>
                        <p class="card-text"><b>Mother name:  </b><?=$mother_name?></p>
                        <p class="card-text"><b>Mother ID: </b><?=$mother_id?></p>

                    </div>
                    <div class="row">
                     <div class="col-md-6">
                     <button class="btn btn-default" <?php echo "onClick=\"return confirm('Thank for choosing this one, God bless you!')\""; ?> >
                                <a href="choose.php?orphan_id=<?=$id;?>" class="btn btn-warning">Sponsorship</a></button>
                            </div>
                            <div class="col-md-6">
                     <button class="btn btn-default" <?php echo "onClick=\"return confirm('Thank for choosing this one, God bless you!')\""; ?> >
                                <a href="adopte.php?orphan_id=<?=$id;?>" class="btn btn-warning">Adopt</a></button>
                            </div>
                            </div>

                </div>
                    </div>
                    </form>
                   </li>
                <?php
}
}
?>
                 </ul>
            </div>

        </div>
         <div role="tabpanel" class="tab-pane fade" id="adopt">
            <?php
// $imagesDirectory = "picture/";
$qr = mysqli_query($conn, "SELECT DISTINCT orphan.f_name,orphan.l_name,orphan.photo,orphan.birth_year,orphan.father_full_name,orphan.father_id,orphan.phone,
                    orphan.mother_full_name,orphan.mother_id,orphan.guardian_name,orphan.address,orphan.id FROM orphan
                    INNER JOIN sponsor_orphan ON sponsor_orphan.orphan_id=orphan.id
                    INNER JOIN user ON  sponsor_orphan.sponsor_id =user.id
                    WHERE orphan.status=4 AND sponsor_orphan.sponsor_id ='$user_id' AND orphan.id ORDER BY orphan.id DESC") or die(mysqli_error($conn));
if (mysqli_num_rows($qr) <= 0) {
    echo "<center><p style='color:red;'><b>There is no new one</b></p> </center>";
} else {
    ?>
    <ul id="ul" class="row">
    <?php
while ($row = mysqli_fetch_assoc($qr)) {
        $fname = $row['f_name'];
        $lname = $row['l_name'];
        $year = $row['birth_year'];
        $photo = $row['photo'];
        $photo_src = "../picture/" . $photo;
        $father_name = $row['father_full_name'];
        $father_id = $row['father_id'];
        $mother_name = $row['mother_full_name'];
        $mother_id = $row['mother_id'];
        $phone = $row['phone'];
        $guardian = $row['guardian_name'];
        $address = $row['address'];
        $id = $row['id'];
        ?>
                <li id="li">
                <form action="" method="POST" enctype="multipart/form-data">

                <div class="row " >

                <div class="card "  style="box-shadow: 11px 8px 52px rgba(18, 18, 18, 0.35);">
                    <div class="form-row">
                        <div style="float: left;">
                            <h4 class="card-title"><?=$fname . ' ' . $lname?></h4>
                            <p class="card-text">Old years: <?=date('Y') - $year?></p>
                            <p class="card-text">Contact: <?=$phone?></p>
                            <p class="card-text">Address: <?=$address?></p>
                        </div>
                        <div style="float:right; margin-left:auto">
                            <img class="card-img-top" src='<?php echo $photo_src; ?>' alt="Card image" style="width: 100px; height:100px ">
                        </div>
                    </div>
                    <div class="card-body" style="margin:auto">
                        <p class="card-text"><b>Guardian: </b><?=$guardian?></p>
                        <p class="card-text"><b>Father name: </b> <?=$father_name?></p>
                        <p class="card-text"><b>Father ID: </b><?=$father_id;?></p>
                        <p class="card-text"><b>Mother name:  </b><?=$mother_name?></p>
                        <p class="card-text"><b>Mother ID: </b><?=$mother_id?></p>
                       <!-- <p class="card-text"><b>Approved By: </b><?=$username?></p> -->
                    </div>
                     <div>
                         <a href="#" class=" btn btn-block nav-link btn-warning text-white openID" data-id="<?=$id?>" data-toggle="modal" data-target="#comment">Comment</a>
                            </div>
                </div>
                    </div>
                    </form>
                   </li>
                <?php
}
}
?>
                 </ul>
                 <!--comment-->
<?php
if (isset($_POST['saving'])) {
    $orphan_id = $_POST['orphan_id'];
    $comment = $_POST['comment_orphan'];
    $qr = mysqli_query($conn, "INSERT INTO support_for_one (`sponsor_id`,`orphan_id`,`comment_orphan`) VALUES('$user_id','$orphan_id','$comment')") or die(mysqli_error($conn));

    echo ('<div class="alert alert-success" style="color:black;">Thank you to update us<div>');
    header('location:./index.php');
}
?>
<div id="comment" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header navbar-dark">
                <h4 class="modal-title"><?=$fname . ' ' . $lname?> </h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-row">
                     <input type="hidden" name="sponsor_id"  value=""/>
                      <input type="hidden" name="orphan_id" id="orphan_id"   />
                        <div class="form-group col-sm-4">
                           <div class="form-group">
                            <label for="exampleFormControlTextarea1">Comment</label>
                            <textarea class="form-control rounded-0" name="comment_orphan" id="exampleFormControlTextarea1" rows="5" placeholder="Tell us about your adopted child"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <button type="button" class="btn btn-secondary btn-sm ml-auto"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" name="saving" class="btn btn-primary btn-sm ml-1">send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end here-->
         </div>
               <div role="tabpanel" class="tab-pane fade" id="supportone">
                   <div class="table-responsive">
  <table class="table">
<?php
$qr = mysqli_query($conn, "SELECT DISTINCT orphan.f_name,orphan.l_name,orphan.photo,orphan.birth_year,orphan.father_full_name,orphan.father_id,orphan.phone,
                    support_for_one.amount,orphan.id,support_for_one.created_at FROM orphan
                    INNER JOIN support_for_one ON support_for_one.orphan_id=orphan.id
                    INNER JOIN user ON  support_for_one.sponsor_id =user.id
                    WHERE support_for_one.sponsor_id ='$user_id' AND support_for_one.amount IS NOT NULL AND orphan.id ORDER BY orphan.id DESC") or die(mysqli_error($conn));
if (mysqli_num_rows($qr) <= 0) {
    echo "<center><p style='color:red;'><b>There is no new one</b></p> </center>";
} else {
    ?>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">first name </th>
        <th scope="col">last name</th>
        <th scope="col">Amount</th>
        <th scope="col">Rwandan Franc</th>
        <th scope="col">Date&Time</th>

      </tr>
    </thead>
    <?php
$i = 0;
    while ($row = mysqli_fetch_assoc($qr)) {
        $i++;
        ?>

    <tbody>
      <tr>
        <th scope="row"><?=$i?></th>
        <td><?=$row['f_name']?></td>
        <td><?=$row['l_name']?></td>
        <td><?=$row['amount']?>UGX</td>
        <td><?=$row['amount'] * 0.26?>  FRW</td>
        <td><?=$row['created_at']?></td>
      </tr>
     <?php
}}
?>
    </tbody>
  </table>
    </div>
               </div>
            <div role="tabpanel" class="tab-pane fade" id="alberto">
                            <div class="table-responsive">
  <table class="table">
<?php

$qr = mysqli_query($conn, "SELECT sponsorship.amount, sponsor.country, sponsorship.created_at from sponsorship
JOIN  user on user.id=sponsorship.user_id
JOIN  sponsor ON sponsor.user_id=user.id
                    WHERE sponsorship.user_id ='$user_id' AND sponsorship.id ORDER BY sponsorship.id DESC") or die(mysqli_error($conn));
if (mysqli_num_rows($qr) <= 0) {
    echo "<center><p style='color:red;'><b>There is no new one</b></p> </center>";
} else {
    ?>
 <tbody>
      <tr>

      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Amount </th>
        <th scope="col">Rwandan Franc</th>
        <th scope="col">Date&Time</th>
      </tr>
    </thead>
    <?php
$i = 0;
    while ($row = mysqli_fetch_assoc($qr)) {
        $i++;
        ?>



<?php
if ($row['country'] == "Rwanda") {
            ?>

         <th scope="row"><?=$i?></th>
        <td><?=$row['amount']?> FRW</td>
        <td><?=$row['amount'] * 1?> Frw</td>
         <td><?=$row['created_at']?></td>
        <?php
} elseif ($row['country'] == "Canada") {
            ?>

        <th scope="row"><?=$i?></th>
        <td><?=$row['amount']?> $</td>
        <td><?=$row['amount'] * 744.55?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Germany") {
            ?>

        <th scope="row"><?=$i?></th>
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "USA") {
            ?>
             <tr>

        <th scope="row"><?=$i?></th>
        <td><?=$row['amount']?>$</td>
        <td><?=$row['amount'] * 977.50?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Belgique") {
            ?>

        <th scope="row"><?=$i?></th>
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Belgique") {
            ?>
             <tr>
        <th scope="row"><?=$i?></th>
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Poland") {
            ?>
        <th scope="row"><?=$i?></th>
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Italy") {
            ?>
        <th scope="row"><?=$i?></th>
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Sweeden") {
            ?>

        <th scope="row"><?=$i?></th>
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Netherland") {
            ?>


        <th scope="row"><?=$i?></th>
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Zimbabwe") {
            ?>
        <th scope="row"><?=$i?></th>
        <td><?=$row['amount']?>Zimbabwe Fra</td>
        <td><?=$row['amount'] * 300?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Uganda") {
            ?>
        <th scope="row"><?=$i?></th>
        <td><?=$row['amount']?>UGX</td>
        <td><?=$row['amount'] * 0.26?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
}
        ?>


      </tr>
     <?php
}}
?>
    </tbody>
  </table>
    </div>
</div>
    <div role="tabpanel" class="tab-pane fade" id="otherSupport">
                            <div class="table-responsive">
  <table class="table">
<?php

$qr = mysqli_query($conn, "SELECT support_with_any.donated, support_with_any.value, support_with_any.created_at from support_with_any
JOIN  user on user.id=support_with_any.user_id

    WHERE support_with_any.user_id ='$user_id' AND support_with_any.status=1 AND support_with_any.id ORDER BY support_with_any.id DESC") or die(mysqli_error($conn));
if (mysqli_num_rows($qr) <= 0) {
    echo "<center><p style='color:red;'><b>There is no new one</b></p> </center>";
} else {
    ?>
 <tbody>
      <tr>

      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Items </th>
        <th scope="col">Quantity</th>
        <th scope="col">Date&Time</th>
      </tr>
    </thead>
    <?php
$i = 0;
    while ($row = mysqli_fetch_assoc($qr)) {
        $i++;?>
<tr>
      <th scope="row"><?=$i?></th>
        <td><?=$row['donated']?></td>
        <td><?=$row['value']?></td>
         <td><?=$row['created_at']?></td>


<?php
}
}
?>
      </tr>
     <?php
?>
    </tbody>
  </table>
    </div>
               </div>
            </div>
            </div>
       </div>
       </div>
    <!--body end here-->

        <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../aboutus.php">About</a></li>
                       <!--  <li><a href="#">Menu</a></li>
                        <li><a href="../contactus.html">Contact</a></li> -->
                    </ul>
                </div>
                <div class="col-7 col-sm-5">
                    <h5>Our Address</h5>
                    <address>
		              CENTRE RAMIRO Orphanage<br>
                      BUSANZA Cell<br>
                      KICUKIRO District<br>
                      KIGALI City<br>
                      <i class="fa fa-phone fa-lg"></i> Tel.: +250786529470<br>
                      <i class="fa fa-fax fa-lg"></i> +250726313208<br>
                      <i class="fa fa-envelope fa-lg"></i> Email: <a href="mailto:ramiroorphanage.com">ramiroorphanage@gmail.com</a>
                   </address>
                </div>
                <div class="col-12 col-sm-4">
                    <div>
                        <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i class="fa fa-google fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-google" href="http://youtube.com/"><i class="fa fa-youtube fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-icon" href="mailto:"><i class="fa fa-envelope-o fa-lg"></i></a>
                    </div>
                </div>
           </div>

</html>
<script>
$(document).on("click", ".openID", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #orphan_id").val( myBookId );
});
$(document).on("click", ".openID", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #orphan_id").val( myBookId );
   
});

setTimeout(function(){$("#load").hide();},10000);
</script>

<!--
    support in general
-->
<div id="addSupport" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header navbar-dark">
                <h4 class="modal-title">Send your support </h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
<div  class="row row-content">
        <div class="col-12" >
            <ul class="nav nav-tabs">
                <li class="nav-item">
                   <a class="nav-link active" href="#paypal"  role="tab" data-toggle="tab">Paypal</a>
                </li>
           <li class="nav-item">
                <a class="nav-link " href="#other" role="tab" data-toggle="tab">General support</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#otherthing" role="tab" data-toggle="tab">Support With other Things</a>
            </li>
               </ul>
               <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade show active " id="paypal">
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick" />
			<input type="hidden" name="hosted_button_id" value="EEV5MPTXMJ2N4" />
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
			<img alt="" border="0" src="https://www.paypal.com/en_CA/i/scr/pixel.gif" width="1" height="1" />
			</form>
            </div>
            <div role="tabpanel" class="tab-pane fade " id="other">
                <form action="" method="post" name="support" onsubmit="return validateform()">
                    <div class="form-row">
                     <input type="hidden" name="user_id"  value=""/>
                    </div>
                        <div class="form-group col-sm-4">
                            <label class="sr-only" for="exampleInputEmail3">amount</label>
                            <input type="number" name="amount" class="form-control form-control-sm mr-1" id="exampleInputEmail3"
                                placeholder="Enter amount">
                        </div>

                    <div class="form-row">
                        <button type="button" class="btn btn-secondary btn-sm ml-auto"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" name="save" class="btn btn-primary btn-sm ml-1">send</button>
                    </div>
            </form>
                    <?php
if (isset($_POST['save'])) {
    $amount = $_POST['amount'];
    $qr = mysqli_query($conn, "INSERT INTO sponsorship (`user_id`,`amount`) VALUES('$user_id','$amount')") or die(mysqli_error($conn));
    header('location:./index.php');

}

?>
</div>

<div role="tabpanel" class="tab-pane fade " id="otherthing">
            <form action="" method="post" name="saveTheChild"  onsubmit="return validateform22()">
                    <div class="form-row">
                     <input type="hidden" name="user_id"  value=""/>
                        <div class="form-group col-sm-4">
                            <!-- <label class="sr-only" for="exampleInputEmail">Itemu</label> -->
                            <input type="text" name="donated" class="form-control form-control-sm mr-1" id="exampleInputEmail"
                                 placeholder="Enter item" >
                        </div>
                    </div>
                        <div class="form-group col-sm-4">
                            <!-- <label class="sr-only" for="exampleInputEmail">amount</label> -->
                            <input type="text" name="value" class="form-control form-control-sm mr-1" id="exampleInputEmail"
                                placeholder="Enter Quantity">
                        </div>

                    <div class="form-row">
                        <button type="button" class="btn btn-secondary btn-sm ml-auto"
                            data-dismiss="modal">Cancel</button>
                        <button  type="submit" name="save2" class="btn btn-primary btn-sm ml-1">submit</button>
                    </div>
</form>
<?php
  if (isset($_POST['save2'])) {
    $donate = $_POST['donated'];
    $value = $_POST['value'];
    $qr = mysqli_query($conn, "INSERT INTO support_with_any (`user_id`,`donated`,`value`)
     VALUES('$user_id','$donate','$value')") or die(mysqli_error($conn));
    header('location:./index.php');

}

?>

</div>
</div>
            </div>
        </div>
    </div>
</div>

<script>

function validateform(){
var amount=document.support.amount.value;
if(amount==""){
    alert("Before you submit please insert amount of your money");
    return false;
}
}
function validateform22(){
    var donate=document.saveTheChild.donated.value;
    var values=document.saveTheChild.value.value;
    if(donate==""){
        alert("Please insert kind of what you donate");
        return false;
    }
    if(values==""){
        alert("Please  insert amount of that thing");
        return false;
    }
}
</script>
<!-- <script src="./pay_me.js" type="text/javascript"></script> -->