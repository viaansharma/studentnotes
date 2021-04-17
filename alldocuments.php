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

   </style>

   <!--ajax java script code-->
  <script>
  function getDocId(id)
  {
    document.getElementById("doc_id").value=id;
    $.ajax({
      url:'getuserdetail.php',
      type:'POST',
      data:{did:id},
      success:function(r)
      {
        //alert(r);
        document.getElementById("commentsection").innerHTML=r;
      }
    });
  }
  function savecomment(){
    var doc_id=document.getElementById("doc_id").value;
    var msg=document.getElementById("message").value;
    var uid='<?php echo $_SESSION['email'] ?>';
   // alert(doc_id+"  "+msg+" "+uid);
   $.ajax({

url:'comment.php',
type:'POST',
data:{did:doc_id,msg:msg,uid:uid},
success: function(r)
{ 
  document.getElementById("message").value=" ";
  document.getElementById("close").click();
  alert(r);
}
});
  }

  function like(id,e)
  { 
    e.setAttribute("class","fa fa-heart");
    // alert(id);
    var uid='<?php echo $_SESSION['email'] ?>';
    e.innerHTML="<sup>"+(parseInt(e.innerText)+1)+"</sup>";
    //alert(uid);
    $.ajax({
      url:'like.php',
      type:'POST',
      data:{did:id,email:uid},
      success: function(r)
      {
        alert(r);
      }
    });

  }
  </script>
   
   
	</head>
	<body>
  <!-- outer designning-->
	<div class="container-fluid background">
   <!--header-->
	<?php include('header.php');?>

	<div class="row " ><h3 style="text-align:center;color:white;;font-size:40px;">ALL DOCUMENTS</h3></div>
   
    <!--this is a database connection portal-->
    <div class="row">
    <?php
    $con=mysqli_connect("localhost","root","","majorproject");
    $sql="select registration.*,studydocument.* from registration,studydocument where registration.email=studydocument.userid order by studydocument.id desc";
    $data=mysqli_query($con,$sql);
    $user=$_SESSION['email'];
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
    <a href="documentFile/<?php echo $row['documentname'] ?>"><span style="font-size:20px;" class="fa fa-download"></a></span></span>
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
      <i class="fa fa-heart" onclick="like(<?php echo $row['id'] ?>)" style="font-size: 25px;color:red"></i>
<?php
    }
    else{?>
    <i class="fa fa-heart-o" onclick="like(<?php echo $row['id'] ?>,this)" style="font-size: 25px;color:black"></i>
<?php
    }
    ?>
   <sup class="countlike" style="font-size: 16px;"><?php echo $like_num;?></sup>
    </i>&nbsp;&nbsp;&nbsp;</div>
    <div class="col-sm-6"><a href="#"  onclick="getDocId(<?php echo $row['id'] ?>)" data-toggle="modal" data-target="#exampleModal"class="fa fa-comment" style="font-size: 25px;text-decoration:none; color:black"></a>
    <sup style="font-size: 16px;"><?php echo $comment_num;?></sup>
   &nbsp;&nbsp;&nbsp;</div>
    </div>
    </div>
    </div>
   
<?php }?>

</div>
    <!--footer-->
<?php include('footer.php'); ?>
</div>
<!--modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comment Section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="commentsection" style="height:300px;overflow-y:scroll">
        
      </div>
      <div class="modal-footer">
      <input type="hidden" id="doc_id">
      <textarea class="form-control" id="message" placeholder="comment here...!!"></textarea>
        <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="savecomment()" class="btn btn-primary">Post Comment</button>
      </div>
    </div>
  </div>
</div>
<!--modal-->
</body>
</html>
	