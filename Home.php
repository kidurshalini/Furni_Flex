<?php
require_once "dbconnection.php";


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
   </head>
   <body>
   <?php
require_once "navbar.php";
?>
      <!-- header section end -->
       <!-- banner section start -->


       <div class="banner_section layout_padding">
        
            <div class="contact_bt"><a href="shop.php">Shop Now</a></div>
                 
               </div>

      <!-- banner section end -->
      <!-- services section start -->
      
      <div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">our services</h1>
           
            <div class="services_section2 layout_padding">
               <div class="row">
                  <div class="col-lg-3 col-sm-6">
                     <div class="icon_1"><img src="images/delivert.png"></div>
                     <h2 class="furnitures_text">Free Delivery</h2>
                     <p class="dummy_text">We provide our customers with free delivery services. 
                        Here, we only offer free delivery to our nearby customers. </p>
                   
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <div class="icon_1"><img src="images/cash.png"></div>
                     <h2 class="furnitures_text">Cash On delivery</h2>
                     <p class="dummy_text">We are giving our customers cash on delivery services.
                         When the consumer receives the product in hand, 
                        they can pay. We are giving the consumer an excellent service here.</p>
                    
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <div class="icon_1"><img src="images/book.png"></div>
                     <h2 class="furnitures_text">Booking</h2>
                     <p class="dummy_text">We are giving our customers booking services.
                         Within two days of booking the product, consumers can confirm 
                         their order without having to confirm that it has been canceled.
                     </p>
                    
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <div class="icon_1"><img src="images/cuztomized.png"></div>
                     <h2 class="furnitures_text">Customized</h2>
                     <p class="dummy_text">We receive customized orders from our customers. 
                        Give them exceptional service and deliver them in more than two 
                        weeks so they can't cancel the order in less than two days.
                     </p>
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- services section end -->
     <!-- about section start -->
<div class="about_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <h1 class="about_text">About Us</h1>
            <p class="lorem_text text-justify">Established in 2023, Furni Flex has been a beacon of quality and comfort in the world of furniture. From our humble beginnings as a local furniture shop, we have grown into a thriving online platform, bringing our exceptional products to customers nationwide.</p>
         </div>
         <div class="col-md-6">
            <div class="image_1"><img src="images/sofa.png"></div>
         </div>
         <div class="col-md-6">
            <div class="read_bt"><a href="about.php">READ MORE</a></div>
         </div>
      </div>
   </div>
</div>
<!-- about section end -->

        <!-- projects section start -->
        <div class="projects_section layout_padding">
         <div class="container">
            <h1 class="our_text">Our Products</h1>
          
            <div id="main_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="projects_section2">
                        <div class="container_main2">
                           <div class="row">
                              <div class="col-sm-4">
                                 <div class="container_main1"> 
                                    <img src="images/furni1.jpg" alt="Avatar" class="image" style="width:100%">
                                    <h1 class="modern_text">Living room furnitures</h1>
                                    <?php
                                    $query = "SELECT * FROM product WHERE category='LivingRoom'";
                                    $result = mysqli_query($conn, $query);
                                    echo'<div class="middle">
                                       <a href="livingroom.php" class="text">VIEW</a>
                                    </div>;'
                                    ?>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="container_main1">
                                    <img src="images/furni4.avif" alt="Avatar" class="image" style="width:100%">
                                    <h1 class="modern_text">Bed room furnitures</h1>
                                    <?php
                                    $query = "SELECT * FROM product WHERE category='BedRoom'";
                                    $result = mysqli_query($conn, $query);
                                    echo'<div class="middle">
                                       <a href="bedroom.php" class="text">VIEW</a>
                                    </div>;'
                                    ?>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <div class="container_main1">
                                    <img src="images/furni6.jpeg" alt="Avatar" class="image" style="width:100%">
                                    <h1 class="modern_text">Living room furnitures</h1>
                                    <?php
                                    $query = "SELECT * FROM product WHERE category='Kitchen'";
                                    $result = mysqli_query($conn, $query);
                                    echo'<div class="middle">
                                       <a href="kichen.php" class="text">VIEW</a>
                                    </div>;'
                                    ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
              </div>
              </div>
              </div>
              </div>
      <!-- projects section end -->
      <!-- who section start -->
      <div class="who_section layout_padding">
         <div class="container">
            <h1 class="who_taital">who we are ?</h1>
            <h4 class="designer_text">Selling furnitures and customized furnitures</h4>
            <p class="lorem_ipsum_text">we are a leading furniture retailer committed to delivering quality, 
               comfort, and style to homes across the nation. What began as a local endeavor has blossomed 
               into a thriving online platform, where we showcase our passion for craftsmanship and dedication 
               to customer satisfaction. At Furni Flex, we believe that furniture is more than just functional pieces;
                it's a reflection of your lifestyle and personality. With each meticulously curated product, 
                we aim to enhance your living spaces and inspire creativity. 
               Join us on our journey as we continue to redefine the art of home furnishing.</p>
         </div>
      
      </div>
      <!-- who section end -->
    
    
       <!-- contact section start -->
          
<div class="contact_section layout_padding">
   <div class="container">
       <div class="row">
           <div class="col-md-6">
               <h1 class="contact_text">CONTACT US</h1>
               <div class="mail_sectin">
                  <form class="contact" action="contact.php" method="post">
                       <input type="text" class="email-bt" placeholder="Name" name="name" required>
                       <input type="email" class="email-bt" placeholder="Email" name="email" required>
                       <input type="text" class="email-bt" placeholder="Phone Number" name="phonenumber" required>
                       <textarea class="massage-bt" placeholder="Message" rows="5" id="comment" name="message" required></textarea>
                       <button type="submit" name="send" class="send_bt btn" id="contact-submit">SEND</button>
                   </form>
               </div>
           </div>
           <div class="col-md-6">
               <div class="image_9"><img src="images/sofa5.jpg"></div>
           </div>
       </div>
   </div>
</div>
      <!-- contact section end -->
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