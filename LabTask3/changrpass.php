<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Password</title>
</head>
<body>

	<form action="" method="POST">
		<fieldset>
			<legend>CHANGE PASSWORD</legend>
			<label>Current Password:</label>
			<input type="password" name="CurrentPassword"><br><br>
			<label>New Password:</label>
			<input type="password" name="NewPassword"><br><br>

             <label>Retype New Password:</label>
			<input type="password" name="RetypeNewPassword"><br><br>
			<hr>
			<input type="submit" value="Submit">







		</fieldset>






	</form>


	<?php
         



     if ($_POST['newpass'] != $_POST['retypepass']){
               $warning="Password doesn't match!";
         }
       else $warning='';
         ?>



   ?>

</body>
</html>