<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Cloudset | Blog</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/droid_sans_400-droid_sans_700.font.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>

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
       background:#c7cb32;
       box-shadow:2px 2px 2px black
      
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
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="index.html">Cloud<span>set</span> <small>Company Slogan Here</small></a></h1>
      </div>
      <div class="searchform">
        <form id="formsearch" name="formsearch" method="post" action="#">
          <span>
          <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our ste:" type="text" />
          </span>
          <input name="button_search" src="images/search.gif" class="button_search" type="image" />
        </form>
      </div>
      <div class="clr"></div>
      <div class="menu_nav">
        <ul>
          <li><a href="index.html"><span>Home Page</span></a></li>
          <li><a href="support.html"><span>Support</span></a></li>
          <li><a href="about.html"><span>About Us</span></a></li>
          <li class="active"><a href="blog.html"><span>Blog</span></a></li>
          <li><a href="contact.html"><span>Contact Us</span></a></li>
        </ul>
      </div>
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider"> <a href="#"><img src="images/slide1.jpg" width="960" height="335" alt="" /> </a> <a href="#"><img src="images/slide2.jpg" width="960" height="335" alt="" /> </a> <a href="#"><img src="images/slide3.jpg" width="960" height="335" alt="" /> </a> </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>

  <!-- start of doc.-->
  <div class="footer ">
    <div class="footer_resize ">
    <h3 style="text-align:center;color:black;;font-size:40px;">ALL DOCUMENTS</h3>

    <?php
    $con=mysqli_connect("localhost","root","","majorproject");
    $sql="select registration.*,studydocument.* from registration,studydocument where registration.email=studydocument.userid";
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
      <div style="clear:both;"></div>
    </div>
  </div>

  <!-- end of doucument-->
  
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image</span> Gallery</h2>
        <a href="#"><img src="images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> </div>
      <div class="col c2">
        <h2><span>Services</span> Overview</h2>
        <p>Curabitur sed urna id nunc pulvinar semper. Nunc sit amet tortor sit amet lacus sagittis posuere cursus vitae nunc.Etiam venenatis, turpis at eleifend porta, nisl nulla bibendum justo.</p>
        <ul class="fbg_ul">
          <li><a href="#">Lorem ipsum dolor labore et dolore.</a></li>
          <li><a href="#">Excepteur officia deserunt.</a></li>
          <li><a href="#">Integer tellus ipsum tempor sed.</a></li>
        </ul>
      </div>
      <div class="col c3">
        <h2><span>Contact</span> Us</h2>
        <p>Nullam quam lorem, tristique non vestibulum nec, consectetur in risus. Aliquam a quam vel leo gravida gravida eu porttitor dui.</p>
        <p class="contact_info"> <span>Address:</span> 1458 TemplateAccess, USA<br />
          <span>Telephone:</span> +123-1234-5678<br />
          <span>FAX:</span> +458-4578<br />
          <span>Others:</span> +301 - 0125 - 01258<br />
          <span>E-mail:</span> <a href="#">mail@yoursitename.com</a> </p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer ">
    <div class="footer_resize bg-dark">
      <p class="lf">Copyright &copy; <a href="#">Domain Name</a>. All Rights Reserved</p>
      <p class="rf">Design by <a target="_blank" href="http://www.dreamtemplate.com/">DreamTemplate</a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>
