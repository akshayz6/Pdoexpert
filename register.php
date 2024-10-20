<?php
require_once '../includes/db.php';
require_once 'user.php';

$myDb = new DB('crud'); 
$user = new User($myDb); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $message = $user->register($username, $email, $password);
    echo $message;
}
?>


<form method="POST" action="">
    <input type="text" name="username" placeholder="Gebruikersnaam" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Wachtwoord" required>
    <button type="submit">Registreer</button>
</form>
