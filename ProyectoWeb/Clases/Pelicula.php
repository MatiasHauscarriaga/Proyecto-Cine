<?php
    require_once "../BD/database.php";
    class Pelicula{
        protected $db;
        public function __construct() {
        $this->db = (new Database())->connect();
        }

        public function getAll() {
        $sql = "SELECT * FROM pelicula";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    /*
    $pelicula=new Pelicula();
    $pelis = $pelicula->getAll();
    var_dump($pelis);*/
?>