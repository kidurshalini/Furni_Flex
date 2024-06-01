<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Furni Flex</title>
    <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/adminstyle.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>
<body>
<style>
    .card {
        margin-right: 50px; /* Adjust the value as needed */
    }
    * {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        } 

    /* Optional: Add media query for responsiveness */
    @media (max-width: 768px) {
        .card {
            margin-right: 0; /* Reset margin for smaller screens */
            margin-bottom: 20px; /* Add bottom margin to create gap in vertical direction */
        }
    }
</style>

<div class="container" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
    <h1 class="text-black" style="margin-top:100px;">Total Details</h1>
    <div class="row mt-3">        
        <div class="card text-center text-white bg-dark font mb-5" style="width: 18rem;">
            <div class="card-body">
                <i class='fa fa-cube nav_icon'style='font-size: 3rem;'></i>
                <h5 class="card-title">Products</h5>
                <p class="card-text">Total products</p>
                <?php
                include 'dbconnection.php'; 

                $dash_post_query = "SELECT * from product";
                $dash_post_query_run = mysqli_query($conn, $dash_post_query);
                $post_total = mysqli_num_rows($dash_post_query_run);
                
                if($post_total > 0){
                    echo '<h4 class="mb-0">'.$post_total.'</h4>';
                }else{
                    echo '<h4 class="mb-0"> 0 </h4>';
                }
                ?>
            </div>
        </div>
                
        <div class="card text-center text-white bg-dark font mb-5" style="width: 18rem;">
            <div class="card-body">
                <i class='fa fa-cube nav_icon'style='font-size: 3rem;'></i>
                <h5 class="card-title">Order</h5>
                <p class="card-text">Total Orders</p>
                <?php
                include 'dbconnection.php'; 

                $dash_post_query = "SELECT * from invoice";
                $dash_post_query_run = mysqli_query($conn, $dash_post_query);
                $post_total = mysqli_num_rows($dash_post_query_run);
                
                if($post_total > 0){
                    echo '<h4 class="mb-0">'.$post_total.'</h4>';
                }else{
                    echo '<h4 class="mb-0"> 0 </h4>';
                }
                ?>
            </div>
        </div>
                
      

        <div class="card text-center text-white bg-dark font mb-5" style="width: 18rem;">
            <div class="card-body">
                <i class='bx bx-user-pin nav_icon' style='font-size: 3rem;'></i>
                <h5 class="card-title">Customers</h5>
                <p class="card-text">Total Customers</p>
                <?php
                include 'dbconnection.php'; 

                $dash_post_query = "SELECT * from signin_details where type= 'buyer'";
                $dash_post_query_run = mysqli_query($conn, $dash_post_query);
                $post_total = mysqli_num_rows($dash_post_query_run);
                
                if($post_total > 0){
                    echo '<h4 class="mb-0">'.$post_total.'</h4>';
                }else{
                    echo '<h4 class="mb-0"> 0 </h4>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div>
<center>
    <form class="contact" action="barchat.php" method="post">
        <button type="submit" name="send" class="send_bt btn btn-outline-secondary" id="contact-submit" style="font-size:25px;">
            <i class="fas fa-clipboard"></i> Report about ordering method
        </button>
    </form>
</center>

            </div>
</div>
</body>
</html>
