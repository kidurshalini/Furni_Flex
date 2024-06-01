<?php
// Define the directory path where images are stored
$imageDirectory = "uploads/";
require_once "dbconnection.php";
// Fetch product data from the database
$query = "SELECT * FROM product";
$result = mysqli_query($conn, $query);

$productQuantities = [];
while ($row = mysqli_fetch_assoc($result)) {
    $productQuantities[$row['PID']] = $row['quantity'];
}
?>



<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap1.min.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style1.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Shop now</title>
<style>
      *{
         font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
       
      }


       .description{
         color: black; 
         font-size: 15px;
         text-transform: capitalize;
       }
       .description1{
         color: black; 
         font-size: 20px;
         text-transform: capitalize;
         margin-bottom:1px;
       }


       .product{
         color: black; 
         font-size: 40px;
         font-weight:bold;
         margin-top:4px;
         text-transform: capitalize;
       }

       .price{
         color:black; 
         font-size: 20px;
         margin-top:2px
       }

      
       .image1{
         width:300px;
   
       }

    
form{
   margin: left 50px;
}

       .value-button {
  display: inline-block;
  border: 1px solid #ddd;
  width: 30px;
  height: 30px;
  text-align: center;
  vertical-align: middle;
  background: #eee;
  color:black;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.value-button:hover {
  cursor: pointer;
}

form #decrease {
  margin-right: -4px;
  border-radius: 8px 0 0 8px;
}

form #increase {
  margin-left: -4px;
  border-radius: 0 8px 8px 0;
}

form #input-wrap {
  margin: 0px;
  padding: 0px;
}

input#number {
  text-align: center;
  border: none;
  border: 1px solid #ddd;
  margin: 0px;
  width: 30px;
  height: 30px;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
.quantity-form {
  display: flex;
  align-items: center;
}

