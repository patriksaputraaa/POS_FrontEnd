<?php
    $url_product = "https://localhost:7116/api/product";
    $url_category = "https://localhost:7116/api/category";
    $context = stream_context_create([
        "ssl" => [
            "verify_peer" => false,
            "verify_peer_name" => false,
        ]
    ]);

    $products = json_decode(file_get_contents($url_product, false, $context), true);
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
                <th>Category</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
            <?php foreach($products as $product): 
                 $category = json_decode(file_get_contents($url_category . "/" . $product['categoryId'], false, $context), true); ?>
            <tr>
                <td><?php echo $product['id']?></td>
                <td><?php echo $category['name']?></td>
                <td><?php echo $product['name']?></td>
                <td><?php echo $product['description']?></td>
                <td><?php echo $product['price']?></td>
                <td><?php echo $product['stock']?></td>
                <td>
                    <a href="update_product.php?id=<?php echo $product['id']?>" class="btn btn-secondary">Update</a>
                    <a href="delete_product.php?id=<?php echo $product['id']?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>

