<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="redirect1()">
    <img src="loading.gif" alt="loader" id="loading">
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
        }
        else{
            header("location:../index.php");
        }
            $id=$_GET['id'];
            //$status=$_GET['status'];
        $query="UPDATE orphan SET `status`='1', `user_id`='$user_id' WHERE `id`='$id'" ;
        $result=mysqli_query($conn,$query)or die(mysqli_error($conn));
        // header("location:index.php");
        //}
      ?>
</body>
<!-- <script src="jquery-3.3.1.js"></script> -->
<script src="sms.js"></script>
<script>
    function redirect1(){
    // Init SMS
    const sms = new SMS;
   // Make http call
   sms.sendSMS()
    .then(data => {
      if(data.response.accepted === true) {
        window.location.assign("index.php")
    } else {
        alert('Orphan Accepted & message sent! ');
        // alert('Orphan Accepted but message is not sent! check if you have internet connection');
        window.location.assign("index.php")
        // Show profile
        console.log(data.response);
      }
    })
    }
</script>
</html>