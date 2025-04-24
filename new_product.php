<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title']) && isset($_POST['price'])) {
        $data = array('title' => $_POST['title'], 'price' => $_POST['price']);
        $data_string = json_encode($data);

        $ch = curl_init('https://dummyjson.com/products');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );

        $response = curl_exec($ch);
        curl_close($ch);

        header("Location: product.php");
        exit;
    }
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body class="container">
        <h1 class="text-center">Add New Product</h1>
        <form action="" method="post">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
            <br>
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </body>
</html>

