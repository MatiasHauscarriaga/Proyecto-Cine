<?php
require_once "../BD/database.php";
    class Reserva{
        protected $db;
        public function __construct() {
        $this->db = (new Database())->connect();
        }

        public function getAll() {
        $sql = "SELECT * FROM reserva";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        
       public function crearReserva($idFuncion, $idAsiento, $idCliente) {
        $fechaHora = date("Y-m-d H:i:s");
        $sql = "INSERT INTO reserva (fechaHora, idCliente, idAsiento, idFuncion) VALUES (:fechaHora, :idCliente, :idAsiento, :idFuncion)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([ ':fechaHora' => $fechaHora,':idCliente' => $idCliente,':idAsiento' => $idAsiento,':idFuncion' => $idFuncion]);
        }
    }
?>