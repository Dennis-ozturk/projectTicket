<?php


class Ticket
{
    public function __construct()
    {
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }

    public function getConcerts()
    {
        $stmt = $this->db->prepare("SELECT * FROM concert ");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $data[] = $row;
                }
                return $data;
            }
        }
    }

    public function selectAllTickets($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM concert c, concert_ticket ct WHERE c.c_id = :concertId AND ct.concert_id = :concertId");
        $stmt->bindValue(':concertId', $id, PDO::PARAM_INT);
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
        $stmt = $this->db->prepare("DELETE FROM concert_ticket WHERE concert_id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
