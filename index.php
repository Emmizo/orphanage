<!DOCTYPE html>
<html lang="en">
<?php
ob_start();
include 'connect.php';
session_start();
?>
<head>
    <title>Orphanage</title>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
   <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
</head>

<body>
<!-- navigation -->
<nav class="navbar navbar-dark navbar-expand-sm fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">CENTRE RAMIRO</a>
        <div class="collapse navbar-collapse" id="Navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a class="nav-link" href="./index.php"><span class="fa fa-home fa-lg"></span>Home</a></li>
            <li class="nav-item "><a class="nav-link" href="./aboutus.php"><span class="fa fa-info fa-lg"></span>About</a></li>

        </ul>
         <span class="navbar-text offset-1">
          <button type="button" data-html="true" class="btn btn-block nav-link btn-warning text-white" data-toggle="modal" data-target="#reserveModal">
                           Register as Orphan
                          </button>

        </span>
         <span class="navbar-text offset-1">
         <button type="button" data-html="true" class="btn btn-block nav-link btn-warning text-white" data-toggle="modal"
                            data-target="#sponsor">
                          Register as Sponsor
                          </button>
         </span>
        <span class="navbar-text offset-1">
          <button type="button" data-html="true" class="btn btn-block nav-link btn-warning text-white">
            <a data-toggle="modal" data-target="#loginModal" id="login">
            <span class="fa fa-sign-in"></span> Login</a>
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
                    <p>We make a living by what we get but We make a life by what we give</p>
                    <p>Heal the world, Make it a better place for you and for me and the entire human race</p>
                  </i>
                </div>
                </div>
            </div>
            </div>
        </div>
    </header>
    <script type="text/javascript">
function noNumbers(e)
{
var keynum
var keychar
var numcheck
if(window.event) // IE
{
keynum = e.keyCode
}
else if(e.which) // Netscape/Firefox/Opera
{
keynum = e.which
}
keychar = String.fromCharCode(keynum)
numcheck = /\d/
return !numcheck.test(keychar)
}
</script>
    <!--Body-->

    </head>
  <!--Mask-->
<div id="intro" class="view">

    <div class="mask rgba-black-strong">

        <div class="container-fluid d-flex align-items-center justify-content-center h-100">

            <div class="row d-flex justify-content-center text-center"  style="min-width:1200px">

                <div class="col-md-10" >

                    <!-- Heading -->
                    <h2 class="display-8 font-weight-bold white-text pt-2 mb-8">Our children need your support</h2>

                    <!-- Divider -->
                    <hr class="hr-light">

                    <!-- Description -->

                     <?php
// $imagesDirectory = "picture/";
$qr = mysqli_query($conn, "SELECT * FROM orphan WHERE orphan.status='3'  OR orphan.status='4' AND  id ORDER BY id DESC") or die(mysqli_error($conn));
if (mysqli_num_rows($qr) <= 0) {
    echo "<center><p style='color:red;'><b>There is no new one</b></p> </center>";
} else {
    ?>
                        <h4 class="white-text my-4 ">
                    <ul id="ulr" class="row">

                       <?php
while ($row = mysqli_fetch_assoc($qr)) {
        $fname = $row['f_name'];
        $lname = $row['l_name'];
        $year = $row['birth_year'];
        $photo = $row['photo'];
        $photo_src = "./picture/" . $photo;
        $father_name = $row['father_full_name'];
        $father_id = $row['father_id'];
        $mother_name = $row['mother_full_name'];
        $mother_id = $row['mother_id'];
        $phone = $row['phone'];
        $guardian = $row['guardian_name'];
        $address = $row['address'];
        $id = $row['id'];
        ?>
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                   <div class="hovereffect d-flex flex-row" >
                      <li id="lii"> <img class="card-img-top" src='<?php echo $photo_src; ?>' height="150px" alt="Card image" ></li>
                    <div class="overlay">
                  <h2><?=$fname . ' ' . $lname?></h2>
                  <a class="info" href="#">Years old: <?=date('Y') - $year;?></a>
                   </div>
                    </div>
                  </div> 
                    <?php
}}
?>
                     </ul>
                    </h4>

                </div>

            </div>

        </div>

    </div>

