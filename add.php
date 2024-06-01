<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <?php
  
    // Include the database connection file
    require_once "dbconnection.php";

    // Retrieve form data
    $category = $_POST['category'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $descript = $_POST['descript'];
    $quantity= $_POST['quantity'];
    
    if (!is_numeric($quantity) || !is_numeric($price)) {
        $quantity_error = "Please enter a valid quantity or price.";
        // Display error message and redirect back to the form page
        echo '<script>
                swal("Quantity or Price Error", "'.$quantity_error.'", "error").then(function() {
                    window.location = "http://localhost/Finalproject/FurniFlex/AdminHome.php";
                });
              </script>';
        exit(); // Stop further execution
    }
    // File upload handling
    // Assuming 'Furniimage' is the name of your file input field
    $Furniimage = $_FILES['Furniimage']['name'];
    $tempFile = $_FILES['Furniimage']['tmp_name']; // Temporary file path

    // Specify the directory where you want to move the uploaded file
    $targetDirectory = 'uploads/';

    // Create the directory if it doesn't exist
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    $targetFile = $targetDirectory . basename($Furniimage);

    function generateUserID($conn) {
        // Query the database for the highest existing ID
        $query = "SELECT MAX(PID) AS max_id FROM product";
        $result = $conn->query($query);
    
        // Check if the query was successful
        if ($result) {
            $row = $result->fetch_assoc();
            // Extract the highest existing ID and increment it
            $max_id = $row['max_id'];
            $max_id = (int) substr($max_id, 3); // Remove the "CID" prefix and convert to integer
            $new_id = $max_id + 1;
        } else {
            // If the query fails, fallback to a default ID
            $new_id = 1;
        }
    
        // Format the new ID with the prefix "CID" and leading zeros
        $formatted_id = sprintf("PID%02d", $new_id);
        return $formatted_id;
    }
    
    // Generate a new user ID
    $pid = generateUserID($conn);
    // Move the uploaded file to the target directory
    if (move_uploaded_file($tempFile, $targetFile)) {
        // If file move is successful, proceed with database insertion
        $stmt = $conn->prepare("INSERT INTO product(PID,category, productname, price, descript, Furniimage, quantity) VALUES (?,?, ?, ?, ?, ?, ?)");
        
        // Bind parameters
        $stmt->bind_param("ssssssi", $pid, $category, $productname, $price, $descript, $Furniimage, $quantity);

        if ($stmt->execute()) {
            // If the form submission is successful, echo JavaScript code to show SweetAlert success message and redirect to the "Add Product" page
            echo '<script>
                swal("Successfully Product added!", "", "success").then(function() {
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
