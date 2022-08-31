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
                        <li class="nav-item active"><a class="nav-link" href="../index.php"><span
                                    class="fa fa-home fa-lg"></span>Home</a></li>
                        <li class="nav-item "><a class="nav-link" href="../aboutus.php"><span
                                    class="fa fa-info fa-lg"></span>About</a></li>
                                    <li class="nav-item "><a class="nav-link" href="./change_password.php"><span
                                    class="fa fa-info fa-lg"></span>Change Password</a></li>

                    </ul>
                    <button type="button" data-html="true" class="btn  nav-link btn-warning text-white">
                    <span class="navbar-text btn-warning">
                        <a href="../logout.php">
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
                    <div><button type="button" data-html="true" class="btn btn-block nav-link btn-warning text-white" 
                            >
                         <a class="nav-link" href="./report.php"><span
                                    class="fa fa-info fa-lg"></span>Generate Report</a>
                          </button></div>
                </div>
            </div>
        </header>

<!--Orphanage  body-->
<div class="container">
    <div class="row row-content">
        <div class="col-12 ">
            <h2>CENTRE RAMIRO Orphanage</h2>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#allowed" role="tab" data-toggle="tab">Orphans Allowed </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#new" role="tab" data-toggle="tab">New Registered</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#rejected" role="tab" data-toggle="tab">Rejected</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#sponsor" role="tab" data-toggle="tab">Sponsors</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link " href="#supportone" role="tab" data-toggle="tab">Support One</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link " href="#Ingeneral" role="tab" data-toggle="tab">Support in general</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link " href="#anything" role="tab" data-toggle="tab">Support with other thing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#adopted" role="tab" data-toggle="tab">Adopted</a>
                </li>
            </ul>
            <div class="tab-content">
                 <div role="tabpanel" class="tab-pane fade show active " id="allowed">
                <?php
