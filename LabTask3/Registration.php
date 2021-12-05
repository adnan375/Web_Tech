<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>REGISTRATION</title>
</head>
<body>




	 <?php
        // define variables and set to empty values
        $passErr= $confirmPassErr= $UserError= $nameErr = $dobErr = $emailErr = $genderErr = $websiteErr = $bgErr= $degErr="";
        $confirmPass= $password=$username= $name = $email = $gender = $comment = $website = $dob = $bg= $deg[0]= $deg[1]= $deg[2]= $deg[3]="";
        $checkValid = 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
          if (!empty($_POST["name"])) 
          {
              $nametest = test_input($_POST["name"]);
              $checkValid = 0;

              if (str_word_count($_POST["name"]) > 2) 
              {
                  $checkValid = 0;
                  $nameErr = "Max 2 words only";
              } 
                // check if name only contains letters and whitespace
              else if (!preg_match("/^[a-zA-Z-'. ]*$/",$name)) 
                {
                    $checkValid = 0;
                    $nameErr = "Only letters and white space allowed";
                }
              else
              {
                $name=$nametest;
                $checkValid=1;

              }
          }

          else if (empty($_POST['name']))
          {
            $checkValid = 0;
              $nameErr = "Name is required";
          }

          // email validation

          else if (empty($_POST["email"])) {
            $checkValid = 0;
              $emailErr = "Email is required";

          } else {
              $emailtest = test_input($_POST["email"]);
              // check if e-mail address is well-formed
              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
              {
                $checkValid = 0;
                $emailErr = "Invalid email format";
                $email = "";
              }
              else
              {
                $email=$emailtest;
                $checkValid = 1;
              }
          }

          //gender validation

          if (empty($_POST["gender"])) {
            $checkValid = 0;
              $genderErr = "Gender is required";
          } else {
              $gender = test_input($_POST["gender"]);
              $checkValid = 1;
          }

          //dob validation

         if (empty($_POST["dob"])){
              $dobErr="Date of birth is required";
              $checkValid = 0;
          }
          else {
              $dobErr = "" ;
              $dob = $_POST["dob"];
              $checkValid = 1;
          }

            // password validation
         if (empty($_POST['password'])){
              $passErr="Input password";
              $checkValid = 0;
          }
          else 
          {
            $checkValid = 1;
          }

          //confirm pass validation

          if (empty($_POST['confirmPass'])){
              $confirmPassErr="Input confirm password again";
              $checkValid = 0;
          } else $checkValid = 1;

          //password validation
          if (strlen($_POST['password'])<8)
          {
              $passErr="Password must not be less than eight (8) characters";
              $checkValid = 0;
          }
          else if (!preg_match("/.*[@#$%]/",$_POST['password']))
          {
              $passErr="Password must contain at least one of the special characters (@, #, $,
              %)";
              $checkValid = 0;
          }

          if ($_POST['password']!=$_POST['confirmPass'])
          {
            $confirmPassErr="Both password must be matched.";
            $checkValid = 0;
          }
          else {
            $checkValid = 1;
            $password=$_POST['password'];
          }

          if (empty($_POST['username']))
          {
            $userError="Username is required.";
            $checkValid = 0;
          }

            if(strlen($_POST['username'])<2)
            {
                $userError="Username can not be less than 2 characters!";
                $checkValid = 0;
            }
            else if (!preg_match('/[0-9A-Za-z_.-]$/',$username))
            {
                $userError = "User Name can only contain alpha numeric characters, period, dash or 
                underscore only";
                $checkValid = 0;
            }
            else 
            {
              $checkValid = 1;
                $userError="";
                $username = $_POST['username'];
            }

        }

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
        ?>

	<form>
		<fieldset>
			<legend>REGISTRATION</legend>
			<label>Name:</label>
			<input type="text" name="Name">
			<hr>
			<label>Email:</label>
			<input type="text" name="Email">
			<hr>
			<label>User Name:</label>
			<input type="text" name="UserName">
			<hr>
			<label>Password:</label>
			<input type="Password" name="Password">
			<hr>
			<label>Confirm Password:</label>
			<input type="Password" name="ConfirmPassword">
			<hr>



			<fieldset>
         	<legend>Gender</legend>
         	<input type="checkbox">Male
         	<input type="checkbox">Female
         	<input type="checkbox">Other

         </fieldset>
         <fieldset>
         	<legend>Date of Birth</legend>
         	<input type="Date" name="dateofbirth">mm/dd/yyyy

         </fieldset>
         <br>

         <input type="submit" value="Submit">
         <input type="reset" value="Reset">

         </fieldset>
         



	</form>

</body>
</html>