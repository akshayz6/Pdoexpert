<?php
require_once "includes/db.php";

class product {
    private $dbh;

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
    }
    public function insertproduct ( $productnaam, $prijs, $descriptie, $fotos){
    $stmt= $this->dbh->execute("INSERT INTO producten ( productnaam, prijs, descriptie, fotos ) 
    VALUES ( ?, ?, ?, ?)",[$productnaam, $prijs, $descriptie, $fotos]);
    }
    public function selectproduct() : array {
        $stmt = $this->dbh->execute("SELECT * FROM producten");
        $result = $stmt->fetchAll();
        return $result; 
    }

    public function updateproduct( $productnaam, $prijs, $descriptie, $fotos, $product_id) {
        $stmt = $this->dbh->execute("UPDATE producten SET  productnaam = ?, prijs = ?, descriptie = ?, fotos  = ? WHERE product_id = ?", [$productnaam, $prijs, $descriptie, $fotos, $product_id]);
    }
    
    public function deleteproduct(int $product_id) {
        $stmt = $this->dbh->execute("DELETE from producten WHERE product_id = ?",[$product_id]);
       
    }


}

?>