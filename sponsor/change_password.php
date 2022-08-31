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
                <a class="navbar-brand " href="./index.php">Welcome <?php echo $username; ?></a>
                <a class="navbar-brand offset-4" href="./index.php">Orphanage MS</a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="./index.php"><span
                                    class="fa fa-home fa-lg"></span>Home</a></li>
                        <li class="nav-item "><a class="nav-link" href="../aboutus.php"><span
                                    class="fa fa-info fa-lg"></span>About</a></li>

                    </ul>
                    <span class="navbar-text">
                        <a href="../logout.php">
                            <span class="fa fa-sign-out"></span>Sign out</a>
                    </span>
                </div>
            </div>
        </nav>
        <header class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="cl-12 col-sm-6">
                        <h1>Online HIV orphanage Sponsoring System</h1>
                        <p>We take inspiration from the World's best lives of children, and create a unique future experience. Our
                            with creations which will guide those Orphans to achieve on their best lives!</p>
                    </div>

                    <div class="col-12 col-sm">
                        <!-- <img src="../img/logo.jpg" class="img-fluid" width="80" height="100"> -->
                    </div>
                </div>
            </div>
        </header>
        <body>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="panel-body">
					<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<link rel="stylesheet" href="../css/bootstrap.min.css">
					<title>change </title>
					<link rel="stylesheet" href="cssform/style.css">
				</head>
		<div class="panel panel-default" >
		<div class="panel-heading" >
  		<div class="panel panel-primary">
    	<div class="panel-heading"><strong > <p>Change your password</p></strong>
		</div>

					<form class="form-horizontal" role="form" action="" method="POST">

						<div class="row">
							<div class="col-lg-4 col-lg-offset-4 col-md-12 col-sm-12">

								<div class=" input-field col-lg-12 col-md-12 col-sm-12">
									<label>Email</label>
									<input class="form-control"  type="email" name="email" placeholder="" >
								</div>
								<div class="input-field col-lg-12 col-md-12 col-sm-12">
									<label>New password</label>
									<input class="form-control" type="password" name="npass" >
								</div>
								<div class="input-field col-lg-12 col-md-12 col-sm-12">
									<label>Confirm New Password</label>
									<input class="form-control" type="password" name="cpass"><br>
								</div>
									<div class="input-field col-lg-12 col-md-12 col-sm-12">
										<button class="btn btn-default " name="submit">Change</button>
										<button class="btn btn-default " name="reset">Cancel</button>
									</div>

								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div></div></div></div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {

    // $user = $_POST['user_username'];
    // // $user = md5($user);
    $email = $_POST['email'];
    $new_pass = md5($_POST['npass']);
    $re_password = md5($_POST['cpass']);

    $sql = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' ");
    if (mysqli_num_rows($sql) > 0) {

        if ($new_pass === $re_password) {

            $sq = mysqli_query($conn, "UPDATE user SET password='$new_pass'  WHERE id='$user_id '");

            echo "<script>alert('your password changed')</script>";
            // echo "<script>window.location.assign('login.php')</script>";
        } else {
            echo "<script>alert('your password not match')</script>";
        }

    } else {

        echo "<script>alert('invalid  email')</script>";

    }

}

?>