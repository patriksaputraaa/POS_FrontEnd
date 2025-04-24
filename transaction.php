<?php
    $url_sales = "https://localhost:7208/api/sales";

    $context = stream_context_create([
        "ssl" => [
            "verify_peer" => false,
            "verify_peer_name" => false,
        ]
    ]);

    $sales = json_decode(file_get_contents($url_sales, false, $context), true);
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body class="container">
        <h1 class="text-center">Transactions</h1>
        <?php foreach($sales as $sale): 
            $sale_data = json_decode(file_get_contents("https://localhost:7208/api/sales/{$sale['id']}", false, $context), true);?>

        <h4>Transaction ID: <?php echo $sale_data['id']?></h4>
        <h5>Customer ID: <?php echo $sale_data['customerId']?></h5>
        <h5>Customer Name: <?php echo $sale_data['customerName']?></h5>
        <h5>Sale Date: <?php echo date('d-m-Y H:i:s', strtotime($sale_data['saleDate']))?></h5>
        <h5>Total: <?php echo $sale_data['totalAmount']?></h5>

        <table class="table">
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            <?php foreach($sale_data['saleProducts'] as $product): ?>
            <tr>
                <td><?php echo $product['productId']?></td>
                <td><?php echo $product['productName']?></td>
                <td><?php echo $product['quantity']?></td>
                <td><?php echo $product['price']?></td>
                <td><?php echo $product['price'] * $product['quantity']?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <?php endforeach; ?>
    </body>
</html>

