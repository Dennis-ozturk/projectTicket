<?php
class Order
{
    private $db;
    public function __construct()
    {
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }

    public function insertOrder($fields, $user)
    {
        // Inserts order
        //total_tickets gets total amount of tickets
        $total_tickets = count($fields) - 3;
        $total = count($fields);
        $tickets = [];
        $other = [];
        $reverse_data = array_reverse($fields);
        //Puts all tickets in a new array
        foreach ($fields as $value) {
            if ($total_tickets == 0) {
                break;
            } else {
                array_push($tickets, $value);
                $total_tickets--;
            }
        }
        //Puts other information as user location and total cost in separate array
        foreach ($reverse_data as $value) {
            if ($total == 2) {
                break;
            } else {
                array_push($other, $value);
                $total--;
            }
        }
        print_r($other);
        $stmt = $this->db->prepare("INSERT INTO orderdetails(user, ticket_code, location, total) VALUES (?, ?, ?, ?)");
        foreach ($tickets as $value) {
            $stmt->execute([$user, $value, $other[2], $other[0]]);
        }

        $this->removeTickets($tickets);
        setcookie("cookie", "", time() - 3600);
        header("location: user_tickets.php");
    }

    public function removeTickets($tickets)
    {
        $stmt = $this->db->prepare("DELETE FROM concert_ticket WHERE ticket_code = ?");
        foreach ($tickets as $ticket) {
            $stmt->execute([$ticket]);
        }
    }
}
