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
        //Checks if user already exists with email
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
        //Simple register
        $stmt = $this->db->prepare("INSERT INTO users(firstname, lastname, email, password, Address) VALUES (:firstname, :lastname, :email, :password, :address) ");
        foreach ($fields as $key => $value) {
            if ($key === ':password') {
                $hash = hash('sha256', $value);
                $stmt->bindValue($key, $hash, PDO::PARAM_STR);
            } else {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }
        }
        if ($stmt->execute()) {
            echo ("Registered");
            header('location: login.php');
        } else {
            echo ("Something went wrong");
        }
    }

    public function getAllUsers($email, $password)
    {
        //Get all users from db and set session to email
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $hash = hash('sha256', $password);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $hash, PDO::PARAM_STR);
        if ($stmt->execute() && $stmt->fetchColumn()) {
            $_SESSION['user'] = $email;
            header('location: /');
        }
    }

    public function userTickets()
    {
        // Gets all current user tickets that have been bougth
        $user = ($_SESSION['user']);
        $stmt = $this->db->prepare("SELECT * FROM orderdetails WHERE user = :user");
        $stmt->bindValue(":user", $user, PDO::PARAM_STR);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $data[] = $row;
                }
                return $data;
            }
        }
    }

    public function exit()
    {
        unset($_SESSION["user"]);
        session_destroy();
        header("Location: /");
    }
}