</div>
<!--/.Mask-->

<!--orphanage save-->
<?php
if (isset($_POST['save'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $father_full_name = $_POST['father_full_name'];
    $father_id = $_POST['father_id'];
    $mother_full_name = $_POST['mother_full_name'];
    $mother_id = $_POST['mother_id'];
    $guardian_name = $_POST['guardian_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $birth_year = $_POST['birth_year'];

    $location = "picture/" . basename($_FILES['photo']['name']);
    $upload = $_FILES['photo']['name'];

    move_uploaded_file($_FILES['photo']['tmp_name'], $location);
    $query = "INSERT INTO `orphan` ( `f_name`,`l_name`,`father_full_name`,`father_id`,`mother_full_name`,`mother_id`,`guardian_name`,`address`,`phone`,`gender`,`birth_year`,`photo`)
                      VALUES ('$f_name','$l_name','$father_full_name','$father_id','$mother_full_name','$mother_id','$guardian_name','$address','$phone','$gender','$birth_year','$upload')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo "<center><p style='color:white'>saved well</p></center>";
    header('location:./index.php');
}
?>
    <div id="reserveModal" class="modal fade centerReg" role="dialog" >
        <div class="modal-dialog modal-lg" role="content">
            <div class="modal-content">
                    <div class="modal-header navbar-dark ">
                    <h3>Register here as an Orphan</h3>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form  enctype="multipart/form-data" action="" method="POST"  name="orphan"  onsubmit="return validateform2()">
                          <div class="form-row">
                          <label for="time" class="col-12 col-lg-2 col-form-label">Image </label>
                          <div class="col-6 col-sm">
                          <input type="file" class="form-control" name="photo" accept="image/*">
                          </div>
                          </div>

                    <div class="form-row">
                      <label for="name" class="col-12 col-lg-2 col-form-label">Name </label>
                      <div class="col-6 col-sm">
                        <input type="text" class="form-control" id="f_name" name="f_name" onkeypress="return noNumbers(event)" placeholder=" First name">
                      </div>
                      <div class="col-6 col-sm">
                        <input type="text" class="form-control" id="l_name" name="l_name" onkeypress="return noNumbers(event)" placeholder="Last name">
                      </div>
                    </div>
                      <div class="form-row">
                  <label for="time" class="col-12 col-md-2 col-form-label">Gender </label>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-light">
                      <input type="radio" name="gender" id="option2" value="male" autocomplete="off"> Male
                    </label>
                    <label class="btn btn-warning">
                      <input type="radio" name="gender" id="option3" value="female" autocomplete="off"> Female
                    </label>
                  </div>
                </div>
                  <div class="form-row">
                    <label for="father" class="col-12 col-lg-2 col-form-label">Father Info </label>
                    <div class="col-6 col-sm">
                      <input type="text" class="form-control" id="father_full_name"  name="father_full_name" onkeypress="return noNumbers(event)" placeholder=" Father full name">
                    </div>
                    <div class="col-6 col-sm">
                      <input type="text" class="form-control" id="father_id" name="father_id" placeholder="Father ID"  onKeyPress="return isNumberKey(event)" maxlength="16" >
                    </div>
                  </div>

                  <div class="form-row">
                    <label for="mother" class="col-12 col-lg-2 col-form-label">Mother Info </label>
                    <div class="col-6 col-sm">
                      <input type="text" class="form-control" id="mother_full_name"  name="mother_full_name" onkeypress="return noNumbers(event)" placeholder=" Mother full name">
                    </div>
                    <div class="col-6 col-sm">
                      <input type="text" class="form-control" id="mother_id"  name="mother_id" onKeyPress="return isNumberKey(event)" maxlength="16" placeholder="Mother ID">
                    </div>
                  </div>

                    <div class="form-row">
                    <label for="time" class="col-12 col-lg-2 col-form-label">Birth year </label>
                    <div class="col-6 col-sm">
                        <input type="text" class="form-control" id="date" name="birth_year" maxlength="4" placeholder="Year of Born">
                    </div>
                </div>
                <div class="form-row">
                  <label for="time" class="col-12 col-lg-2 col-form-label">Guardian name</label>
                  <div class="col-6 col-sm">
                    <input type="text" class="form-control" id="quardian" name="guardian_name" onkeypress="return noNumbers(event)" placeholder="guardian name">
                  </div>
                </div>
                <div class="form-row">

                        <label for="mother" class="col-12 col-lg-2 col-form-label">Address</label>
                        <div class="col-6 col-sm">
                        <select class="form-control" name="address" id="address">
                        <option >Select address</option>
                        <option >Rwamagana</option>
                        <option >Kayonza</option>
                        <option >Kicukiro</option>
                        <option >Gasabo</option>
                        <option >Nyarugenge</option>
                        <option >Rulindo</option>
                        <option >Nyagatare</option>
                        <option >Nyanza</option>
                        <option >Huye</option>
                        <option >Nyamasheke</option>
                        <option >Rubavu</option>
                        <option >Nyamagabe</option>

                        </select>
                      </div>
                  <!-- <div class="col-6 col-sm">
                    <input type="text" class="form-control" id="address" name="address"
                      placeholder=" Ex:Nyamirambo">
                  </div> -->
                  <div class="col-6 col-sm">
                    <input type="text" class="form-control" id="phone" name="phone"  maxlength="10" placeholder="Guadian phone">
                  </div>
                </div>

                <div class="form-row">
                    <label class="col-12 col-md-2 col-form-label"></label>
                    <button type="button" class="btn btn-secondary btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="save" class="btn btn-primary  ml-1">Submit</button>
                </div>
            </form>
          </div>
            </div>
            </div>
            </div>

            <!-- orphan registration  form end here -->
<!--sponsor ref form start here-->
<div id="sponsor" class="modal fade centerReg" role="dialog">
<?php
$errorMessage = '';
$message = '';
$passMessage = '';
$emailMessage = '';
$phoneMessage = '';
$error = '';
if (isset($_POST['submit'])) {
    $sponsor_name = $_POST['sponsor_name'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $confirmPass = md5($_POST['confirmPassword']);
    $id = $_POST['user_id'];
    $level = $_POST['level'];
    $gender = $_POST['gender'];
    $q3 = mysqli_query($conn, "SELECT * FROM user where `email`='$email'") or die(mysqli_error($conn));
    $q5 = mysqli_query($conn, "SELECT * FROM sponsor where `phone`='$phone'") or die(mysqli_error($conn));
    $q = mysqli_query($conn, "SELECT * FROM user where `username`='$username'") or die(mysqli_error($conn));
    if (mysqli_num_rows($q) > 0) {
        $message = "<p style='color:red'>This username alread taken</p>";
        $rows = mysqli_fetch_assoc($q);
    } elseif ($password != $confirmPass) {
        $passMessage = "<p style='color:red'>This password comfirmed doesn't match</p>";
    } elseif (mysqli_num_rows($q3) > 0) {
        $emailMessage = "<p style='color:red'>This email alread registered</p>";
    } elseif (mysqli_num_rows($q5) > 0) {
        $phoneMessage = "<p style='color:red'>This phone number alread registered</p>";
    } else {
        $qr = "INSERT INTO `user` (`username`,`email`,`password`,`level`) VALUES('$username','$email','$password','$level')";
        $result = mysqli_query($conn, $qr) or die(mysqli_error($conn));
        $q = "SELECT * FROM user where id ORDER BY id desc";
        $result2 = mysqli_query($conn, $q) or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($result2);
        $id = $row['id'];

        $qr2 = "INSERT INTO `sponsor`(`sponsor_name`,`country`,`email`,`phone`,`user_id`,`gender`) VALUES('$sponsor_name','$country','$email','$phone','$id','$gender')";
        $res = mysqli_query($conn, $qr2) or die(mysqli_error($conn));
        header('location:./index.php');
    }}

?>


              <div class="modal-dialog modal-lg" role="content">
                <div class="modal-content">
                  <!-- <div class="collapse" id="Card"> -->
                  <div class="modal-header navbar-dark ">
                    <h3>Register here as an Sponsor</h3>
                    <button type="button" class="close text-white " data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="post"  name="sponsors"  onsubmit="return validateform()">
                      <div class="form-row">
                        <label for="name" class="col-12 col-lg-2 col-form-label">Sponsor Name </label>
                        <div class="col-6 col-sm">
                          <input type="text" class="form-control" id="f_name" name="sponsor_name" placeholder=" full name"  onkeypress="return noNumbers(event)">
                        </div>
                      </div>

                      <div class="form-row">
                        <label for="mother" class="col-12 col-lg-2 col-form-label">Country </label>
                        <div class="col-6 col-sm">
                        <select class="form-control" name="country">
                        <option>Select country</option>
                        <option>Rwanda</option>
                        <option >Canada</option>
                        <option >USA</option>
                        <option >Germany</option>
                        <option >Belgique</option>
                        <option >Poland</option>
                        <option >Netherland</option>
                        <option >Sweeden</option>
                        <option >Spanish</option>
                        <option >Italy</option>
                        <option >Zimbabwe</option>
                        <option >Uganda</option>
                        <option >Jamaica</option>
                        </select>

                        </div>
                      </div>

                      <div class="form-row">
                        <label for="email" class="col-12 col-lg-2 col-form-label">Email </label>
                        <div class="col-6 col-sm">
                          <input type="email" class="form-control" id="date" name="email" placeholder="email">
                        </div>
                         <div class="error "><?php echo $emailMessage; ?></div>
                      </div>
                      <div class="form-row">
                        <label for="time" class="col-12 col-lg-2 col-form-label">Phone</label>
                        <div class="col-6 col-sm">
                          <input type="number" class="form-control" id="date" name="phone" placeholder="Phone"  >
                        </div>
                        <div class="error "><?php echo $phoneMessage; ?></div>
                      </div>
                      <div class="form-row">
                        <label for="username" class="col-12 col-lg-2 col-form-label">Username </label>
                        <div class="col-6 col-sm">
                          <input type="text" class="form-control" id="username" name="username" placeholder=" Username"  >
                        </div>
                         <div class="error "><?php echo $message; ?></div>
                      </div>
                       <div class="form-row">
                        <label for="time" class="col-12 col-md-2 col-form-label">Gender </label>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn btn-light">
                            <input type="radio" name="gender" id="gender" value="male" autocomplete="off"> Male
                          </label>
                          <label class="btn btn-warning">
                            <input type="radio" name="gender" id="gender" value="female"autocomplete="off"> Female
                          </label>
                        </div>
                      </div>
                      <div class="form-row">
                        <label for="password" class="col-12 col-lg-2 col-form-label">Password </label>
                        <div class="col-6 col-sm">
                          <input type="password" class="form-control" id="password" name="password" max="6" placeholder=" password" >
                        </div>
                        <div class="col-6 col-sm">
                          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" >
                        </div>
                      </div>
                      <div class="error offset-7"><?php echo $passMessage; ?></div>
                      <input type="hidden" name="level" value="2">
                      <input type="hidden" name="user_id">


                      <div class="form-row">
                        <label class="col-12 col-md-2 col-form-label"></label>
                        <button type="button" class="btn btn-secondary btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-primary  ml-1" id="model">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- sponsor registeration form end here-->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="./aboutus.php">About</a></li>

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


           <!-- login -->

<?php

$usernameError = '';
$passwordError = '';

$errorMessage = '';
$errorMessage2 = '';

$errors = 0;

if (isset($_POST['login'])) {
    $tbl_name = "user"; // Table name
    $username = $_POST['username']; // username sent from form
    $password = $_POST['password']; // password sent from form
    $password = md5($password);
    $username = md5($username);
    //$email=$_POST['email'];

    // To protect MySQL injection
    $username = stripslashes($username);
    $password = stripslashes($password);
    //$email=stripcslashes($email);
    //$username = mysqli_real_escape_string($con,$tbl_name);
    //$password = mysqli_real_escape_string($con,$tbl_name);

    //Query

    $username = mysqli_real_escape_string($conn, $_POST['username']);

    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM $tbl_name WHERE `username`='$username'  and `password`='" . md5($password) . "'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $rows['id'];
        $_SESSION['username'] = $rows['username'];
        //Direct pages with different user levels
        if ($rows['level'] == 1) {
            header("location:admin/index.php"); //User1
            session_register("username");
            session_register("password");

        } else
        if ($rows['level'] == '2') {
            header('location: sponsor/index.php'); //User2
            session_register("username");
            session_register("password");

        }

    } else {
        $errorMessage = '<script>alert("Incorect username or password")</script>';
    }
}
?>
          <div id="loginModal" class="modal fade centerLog" role="dialog">
            <div class="modal-dialog modal-lg" role="content">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header navbar-dark ">
                  <h4 class="modal-title">Login </h4>
                  <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="panel1 panel-input">
                    <form class="formValidate" id="loginForm" action="#" method="post" e.preventDefault();>
                      <div class="form-row">
                        <div class="form-group col-md-6 col-sm-4">
                          <label class="sr-only" for="exampleInputEmail3">username </label>
                          <input type="text" name="username" class="form-control form-control-sm mr-1 my-input" id="inputUsername"
                            placeholder="Enter username" required="">
                          <div class="invalid-feedback">Please enter your username</div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6 col-sm-4">
                          <label class="sr-only" for="exampleInputPassword3">Password</label>
                          <input type="password" name="password" class="form-control form-control-sm mr-1 my-input"
                            id="inputPassword" placeholder="Password" max="6" required="">
                          <div class="invalid-feedback">Please enter your password</div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="alert alert-danger offset-8" id="loginSucces" style="display: none">
                        </div>
                      </div>
                      </div>

                     <div class="error alert" id="success-alert" style="display: none;"><?php echo $errorMessage; ?></div>

                      <div class="form-row">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox">
                          <label class="form-check-label "> Remember me </label>
                        </div>
                        <div class="near">
                          <div class="col-md-10 col-sm-offset-1">
                            <div class="text-center " >
                              <button type="submit" id="send"  name="login" class="btn btn-warning btn-lg float-right ml-auto">Sign
                                in</button>
                            </div>
                          </div>
                        </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <div class="row">
                <div class="cal-auto">
                    <p style="margin:auto">© Copyright <?php echo date('Y') ?> Online HIV Orphanage Sponsoring System</p>
                </div>
           </div>
        </div>
    </footer>
<!-- jQuery first, then Popper.js, then Bootstrap JS. -->
<script src="js/juery-min.js"></script>
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/sending.js"></script>
    <script>
        $(document).ready(function(){
            $('[data="tooltip"]').tooltip();
        });
        $("#signin").click(function (event) {

            var form = $("#loginForm");

            if (form[0].checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }

            // if validation passed form
            // would post to the server here

            form.addClass('was-validated');
          });
        $("#carouselButton").click(function(){
            if ($("#carouselButton").children("span").hasClass('fa-pause')) {
                $("#mycarousel").carousel('pause');
                $("#carouselButton").children("span").removeClass('fa-pause');
                $("#carouselButton").children("span").addClass('fa-play');
            }
            else if ($("#carouselButton").children("span").hasClass('fa-play')){
                $("#mycarousel").carousel('cycle');
                $("#carouselButton").children("span").removeClass('fa-play');
                $("#carouselButton").children("span").addClass('fa-pause');
            }
        });
        $('#loginModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
          })
    </script>
    <script type="text/javascript">
function noNumbers(e)
{
var keynum
var keychar
var numcheck
if(window.event) // IE
{
keynum = e.keyCode
}
else if(e.which) // Netscape/Firefox/Opera
{
keynum = e.which
}
keychar = String.fromCharCode(keynum)
numcheck = /\d/
return !numcheck.test(keychar)
}

function isNumberKey(evt){

		var charCode=(evt.which) ? evt.which : event.keyCode
		if(charCode > 31 &&(charCode<48 || charCode > 57))
			return false;
		return true;

	}
</script>
</body>
<script>
	function validateform(){
	  var sponsor_name=document.sponsors.sponsor_name.value;
	  var country=document.sponsors.country.value;
      var email=document.sponsors.email.value;
      var phone=document.sponsors.phone.value;
      var username=document.sponsors.username.value;
      var password=document.sponsors.password.value;
      var confirmPass=document.sponsors.confirmPassword.value;
      var gender=document.sponsors.gender.value;
      var letter=/^[A-Za-z". "]+$/;
      var number=/^[0-9" "]+$/;

			if (sponsor_name=="") {
				alert("Please add sponsor name");
				return false;
			}
			if (country=="Select country") {
				alert("Please select country");
				return false;
			}
      if(email==""){
        alert("Please input your email");
        return false;
      }
      if(phone==""){
        alert("Please input your phone number")
        return false;
      }
       if (!phone.match(number)) {
        alert("Only number allowed for Telephone");
        return false;
      }
      // if (phone=="078" || phone=="072" || phone=="073"){

      // }else{
      // alert("Invalid phone format ");
      // return false;
      // }
      if(username==""){
        alert("Please input your user name");
        return false;
      }
      if(password==""){
        alert("Please input your password");
        return false;
      }
      if(password!=confirmPass){
        alert("Please  your password doesn't muuch with confirmation password");
        return false;
      }
      if(gender==""){
        alert("Please choose your gender");
        return false;
      }


		}
</script>
<script>
  function validateform2(){
      var photo=document.orphan.photo.value;
      var f_name=document.orphan.f_name.value;
      var l_name=document.orphan.l_name.value;
      var father_full_name=document.orphan.father_full_name.value;
      var father_id=document.orphan.father_id.value;
      var mother_full_name=document.orphan.mother_full_name.value;
      var mother_id=document.orphan.mother_id.value;
      var birth_year=document.orphan.birth_year.value;
      var guardian_name=document.orphan.guardian_name.value;
      var address=document.orphan.address.value;
      var phone=document.orphan.phone.value;
      var gender=document.orphan.gender.value;
      var letter=/^[A-Za-z". "]+$/;
      var number=/^[0-9" "]+$/;
      var tel=phone.substr(0,3);
      if (photo=="") {
         alert("Please input your photo");
         return false;
      }
      if (f_name=="") {
        alert("Please add first name");
        return false;
      }
      if (l_name=="") {
        alert("Please input your second name");
        return false;
      }
      if(father_full_name==""){
        alert("Please input your father full name");
        return false;
      }


      if(father_id==""){
        alert("Please input your father ID");
        return false;
      }
      if (father_id . length != 16) {
    alert("ID number must contain at least 16 digit");
    return false;
}

      if (mother_full_name=="") {
        alert("Please input your mother fullname")
        return false;
      }
      if (mother_id=="") {
         alert("Please input your Mother ID");
         return false;
      }
      if (mother_id.length != 16) {
    alert("ID number must contain at least 16 digit");
    return false;
}


      if (birth_year=="") {
         alert("Please input your birth date");
         return false;

      }
      if(birth_year.length!=4){
      alert("Write only year Example 2012");
        return false;
      }
      if (address=="Select address") {
         alert("Please input your address");
         return false;

      }
      if (gender=="") {
         alert("Please input your gender");
         return false;

      }
      if(phone.length!=10){
        alert("You must input only 10 digit");
        return false;
      }
       if (!phone.match(number)) {
        alert("Only number allowed for Telephone");
        return false;
      }
      if (tel=="078" || tel=="072" || tel=="073"){

      }else{
  alert("Invalid phone format ");
      return false;
      }
      if(gender==""){
        alert("Please choose your gender");
        return false;
      }

    }
</script>
</html>