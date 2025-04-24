<?php
    $url = "https://localhost:7184/api/customer";

    $context = stream_context_create([
        "ssl" => [
            "verify_peer" => false,
            "verify_peer_name" => false,
        ]
    ]);

    $customers = json_decode(file_get_contents($url, false, $context), true);
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body class="container">
        <h1 class="text-center">Customers</h1>
        <a href="new_customer.php" class="btn btn-primary">New Customer</a>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
            </tr>
            <?php foreach($customers as $customer): ?>
            <tr>
                <td><?php echo $customer['id']?></td>
                <td><?php echo $customer['name']?>
                <td><?php echo $customer['contactNumber']?></td>
                <td><?php echo $customer['email']?></td>
                <td><?php echo $customer['address']?></td>
                <td>
                    <a href="update_customer.php?id=<?php echo $customer['id']?>" class="btn btn-secondary">Update</a>
                    <a href="delete_customer.php?id=<?php echo $customer['id']?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
