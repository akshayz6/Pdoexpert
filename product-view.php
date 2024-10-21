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
            <th>id</th>
            <th>Products</th>
            <th>Price</th>
            <th>Description</th>
            <th>photos</th>
        </tr>

        <tr> <?php
            $producten = $dbproduct->selectproduct(); 
            if ($producten) { 
                foreach ($producten as $product) {?>
            <td><?php echo $product['id']?></td>
            <td><?php echo $product['productName']?></td>
            <td><?php echo $product['price']?></td>
            <td><?php echo $product['description'];?></td>
            <td><img src="<?php echo $product['photos']?>" alt=""></td>
            <td><a  class="submit_class"href="product-edit.php?id=<?php echo $product['id']; ?>">Edit</a></td>
            <td><a class="submit_class"href="product-delete.php?id=<?php echo $product['id']; ?>">Delete</a></td>

            </tr> <?php } }?>
    </table>
</body>
</html>