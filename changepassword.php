<?php
session_start();
if (isset($_SESSION['name']))
{
	
}
else
{
	echo "<script>alert('Sorry Login First!');window.location.href='submit.php';</script>";
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
	
    img:hover
   {
    transform:scale(1.4);
    transition: all 0.7s;
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
   body {
    background: url('images/b6.jpg');
    background-size: 100% 100%;
    min-height: 1024px;
    min-width:768px;
}

.box {
    width: 500px;
    padding: 40px;
    position: absolute;
    top: 50%;
    left: 50%;
    background: #191919;
    ;
    text-align: center;
    transition: 0.25s;
    margin-top: 100px
}
.box:hover{
    
    transform:scale(1.1);
    transition: all 1s;
}

.box input[type="password"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 10px 10px;
    width: 250px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s
}

.box h1 {
    color: white;
    text-transform: uppercase;
    font-weight: 500
}

.box input[type="password"]:focus {
    width: 300px;
    border-color: #2ecc71
}

.box input[type="submit"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 14px 40px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer
}

.box input[type="submit"]:hover {
    background: #2ecc71
}

.forgot {
    text-decoration: underline
}

ul.social-network {
    list-style: none;
    display: inline;
    margin-left: 0 !important;
    padding: 0
}

ul.social-network li {
    display: inline;
    margin: 0 5px
}

.social-network a.icoFacebook:hover {
    background-color: #3B5998
}

.social-network a.icoTwitter:hover {
    background-color: #33ccff
}

.social-network a.icoGoogle:hover {
    background-color: #BD3518
}

.social-network a.icoFacebook:hover i,
.social-network a.icoTwitter:hover i,
.social-network a.icoGoogle:hover i {
    color: #fff
}

a.socialIcon:hover,
.socialHoverClass {
    color: #44BCDD
}

.social-circle li a {
    display: inline-block;
    position: relative;
    margin: 0 auto 0 auto;
    border-radius: 50%;
    text-align: center;
    width: 50px;
    height: 50px;
    font-size: 20px
}

.social-circle li i {
    margin: 0;
    line-height: 50px;
    text-align: center
}

.social-circle li a:hover i,
.triggeredHover {
    transform: rotate(360deg);
    transition: all 0.2s
}

.social-circle i {
    color: #fff;
    transition: all 0.8s;
    transition: all 0.8s
}

</style>
</head>
<body>
<div class="container-fluid">
 <!--header-->
 <?php include('header.php');?>

	
	<div class="row"><h1 style="text-align:center;font-size:40px;color:white;">CHANGE PASSWORD</h1></div>
  <!--this is a block of change password--> 
  <?php
  if(isset($_POST['submit']))
  {
    $oldpass=$_POST['opassword'];
    $newpass=$_POST['npassword'];
    $cpass=$_POST['cpassword'];
    $password=$_SESSION['password'];
    $user=$_SESSION['name'];
    if($password==$oldpass)
    {
        if ($newpass==$cpass) 
        {
           $con=mysqli_connect("localhost","root","","majorproject");
           $sql="UPDATE `registration` SET `password`='$newpass' WHERE `name`='$user'";
           $res=mysqli_query($con,$sql);
           if ($res) 
           {
              echo "<script>alert('Password Changed Successfully.');window.location.href='login.php';</script>";
           }
        
        }
        else
        {
            echo "<script>alert('New password and cndorm password is nat matched.');</script>";
        }
    }
    else
    {
        echo "<script>alert('your current oassword is invalid.');</script>";
      
    }
   
  }
  ?>
    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="box" action="" method="post" enctype="multipart/form-data">
                    <h1>CHANGE PASSWORD</h1>
                    <p class="text-muted"> Please enter your old password and conform your new password!</p>
                    <input type="password" name="opassword" placeholder="Old Password">
                    <input type="password" name="npassword" placeholder="New Password">
                    <input type="password" name="cpassword" placeholder="Conform Password">
                      <input type="submit" name="submit" value="submit" >
                      <div class="col-md-12">
                        <ul class="social-network social-circle">
                            <li><a href="https://www.facebook.com/" class="icoFacebook" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/accounts/login/" class="icoTwitter" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.google.com/account/about/" class="icoGoogle" title="Google "><i class="fa fa-google"></i></a></li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div> 
    <!--this is a footer-->
</div>
</body>
</html>