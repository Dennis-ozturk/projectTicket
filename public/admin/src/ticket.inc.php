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

    public function selectAllTickets($id, $arenaId)
    {
        $stmt = $this->db->prepare("SELECT * FROM concert c, concert_ticket ct, arena a WHERE c.c_id = :concertId AND ct.concert_id = :concertId AND a.id = :arenaId");
        $stmt->bindValue(':concertId', $id, PDO::PARAM_INT);
        $stmt->bindValue(':arenaId', $arenaId, PDO::PARAM_INT);
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
