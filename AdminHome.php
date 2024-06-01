
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
    <link rel="stylesheet" type="text/css" href="css/adminstyle.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <style>
        #addProductForm,
        #addSalesForm,
        #content {
            margin: 80px; /* Add margin */
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
    </style>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='fa fa-bars' id="header-toggle"></i>
        </div>
        <div class="logo">
            <img src="images/formlogo.png">
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <div class="nav_list">
                    <a href="javascript:void(0)" onclick="openadminpanel()" class="nav_link active">
                        <i class='bx bxs-dashboard nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="javascript:void(0)" onclick="openviewproduct()" class="nav_link">
                        <i class='fa fa-cube nav_icon'></i>
                        <span class="nav_name">View Product</span>
                    </a>
                    <a href="javascript:void(0)" onclick="openAddProductForm()" class="nav_link" id="addproduct">
                        <i class='fa fa-plus nav_icon'></i>
                        <span class="nav_name">Add Product</span>
                    </a>
                    <a href="javascript:void(0)" onclick="openOrderForm()" class="nav_link" id="order">
    <i class='fa fa-list nav_icon'></i>
    <span class="nav_name">Order</span>
</a>

                    <a href="javascript:void(0)" onclick="openviewaccount()" class="nav_link">
                        <i class='fa fa-users nav_icon'></i>
                        <span class="nav_name">Customer</span>
                    </a>
                    <a href="#"  onclick="signOut()" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span>
            </a>
           
                </div>
            </div>
        </nav>
    </div>
    <div id="adminpanel"></div>

    <div id="addProductForm"></div>

    <div id="orderform"></div>
  <div  id="content"></div>
  <div  id="account"></div>
 
</div>

    <script src="js/adminjs.js"></script>
    <script>
        function openOrderForm(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("orderform").innerHTML = this.responseText;

        }
    };
    xhttp.open("GET", "Oderview.php", true);
    xhttp.send();
        document.getElementById('adminpanel').style.display = 'none';
          document.getElementById('orderform').style.display = 'block';
          document.getElementById('account').style.display = 'none';
          document.getElementById('addProductForm').style.display = 'none'; // Hide product form if open
          document.getElementById('content').style.display = 'none';
      
}


        function openAddProductForm() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("content").innerHTML = this.responseText;
                    initializeFormValidation();
                    // Clear any previous form validation messages
                    clearValidationMessages();
                    // Hide product form if open
                    document.getElementById('adminpanel').style.display = 'none';
                    document.getElementById('addProductForm').style.display = 'none';
                    document.getElementById('account').style.display = 'none';
                    document.getElementById('orderform').style.display = 'none';
                    // Show content
                    document.getElementById('content').style.display = 'block';
                }
            };
            xhttp.open("GET", "product.php", true);
            xhttp.send();
        }

  
      function openviewproduct() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("content").innerHTML = this.responseText;

        }
    };
    xhttp.open("GET", "viewproduct.php", true);
    xhttp.send();
    document.getElementById('adminpanel').style.display = 'none';
    document.getElementById('account').style.display = 'none';
          document.getElementById('orderform').style.display = 'none';
          document.getElementById('addProductForm').style.display = 'none'; // Hide product form if open
          document.getElementById('content').style.display = 'block';
      
}

function openviewaccount() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("account").innerHTML = this.responseText;

        }
    };
    xhttp.open("GET", "viewaccount.php", true);
    xhttp.send();
    document.getElementById('adminpanel').style.display = 'none';
   
          document.getElementById('orderform').style.display = 'none';
          document.getElementById('addProductForm').style.display = 'none'; // Hide product form if open
          document.getElementById('content').style.display = 'none';
          document.getElementById('account').style.display = 'block';
      
}

function openadminpanel() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("adminpanel").innerHTML = this.responseText;

        }
    };
    xhttp.open("GET", "adminpanel.php", true);
    xhttp.send();
        document.getElementById('adminpanel').style.display = 'block';
          document.getElementById('orderform').style.display = 'none';
          document.getElementById('account').style.display = 'none';
          document.getElementById('addProductForm').style.display = 'none'; // Hide product form if open
          document.getElementById('content').style.display = 'none';
      
}

function clearTextbox() {
   document.getElementById('floatingSelectGrid').value = ''; 
   document.getElementById('floatingInputInvalid').value = '';
   document.getElementById('floatingInputGroup2').value = '';
   document.getElementById('floatingTextarea2').value = '';
   document.getElementById('formFileMultiple').value = '';
  
}
function initializeFormValidation() {
            var forms = document.querySelectorAll('.needs-validation');
            forms.forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                        displayValidationErrors(form);
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }

        function clearValidationMessages() {
            var inputs = document.querySelectorAll('.form-control');
            inputs.forEach(function (input) {
                input.classList.remove('is-invalid');
            });
        }

        function displayValidationErrors(form) {
            var inputs = form.querySelectorAll('.form-control');
            inputs.forEach(function (input) {
                if (!input.checkValidity()) {
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });
        }
  // Call openadminpanel() when the page loads
  window.onload = openadminpanel;



  </script>
  <script>
             function signOut() {
        // Perform sign out actions here
        // For example, you can clear any session data or redirect the user to the login page

        // AJAX request to deactivate the user session in the database
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Redirect to the login page after successful sign-out
                window.location.href = "login.html";
            }
        };
        xhttp.open("POST", "logout.php", true); // Change "logout.php" to your server-side script
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send();
    }
    

    </script>
</body>

</html>