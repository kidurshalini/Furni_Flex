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

    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
<?php

// Include the database connection file
require_once "dbconnection.php";

$PID = $_GET['PID'];
$sql = "SELECT * FROM product WHERE PID='$PID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$productname = $row['productname'];
$price = $row['price'];
$descript = $row['descript'];
$quantity = $row['quantity'];
$Furniimage = $row['Furniimage'];

if (isset($_POST['submit'])) {
    // Retrieve form data
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $descript = $_POST['descript'];
    $quantity = $_POST['quantity'];

    // File upload handling
    if (!empty($_FILES['Furniimage']['name'])) {
        $Furniimage = $_FILES['Furniimage']['name'];
        $tempFile = $_FILES['Furniimage']['tmp_name']; // Temporary file path
        $targetDirectory = 'uploads/';

        // Create the directory if it doesn't exist
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

        $targetFile = $targetDirectory . basename($Furniimage);

        if (move_uploaded_file($tempFile, $targetFile)) {
            // File moved successfully, update product information
            $sql = "UPDATE product SET productname='$productname', price='$price', descript='$descript', quantity='$quantity', Furniimage='$Furniimage' WHERE PID='$PID'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>
                          swal("Successfully updated!", "", "success").then(function() {
                              window.location = "http://localhost/Finalproject/FurniFlex/AdminHome.php";
                          });
                        </script>';
            } else {
                echo '<script>
                          swal("Error updating product", "", "error");
                        </script>';
            }
        } else {
            // File move failed
            echo '<script>
                      swal("Error uploading file", "", "error");
                    </script>';
        }
    } else {
        // If no new file uploaded, update product information without updating the image
        $sql = "UPDATE product SET productname='$productname', price='$price', descript='$descript', quantity='$quantity' ,Furniimage='$Furniimage' WHERE PID='$PID'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script>
                      swal("Successfully updated!", "", "success").then(function() {
                          window.location = "http://localhost/Finalproject/FurniFlex/AdminHome.php";
                      });
                    </script>';
        } else {
            echo '<script>
                      swal("Error updating product", "", "error");
                    </script>';
        }
    }

    // Close connection
    $conn->close();
}
?>

 <!-- Add Product Form (Hidden by default) -->
 
    <h3 class="s1">Add Your funitures to your website</h3>
    <form id="addProductFormInner" class="form-border needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
        <div class="form-floating">
            <label for="floatingSelectGrid">Category of furniture items</label>
            <select class="form-select" id="floatingSelectGrid" name="category" required>
              <option value="" disabled selected>Select a category</option>
              <option value="LivingRoom">Living Room</option>
              <option value="BedRoom">Bedroom</option>
              <option value="Kitchen">Kitchen</option>
            </select>
            <div class="invalid-feedback">Please select a category.</div>
          </div>
        <div class="input-group has-validation mb-4">
            <div class="form-floating is-invalid">
              <label for="floatingInputGroup2">Product Name</label>
              <input type="text" class="form-control " id="floatingInputInvalid" value="<?php echo $productname;?>" name="productname" required>
              <div class="invalid-feedback">Please enter a product name.</div>
            </div>
           
          </div>
          <div class="input-group has-validation mb-4">
            <div class="form-floating is-invalid">
                <label for="floatingInputGroup2">Price</label>
              <input type="text" class="form-control" id="floatingInputGroup2" name="price" value="<?php echo $price;?>" required>
              <div class="invalid-feedback">Please enter a product price.</div>
            
            </div>
          </div>
          <div class="form-floating mb-4">
            <label for="floatingTextarea2">Description</label>
            <textarea class="form-control area"  id="floatingTextarea2" name="descript" required><?php echo $descript;?></textarea>
            <div class="invalid-feedback">Please input any description about product.</div>
          </div>
          
          <div class="input-group has-validation mb-4">
            <div class="form-floating is-invalid">
                <label for="floatingInputGroup2">Quantity</label>
              <input type="text" class="form-control" id="floatingInputGroup2" name="quantity" value="<?php echo $quantity;?>" required>
              <div class="invalid-feedback">Please enter a Quantity.</div>
            
            </div>
          </div>
          <div class="input-group has-validation mb-4">
            <div class="form-floating is-invalid">
                <label for="floatingInputGroup2">Upload your furniture photos</label>
                <input type="file" class="form-control" id="formFileMultiple" name="Furniimage" multiple required>
                <div class="invalid-feedback">Please input the image.</div>
            </div>
     
          </div>
          <div>
            <center>
              <button type="submit" class="btn btn-secondary b1" name="submit">Update</button>
        
              <button type="submit" class="btn btn-danger b1" onclick="clearTextbox()">Clear</button>
            </center>

          </div>
    </form>
</div>
<script>
  
    function clearTextbox() {
       document.getElementById('floatingSelectGrid').value = ''; 
       document.getElementById('floatingInputInvalid').value = '';
       document.getElementById('floatingInputGroup2').value = '';
       document.getElementById('floatingTextarea2').value = '';
       document.getElementById('formFileMultiple').value = '';
      
    }
    
      </script>

    </body>
    
    </html>

