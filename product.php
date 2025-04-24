<?php
    $url = "https://dummyjson.com/products";
    $response = json_decode(file_get_contents($url), true);
    $products = $response['products'];
?>
<html>
    <body>
        <a href="new_product.php">New Product</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            <?php foreach($products as $product): ?>
            <tr>
                <td><?php echo $product['id']?></td>
                <td><?php echo $product['title']?></td>
                <td><?php echo $product['price']?></td>
                <td>
                    <a href="update_product.php?id=<?php echo $product['id']?>">Update</a>
                    <a href="delete_product.php?id=<?php echo $product['id']?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
