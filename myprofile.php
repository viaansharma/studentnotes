<?php
session_start();
if (isset(  $_SESSION['name']))
{
	
}
else
{ 
	echo "<script>alert('Sorry Login First!');window.location.href='login.php';</script>";
}
?>
<?php
if (isset($_POST['click'])) 
{
  $name=$_POST['name'];
  $dob=$_POST['dob'];
  $gender=$_POST['gender'];
  $mobno=$_POST['mobno'];
  $college=$_POST['college'];
  $course=$_POST['course'];
  $year=$_POST['year'];
  $email=$_SESSION['email'];

  $picname=$_FILES['picname']['name'];
  $con=mysqli_connect("localhost","root","","majorproject");
  if ($picname=="") 
  {
    $query="UPDATE `registration` SET `name`='$name',`dob`='$dob',`gender`='$gender',
    `mobno`='$mobno',`college`='$college',`course`='$course',`year`='$year' WHERE `email`='$email'";
  }
  else
  {
    $query="UPDATE `registration` SET `name`='$name',`dob`='$dob',`gender`='$gender',
    `mobno`='$mobno',`college`='$college',`course`='$course',`picname`='$picname',`year`='$year' WHERE `email`='$email'";
    $pictmp=$_FILES['picname']['tmp_name'];
     move_uploaded_file($pictmp,"photo/$picname");
  }
  $res=mysqli_query($con,$query);
  
    $_SESSION['name']=$name;
    $_SESSION['picname']=$picname;
    $_SESSION['dob']=$dob;
    $_SESSION['gender']=$gender;
    $_SESSION['college']=$college;
    $_SESSION['course']=$course;
    $_SESSION['year']=$year;
    $_SESSION['mobno']=$mobno; 
}
?>
<!DOCTYPE html>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.js"></script>

<style>
	
	.background{
		background: url('images/b3.jpg');
		background-size: 100% 100%;
		min-height: 600px;
	}
    
  #header1
   {
	   background:#679874;
	   padding:2%;
	   min-height:40px;
	   font-size:22px;
	   color:black;
	   font-weight:bold;
	   text-align:center; 
     font-family:cursive;
   }
   #footer
   {
	   background:black;
	   color:white;
	   font-size:20px;
	   
	   
   }
   #menu ul li a
   {
	   color:#679874;
	   font-size:18px;
	   font-family:'Times new Roman';
   }
   #menu ul li a:hover
   {
    color:#39227d;
    transform:scale(1.1);
    transition: all 1s;
   }
   #text:hover
   {
    color:#39227d;
    transform:scale(1.2);
    transition: all 0.7s;
   }
   img:hover
   {
    transform:scale(1.4);
    transition: all 0.7s;
   }

</style>
</head>
<body>
<div class="container-fluid background">
 <!--header-->
 <?php include('header.php');?>

	<div class="row"><h1 style="text-align:center;font-size:40px;color:white;">MY PROFILE</h1></div>
 
  <div class="container" >
  <div class="row">
<div class="col-sm-2" style="margin-top:5%"><img src="photo/<?php echo $_SESSION['picname']?>"
 style="height:150px;width:150px;border:2px solid black;">

</div>
<div class="col-sm-10" > 
  <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="row jumbotron">
            <div class="col-sm-6 form-group">
                <label for="name"> Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['name']?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="dob">Date Of Birth:</label>
                <input type="date" class="form-control" name="dob" value="<?php echo $_SESSION['dob']?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="gender">Gender:</label>
                <input type="radio" class="form-control" name="gender" value="male" <?php if($_SESSION['gender']=='male'){echo "checked";} ?>>Male
                <input type="radio" class="form-control" name="gender" value="female" <?php if($_SESSION['gender']=='female'){echo "checked";} ?>>Female
            </div>
            <div class="col-sm-6 form-group">
                <label for="tel">Contact Number:</label>
                <input type="tel" name="mobno" class="form-control" value="<?php echo $_SESSION['mobno']?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="college">College:</label>
                <input type="text" class="form-control" name="college" value="<?php echo $_SESSION['college']?>" >
            </div>
            <div class="col-sm-6 form-group">
                <label for="course">Course:</label>
                <input type="text" class="form-control" name="course" value="<?php echo $_SESSION['course']?>" >
            </div>
            <div class="col-sm-6 form-group">
                <label for="year">Year:</label>
                <input type="text" class="form-control" name="year"  value="<?php echo $_SESSION['year']?>">
            </div>
            <div class="col-sm-6 form-group">
                <label for="file">Edit Profile Photo:</label>
                <input type="file" class="form-control" name="picname">
            </div>
            <div class="col-sm-2 form-group ">
            </div>
            <div class="col-sm-8 form-group ">
                <input type="submit" class="form-control btn btn-primary " value="update Profile" name="click">
            </div>
            <div class="col-sm-2 form-group ">
            </div>
            
        </div>
        </form>
    </div>
    </div>
    </div>
    </div>

   <!--footer-->
<?php include('footer.php'); ?>

</div>
</body>
</html>