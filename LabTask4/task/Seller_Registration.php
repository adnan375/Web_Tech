<?php
$message = '';  
 $error = '';  
 $nameErr = $emailErr = $dobErr = $genderErr = $usernameErr = $passErr = $cpassErr = "";
 $name = $email = $username = $dob = $gender = $password = $cpassword = "";
 if(isset($_POST["submit"]))  
 {  
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } 
  
  if (str_word_count($_POST["name"]) > 2) {
    $nameErr = "Max 2 words only";
  } 
  
  else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-'. ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      $name = "";
    }
}
}

  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $email = "";
    }
  }
       if (empty($_POST["dob"])){
    $dobErr="Date of birth is required";
  }
  else {
    $dobErr = "" ;
    $dob = $_POST["dob"];
  }
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Name is required";
  } 
  
  if (str_word_count($_POST["username"]) > 2) {
    $usernameErr = "Max 2 words only";
  } 
  else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-'. ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed";
      $username = "";
    }
}
}
      if (empty($_POST["password"])) {
     $passErr = "Password is required";
    }else {
     $password = $_POST["password"];
     $count = strlen("$password");
}
     if ((!preg_match("([@#$%])",$password)) || $count < 8 ) {
          $passErr = "Password must not be less than eight characters and  must contain at least one of the special characters (@, #, $, %) ";
     }
      if (empty($_POST["cpassword"])) {
     $cpassErr = "Password is required";
    }else {
     $cpassword = $_POST["cpassword"];
     $count = strlen("$cpassword");
     if ((!preg_match("([@#$%])",$cpassword)) || $count < 8 ) {
          $cpassErr = "Password must not be less than eight characters and  must contain at least one of the special characters (@, #, $, %) ";
     }
     if (empty($_POST["gender"])) {
    $genderErr = "gender is required";
  }

     else  
     {

     $pass = $cpass = ""; 
     if(isset($_POST['password'])&&isset($_POST['cpassword'])) 
     {
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];
       
 
 if($pass == $cpass) 
        {
          if(file_exists('./data.json'))  
          {  
                $current_data = file_get_contents('./data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(    
                           'name'          =>     $_POST["name"],  
                     'email'     =>     $_POST["email"],     
                     'username'     =>     $_POST["username"],  
                     'password'     =>     $_POST["password"],  
                     'gender'     =>     $_POST["gender"],
                     'dob'     =>     $_POST["dob"]  
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('./data.json', $final_data))  
                {  
                    $message = "File Appended Successfully in data.json"."<br>";                  
                }  
          } 
          else  
          {  
                $error = 'JSON File does not exist';  
          }  
        }
        else
        {
          $error = "Passwords did not match";          
        }
    }
            
          
     }  
 }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 

     if(isset($message))  
     {  
     echo $message;  
     }
     if(isset($error))  
     {  
          echo $error;  
     } 
     if(isset($message_1))
     {
          echo $message_1;
     }   
     ?>   
<!DOCTYPE html>
<html lang="en">
<style>
.error {color: #FF0000;}
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add users</title>
</head>
<body>
     <?php include('./header.php'); ?>
    
    <fieldset>
    <table align="right">
    <tr>
        <td>
            <nav>
                <a href="./homepage.php">Home</a> ||
                <a href="./login.php">Log in</a> ||
                <a href="./Seller_Registration.php">Registration</a>
            </nav>
        </td>
    </tr>        
    </table>
    </fieldset>
        <style>
     body {
  background-image: url('imagebc.jpg');
  background-repeat: repeat-no;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>

    <div width='100px'>
            <p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
            <fieldset>
                <legend>
                    <b>REGISTRATION</b>
                </legend>
                <table align="left">
                    <tr>
                        <td align="right">Name:</td>
                        <td><input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br></td>
                    </tr>
                    <tr>
                        <td align="right">Email:</td>
                        <td>  <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br></td>
                    </tr>
                    <tr>
                        <td align="right">User Name:</td>
                        <td><input type="text" name="username" value="<?php echo $username;?>">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br></td>
                    </tr>
                    <tr>
                        <td align="right">Password:</td>
                        <td><input type="password" name="password" value="<?php echo $password;?>">
          <span class="error"><?php echo $passErr;?></span><hr></td>
                    </tr>
                    <tr>
                        <td align="right">Confirm Password:</td>
                        <td><input type="password" name="cpassword" value="<?php echo $cpassword;?>">
          <span class="error"><?php echo $cpassErr;?></span><hr></td>
                    </tr>

                    <tr>
                        <td align="right">Gender:</td>
                        <td>
                        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
                        </td>
                    </tr>

                    <tr>
                        <td align="right">Date of Birth:</td>
                        <td><input type="date" name="dob">
  <span class="error">* <?php echo $dobErr;?></span>
  <br><br></td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><input type='submit' name = 'submit' value="Confirm Registration"></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><input type='reset' value="Reset"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
     <?php include('./footer.php'); ?>

</body>
</html> 

 