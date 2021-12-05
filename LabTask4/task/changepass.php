<!DOCTYPE html>
<html lang="en">
<style>
.error {color: #228B22; color: #FF0000;}
</style>
<head>
</head>
<body background="../imagebc/assets/background.jpg">
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
    <div width='100px'>
        <form action='./changepasschk.php' method="POST">
            <fieldset>
                            <style>
     body {
  background-image: url('imagebc.jpg');
  background-repeat: repeat-no;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
                <legend>
                    <b>Change Password</b>
                </legend>
                <table align="center">
                    <tr>
                        <td align="right">Current Password:</td>
                        <td><input type='password' name='current' required/>
                    </tr>
                    <tr>
                        <td align="right"><span style="color: green"> New Password:</span></td>
                        <td><input type='password' name='new' required/></td>
                    </tr>
                    <tr>
                        <td align="right"><span style="color: red;">Retype New Password:</span></td>
                        <td><input type='password' name='cnp' required/></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"><hr></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><input type='submit' value="Confirm"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
    <?php include('./footer.php'); ?>
</body>
</html>