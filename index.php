<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet"/>
<link href="css/font-awesome.css" rel="stylesheet"/>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.js"></script>

<style> 
        body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: linear-gradient(to right, #b92b27, #1565c0)
}
.background{
		background: url('images/bhggh5.jpg');
		background-size: 100% 100%;
		min-height: 600px;
	}
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
     text-align: center;
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
	   font-family:'Times New Roman';
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
    transform:scale(1.1);
    transition: all 0.7s;
   }
   .dynamicrow
   {
       min-height:150px;
       background:#679874;
       box-shadow:5px 2px 2px black
      
   }
   .h{
       font-size:16px;
       font-family:'Times New Roman';
       color:#003366;
   }
   .normaltext{
    font-size:14px;
       font-family:'monotype corsiva';
   }
   .border{
    border:2px solid black;
    padding:2%;
   }

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
</head>
<body>
<div class="container-fluid">
<!-- startof header -->
<div class="row" id="topheader">
<div class="col-sm-2">
<a href="index.php"><img src="images/logo.png" style="height:50px; width:50px"/></a>
</div>
<div class="col-sm-2"><a href="login.php" style="text-decoration:none;color:black;">
<span style="background:white;padding:9px; border:1px solid #fe9800 ;font-family:'monotype corsiva';font-size:18px;border-radius:5px">Sign In</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="registration.php" style="text-decoration:none;color:black;">
<span style="background:white;padding:9px; border:1px solid #fe9800 ;font-family:'monotype corsiva';font-size:18px;border-radius:5px">Sign Up</span></a></div>
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
	{ $txt=$_REQUEST['val'];
		$sql="select registration.*,studydocument.*
		from registration,studydocument where
		 registration.email=studydocument.userid and studydocument.tag like '$txt' order by studydocument.id desc";
	}
	else
	{
    $sql="select registration.*,studydocument.*
	 from registration,studydocument where
	  registration.email=studydocument.userid order by studydocument.id desc";
	}
    $data=mysqli_query($con,$sql);
    $user="";
    while($row=mysqli_fetch_array($data))
    {  // $row={name=>'viaan',dob=>'2001-07-09'} 
     
    $did=$row['id'];
    $query2="select * from likes where uid='$user' and doc_id=$did";
    $data2=mysqli_query($con,$query2);
    $num=mysqli_num_rows($data2);
    //echo $num;
    $query3="select * from likes where doc_id=$did";
    $data3=mysqli_query($con,$query3);
    $like_num=mysqli_num_rows($data3); //counting the no. of same id of document
    //echo $like_num;
  //for comment count
  $query4="select * from comment where did=$did";
  $data4=mysqli_query($con,$query4);
  $comment_num=mysqli_num_rows($data4);
    ?>
<!--this is a document portal-->
    <div class="col-sm-6 mb-1">
    <div class="col-sm-12 dynamicrow">
    <div class="row">
    <div class="col-sm-2"><img src="thumbnail/<?php echo $row['thumbnail'] ?> " class="border" style="height:60px; width:60px;">
    </div>
    <div class="col-sm-10">
    <sapn class="h"><?php echo $row['title'] ?></sapn><br/>
    <span style="color:#6600cc;"class="normaltext" >SPECIALLY DESIGN FOR : <?php echo $row['course'] ?>
    </span><br/>
    <span class="h">DECRIPTION:<?php echo $row['desrciption'] ?>
    </span>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-4">
    <sapn class="normaltext">File type is:<?php echo $row['doctype'] ?><br/>click here to download
    <a href="#" onclick="message()"><span style="font-size:20px;" class="fa fa-download"></a></span></span>
    </div>
    <div class="col-sm-1"><img src="photo/<?php echo $row['picname'] ?> " height="45px" width="40px"></div>
    <div class="col-sm-7">
    <span class="h" style="font-size:13px">upload by: <?php echo $row['name'] ?>
    <span class="normaltext">(<?php echo $row['course'] ?>/<?php echo $row['year'] ?>)</sapn>
    </span><br/>
    <span class="normaltext">From:<?php echo $row['college'] ?></span>
    </div> 
    </div>
    <div class="row normaltext mydiv">
    <div class="col-sm-6">
    <?php
    if ($num>0)
    {?>
      <i class="fa fa-heart" onclick="message()" style="font-size: 25px;color:red"></i>
<?php
    }
    else{?>
    <i class="fa fa-heart-o" onclick="message()" style="font-size: 25px;color:black"></i>
<?php
    }
    ?>
   <sup class="countlike" style="font-size: 16px;"><?php echo $like_num;?></sup>
    </i>&nbsp;&nbsp;&nbsp;</div>
    <div class="col-sm-6"><a href="#"  onclick="message()" data-toggle="modal" data-target="#exampleModal"class="fa fa-comment" style="font-size: 25px;text-decoration:none; color:black"></a>
    <sup style="font-size: 16px;"><?php echo $comment_num;?></sup>
   &nbsp;&nbsp;&nbsp;</div>
    </div>
    </div>
    </div>
   
<?php }?>

</div>
<!--start of footer -->
<div class="row" style="background:#242729; min-height:80px;margin-top:7%; padding:20px">

<div class="col-sm-6" style="text-align:left;color:white;font-family:'monotype corsiva'; font-size:18px;">Developed By:Viaan Sharma</div>
<div class="col-sm-6" style="text-align:right;color:white;font-family:'monotype corsiva'; font-size:18px;">Guided By:Techpile team</div>

<div class="col-sm-12" style="text-align:center;color:white">
<a href="https://m.facebook.com/viaansharma97"><button type="button" class="btn btn-primary">Follow on Facebook&nbsp;<i class="fa fa-facebook">
</i></button></a>
<a href="https://www.youtube.com/c/TechnicalViaan"><button type="button" class="btn btn-danger">Follow on Youtube&nbsp;<i class="fa fa-youtube">
</i></button></a>
<a href="https://www.instagram.com/viaaansharma/"><button type="button" class="btn btn-warning">Follow on Instagram &nbsp;<i class="fa fa-instagram">
</i></button></a>
<a href="https://www.linkedin.com/in/viaan-sharma-9a6368201"><button type="button" class="btn btn-success">Follow on Linkdin&nbsp;<i class="fa fa-linkedin">
</i></button></a>
</div></div>

<!--end of footer -->
</div>
</body>
</html>