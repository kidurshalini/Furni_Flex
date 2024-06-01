<?php
// Define the directory path where images are stored
$imageDirectory = "uploads/";
require_once "dbconnection.php";
require_once "navbar.php";


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

  <!-- Include SweetAlert library -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
  <title>Shop now</title>
  <style>
    #cart-total {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: darkgray;
      color: white;
      width: 500px;
      height: 80px;
      border-radius: 10px;
      box-sizing: border-box;
      padding: 0 20px;
    }

    .s1 {
      margin: 0;
      text-transform: uppercase;
      font-weight: bold;
    }

    .value-button {
      display: inline-block;
      border: 1px solid #ddd;
      width: 30px;
      height: 30px;
      text-align: center;
      vertical-align: middle;
      background: #eee;
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
      width: 40px;
      height: 40px;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .bg {
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      background-color: #def7ff;
    }
  </style>
</head>
<body class="bg">
<h1 class="text-uppercase font-weight-bold text-dark mt-3 text-center">Cart Details</h1>

<?php
// Define the file path
$file = 'cartdetails.txt';

// Check if the file exists
if (file_exists($file)) {
    // Read the file contents
    $fileContents = file_get_contents($file);

    // Convert JSON data to PHP array
    $detailsArray = explode(PHP_EOL, $fileContents);

    // Remove the last element if it's empty due to PHP_EOL
    if (end($detailsArray) === "") {
        array_pop($detailsArray);
    }

    // Check if remove button is clicked
    if (isset($_POST['remove_button'])) {
        $removeIndex = $_POST['remove_index'];

        // Remove the specific line from the array
        if (isset($detailsArray[$removeIndex])) {
            unset($detailsArray[$removeIndex]);
        }

        // Re-index the array and convert it back to a string
        $newFileContents = implode(PHP_EOL, array_values($detailsArray)) . PHP_EOL;

        // Save the updated contents back to the file
        file_put_contents($file, $newFileContents);

        // Refresh the page to update the table
        echo '<script>
            swal("Removed Successfully!", "", "success").then(function() {
                window.location = "http://localhost/Finalproject/FurniFlex/cart.php";
            });
        </script>';
    }
?>
<div class="untree_co-section before-footer-section">
<div class="container">
  <div class="row mb-5">
    <form class="col-md-12" method="post" action="cartorder.php">
      <div class="site-blocks-table">
        <table class="table mt-5 text-center">
          <thead>
            <tr>
              <th class="product-thumbnail">Image</th>
              <th class="product-name">Product</th>
              <th class="product-price">Price</th>
              <th class="product-quantity">Quantity</th>
              <th class="product-total">Total Price</th>
              <th class="product-remove">Remove</th>
            </tr>
          </thead>
          <tbody>
<?php
$totalCartPrice = 0;
foreach ($detailsArray as $index => $detailJson) {
    // Decode JSON string to PHP associative array
    $detail = json_decode($detailJson, true);

    // Now you can access each detail like $detail['image'], $detail['productName'], etc.
    $productName = $detail['productName'];
    $price = $detail['price'];
    $descript = $detail['descript'];
    $imageFilename = $detail['image'];
    $imagePath = $imageDirectory . $imageFilename; // Constructing full image path

    // Calculate the total price for this product assuming default quantity is 1
    $productTotalPrice = $price;
    $totalCartPrice += $productTotalPrice;
?>
<tr>
  <td class="product-thumbnail">
    <?php echo "<img src='$imagePath' class='card-img-left float-center' style='width:80px; height:80px;' alt='Product Image'>"; ?>
  </td>
  <td class="product-name">
    <?php echo $productName;?>
  </td>
  <td class="price">
    <?php echo $price;?>
  </td>
  <td>
    <div class="value-button" style="width:30px;" onclick="decreaseValue(this)">-</div>
    <input type="number" name="quantity[]" class="quantity text-center" style="width:40px;" value="1" />
    <div class="value-button" style="width:30px;" onclick="increaseValue(this)">+</div>
  </td>
  <td class="total-price">
    <?php echo $price; ?>
  </td>
  <td>
    <form method="post" action="">
      <input type="hidden" name="remove_index" value="<?php echo $index; ?>">
      <button type="submit" name="remove_button" class="text-dark border h-100 d-inline-block bg-light" style="border-radius:10px; width:50px;">X</button>
    </form>
  </td>
  <!-- Hidden inputs to store the values to send to cartorder.php -->
  <input type="hidden" name="productName[]" value="<?php echo $productName; ?>">
  <input type="hidden" name="price[]" value="<?php echo $price; ?>">
  <input type="hidden" name="totalPrice[]" class="hiddenTotalPrice" value="<?php echo $price; ?>">
</tr>

<?php
}
?>
          </tbody>
        </table>
      </div>
      
     <center> 
      <div id="cart-total" style="margin-bottom:100px;">
        <h2 class="s1">Total Product Price: &nbsp; RS<span id="totalCartPrice"><?php echo number_format($totalCartPrice, 2); ?></span></h2>
        <button type="submit" class="btn btn-primary btn-sm" name="buy_button">Order Now</button>
      </div></center>
    </form>
  </div>
</div>

<?php
} else {
    echo "File not found.";
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buy_button'])) {
    $file = "cartdetails.txt";
    file_put_contents($file, "");
    echo '<script>
        swal("Order Confirmed!", "", "success").then(function() {
            window.location = "http://localhost/Finalproject/FurniFlex/cart.php";
        });
    </script>';
}
?>
</div>
</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function increaseValue(element) {
    var input = element.parentNode.querySelector('.quantity');
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    input.value = value;
    updateTotalPrice(element);
}

function decreaseValue(element) {
    var input = element.parentNode.querySelector('.quantity');
    var value = parseInt(input.value, 10);
    value = isNaN(value) ? 0 : value;
    value = value < 2 ? 1 : value - 1; // Prevent value from going below 1
    input.value = value;
    updateTotalPrice(element);
}

function updateTotalPrice(element) {
    var row = element.closest('tr');
    var input = row.querySelector('.quantity');
    var value = parseInt(input.value, 10);
    var price = parseFloat(row.querySelector('.price').innerText);
    var totalPriceElement = row.querySelector('.total-price');
    var hiddenTotalPriceInput = row.querySelector('.hiddenTotalPrice');
    var newTotalPrice = (value * price).toFixed(2);
    totalPriceElement.innerText = newTotalPrice;
    hiddenTotalPriceInput.value = newTotalPrice; // Update hidden input value
    updateCartTotal();
}

function updateCartTotal() {
    var rows = document.querySelectorAll('tbody tr');
    var total = 0;
    rows.forEach(function(row) {
        var totalPriceElement = row.querySelector('.total-price');
        var totalPrice = parseFloat(totalPriceElement.innerText);
        total += totalPrice;
    });
    document.getElementById('totalCartPrice').innerText = total.toFixed(2);
}
</script>
</body>
</html>
