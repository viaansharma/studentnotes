<?php
$did=$_POST['did'];
$msg=$_POST['msg'];
$email=$_POST['uid'];
$con=mysqli_connect("localhost","root","","majorproject");
$sql="INSERT INTO `comment`(`uid`,`did`, `msg`, `cdate`) VALUES ('$email',$did,'$msg',curdate());";
//echo $sql;
mysqli_query($con,$sql);
echo "Thanks for your feedback Sir";
?>