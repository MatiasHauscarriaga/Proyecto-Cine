<?php
    require_once "../BD/database.php";
    class Funciones{
        protected $db;
        public function __construct() {
        $this->db = (new Database())->connect();
        }

        public function getAll() {
        $sql = "SELECT * FROM funciones";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getById($id) {
        $sql = "SELECT * FROM funciones WHERE idFuncion = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>