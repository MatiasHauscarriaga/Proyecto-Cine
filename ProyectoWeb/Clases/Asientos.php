<?php
    require_once "../BD/database.php";
    class Asientos{
        protected $db;
        public function __construct() {
        $this->db = (new Database())->connect();
        }

        public function getAll() {
        $sql = "SELECT * FROM asiento";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }


?>