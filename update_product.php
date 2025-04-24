<?php
    $url = "https://dummyjson.com/products/".$_GET['id'];
    $product = json_decode(file_get_contents($url), true);

    if(isset($_POST['title']) && isset($_POST['price'])){
        $data = array('title' => $_POST['title'], 'price' => $_POST['price']);
        $data_string = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );
        $result = curl_exec($ch);
        header("Location: product.php");
    }
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body class="container">
        <h1 class="text-center">Update Product</h1>
        <form action="" method="post">
            <label for="title">Title</label>
            <input type="text" name="title" value="<?php echo $product['title'] ?>" class="form-control">
            <br>
            <label for="price">Price</label>
            <input type="number" name="price" value="<?php echo $product['price'] ?>" class="form-control">
            <br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </body>
</html>
