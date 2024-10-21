<?php
 
include 'product.php';
 
$dbproduct = new product ($myDb);
 
try {
    $dbproduct->deleteproduct($_GET['product_id']);
    header("Location:product-view.php");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
 
?>