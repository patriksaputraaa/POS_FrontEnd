<?php
    $url = "https://dummyjson.com/users";
    $response = json_decode(file_get_contents($url), true);
    $customers = $response['users'];
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
                <th>Username</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
            <?php foreach($customers as $customer): ?>
            <tr>
                <td><?php echo $customer['id']?></td>
                <td><?php echo $customer['username']?> <?php echo $customer['lastName']?></td>
                <td><?php echo $customer['email']?></td>
                <td><?php echo $customer['gender']?></td>
                <td>
                    <a href="update_customer.php?id=<?php echo $customer['id']?>" class="btn btn-secondary">Update</a>
                    <a href="delete_customer.php?id=<?php echo $customer['id']?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
