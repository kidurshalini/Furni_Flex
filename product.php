 
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
</head>
<body>
 <!-- Add Product Form (Hidden by default) -->
 
    <h3 class="s1">Add Your funitures to your website</h3>
    <form id="addProductFormInner" class="form-border needs-validation" novalidate action="add.php" method="post" enctype="multipart/form-data">
        <div class="form-floating">
            <label for="floatingSelectGrid">Category of furniture items</label>
            <select class="form-select" id="floatingSelectGrid" name="category" required>
              <option value="" disabled selected>Select a category</option>
              <option value="LivingRoom">Living Room</option>
              <option value="BedRoom">Bedroom</option>
              <option value="Kitchen">Kitchen</option>
            </select>
            <div class="invalid-feedback">Please select a category.</div>
          </div>
        <div class="input-group has-validation mb-4">
            <div class="form-floating is-invalid">
              <label for="floatingInputGroup2">Product Name</label>
              <input type="text" class="form-control " id="floatingInputInvalid" name="productname" required>
              <div class="invalid-feedback">Please enter a product name.</div>
            </div>
           
          </div>
          <div class="input-group has-validation mb-4">
            <div class="form-floating is-invalid">
                <label for="floatingInputGroup2">Price</label>
              <input type="text" class="form-control" id="floatingInputGroup2" name="price" required>
              <div class="invalid-feedback">Please enter a product price.</div>
            
            </div>
          </div>
          <div class="form-floating mb-4">
            <label for="floatingTextarea2">Description</label>
            <textarea class="form-control area"  id="floatingTextarea2" name="descript" required></textarea>
            <div class="invalid-feedback">Please input any description about product.</div>
          </div>
          
          <div class="input-group has-validation mb-4">
            <div class="form-floating is-invalid">
                <label for="floatingInputGroup2">Quantity</label>
              <input type="text" class="form-control" id="floatingInputGroup2" name="quantity" required>
              <div class="invalid-feedback">Please enter a Quantity.</div>
            
            </div>
          </div>
          <div class="input-group has-validation mb-4">
            <div class="form-floating is-invalid">
                <label for="floatingInputGroup2">Upload your furniture photos</label>
                <input type="file" class="form-control" id="formFileMultiple" name="Furniimage" multiple required>
                <div class="invalid-feedback">Please input the image.</div>
            </div>
     
          </div>
          <div>
            <center>
              <button type="submit" class="btn btn-secondary b1" name="submit">Add</button>
        
              <button type="submit" class="btn btn-danger b1" onclick="clearTextbox()">Clear</button>
            </center>

          </div>
    </form>
</div>
<script>
  
    function clearTextbox() {
       document.getElementById('floatingSelectGrid').value = ''; 
       document.getElementById('floatingInputInvalid').value = '';
       document.getElementById('floatingInputGroup2').value = '';
       document.getElementById('floatingTextarea2').value = '';
       document.getElementById('formFileMultiple').value = '';
      
    }
    
      </script>

    </body>
    
    </html>
    
