<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet"/>
<link href="css/font-awesome.css" rel="stylesheet"/>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script>
function message()
{
alert('you can not perform any task without login.');
window.location.href='login.php';	
}
function searching()
{
var searchtxt=document.getElementById("searchtxt").value;
if(searchtxt=="")
{
alert("please type some text to search document");	
}	
else
{
window.location.href="index.php?val="+searchtxt;	
}
}
</script>
<style>
#topheader
{
min-height:50px;
padding-top:10px;
background:#f9f9fa;
border-top:4px solid #2ac0d5;
box-shadow:0px 3px 2px grey;
	
}
#h1
{
background:#2ac1d6;
min-height:20px;
font-size:22px;
color:white;
font-weight:bold;
text-align:center;
padding:5px;	
}
#h3
{
background:black;
color:white;
font-size:23px;
padding:1px;
text-align:center;	
}
#menu ul li a
{
color:#2ac1d6;	
font-size:18px;
font-family:'Times New Roman';
margin-left:6px;
}
#dynamic
{
	min-height:150px;
	color:#2ac1d6;
	max-height:170px;
	padding:2%;
	box-shadow:1px 2px 2px black;
	background:#e8e8ff;
}
.heading
{
	font-size:16px;
	font-family:'Times New Roman';
	color:#000039;
	
}
.normaltext
{
	font-size:14px;
	font-family:'Monotype corsiva';
}
.border-radius
{
border:2px solid gray;
padding:1%;	
	}
</style>
</head>
<body>
<div class="container-fluid">
<!-- startof header -->
<div class="row" id="topheader">
<div class="col-sm-2">
<a href="index.php"><img src="images/logo.png" style="height:40px; width:40px"/></a>
</div>
<div class="col-sm-2"><a href="login.php" style="text-decoration:none;color:black;">
<span style="background:white;padding:9px; border:1px solid #fe9800 ;font-family:'monotype corsiva';font-size:18px;border-radius:5px">Sign In</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="register.php" style="text-decoration:none;color:black;"><span style="background:white;padding:9px; border:1px solid #fe9800 ;font-family:'monotype corsiva';font-size:18px;border-radius:5px">Sign Up</span></a></div>
<div class="col-sm-8">
<div class="input-group mb-3">
  <input type="text" id="searchtxt" class="form-control" placeholder="Recipient's username" aria-label="search document" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" style="background:#2abfd4; color:white" type="button" onclick="searching()">Search Now</button>
  </div>
</div>
</div>
</div>

<!--end of header -->

<div class="row">
<div class="col-sm-12" style="text-align:center;font-family:'monotype corsiva';margin-top:3%">
<h3>WELCOME TO MY <span style="color:#ff9a2a;"><i> ENGG HUB</i></span></h3></div>
<?php 
$con=mysqli_connect("localhost","root","","majorproject"); 
if(isset($_REQUEST['val']))
{
$txt=$_REQUEST['val'];	
$query="select registration.*,studydocument.*from registration,studydocument where
registration.email=studydocument.userid and studydocument.tag like '%$txt%' order by studydocument.id desc";	
}
else
{
$query="select registration.*,studydocument.*from registration,studydocument where
registration.email=studydocument.userid order by studydocument.id desc";
}
$data=mysqli_query($con,$query);
$user="";
while($row=mysqli_fetch_array($data))
{
$did=$row['id'];
$query2="select * from liked where uid='$user' and doc_id=$did";
$data2=mysqli_query($con,$query2);
$num=mysqli_num_rows($data2);

$query3="select * from liked where doc_id=$did";
$data3=mysqli_query($con,$query3);
$like_num=mysqli_num_rows($data3);

$query4="select * from comment where did=$did";
$data4=mysqli_query($con,$query4);
$comments=mysqli_num_rows($data4);
	
?>
<div class="col-sm-6" style="margin-bottom:1%
">
<div class="col-sm-12" id="dynamic">
<div class="row">
<div class="col-sm-2"><img src="thumbnail/<?php echo $row['thumbnail']?>" class="border" height="70px" width="70px"></div>
<div class="col-sm-10">
<span class="heading">NOTES:<?php echo $row['title']?></span></br>
<span style="color:#2ac0d5;" class="normaltext">specially designed for:<?php echo $row['course']?></span>
</br>
<span style="color:black;size:13px" class="heading">Description: <?php echo $row['discription']?> </span>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<span class="normaltext">File Type is:<?php echo $row['doctype']?></br>Click here to download <a href="#" onclick="message()"><span class="fa fa-download" style=color:red>
</span> </a></span>
</div>
<div class="col-sm-1"><img src="profile/<?php echo $row['pic']?>" height="45;" width="40"></div>
<div class="col-sm-7">
<span class="heading" style="font-size:13px">Upload By:<?php echo $row['0']?><span class=
"normaltext"></span></span></br>
<span class="normaltext">From:hewett</span>
</div></div>
<div class="row normaltext">
<div class="col-sm-6">
<?php 
if($num>0)
{	
?>
<span class="fa fa-heart" onclick="like(<?php echo $row['id'] ?>)" style="font-size:24px;color:blue">
<?php
}
else
{
?>
<span class="fa fa-heart-o" onclick="message()" style="font-size:24px;color:blue">
<?php } ?> 
<sup class="countlike" style="font-size:16px"><?php echo $like_num ?></sup>
</span>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#"onclick="message()" style="font-size:18px;color:blue;text-decoration:none" data-toggle="modal" data-target="#exampleModal"><?php echo $comments ?> comment</a>
</div>
<div class="col-sm-6" style="text-align:right">
uploaded on :<?php echo $row['date'] ?></div></div>
</div>
</div>
<?php
}
?>
</div>
<!--start of footer -->
<div class="row" style="background:#242729; min-height:80px;margin-top:7%; padding:20px">

<div class="col-sm-6" style="text-align:left;color:white;font-family:'monotype corsiva'; font-size:18px;">Developed By:Viaan Sharma 2020</div>
<div class="col-sm-6" style="text-align:right;color:white;font-family:'monotype corsiva'; font-size:18px;">Guided By:Techpile team</div>

<div class="col-sm-12" style="text-align:center;color:white">
<button type="button" class="btn btn-primary">Follow on Facebook&nbsp;<i class="fa fa-facebook"></i></button>
<button type="button" class="btn btn-danger">Follow on Youtube&nbsp;<i class="fa fa-youtube"></i></button>
<button type="button" class="btn btn-warning">Follow on Instagram &nbsp;<i class="fa fa-instagram"></i></button>
<button type="button" class="btn btn-success">Follow on Linkdin&nbsp;<i class="fa fa-linkedin"></i></button>
</div></div>

<!--end of footer -->
</div>
</body>
</html>