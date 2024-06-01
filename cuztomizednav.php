

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
      <title>Cuztomize your product</title>
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
     <!-- Your contact section -->
     
<div class="cuztomized_section layout_padding">
   <div class="container">
       <div class="row">
           <div class="col-md-6">
               <h1 class="contact_text">Cuztomized Your Furniture</h1>
               <div class="mail_sectin">
                  <form class="contact" action="cuztomized.php" method="post" enctype="multipart/form-data">
                   
                       <input type="text" class="email-bt" placeholder="Name" name="name" required>
                       <input type="email" class="email-bt" placeholder="Email" name="email" required>
                       <input type="text" class="email-bt" placeholder="Phone Number" name="phonenumber" required>
                       <textarea class="massage-bt" placeholder="Description(Write about ur Cuztomized furnitures color,price range and etc)" rows="5" id="comment" name="description" required></textarea>
                       <input type="text" class="email-bt" placeholder="Quantity" name="quantity" required>
                      <label for="floatingInputGroup2" class="file">Upload your furniture photos</label>
                      <input type="file" class="form-control" id="formFileMultiple"  name="Furniimage" multiple required>
                      <div class="invalid-feedback email-bt">Please input the image.</div>
                     
                      </div>
                     
                       <button type="submit" name="send" class="send_bt btn" id="contact-submit">CONFORM YOUR ORDER</button>
                   </form>
               </div>
               <div class="col-md-6">
                <div class="image_9">
                    <img class="opacity-50 photo" src="images/photo3.jpg">
                </div>
            </div>
          
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
</body>
</html>
  
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
      <script type="text/javascript">
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
    </script>

   </body>
</html>








