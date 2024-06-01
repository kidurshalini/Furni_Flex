<!DOCTYPE html>
<html>
<head>
    <title>Cuztomized</title>
    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <?php
    // Include the database connection file
    require_once "dbconnection.php";

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];

    // File upload handling
    // Assuming 'Furniimage' is the name of your file input field
    $Furniimage = $_FILES['Furniimage']['name'];
    $tempFile = $_FILES['Furniimage']['tmp_name']; // Temporary file path

    // Specify the directory where you want to move the uploaded file
    $targetDirectory = 'customized/';

    // Create the directory if it doesn't exist
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    $targetFile = $targetDirectory . basename($Furniimage);

    if (move_uploaded_file($tempFile, $targetFile)) {
        // If file move is successful, proceed with database insertion
        $stmt = $conn->prepare("INSERT INTO cuztomize ( name, email, phonenumber, quantity, photo, description) VALUES (?, ?, ?, ?, ?, ?)");
        
        // Bind parameters
        $stmt->bind_param("ssisss",$name, $email, $phonenumber, $quantity, $targetFile, $description);

        if ($stmt->execute()) {
            // If the form submission is successful, echo JavaScript code to show SweetAlert success message and redirect to the "Add Product" page
            echo '<script>
                swal("Successfully added product!", "", "success").then(function() {
                    window.location = "http://localhost/Finalproject/FurniFlex/AdminHome.php";
                });
              </script>';
        } else {
            // If there's an error, show SweetAlert error message and redirect to the "Add Product" page
            echo '<script>
                swal("Product not added", "", "error").then(function() {
                    window.location = "http://localhost/Finalproject/FurniFlex/AdminHome.php";
                });
              </script>';
        }

        // Close statement and connection
        $stmt->close();
    } else {
        // If file move fails, show SweetAlert error message
        echo '<script>
            swal("Error uploading file", "", "error").then(function() {
                window.location = "http://localhost/Finalproject/FurniFlex/AdminHome.php";
            });
          </script>';
    }

    $conn->close();
    ?>
</body>
</html>
