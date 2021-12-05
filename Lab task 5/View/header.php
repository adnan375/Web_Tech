<?php
	include_once "../Controller/header-check.php"
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>header</title>
</head>
<body>
	<div style="width: 100% ; background-color:#FFFFFF;">
		<div style="color:gray;"  align="center" >
	<h1 style="color:#332A5D;">Restaurent Management System</h1> <hr></div>
	<fieldset>
	<div style="padding-left: 12px;  margin: 2px;"> 
	<a href="Home.php">Home</a>
	<!--<a href="Sales.php">Sales</a> --><a href="History.php">History</a>
	<a href="profile.php">Profile</a>


</div>
	<div align="right" style="padding-bottom:  15px;">
<input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
  </div>
  <div align="right">
  Welcome <?php echo $_SESSION['name']?><a href="logout.php">|Log-out</a></div>
  </fieldset>
      

	</div>
 
</body>
</html>