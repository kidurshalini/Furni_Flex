<?php
require_once "dbconnection.php";
$query = "SELECT * FROM product WHERE category='Kitchen'";
$result = mysqli_query($conn, $query);
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
		<title>Shop now</title>

		<style>
			
.image-container {
    width: 100%;
    height: 200px; /* Adjust the height as needed */
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
	overflow: hidden;
}

.image-container img {
	width: 100%;
    height: 200px; /* Adjust the height as needed */
    object-fit: contain;
}
.img-fixed-size {
            width: 100px; /* Set the desired width */
            height: 100px; /* Set the desired height */
            object-fit: cover; /* Ensure the image covers the container */
        }

			</style>
	</head>

	<body>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-5">
            <h3 class="display-5 text-uppercase font-weight-bold text-dark mb-2">Make your home beautiful</h3>
            <p class="lead">Purchase our collection of furniture and decor to transform your home into a beautiful oasis.</p>
        </div>
    </div>
</div>
<div>
<div class="container">
        <div class="row mt-5">
            <div class="col-md-4 d-flex flex-column align-items-center">
                <a href="kichen.php">
                    <img src="images/photo3.jpg" class="img-fluid rounded-circle border-dark img-fixed-size" alt="Living Room">
                </a>
                <figcaption class="mt-2 text-dark">Dining Room</figcaption>
            </div>
            <div class="col-md-4 d-flex flex-column align-items-center">
                <a href="livingroom.php">
                    <img src="images/sofa.webp" class="img-fluid rounded-circle border-dark img-fixed-size" alt="Sofa">
                </a>
                <figcaption class="mt-2 text-dark">Living Room</figcaption>
            </div>
            <div class="col-md-4 d-flex flex-column align-items-center">
                <a href="bedroom.php">
                    <img src="images/photo.jpg" class="img-fluid rounded-circle border-dark img-fixed-size" alt="Dining Room">
                </a>
                <figcaption class="mt-2 text-dark">Bed Room</figcaption>
            </div>
        </div>
    </div>

<div class="untree_co-section product-section before-footer-section">
    <div class="container text-capitalize">
        <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border border-dark">
                        <div class="image-container"> 
                            <img src="uploads/<?php echo $row['Furniimage']; ?>" class="card-img-top img-fluid" alt="Product Image">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h1 class="card-title text-dark card-img-top img-fluid"><b><?php echo $row['productname']; ?></b></h1>
                            <p class="card-text text-dark mt-auto" style="font-size:15px;">Price: &nbsp;  LKR<?php echo $row['price']; ?></p>
                            <form action="buydetails.php" method="post" class="d-flex justify-content-between" onsubmit="return checkLogin()">
                                <button type="submit" class="btn btn-primary" name="buy_button">Buy</button>
                                <input type="hidden" name="PID" value="<?php echo $row["PID"]; ?>">
                                <input type="hidden" name="image" value="<?php echo $row["Furniimage"]; ?>">
                                <input type="hidden" name="productName" value="<?php echo $row["productname"]; ?>">
                                <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
                                <input type="hidden" name="descript" value="<?php echo $row["descript"]; ?>">
                                <input type="hidden" name="category" value="<?php echo $row["category"]; ?>">
                                <button type="submit" formaction="cartdetails.php" class="btn btn-secondary-emphasis mr-2">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?> 
        </div>
    </div>
</div>
<?php
$file = "details.txt";
// Delete the file contents after processing
file_put_contents($file, "");
?>

<script>
    function checkLogin() {
        <?php if (!isset($_SESSION["email"]) || !isset($_SESSION["state"])) { ?>
            alert("Please sign in to buy or cart.");
            return false; // Prevent form submission
        <?php } ?>
        return true; // Allow form submission
    }
</script>

      <!-- footer section start -->
      <div class="footer_section layout_padding">
		<div class="container">
		   <div class="row">
			  <div class="col-lg-3 col-sm-6">
				 <div class="fooer_logo"><img src="images/title.png"></div>
				 <p class="footer_lorem_text">Upgrade your home effortlessly with our 
					modern products for a stylish and functional living space.
				 </p>
			  </div>
			 
			  <div class="col-lg-3 col-sm-6">
				 <h1 class="customer_text">Our products</h1>
				 <p class="footer_lorem_text">Elevate your living space with our premium selection of 
					quality products, crafted to make your home truly wonderful. Experience unparalleled 
					durability and style, ensuring your space shines with sophistication for years to come. 
					Transform every corner into a haven of comfort and beauty with our exquisite range of offerings.
				 </p>
			  </div>
			  <div class="col-lg-3 col-sm-6">
				 <h1 class="customer_text">Customized Design</h1>
				 <p class="footer_lorem_text">Experience furniture tailored to your unique 
					style and space with our customized solutions. From design to delivery,
					we bring your vision to life, ensuring every piece fits seamlessly into your home.
					 Elevate your living experience with personalized furniture that reflects your individuality.
				 </p>
			  </div>
		   </div>
		
		</div>
	 </div>
	 <!--  footer section end -->
  
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
  </body>
</html>
