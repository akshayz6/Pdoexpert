<?php
session_start(); 

class User {
    private $db;

    
    public function __construct($db) {
        $this->db = $db;
    }

  
    public function register($username, $email, $password) {

        $sql = "SELECT * FROM users WHERE username = :username OR email = :email";
        $stmt = $this->db->execute($sql, [
            ':username' => $username,
            ':email' => $email
        ]);
        if ($stmt->rowCount() > 0) {
            return "Gebruikersnaam of email bestaat al!";
        }

      
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

       
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $this->db->execute($sql, [
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashedPassword
        ]);

        return "Registratie succesvol!";
    }

    public function login($usernameOrEmail, $password) {
     
        $sql = "SELECT * FROM users WHERE username = :usernameOrEmail OR email = :usernameOrEmail";
        $stmt = $this->db->execute($sql, [
            ':usernameOrEmail' => $usernameOrEmail
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
           
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            return true;
        } else {
            return "Ongeldige gebruikersnaam/e-mail of wachtwoord.";
        }
    }

  
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

   
    public function logout() {
       
        session_unset();
        
        session_destroy();
    }
}
?>
