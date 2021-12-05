<?php 

	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }


    $message = '';  
    $error = '';  
	$nameErr = $cost_valueErr = $selling_priceErr  = "";
	$p_name = $cost_value = $selling_price = "";

	if(isset($_POST['submit']))
	{
		if(empty($_POST['name']))
		{
			$nameErr="Name Required";
		}
		else
			{ 
				if($p_name == $_POST['pname'])
				{
					$nameErr="Product Name Should be Unique";
					$name=htmlspecialchars($_POST['pname']);
				}
				else
				{
					$name=htmlspecialchars($_POST['pname']);
					$_SESSION['pname']=$name;
				}
			
		}
		if(empty($_POST['cost_value']))
		{
			$buying_priceErr="cost_value Required";
		}
		else
		{
			if(! preg_match("/^[0-9]*$/", $_POST['cost_value']))
			{
				$buying_priceErr="Input Only Integer Value";
				$buying_price=htmlspecialchars($_POST['cost_value']);
			}
			else
			{
				$buying_price=htmlspecialchars($_POST['cost_value']);
				$_SESSION['cost_value']=$cost_value;
			}			
		}
		if(empty($_POST['selling_price']))
		{
			$selling_priceErr="Selling Price Required";
		}
		else
		{
			if(! preg_match("/^[0-9]*$/", $_POST['selling_price']))
			{
				$selling_priceErr="Input Only Integer Value";
				$selling_price=htmlspecialchars($_POST['selling_price']);
			}
			else
			{
				$selling_price=htmlspecialchars($_POST['selling_price']);
				$_SESSION['selling_price']=$selling_price;
			}		
			
		}


	}

	     $buy = $sell = ""; 
     if(isset($_POST['cost_value'])&&isset($_POST['selling_price'])) 
     {
        $cost = $_POST['cost_value'];
        $sell = $_POST['selling_price'];
        if($cost <= $sell) 
        {

 if(file_exists('./food.json'))  
          {  
                $current_data = file_get_contents('./food.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(    
                        'p_name'          =>     $_POST["pname"],  
  						'cost_value'     =>     $_POST["cost_value"],  
  						'selling_price'     =>     $_POST["selling_price"]
  						); 

                    
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('./food.json', $final_data))  
                {  
                    $message = "File Appended Successfully in food.json"."<br>";                  
                }  
          } 
          else  
          {  
                $error = 'JSON File does not exist';  
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
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Product</title>
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
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		<fieldset> 

			 <td width='70%'>
			<legend style="font-weight: bold;font-size: 18px">ADD Menu</legend>
			<table align="center">
				<tr>
					<td align="center"> Menu Name </td>
					<td> : </td>
					<td> <input type="text" name="pname" value="<?php echo $p_name;?>"> <br><span style="color:red"><?php echo $nameErr;?></span> </td>
				</tr>

				<tr>
					<td align="center"> Cost Value </td>
					<td> : </td>
					<td> <input type="text" name="cost_value" value="<?php echo $cost_value;?>"> <br><span style="color:red"><?php echo $cost_valueErr;?></span> </td>
				</tr>

				<tr>
					<td align="center"> Selling Price </td>
					<td> : </td>
					<td> <input type="text" name="selling_price" value="<?php echo $selling_price;?>"> <br><span style="color:red"><?php echo $selling_priceErr;?></span> </td>
				</tr>

				</table>
				<tr>
                        <td colspan="2"><hr></td>
                    </tr>
			
			<tr>
			<td algin="center" colspan="2"><input type ="checkbox"name="display"> Display </input><br></td>
			<hr>
		</tr>
			<tr>
			<td algin="center" colspan="2"><input type="submit" name="submit" value="SAVE"></td>
		</tr>


		</fieldset>
		<style>
     body {
  background-image: url('imagebc.jpg');
  background-repeat: repeat-no;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
	</form>
	 <?php include('./footer.php'); ?>
</body>
</html>
