<?php  
require_once '../Controller/productInfo.php';

$products = fetchAllProducts();




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <?php 
    include_once ('./header.php');
    include_once ('../Model/model.php');
?>
</head>
<body>
<div>
 	   <h3 style="color: red;" align="center">Products</h3>
 </div>


<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Cost Value</th>
            <th>Sell Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $i => $product): ?>
            <tr>
                <td><a href="showProduct.php?id=<?php echo $product['ID'] ?>"><?php echo $product['ID'] ?></a></td>
                <td><?php echo $product['Name'] ?></td>
                <td><?php echo $product['Costing_Value'] ?></td>
                <td><?php echo $product['Sell_Price'] ?></td>
                <td><img width="100px" src="../Uploads/<?php echo $product['image'] ?>" alt="<?php echo $product['Name'] ?>"></td>
                <td><a href="editProduct.php?id=<?php echo $product['ID'] ?>">Edit</a>&nbsp<a href="../Controller/deleteProduct.php?id=<?php echo $product['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        

    </tbody>
    

</table>

</body>
</html>


<?php 
    include ('./footer.php');
?>