.input-group {
  display: flex;
  align-items: center;
}
.bg{
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  font-weight: 400;
  line-height: 28px;
  color: #d0f3ff;
  font-size: 14px;
  background-color: #def7ff; }

  .button-container {
    display: flex;
    align-items: center;
}

.button-container button {
    flex: 1;
}

   </style>
   </head>
 
      <?php
require_once "navbar.php";
?>
  <body class="bg">
      <!-- header section start -->
      <div >
      <h1 class="text-uppercase font-weight-bold text-dark mt-5 text-center">Product Details</h1>
    <div class="container ">
    <div class="row">
        <?php
        // Define the file path
        $file = 'details.txt';

        // Check if the file exists
        if (file_exists($file)) {
            // Read the file contents
            $fileContents = file_get_contents($file);

            // Convert JSON data to PHP array
            $detailsArray = explode(PHP_EOL, $fileContents);

            // Remove the last element (empty due to PHP_EOL)
            array_pop($detailsArray);

            // Now $detailsArray contains an array of JSON strings
            // Loop through each JSON string
            foreach ($detailsArray as $detailJson) {
                // Decode JSON string to PHP associative array
                $detail = json_decode($detailJson, true);
                $PID= $detail['PID'];
                $productName = $detail['productName'];
                $price = $detail['price'];
                $descript = $detail['descript'];
                $imageFilename = $detail['image'];
                $imagePath = $imageDirectory . $imageFilename; // Constructing full image path
                ?>
             <div class="container" style="border: 1px solid black;  border-radius:10px; background-color: #fff; padding: 10px;">
    <div class="row">
        <div class="col-lg-6 d-flex justify-content-center align-items-center">
            <div class="card-body">
                <?php echo "<img src='$imagePath' class='card-img-left image1 float-left ' alt='Product Image'>"; ?>
            </div>
        </div>
        <div class="col-lg-6 d-flex justify-content-center align-items-center">
        <div class="card-body">
            <?php
            echo "<h2 class='card-text product' style='font-size:30px'>$productName</h2>";
            echo "<p class='card-text price fw-bold mt-5'>Price: RS $price</p>";
            echo "<p class='card-text description1'>Description</p>";
            echo "<p class='card-text description'>$descript</p>";
            echo " <p class='text-dark' style='font-size:15px'>Cash on delivery</p>";
            ?>
       
                        <div class="card-body">
                        <form method="POST" action="order.php" class="quantity-form" onsubmit="return validateQuantity()">

                                <p class="card-text text-dark">Quantity</p>
                                <div class="input-group">
                                    <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                    <input type="number" id="number" name="quantity" value="1" required />
                                    <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                                </div>
                                <input type="hidden" name="PID" value="<?php echo $PID; ?>"> <!-- Make sure to pass the PID -->
                                <div class="button-container mt-3">
                                    <button type='submit' class='btn btn-primary' style='font-size: 1rem; width:200px; border-radius: 15px;'>Buy Now</button>
                                </div>
                            </form>
                        </div>
                    
          
            </div>
            </div>
</div>
            </div>
   <div>
   <h1 class="text-uppercase font-weight-bold text-dark mt-5 text-center">Similler products </h1>
   <div class="text-capitalize ml-3 mt-3">
    <div class="row row-md-5">
        <?php
        $category=$detail['category'];
        $query1 = "SELECT * FROM product WHERE category='$category' ";
        $result1 = mysqli_query($conn, $query1);
        while ($row = mysqli_fetch_assoc($result1)) {
        ?>
        <div class="col-md-3 mb-4">
            <div class="card border border-dark">
                <div class="image-container" style="height: 220px;"> <!-- Adjusted height -->
                    <img src="uploads/<?php echo $row['Furniimage']; ?>" class="card-img-top img-fluid" alt="Product Image">
                </div>
                <div class="card-body d-flex flex-column ">
                    <h1 class="card-title text-dark card-img-top img-fluid"><b><?php echo $row['productname']; ?></b></h1>
                    <p class="card-text text-dark mt-0" style="font-size:15px;">Price: &nbsp;  LKR<?php echo $row['price']; ?></p>
                    <form action="buydetails.php" method="post" class="d-flex justify-content-between">
              
<button type="submit" class="btn btn-primary btn-sm" name="buy_button">Buy</button>
                        <input type="hidden" name="PID" value="<?php echo $row['PID']; ?>">
                        <input type="hidden" name="image" value="<?php echo $row['Furniimage']; ?>">
                        <input type="hidden" name="productName" value="<?php echo $row['productname']; ?>">
                        <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                        <input type="hidden" name="descript" value="<?php echo $row['descript']; ?>">
                        <input type="hidden" name="category" value="<?php echo $row['category']; ?>">
                        <button type="submit" formaction="cartdetails.php" class="btn btn-secondary-emphasis ml-1 btn-sm">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
        <?php 
        } ?>
    </div>
</div>
<?php
$file = "details.txt";
// Delete the file contents after processing
file_put_contents($file, "");
?>

            <?php
            }}
            ?>
        </div>
    </div>
</div>

    </div>
</div>

      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
	     
      <script>

function validateQuantity() {
    console.log("Validation function called"); // Check if the function is called
    var selectedProductId = <?php echo json_encode($PID); ?>;
    console.log("Selected Product ID: " + selectedProductId); // Check the selected product ID
    var enteredQuantity = parseInt(document.getElementById('number').value, 10);
    console.log("Entered Quantity: " + enteredQuantity); // Check the entered quantity
    var availableQuantity = <?php echo isset($productQuantities[$PID]) ? $productQuantities[$PID] : 0; ?>;
    console.log("Available Quantity: " + availableQuantity); // Check the available quantity
    
    if (enteredQuantity > availableQuantity) {
        alert("Entered quantity exceeds available quantity for this product.");
        return false;
    }
    return true;
}


        function increaseValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('number').value = value;
        }

        function decreaseValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            document.getElementById('number').value = value;
        }
    
</script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        
   </body>
</html>