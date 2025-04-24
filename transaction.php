<?php
    $url = "https://dummyjson.com/carts";
    $response = json_decode(file_get_contents($url), true);
    $transactions = $response['carts'];
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body class="container">
        <h1 class="text-center">Transactions</h1>
        <?php foreach($transactions as $transaction): ?>
        <h4>Transaction ID: <?php echo $transaction['id']?></h4>
        <table class="table">
            <tr>
                <th>Product ID</th>
                <th>User ID</th>
                <th>Quantity</th>
                <th>Amount</th>
            </tr>
            <?php foreach($transaction['products'] as $product): ?>
            <tr>
                <td><?php echo $product['id']?></td>
                <td><?php echo $transaction['userId']?></td>
                <td><?php echo $product['quantity']?></td>
                <td><?php echo $product['price'] * $product['quantity']?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <?php endforeach; ?>
    </body>
</html>

