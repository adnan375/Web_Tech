<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Picture</title>
</head>
<body>
    <?php include('./header.php'); ?>
    <fieldset>
                        <style>
     body {
  background-image: url('imagebc.jpg');
  background-repeat: repeat-no;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>

    <br>
        <nav>
            Logged in as <a href="./profile.php"><?php echo $_SESSION['name']; ?></a> ||
            <a href="./logout.php">Log Out</a>
        </nav>
        <br>
    </fieldset>

    <table border="1px solid black" width='100%'>
        <tr>
            <td border="1px solid black">
                <label>Account</label>
                <br>
                <hr>
                <ul>
                    <li><a href='./dash.php'>Dashboard</a></li>
                    <li><a href='./Seller_profile.php'>View Profile</a></li>
                    <li><a href='./editprofile.php'>Edit Profile</a></li>
                    <li><a href='./changepropic.php'>Change Profile Picture</a></li>
                    <li><a href='./changepass.php'>Change Password</a></li>
                    <li><a href='./add_Menu.php'>Add Menu</a></li>
                    <li><a href='./logout.php'>Logout</a></li>
                </ul>
            </td>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
            <td width='70%'>
            <fieldset>
            <table align="center" border="1px solid black">
            <tr>
                <td rowspan="6" align="left">
                    <img src= '<?php echo "faruk.jpg"; ?>' height = '100'>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <input type="file" name="fileToUpload"  id="fileToUpload">
                </td>
            </tr>
            <tr>
                <td align="left">
                    <input type="submit" name="submit" value="Upload Image">
                </td>
            </tr>

            </table>
            </fieldset>
                
            </td>
        </tr>
    </table>
    </form>
    <?php include('./footer.php'); ?>    
</body>
</html>