<?php
    $url = "https://dummyjson.com/products";
    $response = json_decode(file_get_contents($url), true);
    $products = $response['products'];
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body class="container">
        <h1 class="text-center">Products</h1>
        <a href="new_product.php" class="btn btn-primary">New Product</a>
        <table class="table">
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
                    <a href="update_product.php?id=<?php echo $product['id']?>" class="btn btn-secondary">Update</a>
                    <a href="delete_product.php?id=<?php echo $product['id']?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>

