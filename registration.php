<?php
if (isset($_POST['submit'])) {
    $con=mysqli_connect("localhost","root","","majorproject");
    $name=$_POST['name'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $mobno=$_POST['mobno'];
    $email=$_POST['email'];
	$password=$_POST['password'];
	$college=$_POST['college'];
    $course=$_POST['course'];
    $year=$_POST['year'];
	$picname=$_FILES['picname']['name'];
	$pictype=$_FILES['picname']['type'];
	$pictmp=$_FILES['picname']['tmp_name'];
	$picsize=$_FILES['picname']['size'];
if ($picsize>50000 || $pictype=="application/pdf") 
	{
        
        echo "<script>alert('this type of (photo size)file is not allowed here.');window.location.href='registration.php';</script>";
	}
    else
    {
move_uploaded_file($pictmp,"photo/$picname");
    }
$sql="INSERT INTO `registration`(`name`, `dob`, `gender`, `mobno`, `email`, `password`, `college`, `course`, `year`, `picname`, `regdate`) 
VALUES ('$name', '$dob', '$gender',' $mobno', ' $email','$password','$college','$course',' $year','$picname',curdate());";
$res=mysqli_query($con,$sql);
if ($res==true) {
	echo "<script>alert('Succcessful Registered');window.location.href='login.php';</script>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet">
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<link href="css/font-awesome.css" rel="stylesheet">
<style>
    label {
    font-weight: 600;
    color:black;
}
body {
    background: linear-gradient(to right, #b92b27, #1565c0)
}
</style>
    <title>Registration Form </title>
</head>
<body>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <h2 class="text-center" style=" font-size:50px;
       font-family:'monotype corsiva';">Registration Form </h2>
        <div class="row ">
            <div class="col-sm-6 form-group">
                <label for="name"> Name:</label>
                <input type="text" class="form-control" name="name"  placeholder="Enter your name." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="dob">Date Of Birth:</label>
                <input type="date" class="form-control" name="dob"  placeholder="Enter your date of birth." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="gender">Gender:</label>
                <input type="radio" class="form-control" name="gender" value="male" required>Male
                <input type="radio" class="form-control" name="gender" value="female"require>Female
            </div>
            <div class="col-sm-6 form-group">
                <label for="tel">Contact Number:</label>
                <input type="tel" name="mobno" class="form-control"  placeholder="Enter Your contact Number." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Email ID:</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email id." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="password">Password:</label>
                <input type="Password" name="password" class="form-control"  placeholder="Enter your password." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="college">College:</label>
                <input type="text" class="form-control" name="college"  placeholder="Select your college" required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="course">Course:</label>
                <input type="text" class="form-control" name="course" placeholder="Select your course." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="year">Year:</label>
                <input type="text" class="form-control" name="year"  placeholder="Select your year." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="file">Choose Profile Photo:</label>
                <input type="file" class="form-control" name="picname" placeholder="Select your profile picname." required>
            </div>
            <div class="col-sm-2 form-group ">
            </div>
            <div class="col-sm-8 form-group ">
                <input type="submit" class="form-control btn btn-primary " value="Register" name="submit" required>
            </div>
            <div class="col-sm-2 form-group ">
            </div>
            
        </div>
        </form>
    </div>


</body>
</html>