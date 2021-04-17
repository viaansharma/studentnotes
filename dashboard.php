<?php
session_start();
if (isset($_SESSION['name']))
{
	
}
else
{
	echo "<script>alert('Sorry Login First!');window.location.href='login.php';</script>";
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
<div class="container-fluid">
<!--header-->
<?php	include('header.php'); ?> 

	<div class="row background"><h1 style="color:#ffff66;">DASHBOARD SECTION</h1>

<!--card coding-->
  <div class="container">
  <div class="row mb-5" >
  <div class="col-sm-4">
  <div class="card" style="width: 18rem;">
  <img src="images/alldocument.png" class="card-img-top" alt="images/alldocument.png">
  <div class="card-body">
    <h5 class="card-title">All Notes Here</h5>
    <p class="card-text">Here you can see and download all the notes which are upload by the students of different colleges of different states and countries. Eg.B-Tech notes,Diploma notes,Graduation notes,Post graduation notes etc.</p>
    <a href="alldocuments.php" class="btn btn-primary">Go Download Notes Here</a>
  </div>
</div>
</div>
<div class="col-sm-4">
  <div class="card" style="width: 18rem;">
  <img src="images/uploaddocument.png" class="card-img-top" alt="images/uploaddocument.png">
  <div class="card-body">
    <h5 class="card-title">Upload Document </h5>
    <p class="card-text">Here you can easily upload any types of notes.So that the student can download your notes.</p>
    <a href="uploaddocument.php" class="btn btn-primary">Go To Upload Document</a>
  </div>
</div>
</div>
<div class="col-sm-4">
  <div class="card" style="width: 18rem;">
  <img src="images/myprofile.png" class="card-img-top" alt="images/myprofile.png">
  <div class="card-body">
    <h5 class="card-title">User Profile</h5>
    <p class="card-text">Here you can see your profile details.</p>
    <a href="myprofile.php" class="btn btn-primary">Go On User Profile</a>
  </div>
</div>
</div>

  </div>

  <div class="row mb-5" >
  <div class="col-sm-4">
  <div class="card" style="width: 18rem;">
  <img src="images/changepassword.png" class="card-img-top" alt="images/changepassword.png">
  <div class="card-body">
    <h5 class="card-title">Change Password </h5>
    <p class="card-text">Here user can easily change their password.</p>
    <a href="changepassword.php" class="btn btn-primary">Go To Change Password</a>
  </div>
</div>
</div>
<div class="col-sm-4">
  <div class="card" style="width: 18rem;">
  <img src="images/registration.png" class="card-img-top" alt="registration.png">
  <div class="card-body">
    <h5 class="card-title">User Registration</h5>
    <p class="card-text">Here user can go through with the registration process.</p>
    <a href="registration.php" class="btn btn-primary">Go Registration</a>
  </div>
</div>
</div>
<div class="col-sm-4">
  <div class="card" style="width: 18rem;">
  <img src="images/login.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">USER LOGIN</h5>
    <p class="card-text">Here user can go through with the login process.</p>
    <a href="login.php" class="btn btn-primary">Go Login</a>
  </div>
</div>
</div>

  </div>

  </div>
  </div>
  </div> 
  <!-- footer--> 
  <?php include('footer.php'); ?>
  
	</div>
</body>
</html>