<?php
$error = $success =  "";
$uname = $password = "";

    session_start();
    require '../model/connection.php';
    if(empty($_POST['username']) && empty($_POST['password']))
    {
         $error = "Both username and password required";
    }
    else if(isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $login_query = "select * from registration";
        $res = mysqli_query($conn,$login_query);

        while($row = mysqli_fetch_array($res))
        {
            if($row['username'] == $username && $row['password'] == $password)
            {
                $success = "Login successful";
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];                
                $_SESSION['gender'] = $row['gender'];                                
                $_SESSION['dob'] = $row['dob'];                                                
                $_SESSION['username'] = $row['username'];                                                
                $_SESSION['password'] = $row['password'];                
                header('location: ../view/dashboard.php');
                 if(empty($success))
                {
                    $error = "Invalid username/password";
                }
                else
                {
                    $error = "";
                }
            }
            else
            {
                $error = "Invalid Username/Password";
            }
            }
        }

    

        
        if(empty($_POST["remindMe"]))
    {
    setcookie("username","");
    setcookie("password","");
    }
    else
    {
        setcookie ("username",$_POST["username"],time()+ 100);
        setcookie ("password",$_POST["password"],time()+ 100);
    } 
    
?>