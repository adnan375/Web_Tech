<?php  
require_once '../Controller/productInfo.php';

$product = fetchProduct($_GET['id']);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Cost Value</th>
		<th>Sell Price</th>
		<th>Image</th>
	</tr>
	<tr>
		<td><a href="../View/showProduct.php?id=<?php echo $product['ID'] ?>"><?php echo $product['ID'] ?></a></td>
		<td><?php echo $product['Name'] ?></td>
		<td><?php echo $product['Costing_Value'] ?></td>
		<td><?php echo $product['Sell_Price'] ?></td>
		<td><img width="100px" src="uploads/<?php echo $product['image'] ?>" alt="<?php echo $product['Name'] ?>"></td>
	</tr>

</table>


</body>
</html>