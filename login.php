<?php
require_once '../includes/db.php';
require_once 'user.php';

$myDb = new DB('crud');
$user = new User($myDb);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameOrEmail = $_POST['usernameOrEmail'];
    $password = $_POST['password'];

    
    $loginSuccess = $user->login($usernameOrEmail, $password);
    if ($loginSuccess === true) {
        echo "Ingelogd als " . $_SESSION['username'];
        header("Location: product-insert.php"); 
        exit;
    } else {
        echo $loginSuccess; 
    }
}
?>


<form method="POST" action="">
    <input type="text" name="usernameOrEmail" placeholder="Gebruikersnaam of Email" required>
    <input type="password" name="password" placeholder="Wachtwoord" required>
    <button type="submit">Inloggen</button>
</form>