$nmbr = '';
// $imagesDirectory = "picture/";
$qr = mysqli_query($conn, "SELECT orphan.status, orphan.f_name,orphan.l_name,orphan.photo,orphan.birth_year,orphan.father_full_name,orphan.father_id,orphan.phone,
                    orphan.mother_full_name,orphan.mother_id,orphan.gender,orphan.guardian_name,orphan.address,orphan.id,user.username FROM orphan
                    INNER JOIN user ON orphan.user_id=user.id WHERE orphan.status=1 OR orphan.status=3 OR orphan.status=4 AND orphan.id ORDER BY orphan.id DESC") or die(mysqli_error($conn));
$nmbr = mysqli_num_rows($qr);

if (mysqli_num_rows($qr) <= 0) {
    echo "<center><p style='color:red;'><b>There is no new one</b></p> </center>";
} else {
    ?>
    <script>

    var duration="<?php echo $numbr; ?>";
$('#printHere').html(duration);
</script>
    <ul id="ul" class="row">
    <?php
while ($row = mysqli_fetch_assoc($qr)) {
        $fname = $row['f_name'];
        $lname = $row['l_name'];
        $year = $row['birth_year'];
        $photo = $row['photo'];
        $gender = $row['gender'];
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
       	$status=$row['status'];
        ?>
                <li id="li">
                <form action="" method="POST" enctype="multipart/form-data">

                <div class="row " >

                <div class="card "  style="box-shadow: 11px 8px 52px rgba(18, 18, 18, 0.35);">
                    <div class="form-row">
                        <div style="float: left;">
                            <h4 class="card-title"><?=$fname . ' ' . $lname?></h4>
                            <p class="card-text">Old years: <?=date('Y') - $year?></p>
                            <p class="card-text">Gender: <?=$gender?></p>
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
                       <p class="card-text"><b>Approved By: </b><?=$username?></p>
                        <p class="card-text"><b>Status: </b><?php if($status==3){
                        	echo "<strong class='btn-warning'>Sponsored</strong>";
                        }elseif($status==4){
                        	echo "<span class='btn-success'>Adopted</span>";
                        }else{echo "<span class='btn-light'>Allowed</span>";}?></p>

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
            <div  role="tabpanel" class="tab-pane fade" id="new">
                <?php
// $imagesDirectory = "picture/";
$qr = mysqli_query($conn, "SELECT * FROM orphan WHERE `status`=0 AND id ORDER BY id DESC") or die(mysqli_error($conn));
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
        $gender = $row['gender'];
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
                <div class="row " style="padding-left: 1rem;">
                <div class="card "  style="box-shadow: 11px 8px 52px rgba(18, 18, 18, 0.35);">
                    <div class="form-row  ">
                        <div style="float: left;">

                            <h4 class="card-title"><?=$fname . ' ' . $lname?></h4>
                            <p class="card-text">Old years: <?=date('Y') - $year?></p>
                            <p class="card-text">Gender: <?=$gender?></p>
                            <p class="card-text">Phone: <?=$phone?></p>
                            <p class="card-text">Address: <?=$address?></p>
                        </div>
                        <div style="float:right; margin-left:auto">
                            <img class="card-img-top" src='<?php echo $photo_src; ?>' alt="Card image" style="width: 70px; height:70px ">
                        </div>
                    </div>
                    <div class="card-body" style="margin:auto">
                        <p class="card-text"><b>Guardian: </b><?=$guardian?></p>
                        <p class="card-text"><b>Father name: </b> <?=$father_name?></p>
                        <p class="card-text"><b>Father ID: </b><?=$father_id;?></p>
                        <p class="card-text"><b>Mother name:  </b><?=$mother_name?></p>
                        <p class="card-text"><b>Mother ID: </b><?=$mother_id?></p>
                        <div class="row">
                            <div><button class="btn btn-default" <?php echo "onClick=\"return confirm('Are you sure, you want to accept this person?')\""; ?> >
                                <a href="approve.php?id=<?=$id;?>" class="btn btn-warning">Accept</a></button>
                            </div>
                            <div class="offset-1"><button class="btn btn-default" >
                                 <a href="#" class=" btn btn-block nav-link btn-light openID" data-id="<?=$id?>" data-toggle="modal" data-target="#loginModal">Reject</a>
                            </div>
                        </div>
                    </div>

 <?php
if (isset($_POST['dta'])) {
            $orphan_id = $_POST['orphan_id'];
            $comment = $_POST['comment'];
            $query = "UPDATE orphan SET `status`='2', `user_id`='$user_id' WHERE `id`='$orphan_id'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            

            $qr = mysqli_query($conn, "INSERT INTO reject (`orphan_id`,`comment`) VALUES('$orphan_id','$comment')") or die(mysqli_error($conn));
            // header("location:index.php");
            echo ('<div class="alert alert-success" style="color:black;">Thank you for your support<div>');
            header('location:./index.php');
        }
        ?>
<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="content">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header navbar-dark">
                <h4 class="modal-title">Why you're  going to reject this one? </h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-row">
                      <input type="hidden" name="orphan_id" id="orphan_id"   />
                        <div class="form-group col-sm-4">
                            <div class="form-group">
                            <label for="exampleFormControlTextarea1">Comment</label>
                            <textarea class="form-control rounded-0" name="comment" id="exampleFormControlTextarea1" rows="5" placeholder="Write something" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <button type="button" class="btn btn-secondary btn-sm ml-auto"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" name="dta" class="btn btn-primary btn-sm ml-1">send</button>
                    </div>
                </form>
            </div>
        </div>
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
               <div role="tabpanel" class="tab-pane fade" id="rejected">
               <?php
// $imagesDirectory = "picture/";
$qr = mysqli_query($conn, "SELECT orphan.f_name,reject.comment,orphan.l_name,orphan.gender,orphan.photo,orphan.birth_year,orphan.father_full_name,orphan.father_id,orphan.phone,
                    orphan.mother_full_name,orphan.mother_id,orphan.guardian_name,orphan.address,orphan.id,user.username FROM orphan
                    INNER JOIN user ON orphan.user_id=user.id
                    INNER JOIN reject ON  orphan.id=reject.orphan_id
                    WHERE orphan.status=2 AND orphan.id ORDER BY orphan.id DESC") or die(mysqli_error($conn));
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
        $gender = $row['gender'];
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
        $reason = $row['comment'];
        ?>
                     <li id="li">
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">

                <div class="card "  style="box-shadow: 11px 8px 52px rgba(18, 18, 18, 0.35);">
                    <div class="form-row">
                        <div style="float: left;">
                            <h4 class="card-title"><?=$fname . ' ' . $lname?></h4>
                            <p class="card-text">Old years: <?=date('Y') - $year?></p>
                            <p class="card-text">Gender: <?=$gender?></p>
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
                       <p class="card-text"><b>Rejected By:</b><?=$username?></p>
                        <p>Reason:</p><div class="badge badge-primary text-wrap" ><?=$reason?></div>
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
            <div role="tabpanel" class="tab-pane fade" id="sponsor">
               <div class="table-responsive">
  <table class="table">
<?php
$qr = mysqli_query($conn, "SELECT * FROM sponsor WHERE  id ORDER BY id") or die(mysqli_error($conn));
if (mysqli_num_rows($qr) <= 0) {
    echo "<center><p style='color:red;'><b>There is no new one</b></p> </center>";
} else {
    ?>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Sponsor name</th>
        <th scope="col">Gender</th>
        <th scope="col">Country</th>
        <th scope="col">Phone</th>
        <th scope="col">email</th>
      </tr>
    </thead>
    <?php

    while ($row = mysqli_fetch_assoc($qr)) {
        ?>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td><?=$row['sponsor_name']?></td>
        <td><?=$row['gender']?></td>
        <td><?=$row['country']?></td>
        <td><?=$row['phone']?></td>
        <td><?=$row['email']?></td>

      </tr>
     <?php
}}
?>
    </tbody>
  </table>
    </div>
            </div>
 <div role="tabpanel" class="tab-pane fade" id="adopted">
     <div class="table-responsive">
                            <table class="table">
                                <?php
$qr = mysqli_query($conn, "SELECT DISTINCT orphan.id,support_for_one.sponsor_id,sponsor.sponsor_name, orphan.f_name,orphan.l_name,orphan.photo,orphan.birth_year,orphan.father_full_name,orphan.father_id,orphan.phone,
                                            support_for_one.amount,orphan.id FROM orphan
                                            INNER JOIN support_for_one ON support_for_one.orphan_id=orphan.id
                                            INNER JOIN user ON  support_for_one.sponsor_id =user.id
                                             INNER JOIN sponsor ON sponsor.user_id=user.id
                                            WHERE orphan.status=4 AND orphan.id ORDER BY orphan.id DESC") or die(mysqli_error($conn));
if (mysqli_num_rows($qr) <= 0) {
    echo "<center><p style='color:red;'><b>There is no new one</b></p> </center>";
} else {
    ?>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First name </th>
                                        <th scope="col">Last name</th>
                                        <th scope="col">Adopted By</th>
                                        

                                    </tr>
                                </thead>
                                <?php
$i = 0;
    while ($row = mysqli_fetch_assoc($qr)) {
        
        $id = $row['id'];
        $fname = $row['f_name'];
        $lname = $row['l_name'];
        $i++;
        ?>

                                <tbody>
                                    <tr>
                                        <th scope="row"><?=$i?></th> 
                                        <td><?=$row['f_name']?></td>
                                        <td><?=$row['l_name']?></td>
                                        <th><?=$row['sponsor_name']?></td>
                                       
                                        <td> <button class="btn btn-default" >
                                <a href="view.php?id=<?=$id;?>" class="btn btn-light">View Message</a></button>
</td>
                                    </tr>


                                </tbody>
                                <?php
}}
?>
                            </table>
                             
                            <!-- message for  orphanage adopted -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?=$fname . ' ' . $lname?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                        </div>
            </div>
            <div role="tabpanel" class="tab-pane fade show " id="Ingeneral">
            <div class="table-responsive">
                <table class="table">
                    <?php
$qr = mysqli_query($conn, "SELECT sponsor.country,sponsor.sponsor_name,sponsor.country, sponsorship.amount,sponsorship.created_at from sponsorship
                              INNER JOIN user ON sponsorship.user_id=user.id
                              INNER JOIN sponsor ON sponsor.user_id=user.id
                              WHERE sponsorship.id ORDER BY sponsorship.id DESC") or die(mysqli_error($conn));
if (mysqli_num_rows($qr) <= 0) {
    echo "<center><p style='color:red;'><b>There is no new one</b></p> </center>";
} else {
    ?>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Adopted By</th>
                             <th scope="col">Country</th>
                             <th scope="col">Amount</th>
                             <th scope="col">Rwandan Franc</th>
                            <th scope="col">Date&Time</th>
                        </tr>
                    </thead>
                    <?php
$i = 0;
    while ($row = mysqli_fetch_assoc($qr)) {
        $i++;?>

                    <tbody>
                        <tr>
                            <th scope="row"><?=$i?></th>
                            <td><?=$row['sponsor_name']?></td>
                            <td><?=$row['country']?></td>
                            <?php
                                        	if ($row['country'] == "Rwanda") {
            ?>

        
        <td><?=$row['amount']?> FRW</td>
        <td><?=$row['amount'] * 1?> Frw</td>
         <td><?=$row['created_at']?></td>
        <?php
} elseif ($row['country'] == "Canada") {
            ?>

       
        <td><?=$row['amount']?> $</td>
        <td><?=$row['amount'] * 744.55?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Germany") {
            ?>

       
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "USA") {
            ?>
             

       
        <td><?=$row['amount']?>$</td>
        <td><?=$row['amount'] * 977.50?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Belgique") {
            ?>

        
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Belgique") {
            ?>
            
        
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Poland") {
            ?>
       
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Italy") {
            ?>
       
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Sweeden") {
            ?>

       
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Netherland") {
            ?>


       
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Zimbabwe") {
            ?>
       
        <td><?=$row['amount']?>Zimbabwe Fra</td>
        <td><?=$row['amount'] * 300?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Uganda") {
            ?>
        
        <td><?=$row['amount']?>UGX</td>
        <td><?=$row['amount'] * 0.26?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
}
        


}
}
?>
</tr>
                    </tbody>
                </table>
            </div>
    </div>
 <div role="tabpanel" class="tab-pane fade" id="supportone">
                        <div class="table-responsive">
                            <table class="table">
                                <?php
$qr = mysqli_query($conn, "SELECT DISTINCT sponsor.country,sponsor.sponsor_name, orphan.f_name,orphan.l_name,orphan.photo,orphan.birth_year,orphan.father_full_name,orphan.father_id,orphan.phone,
                                            support_for_one.created_at,support_for_one.amount,orphan.id FROM orphan
                                            INNER JOIN support_for_one ON support_for_one.orphan_id=orphan.id
                                            INNER JOIN user ON  support_for_one.sponsor_id =user.id
                                             INNER JOIN sponsor ON sponsor.user_id=user.id
                                            WHERE orphan.status!=4 AND orphan.id ORDER BY orphan.id DESC") or die(mysqli_error($conn));
if (mysqli_num_rows($qr) <= 0) {
    echo "<center><p style='color:red;'><b>There is no new one</b></p> </center>";
} else {
    ?>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First name </th>
                                        <th scope="col">Last name</th>
                                        <th scope="col">Donated By</th>
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
                                        <th><?=$row['sponsor_name']?></td>
                                        	<?php
                                        	if ($row['country'] == "Rwanda") {
            ?>

        
        <td><?=$row['amount']?> FRW</td>
        <td><?=$row['amount'] * 1?> Frw</td>
         <td><?=$row['created_at']?></td>
        <?php
} elseif ($row['country'] == "Canada") {
            ?>

       
        <td><?=$row['amount']?> $</td>
        <td><?=$row['amount'] * 744.55?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Germany") {
            ?>

       
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "USA") {
            ?>
             <tr>

       
        <td><?=$row['amount']?>$</td>
        <td><?=$row['amount'] * 977.50?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Belgique") {
            ?>

        
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Belgique") {
            ?>
             <tr>
        
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Poland") {
            ?>
       
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Italy") {
            ?>
       
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Sweeden") {
            ?>

       
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Netherland") {
            ?>


       
        <td><?=$row['amount']?>€</td>
        <td><?=$row['amount'] * 1156.91?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Zimbabwe") {
            ?>
       
        <td><?=$row['amount']?>Zimbabwe Fra</td>
        <td><?=$row['amount'] * 300?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
} elseif ($row['country'] == "Uganda") {
            ?>
        
        <td><?=$row['amount']?>UGX</td>
        <td><?=$row['amount'] * 0.26?> Frw</td>
         <td><?=$row['created_at']?></td>

          <?php
}
        
}}
?>
                                </tbody>
                            </table>
                        </div>
            </div>
            <div role="tabpanel" class="tab-pane fade show " id="Ingeneral">
            <div class="table-responsive">
                <table class="table">
                    <?php
$qr = mysqli_query($conn, "SELECT sponsor.sponsor_name,sponsor.country, sponsorship.amount,sponsorship.created_at from sponsorship
                              INNER JOIN user ON sponsorship.user_id=user.id
                              INNER JOIN sponsor ON sponsor.user_id=user.id
                              WHERE sponsorship.id ORDER BY sponsorship.id DESC") or die(mysqli_error($conn));
if (mysqli_num_rows($qr) <= 0) {
    echo "<center><p style='color:red;'><b>There is no new one</b></p> </center>";
} else {
    ?>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Donated By</th>
                             <th scope="col">Country</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Frw</th>
                            <th scope="col">Date&Time</th>
                        </tr>
                    </thead>
                    <?php
$i = 0;
    while ($row = mysqli_fetch_assoc($qr)) {
        $i++;?>

                    <tbody>
                        <tr>
                            <th scope="row"><?=$i?></th>
                            <td><?=$row['sponsor_name']?></td>
                            <td><?=$row['country']?></td>
                             <?php
if ($row['country'] == "Rwanda") {
            ?>
                            <td><?=$row['amount']?> Frw</td>
                            <td><?=$row['amount'] * 1?> Frw</td>
                            <?php
} elseif ($row['country'] == "Germany") {
            ?>
     <td><?=$row['amount']?> €</td>
     <td><?=$row['amount'] * 1156.91?> Frw</td>
        <?php
} elseif ($row['country'] == "Canada") {
            ?>
     <td><?=$row['amount']?> $</td>
     <td><?=$row['amount'] * 744.55?> Frw</td>
        <?php
} elseif ($row['country'] == "USA") {
            ?>
     <td><?=$row['amount']?> $</td>
     <td><?=$row['amount'] * 977.50?> Frw</td>
        <?php
} elseif ($row['country'] == "Poland") {
            ?>
     <td><?=$row['amount']?> €</td>
     <td><?=$row['amount'] * 1156.91?> Frw</td>
        <?php
} elseif ($row['country'] == "Sweeden") {
            ?>
     <td><?=$row['amount']?> €</td>
     <td><?=$row['amount'] * 1156.91?> Frw</td>
        <?php
} elseif ($row['country'] == "Netherland") {
            ?>
     <td><?=$row['amount']?> €</td>
     <td><?=$row['amount'] * 1156.91?> Frw</td>
        <?php
} elseif ($row['country'] == "Uganda") {
            ?>
     <td><?=$row['amount']?>UGX</td>
     <td><?=$row['amount'] * 0.26?> Frw</td>
        <?php
} elseif ($row['country'] == "Zimbabwe") {
            ?>
     <td><?=$row['amount']?> Zimbabwe fra</td>
     <td><?=$row['amount'] * 300?> Frw</td>
        <?php
}
        ?>
                            <td><?=$row['created_at']?></td>

                        </tr>
                        <?php
}
}
?>
                    </tbody>
                </table>
            </div>
               </div>
<div role="tabpanel" class="tab-pane fade" id="anything">
                        <div class="table-responsive">
                            <table class="table">
                                <?php
$qr = mysqli_query($conn, "SELECT sponsor.sponsor_name,sponsor.country, support_with_any.donated,support_with_any.value,support_with_any.created_at from support_with_any
                              INNER JOIN user ON support_with_any.user_id=user.id
                              INNER JOIN sponsor ON sponsor.user_id=user.id
                              WHERE support_with_any.id ORDER BY support_with_any.id DESC") or die(mysqli_error($conn));
if (mysqli_num_rows($qr) <= 0) {
    echo "<center><p style='color:red;'><b>There is no new one</b></p> </center>";
} else {
    ?>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Donated By</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Quantity</th>
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
                                        <th><?=$row['sponsor_name']?></td>
                                        <td><?=$row['donated']?> </td>
                                        <td><?=$row['value']?></td>
                                        <td><?=$row['created_at']?>
                                    </tr>
                                    <?php
}}
?>
                                </tbody>
                            </table>
                        </div>
            </div>

            </div>
            </div>
 </div>
       </div>

       </div>

<!--end here-->
        <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../aboutus.php">About</a></li>
                        <!-- <li><a href="#">Menu</a></li> -->
                        <!-- <li><a href="../contactus.html">Contact</a></li> -->
                    </ul>
                </div>
                <div class="col-7 col-sm-5">
                    <h5>Our Address</h5>
                    <address>
		              CENTRE RAMIRO Orphanage<br>
                      BUSANZA Cell<br>
                      KICUKIRO District<br>
                      KIGALI City<br>
                      <i class="fa fa-phone fa-lg"></i> Tel: +250726313208<br>
                      <i class="fa fa-fax fa-lg"></i> +250786529470<br>
                      <i class="fa fa-envelope fa-lg"></i> Email: <a href="mailto:ramiroorphanage@rwanda.net">ramiroorphanage@rwanda.net</a>
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
<script>
$(document).on("click", ".openID", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #orphan_id").val( myBookId );

});

setTimeout(function(){$("#load").hide();},10000);
</script>

</html>
