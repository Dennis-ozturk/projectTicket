<?php
require_once('ticket.inc.php');
class Concert
{
    private $db;
    protected $arenaId, $concertId, $locationId;
    public function __construct()
    {
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }

    public function createConcert($fields)
    {
        $stmt = $this->db->prepare("CALL insertConcert(:concertName, :concertType, :concertLocation, :priceEach, :startDate, :timeStarting, :Img, :concertDescription)");

        foreach ($fields as $key => $value) {
            if ($key == ':price_each' || $key == ':concertLocation') {
                $stmt->bindValue($key, $value, PDO::PARAM_INT);
                if ($key === ':concertLocation') {
                    $this->arenaId = $value;
                }
            } else {
                if ($key === ':concertName') {
                    $this->concertName = $value;
                    $stmt->bindValue($key, $value, PDO::PARAM_STR);
                }
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }
        }
        if ($stmt->execute()) {
            $this->latestConcertId();
        }
        $stmt->closeCursor();
    }

    public function latestConcertId()
    {
        $stmt = $this->db->prepare("SELECT c_id FROM concert ORDER BY date_added DESC LIMIT 1");

        if ($stmt->execute()) {
            $fetchRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->concertId = $fetchRow['c_id'];
            $this->createTickets();
        }
    }

    public function createTickets()
    {
        $stmt = $this->db->prepare("SELECT * FROM arena WHERE id = :arenaId");
        $stmt->bindValue(':arenaId', $this->arenaId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $capacity = $result['capacity'];
        $tickets = array();

        while (count($tickets) < $capacity) {
            $tickets['TICKET-' . $result['name'] . ':' . rand(1000, 9999) . '14'] = true;
        }

        $uniqueTickets = array_keys($tickets);

        $this->insertTickets($uniqueTickets, $this->concertId);
    }

    public function insertTickets($ticket, $concertId)
    {
        $stmt = $this->db->prepare("INSERT INTO concert_ticket(concert_id, ticket_code) VALUES (:id, :ticket)");

        foreach ($ticket as $key) {
            $stmt->bindValue(":id", $concertId, PDO::PARAM_INT);
            $stmt->bindValue(":ticket", $key, PDO::PARAM_STR);
            $stmt->execute();
        }
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
            $stmt = $this->db->prepare("UPDATE concert SET concert_name = :concertName, price_each = :priceEach, concert_description = :concertDescription ,starting_date = :startingDate, starting_time = :startingTime WHERE c_id = :id");
            foreach ($fields as $key => $value) {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            if ($stmt) {
                $stmt->execute();
                header("Location: event.php");
            }
        } catch (PDOException $e) {
            echo ($e->getMessage());
        }
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("CALL removeEvent(:concertId)");
        $stmt->bindValue(":concertId", $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        if ($result) {
            $ticket = new Ticket();
            $ticket->delete($id);
            header('Location: event.php');
        }
        $stmt->closeCursor();
    }
}
