<?php
    session_start();

   
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
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <style>
       .icon-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-left: 20px;
        }
        .icon-container img {
            width: 24px;
            height: 24px;
        }
        .icon-container span {
            font-size: 14px;
            margin-top: 4px;
        }
        .icon-link {
            text-decoration: none;
            color: black;
        }
        .icon-link:hover {
            color: #4CAF50;
        }
        </style>
   
   </head>
   <body>
<div class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="logo"><img src="images/logo4.png"></div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="Home.php">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                     </li>
                    
                     <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="contactnav.php">Contact</a>
                     </li>
                    
                  <?php
    if(isset($_SESSION["email"]) && isset($_SESSION["state"])) {
      echo'<li class="nav-item">
                        <a class="nav-link"  href="cuztomizednav.php">Cuztomize</a>
                     </li>';
                    echo ' <div class="wrap">
<div class="search-container">
<div class="search mt-2">
                        <input type="text" class="searchTerm ml-5" placeholder="What are you looking for?">
                        <button type="submit" class="searchButton">
                          <i class="fa fa-search"></i>
                       </button>
                       <a href="logout.php?email=' . $_SESSION["email"] . '"  class="icon-link">
    <div class="icon-container">
        <img src="images/logout.png" alt="Logout">
        <span>Logout</span>
    </div>
</a>
<a href="cart.php" class="icon-link">
    <div class="icon-container">
        <img src="images/cart.png" alt="Cart">
        <span>Cart</span>
    </div>
</a>
</div>

</div>';

   } else {
      echo '<div class="wrap">  
      <div class="search mt-2 ml-5">
         <input type="text" class="searchTerm ml-5" placeholder="What are you looking for?">
         <button type="submit" class="searchButton">
           <i class="fa fa-search"></i>
        </button>
        <a href="login.html" class="text-dark"><img src="images/account.png" class="ml-5">  </a>
      <a href="login.html" class="text-dark ml-4">LOGIN</a>
      </div>
   </div>     
   </div>
   </nav>';
    
         
           
   }
?>

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
         document.addEventListener("DOMContentLoaded", function() {
            // Get the Cuztomize link element
            var cuztomizeLink = document.querySelector(".cuztomize-link");
            
            // Add a click event listener to the Cuztomize link
            cuztomizeLink.addEventListener("click", function(event) {
               // Prevent the default action of the link
               event.preventDefault();
               
               // Show the error message
               document.getElementById("error-message").style.display = "block";
            });
         });
      </script>
</body>
</html>