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
        <nav class="navbar navbar-dark navbar-expand-sm fixed-top" >
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
         
<div class="container"  style="padding-top: 4rem">
  <div class="panel panel-default">
  <div class="panel-heading" >    
  <div class="panel panel-primary">
    <div class="panel-heading"><center><strong>LIST OF ORPHANAGE  REGISTERED FROM </center></div></strong>
    <div class="panel-body">
<form action=""  name="students" onsubmit="return validateform()" method="post">
<div class="col-lg-4 col-lg-offset-4 col-md-12 col-sm-12" >
<div class="input-radio col-lg-12 col-md-12 col-sm-12">
<label>From</label>
<div class="input-group date" >
<input class="form-control" type="date" name="from" id="datepicker" placeholder="yyyy-mm-dd">
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar" ></i></span>
</div>
</div>
<div class="input-radio col-lg-12 col-md-12 col-sm-12">
<label>To</label>
<div class="input-group date" >
<input class="form-control" type="date" name="to" id="datepicker1" placeholder="yyyy-mm-dd">
<span class="input-group-addon"><i class="glyphicon glyphicon-calendar" ></i></span>
</div>
</div>
<div class="input-field col-lg-12 col-md-12 col-sm-12">
  <br>
<button class="btn btn-default"  name="send" id="button" >Report</button>
<button class="btn btn-default  " name="reset">Cancel</button>
<center>
  <div>
  <br>
  <button class="btn btn-default"><a href="javascript:Clickheretoprint()"  style="text-decoration: none;">PRINT</a></button></center>
 </div></div></div>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body style="font-size: 12px">
</table>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=800, left=300, top=55"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Inel Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size:5px; font: 7px verdana>');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}

</script>

<div id="print_content" >
</form>
<?php
if(isset($_POST['send'])){
$from=$_POST['from'];

$to=$_POST['to'];
?>  
 <thead>
  <p>
     <div style="overflow: auto;">
<table class="table " border="1" style="max-width: 1200px; " >
    <tr style="background-color: #cae8ea">
      <th>No</th>
    <th >First name</th>
    <th>Last Name</th>
    <th>Old year</th>
    <th>Gender</th>
    <th>Father</th>
    <th>Father ID</th>
    <th>Mother</th>
    <th>Mother ID</th>
    <th>Phone</th>
    <th>Guadian</th>
    <th >Address</th>
    <th>Registered at</th>
    <th>Status</th>
  </tr>
    </thead>
    
<div id="content">
<?php

$qr = mysqli_query($conn, "SELECT orphan.status,orphan.created_at, orphan.f_name,orphan.l_name,orphan.photo,orphan.birth_year,orphan.father_full_name,orphan.father_id,orphan.phone,orphan.mother_full_name,orphan.mother_id,orphan.gender,orphan.guardian_name,orphan.address,orphan.id,user.username FROM orphan INNER JOIN user ON orphan.user_id=user.id WHERE orphan.status=1 OR orphan.status=3 OR orphan.status=4  AND date(orphan.created_at) between '$from' AND '$to' AND orphan.id ORDER BY orphan.id DESC") or die(mysqli_error($conn));
if (mysqli_num_rows($qr) <= 0) {
    echo "<center><p style='color:red;'><b>There is no new one</b></p> </center>";
} else {
    ?>
    <ul id="ul" class="row">

    <?php
    $a=0;
while ($row = mysqli_fetch_assoc($qr)) {
		$a++;
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
       	$date=$row['created_at'];
        ?>
<tr>
  <td><?=$a;?></td>
      <td><?php echo $fname;?></td>
      <td><?php echo $lname;?></td>
       <td> <?=date('Y') -$year;?></td>
        <td><b><?php echo $gender;?></b></td>
         <td><?php echo $father_name;?></td>
         <td><?php echo $father_id;?></td>
         <td><?php echo $mother_name;?></td>
         <td><?php echo $mother_id;?></td>
         <td><?php echo $phone;?></td>
         <td><?php echo $guardian;?></td>
         <td><?php echo $address;?></td> 
         <td><?php echo $date;?></td>
         <td> <?php if($status==3){
                        	echo "<strong class='btn-warning'>Sponsored</strong>";
                        }elseif($status==4){
                        	echo "<span class='btn-success'>Adopted</span>";
                        }else{echo "<span class='btn-light'>Allowed</span>";}?></td>
         <div class="no-print">
  
  <?php
}

}}
?>
</tr>
<tr style="background-color:green; color:white; font-weight:bold; font-size:20px"> 
  <!--<td colspan="8" >Total students registed from <?php //echo $from."  ".$to; ?></td>  <td><?php //echo $a;?></td></tr>-->
</table>
</tr>
</p>
</fieldset>


</div>
</div>
</div>
</div>
</div>
</div>
</div>

</body>
</html>
<link rel="stylesheet" href="jquery-ui.css">
<link rel="stylesheet" href="style.css">
<script src="source.js"></script>
<script src="now2.js"></script>
<style type="text/css">
  
  #datepicker{
    color:black;
  }
</style>
<script src="source.js"></script>
  <script src="now2.js"></script>
  <style type="text/css">
    
    #datepicker{
      color:black;
    }
  </style>
  <script>

  $( function() {
    $( "#datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
   
  } );

  </script>
  <style type="text/css">
  
  #datepicker{
    color:black;
  }
</style>
<script src="source.js"></script>
  <script src="now2.js"></script>
  <style type="text/css">
    
    #datepicker{
      color:black;
    }
  </style>
  <script>

  $( function() {
    $( "#datepicker1" ).datepicker({dateFormat:'yy-mm-dd'});
   
  } );
  
  </script>
  <?php
  $stoday=date('Y-m-d');
  ?>
<script>
    function validateform(){
            var  from=document.students.from.value;
            
            var to=document.students.to.value;
            if (from=="") {
                alert("from when? you didn't choose any date");
                return false;
            }
            if (to=="") {
                alert("Until when? you didn't choose any date");
                return false;
            }
        }
</script>

        </body>
        </html>