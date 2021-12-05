<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

</head>
<body>
    <?php
  $error = $success =  "";
$username = $password = "";
?>
    <?php include('./header.php'); ?>
    <form action='../controller/logincheck.php' method="POST">
    <fieldset>
    <table align="right">
    <tr>
        <td>
            <nav>
                <a href="./home.php">Home</a> ||
                <a href="./login.php">Log in</a> ||
                <a href="./registration.php">Registration</a>
            </nav>
        </td>
    </tr>        
    </table>
    </fieldset>

    <div width='100px'>
            <fieldset>
                <legend>
                    <b>LOG IN</b>
                </legend>
                <table align="left">
                    <tr>
                        <td align="right">User Name:</td>
                        <td><input name="username" type="text" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"><td>
                    </tr>
                    <tr>
                        <td align="right">Password:</td>
                        <td><input name="password" type="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>
                                                        </tr>
                    <span class="error"><?php echo $error;?></span><span class="success"><?php echo $success;?></span> 
                    <td align="left"><input type="checkbox" name="remember" /> Remember Me</td>
                    </tr>
                    <tr>

                        <td align="left"><input type='submit' value="Submit"></td>
                         <td align="left"><a href="./forgotpass.php">Forgot Password</a></td>
                </table>
            </fieldset>
        </form>
    </div>
    <?php include('./footer.php'); ?>
</body>
</html>
