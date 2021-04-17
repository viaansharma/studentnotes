<?php
$did=$_POST['did'];
$email=$_POST['email'];
//echo $did."  ".$email;
$con=mysqli_connect("localhost","root","","majorproject");
$query="insert into likes(uid,doc_id,like_date) values ('$email',$did,curdate())";
mysqli_query($con,$query);
echo "thanks for your like!!";

?>