<?php
$did=$_POST['did'];
$con=mysqli_connect("localhost","root","","majorproject");
$sql="select r.name,r.college,r.picname,c.msg,c.cdate from registration r,comment c where c.uid=r.email and c.did=$did order by c.cid desc";
$data=mysqli_query($con,$sql);
$record="";
while ($row=mysqli_fetch_array($data)) 
{
 
    $record=$record."<div class='row'>
    <div class='col-sm-1'><img src='photo/$row[2]' 
    height='40px; width=40px; border-radius:50%'/></div>
    <div class='col-sm-1'></div>
    <div class='col-sm-10'>
    <samp style='font-size:15px; color:black;'>$row[0]</samp><br>
    <samp style='font-size:12px; color:lightgrey;'>$row[1]</samp><br>
    <samp style='font-size:12px; color:black;'>$row[3]</samp><br>
    </div>
    </div><hr>";
}
echo $record;
?>