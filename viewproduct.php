
<?php
require_once "dbconnection.php";
$query = "SELECT * FROM product";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Furni Flex</title>
    <link rel="stylesheet" type="text/css" href="css/adminstyle.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

</head>

<body>
    

    <table class="table table-bordered text-center b1" style=margin-top:100px; id="productTable">
        <tr class="bg-dark text-white">
            <td>PID</td>
            <td>Category</td>
            <td>Product Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Description</td>
            <td>Image</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $row['PID']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['productname']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['descript']; ?></td>
                <td><img src="uploads/<?php echo $row['Furniimage']; ?>" width="100"></td>
                <td> <a href='update.php?PID=<?php echo $row['PID']; ?>' class="btn btn-secondary">Edit</a></td>
                <td> <a href='delete.php?PID=<?php echo $row['PID']; ?>' class="btn btn-danger">Delete</a></td>

            </tr>
        <?php
        }
        ?>
    </table>
    <div class="text-center">
    <div class="text-center">
    <form action="delete.php" method="post">
        <input type="hidden" name="delete_all" value="true">
        <button type="submit" class="btn btn-danger">Delete All</button>
    </form>
</div>

</div>
</body>

</html>
