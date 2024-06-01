<?php
require_once "cartorderdb.php";

// Check if form is submitted
if(isset($_POST['submited'])) {
    // Generate PDF
    require_once 'sendmail.php';
    exit; // Stop further execution after generating PDF
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buy_button'])) {
    $productNames = $_POST['productName'];
    $prices = $_POST['price'];
    $quantities = $_POST['quantity'];
    $totalPrices = $_POST['totalPrice'];

    // Initialize total amount
    $totalamount = 0;

    foreach ($productNames as $index => $productName) {
        $price = $prices[$index];
        $quantity = $quantities[$index];
        $totalPrice = $totalPrices[$index];
        $totalamount += $totalPrice; // Calculate total amount

        // Displaying each item in the table
      
    }

   

    echo '<script>
        swal("Order Confirmed!", "", "success").then(function() {
            window.location = "http://localhost/Finalproject/FurniFlex/cart.php";
        });
    </script>';
}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900">
    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style3.css">
    <!-- Include SweetAlert library -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<div class="invoice-2 invoice-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner clearfix">
                    <div class="invoice-info clearfix" id="invoice_wrapper">
                        <div class="invoice-headar">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="invoice-logo">
                                        <!-- logo started -->
                                        <div class="logo">
                                            <h1 class="text-uppercase font-weight-bold text-dark">FURNI FLEX</h1>
                                        </div>
                                        <!-- logo ended -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="invoice-id">
                                    <div class="info">
                                        <h1 class="inv-header-1">Invoice</h1>
                                        <p class="mb-0">Order Date and Time: <br><span><?php echo date('d M Y H:i:s'); ?></span></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-center">
                            <div class="table-responsive">
                                <table class="table mt-5 table-striped invoice-table">
                                    <thead class="bg-active">
                                    <tr class="tr">
                                        <th>No.</th>
                                        <th class="pl0 text-start">Item Description</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-end">Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    // Displaying each product details
                                    if (isset($productNames)) {
                                        foreach ($productNames as $index => $productName) {
                                            $price = $prices[$index];
                                            $quantity = $quantities[$index];
                                            $totalPrice = $totalPrices[$index];
                                            echo '<tr class="tr">
                                                <td>
                                                    <div class="item-desc-1">
                                                        <span>' . ($index + 1) . '</span>
                                                    </div>
                                                </td>
                                                <td class="pl0">' . $productName . '</td>
                                                <td class="text-center">' . $price . '</td>
                                                <td class="text-center">' . $quantity . '</td>
                                                <td class="text-end">' . $totalPrice . '</td>
                                            </tr>';
                                        }
                                    }
                                    ?>
                                    <tr class="tr2">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center f-w-600 active-color">Total Amount</td>
                                        <td class="f-w-600 text-end active-color"><?php echo $totalamount; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-bottom">
                            <div class="row">
                                <div class="col-lg-6 col-md-5 col-sm-5">
                                    <div class="payment-method mb-30">
                                        <h3 class="inv-title-1">Payment Method</h3>
                                        <ul class="payment-method-list-1 text-14">
                                            <li><strong>Account No:</strong> 00 123 647 840</li>
                                            <li><strong>Account Name:</strong> Jhon Doe</li>
                                            <li><strong>Branch Name:</strong> xyz</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-7">
                                    <form id="invoiceForm1" method="post">
                                        <div class="invoice-btn-section clearfix d-print-none">
                                            <button type="submit" name="submit" id="invoice_download_btn" class="btn btn-sm btn-download btn-theme text-white">
                                                Click to order
                                            </button>
                                        </div>
                                    </form>
                                    <form id="invoiceForm2" method="post" action="sendmail.php">
                                        <div class="invoice-btn-section clearfix d-print-none" style="display: none;">
                                            <button type="submit" name="submited" id="another_button" class="mt-5 btn btn-lg btn-theme text-white btn-primary">
                                                Confirm Your Order
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/jspdf.min.js"></script>
<script src="js/html2canvas.js"></script>
<script>
$(document).ready(function() {
    $('#invoice_download_btn').click(function(event) {
        event.preventDefault(); // Prevent default form submission
        swal({
                title: "Are you sure?",
                text: "Do you want to confirm your order?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
        // Convert invoice content to PDF
        html2canvas(document.querySelector("#invoice_wrapper")).then(canvas => {
            var imgData = canvas.toDataURL('image/png');
            var doc = new jsPDF('p', 'mm', 'a2');
            doc.addImage(imgData, 'PNG', 0, 0, 420,594);

            // Generate a unique filename for the PDF (timestamp-based)
            var currentDate = new Date();
            var timestamp = currentDate.getTime(); // Unique timestamp
            var filename = 'invoice_' + timestamp + '.pdf';

            // Convert the PDF to a Blob
            var pdfBlob = doc.output('blob');

            // Create FormData object
            var formData = new FormData();
            formData.append('invoice_pdf', pdfBlob, filename);

            // Send the PDF to the server
            $.ajax({
                url: 'save_invoice.php', // Change this to your server script URL
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log('PDF saved successfully:', response);
                    // Show the "Confirm Your Order" button
                    $('#another_button').closest('.invoice-btn-section').show();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error saving PDF:', textStatus, errorThrown);
                }
            });
        });
    });
});
</script>
</body>
</html>
