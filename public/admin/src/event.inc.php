<?php
class Concert
{
    private $db;
    protected $concertId;
    public function __construct()
    {
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }

    public function createConcert($fields)
    {
        $stmt = $this->db->prepare("CALL insertConcert(:concertName, :concertType, :concertLocation, :priceEach, :startDate, :timeStarting)");

        foreach ($fields as $key => $value) {
            if ($key == ':price_each' || $key == ':concertLocation') {
                $stmt->bindValue($key, $value, PDO::PARAM_INT);
                if ($key === ':concertLocation') {
                    $this->concertId = $value;
                }
            } else {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }
        }
        if ($stmt->execute()) {
            $this->createTickets();
        }
        $stmt->closeCursor();
    }

    public function createTickets()
    {
        $stmt = $this->db->prepare("CALL insertTicket(:Id, :concertId)");
    }

    public function getConcerts()
    {
        $stmt = $this->db->prepare("SELECT * FROM concert c, arena a WHERE c.concert_location = a.id");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $data[] = $row;
                }
                return $data;
            }
        }
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("CALL removeEvent(:concertId)");
        $stmt->bindValue(":concertId", $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        if ($result) {
            header('Location: event.php');
        }
        $stmt->closeCursor();
    }

    public function selectOneProduct($id)
    {
        $stmt = $this->db->prepare("CALL selectEvent(:concertId)");
        $stmt->bindValue(":concertId", $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $result;
    }

    public function edit($fields, $id)
    {
        try {
            $stmt = $this->db->prepare("UPDATE concert SET concert_name = :concertName, price_each = :priceEach, starting_date = :startingDate, starting_time = :startingTime WHERE c_id = :id");
            foreach ($fields as $key => $value) {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            if ($stmt) {
                $stmt->execute();
            }
        } catch (PDOException $e) {
            echo ($e->getMessage());
        }
    }
}
