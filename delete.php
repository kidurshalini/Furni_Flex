<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php   
 include 'dbconnection.php'; 

 if (isset($_GET['PID'])) {  
      $PID = $_GET['PID'];  
      $query = "DELETE FROM product  WHERE PID = '$PID'";  
      $run = mysqli_query($conn,$query);  
      if ($run) {  
        echo '<script>
        swal("Successfully Product Deleted", "", "success").then(function() {
            window.location = "http://localhost/Finalproject/FurniFlex/AdminHome.php";
        });
      </script>';
      }else{  
        echo '<script>
        swal("Product not deleted", "", "error").then(function() {
            window.location = "http://localhost/Finalproject/FurniFlex/AdminHome.php";
        });
      </script>';
      }  
 }  
// Check if the form was submitted and the delete_all parameter is set
if (isset($_POST['delete_all']) && $_POST['delete_all'] === 'true') {
   
    // Assuming your table name is 'your_table_name'
    $sql = "DELETE FROM product";

    if ($conn->query($sql) === TRUE) {
      echo '<script>
        swal("Successfully All Products Deleted", "", "success").then(function() {
            window.location = "http://localhost/Finalproject/FurniFlex/AdminHome.php";
        });
      </script>';
    } else {
      echo '<script>
      swal("Products not Deleted successfully","", "error").then(function() {
          window.location = "http://localhost/Finalproject/FurniFlex/AdminHome.php";
      });
    </script>';
    }

    // Close the database connection
    $conn->close();
}


if (isset($_GET['id'])) {  
  $id = $_GET['id'];  
  $query = "DELETE FROM signin_details WHERE id = '$id'";  
  $run = mysqli_query($conn,$query);  
  if ($run) {  
    echo '<script>
    swal("Successfully Product Deleted", "", "success").then(function() {
        window.location = "http://localhost/Finalproject/FurniFlex/AdminHome.php";
    });
  </script>';
  }else{  
    echo '<script>
    swal("Product not deleted", "", "error").then(function() {
        window.location = "http://localhost/Finalproject/FurniFlex/AdminHome.php";
    });
  </script>';
  }  
}  
?>
</body>
</html>
 