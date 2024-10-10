<?php
    include "product.php";


    $dbproduct = new product ($myDb);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>producten</title>

    <style>
        img{
            width: 50%; 
            max-width: 500px; 
            height: auto; 
        }
    </style>





</head>
<body>

<header>
<div class="navbar">
   <H1>Weergave Producten</H1>
    <ul>
      <li><a href="product-insert.php">TOEVOEGEN</a></li>
      <li><a href="product-view.php">Overzicht</a></li>

    </ul>
  </div>

</header>






    <table class="table dark">
        <tr>
            <th>Product_id</th>
            <th>Products</th>
            <th>Prijs</th>
            <th>Descriptie</th>
            <th>Fotos</th>
        </tr>

        <tr> <?php
            $producten = $dbproduct->selectproduct(); 
            if ($producten) { 
                foreach ($producten as $product) {?>
            <td><?php echo $product['product_id']?></td>
            <td><?php echo $product['productnaam']?></td>
            <td><?php echo $product['prijs']?></td>
            <td><?php echo $product['descriptie'];?></td>
            <td><img src="<?php echo $product['fotos']?>" alt=""></td>
            <td><a  class="submit_class"href="product-edit.php?product_id=<?php echo $product['product_id']; ?>">Edit</a></td>
            <td><a class="submit_class"href="product-delete.php?product_id=<?php echo $product['product_id']; ?>">Delete</a></td>

            </tr> <?php } }?>
    </table>
</body>
</html>