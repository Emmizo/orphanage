
<!DOCTYPE html>
<html>
<head>
	<title></title>

<script type="text/javascript">

            function redirect1()
            {
                  window.location.assign("index.php")
            }
        </script>

</head>

<body onload="redirect1()">


<?php
include('../connect.php');
date_default_timezone_set('Africa/Kigali');
ob_start();
session_start();
$user_id=isset($_SESSION['id'])? $_SESSION['id']:"";
$username=isset($_SESSION['username'])?$_SESSION['username']:"";
if (isset($_SESSION['id'])) {
    $user_id=$_SESSION['id'];
    $username=$_SESSION['username'];
    // echo $username;
    // echo $user_id;
}
else{
    header("location:../index.php");
}

//if (!empty($_POST['intake_id'])) {
	$id=$_GET['id'];
    $status=$_GET['status'];
$query="UPDATE orphan SET `status`='2', `user_id`='$user_id' WHERE `id`='$id'" ;
 $result=mysqli_query($conn,$query)or die(mysqli_error($conn));
header("location:index.php");
//}
      ?>

 <form id="myform" action="reject.php" method="GET">
      <input type="hidden" name="status" >
  </form>
  </body>
</html>

