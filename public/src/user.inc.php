<?php
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }

    public function checkUserExists($fields)
    {
        $stmt = $this->db->prepare("SELECT email FROM users WHERE email = :email");
        $stmt->bindValue(':email', $fields[':email'], PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "Email already in use";
        } else {
            $this->registerUser($fields);
        }
    }

    public function registerUser($fields)
    {
        $stmt = $this->db->prepare("INSERT INTO users(firstname, lastname, email, password, Address) VALUES (:firstname, :lastname, :email, :password, :address) ");
        foreach ($fields as $key => $value) {
            $stmt->bindValue($key, $value, PDO::PARAM_STR);
        }
        if ($stmt->execute()) {
            echo ("Registered");
        } else {
            echo ("Something went wrong");
        }
    }

    public function getAllUsers($email ,$password)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        if ($stmt->execute() && $stmt->fetchColumn()) {
            $_SESSION['user'] = $email;
            header('location: /');
        }
    }

    public function exit()
    {
        unset($_SESSION["user"]);
        session_destroy();
        header("Location: /");
    }
}
