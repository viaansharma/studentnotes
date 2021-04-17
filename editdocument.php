<?php //this  php is use for login form without login user can not open this page
session_start();
if (isset($_SESSION['name']))
{
	
}
else
{
echo"<script>alert('Sorry Login First!');window.location.href='login.php';</script>";
}
?>
<!--this is showing values in box editdocument code-->
<?php
$id=$_REQUEST['id1'];
include('connection.php');
$sql="select * from studydocument where id=$id";
$data=mysqli_query($con,$sql);
$res=mysqli_fetch_array($data);
$title=$res[1];
$des=$res[3];
$course=$res[2];
$tag=$res[4];
$thumb=$res[6];
$document=$res[7];
?>
<!--this is for update values in edit document-->
<?php
if (isset($_POST['sub']))
 {
  $title1=$_POST['title'];
  $course1=$_POST['course'];
  $des1=$_POST['description'];
  $tag1=$_POST['tag'];
  include('connection.php');
  $thumbnailname1=$_FILES['thumbnail']['name'];
  $thumb_tmp1=$_FILES['thumbnail']['tmp_name'];
  $sql1="UPDATE `studydocument` SET `title`='$title1',`course`='$course1',`desrciption`='$des1',`tag`=' $tag1' WHERE `id`=$id";

 $res1=mysqli_query($con,$sql1);
 if ($res1) 
 {
	echo "<script>alert('data updated Succcessful');window.location.href='uploaddocument.php';</script>";
 }
}
?>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet"/>
   <link href="css/font-awesome.css" rel="stylesheet"/>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
   <style> 

   .background{
		background: url('images/b1.jpg');
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
   </style>
   
	</head>
	<body>
  <!-- outer designning-->
	<div class="container-fluid background">
	 <!--header-->
   <?php include('header.php');?>
	
	<div class="row "><h1 style="text-align: center;font-size:40px;">EDIT DOCUMENTS</h1></div>
	
	<!-- this is a form for documents-->
	<div class="container">
	<form action="" method="post" enctype="multipart/form-data">
	<div class="row">
	<div class="col-sm-12" style="margin-top:3%;margin-bottom:3%;padding:1%;min-height:300px;font-size:14px;
	font-family:'times new roman';box-shadow:1px 1px 2px #2ac0d5;">
	
	<div class="row">
	
<div class="col-sm-6">
<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><i class="fa fa-pencil"></i></span></div>
<input type="text" class="form-control" name="title" placeholder="title of documents .."  
aria-label="Username" aria-describedby="basic-addon1"value="<?php echo $title;?>">
</div>
</div>
<div class="col-sm-6">
<div class="input-group mb-3">
  <div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span></div>
<input type="text" class="form-control" name="course" placeholder="for which course?"  
aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $course;?>">
</div>
</div>
<div class="col-sm-6">
<div class="input-group mb-3">
  <div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><i class="fa fa-pencil"></i></span></div>
<textarea type="text" class="form-control" name="description" placeholder="Descripion/Details of Document.."
rows="3" aria-label="Username" aria-describedby="basic-addon1"><?php echo $des;?></textarea>
</div>
</div>
<div class="col-sm-6">
<div class="input-group mb-3">
  <div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><i class="fa fa-pencil"></i></span></div>
<textarea type="text" class="form-control" name="tag" placeholder="Tags for searching(add with comma)..."
rows="3" aria-label="Username" aria-describedby="basic-addon1"><?php echo $tag;?></textarea>
</div>
</div>
	
	<div class="col-sm-5" style="font-size:16px;"></br>
Thumbnail of Documents file:<input type="file" name="thumbnail" value="<?php echo $thumb ?>"/>
	</div>
<div class="col-sm-1"><img src="thumbnail/<?php echo $thumb;?>" height="40px" width="40px"/>
</div>
<div class="col-sm-6" ><br/><input type="submit" class="form-control btn btn-info" value="Update Now" name="sub"/>
</div>
</div>
</div>
</div>
</form>
</div>

<!--documentation design-->

   <!--footer-->
   <?php include('footer.php'); ?>

</div>
</body>
</html>


