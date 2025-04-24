<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $url = "https://dummyjson.com/products/$id";
        $response = json_decode(file_get_contents($url), true);
        if($response['message'] == 'Product not found') {
            header("Location: product.php");
            exit;
        }
        if(isset($_POST['confirm'])) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            $response = curl_exec($ch);
            curl_close($ch);
            header("Location: product.php");
            exit;
        }
    }
?>
<html>
    <body class="container">
        <h1 class="text-center">Delete Product</h1>
        <form method="POST">
            <p>Are you sure you want to delete this product?</p>
            <button type="submit" name="confirm" class="btn btn-danger">Delete</button>
            <a href="product.php" class="btn btn-secondary">Cancel</a>
        </form>
    </body>
</html>
