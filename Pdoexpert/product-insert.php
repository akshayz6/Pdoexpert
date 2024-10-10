<?php
    include "product.php";

    $dbproduct = new product ($myDb);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try{
          $target_dir = "foto's/";
          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

  $dbproduct->insertproduct( $_POST["productname"], $_POST["Price"], $_POST["description"], $target_file );
  ECHO "<h1>Success</h1>";
}
        } catch (Exception $e){
            echo "Error" . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
   <title>Product</title>
</head>
<body>

<header>
<div class="navbar">
   <H1>Product</H1>
    <ul>
      <li><a href="product-insert.php">TOEVOEGEN</a></li>
      <li><a href="product-view.php">Overzicht</a></li>

    </ul>
  </div>

</header>




<main>



    <form id="login_form" class="form_class" method="POST" enctype="multipart/form-data">

     <h2> adding products </h2>
     <label for="productname">Productname:</label>
     <input class="field_class" type="text" name="productname" >

     <label for="Price">Price:</label>
     <input class="field_class" type="number" name="Price" >


    <label for="description">Description:</label>
    <input class="field_class" type="text" name="description" >

    <label for="fotos">Fotos</label>
  <input type="file" name="fileToUpload" id="">

   <br> <input  type="submit"> 
  
    
    </form>
  </main>


    



</body>
</html>