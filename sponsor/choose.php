
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

// if (!empty($_POST['submit'])) {
    $id=$_GET['orphan_id'];
    // echo  $id;
    // $user_id=$_GET['sponsor_id'];
    $status=$_GET['status'];
$query=mysqli_query($conn,"UPDATE orphan SET `status`='3' WHERE `id`='$id'" )or die(mysqli_error($conn));
$query="INSERT INTO sponsor_orphan (`orphan_id`,`sponsor_id`,`status`) VALUES('$id','$user_id','3')" ;
 $result=mysqli_query($conn,$query)or die(mysqli_error($conn));
header("location:index.php");
// }
      ?>

 <form id="myform" action="choose.php" method="GET">
      <input type="text" name="status">
      <input type="text" name="orphan_id"  >
      <input type="text" name="sponsor_id"  >
      <!-- <button type="submit" name="submit">hi</button> -->
  </form>
  </body>
</html>


