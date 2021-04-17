<div class="row" style="background:#2ac1d6;">
	<div class="col-sm-12" id="header1"><span id="text">WELCOME TO STUDENT NOTES-<?php echo $_SESSION['name']?></span></div>
	</div>
	<div class="row" style="padding:5px;background:#e6e9ec;min-height:70px;">
	<div class="col-sm-2" ><a href="dashboard.php"><img src="images/logo.png";style="border-radius:100%"width="100px";height="100px"/></a></div>
	<div class="col-sm-8" >
  <!--nav bar coding -->
	<nav class="navbar navbar-expand-lg navbar-light "id="menu">
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
  aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php"><i class="fa fa-dashboard" >
		</i>&nbsp;Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="alldocuments.php"><i class="fa fa-file" >
		</i>&nbsp;All documents</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="uploaddocument.php"><i class="fa fa-upload" >
		</i>&nbsp;Upload documents</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
		data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-cogs" >
		</i>&nbsp; Setting
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="changepassword.php"><i class="fa fa-key" >
		</i>&nbsp;Change Password</a>
          <a class="dropdown-item" href="myprofile.php"><i class="fa fa-user" >
		</i>&nbsp;My Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="fa fa-question-circle-o" >
		</i>&nbsp;Document Management</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="logout.php"><i class="fa fa-sign-out" >
		</i>&nbsp;logout</a>
      </li>
    </ul>
  </div></div>
	<div class="col-sm-2"><img src="photo/<?php echo $_SESSION['picname']?>" style="border-radius:50%;"height="60px" width="60px"<?php echo $_SESSION['picname']?>
     /></div> 





     
	</div>