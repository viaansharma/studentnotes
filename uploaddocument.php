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
<?php
if (isset($_POST['sub']))  //condition is button is clicked
{    
	$con=mysqli_connect("localhost","root","","majorproject"); // server connection
	$title=$_POST['title'];
	$course=$_POST['course'];
	$description=$_POST['description'];
	$tag=$_POST['tag'];                    //variables in php
	$doctype=$_POST['doctype'];
	$userid=$_SESSION['email'];
	$thumb_fname=$_FILES['thumbnail']['name'];
    $thumb_tmpname=$_FILES['thumbnail']['tmp_name'];
	
   $doc_fname=$_FILES['document']['name'];
    $doc_tmpname=$_FILES['document']['tmp_name'];
	
	
	$query="INSERT INTO `studydocument`(`id`, `title`, `course`, `desrciption`, `tag`, `doctype`, `thumbnail`, `documentname`, `date`, `status`, `userid`)
	values('','$title','$course','$description','$tag','$doctype','$thumb_fname','$doc_fname',curdate(),'Publish','$userid')";
	//inertion of data in database
	$res=mysqli_query($con,$query); //successfull query execution
	if ($res)
	{
		move_uploaded_file($thumb_tmpname,"thumbnail/$thumb_fname");
		move_uploaded_file($doc_tmpname,"DocumentFile/$doc_fname");   //dynamic file uploading 
		echo "<script>alert('Your document published successfully')</script>";
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
   <script>
   function confirm_delete()
   {
     var v=confirm('do you really want to delete this data');
     if(v==true)
      return true;
     else
      return false;
     
   }
   </script>
   
	</head>
	<body>
  <!-- outer designning-->
	<div class="container-fluid background">
	 <!--header-->
   <?php include('header.php');?>
	
	<div class="row "><h1 style="text-align: center;font-size:40px;">UPLOAD DOCUMENTS</h1></div>
	
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
aria-label="Username" aria-describedby="basic-addon1">
</div>
</div>
<div class="col-sm-6">
<div class="input-group mb-3">
  <div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><i class="fa fa-book"></i></span></div>
<input type="text" class="form-control" name="course" placeholder="for which course?"  
aria-label="Username" aria-describedby="basic-addon1">
</div>
</div>
<div class="col-sm-6">
<div class="input-group mb-3">
  <div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><i class="fa fa-pencil"></i></span></div>
<textarea type="text" class="form-control" name="description" placeholder="Descripion/Details of Document.."
rows="3" aria-label="Username" aria-describedby="basic-addon1"></textarea>
</div>
</div>
<div class="col-sm-6">
<div class="input-group mb-3">
  <div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><i class="fa fa-pencil"></i></span></div>
<textarea type="text" class="form-control" name="tag" placeholder="Tags for searching(add with comma)..."
rows="3" aria-label="Username" aria-describedby="basic-addon1"></textarea>
</div>
</div>
	<div class="col-sm-6">
<select class="form-control" name="doctype">
<option>Select type of your document</option>
<option>PPT Presentation</option>
<option>Image</option>
<option>Audio File</option>
<option>Video File</option>
<option>PDF</option>
<option>ZIP File</option>
</select>
</div>
	
	<div class="col-sm-6" style="font-size:16px;"></br>
Thumbnail of Documents file:<input type="file" name="thumbnail"/>
</div>
	
 <div class="col-sm-6" style="font-size:16px;"></br>
Select your documents file:<input type="file" name="document"/>
</div>

<div class="col-sm-6" ><br/><input type="submit" class="form-control btn btn-info" value="Publish Now" name="sub"/>
</div>
</div>
</div>
</div>
</form>
</div>

<!--documentation design-->
<div class="container">
  <h1 style="text-align: center;">Management Of Uploaded Document</h1>
<div class="row ">
<table class="table table-dark">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Course</th>
      <th scope="col">Description</th>
      <th scope="col">Tag</th>
      <th scope="col">Document Type</th>
      <th scope="col">Thumbnail</th>
      <th scope="col">Document File</th>
      <th scope="col">Uploaded Date</th>
      <th scope="col">Status</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <!--documentation coding and connection-->
<?php
include('connection.php');
$userid=$_SESSION['email'];
$sql="SELECT * FROM `studydocument` where userid='$userid' order by id desc";
//echo $sql;
$data=mysqli_query($con,$sql);
// echo $row;
$i=1;
   while ($r=mysqli_fetch_array($data)) 
   {?>
    <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $r[1] ?></td>
    <td><?php echo $r[2] ?></td>
    <td><?php echo $r[3] ?></td>
    <td><?php echo $r[4] ?></td>
    <td><?php echo $r[5] ?></td>
    <td><a href="thumbnail/<?php $r[6] ?>"><i class="fa fa-download"></i></a></td>
    <td><a href="documentFile/<?php $r[7] ?>"><i class="fa fa-file"></i></a></td>
    <td><?php echo $r[8] ?></td>
    <td><?php echo $r[9] ?></td>
    <td>
     <!--update data-->
      <a href="editdocument.php?id1=<?php echo $r[0] ?>"><i class="fa fa-pencil" style="color: blue; font-size:18px;">
    </i></a>
      <!-- delete uploaddocument code -->
      <?php 
     if( isset($_REQUEST['id']))
     {
       $id=$_REQUEST['id'];
       include('connection.php');
       $sql="delete from studydocument where id=$id";
       $res=mysqli_query($con,$sql);   
       if($res)
       {
        echo "<script>alert('data deleted Succcessful');window.location.href='uploaddocument.php';</script>";
       }
     }
      ?>
      <!-- delete code ? ke baad id and value is a query string-->
     <a onclick="return confirm_delete()" href="uploaddocument.php?id=<?php echo $r[0] ?>"> <i class="fa fa-trash"
     style="color: red; font-size:18px;"></i></a>
    </td>
  </tr>
  <?php
  $i++;
   }
   ?>
  </tbody>
 </table>
</div>
</div>
   <!--footer-->
   <?php include('footer.php'); ?>

</div>
</body>
</html>