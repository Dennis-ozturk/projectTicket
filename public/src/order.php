<?php
class Order
{
    private $db;
    public function __construct()
    {
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }

    public function insertOrder()
    {
        $stmt = $this->db->prepare("INSERT INTO users(user, ticket_code, location) VALUES (:user, :ticket_code, :location)");
        $stmt->bindValue(':email', $fields[':email'], PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "Email already in use";
        } else {
            $this->registerUser($fields);
        }
    }
}
