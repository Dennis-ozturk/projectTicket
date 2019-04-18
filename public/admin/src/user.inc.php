<?php 
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }

    public function getAllUsers($username, $password)
    {
        // Get user where email & password matches in password
        $stmt = $this->db->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        if ($stmt->execute() && $stmt->fetchColumn()) {
            $_SESSION['admin'] = $username;
            header('location: dashboard.php');
        }
    }

    public function exit()
    {
        // Sign out function by unset current session admin and destroy session
        unset($_SESSION["admin"]);
        session_destroy();
        header("Location: index.php");
    }
}
