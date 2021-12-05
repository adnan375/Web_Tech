<?php
session_start();

    if(empty($_POST['username']) or empty($_POST['password']))
    {
        echo "One or more of the fields are empty!";
    }
   

    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $dataString = file_get_contents('./data.json');
        $dataJSON = json_decode($dataString, true);
        $userFoundFlag = false;
       /* echo "<pre>";
        print_r($dataJSON);
        echo "</pre>";*/


        foreach($dataJSON as $row)
        {
            if($row['username'] == $username && $row['password'] == $password)
            {
                $_SESSION['flag'] = true;
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];                
                $_SESSION['gender'] = $row['gender'];                                
                $_SESSION['dob'] = $row['dob'];                                                
                $_SESSION['username'] = $row['username'];                                                
                $_SESSION['password'] = $row['password'];                
                $userFoundFlag = true;
                header('location: ./dash.php');
            }

    }




          



      
    }
    if (isset($_POST['username']) && isset($_POST['password'])){

        // code...


    if($username==$_POST['username'] && $password==$_POST['password']){
    if(isset($_POST['remember'])){
        setcookie("username", $username, time()+10);
        setcookie("password", $password, time()+10);
        setcookie("remember", $remember,"1", time()+10);
        echo "Cookies Set Successfuly <br>";
    echo "Welcome ". $_POST["username"];

    }
    else{
        echo "incorrect password";
        // code...
    }

   
    if(isset($_COOKIE['remember'])){
        $username = $_COOKIE['username'];
        $password = $_COOKIE['password'];
        echo "Cookies Not Set. I will forget you !!!!";
    }
}


}



?>
