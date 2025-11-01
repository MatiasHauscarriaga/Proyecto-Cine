<?php
    require_once "../BD/database.php";
    
    //Clase Padre Usuario
    class Usuario{
        protected $db;
        public function __construct() {
        $this->db = (new Database())->connect();
        }
        public function add($nombre, $email, $password) {
        $hash=password_hash($password,PASSWORD_BCRYPT);    
        $sql = "INSERT INTO usuario (name,email,password) VALUES (:nombre, :email, :password)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':nombre' => $nombre, ':email'=>$email,':password'=>$hash]);
        }
        public function getAll() {
        $sql = "SELECT * FROM usuario";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function update($idUsuario, $nombre) {
        $sql = "UPDATE usuario SET name = :nombre WHERE idUsuario = :idUsuario";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':nombre' => $nombre, ':idUsuario' => $idUsuario]);
        }

        public function delete($id) {
        $sql = "DELETE FROM usuario WHERE idUsuario = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        }
    }

    //Clase Hija Cliente
    class Cliente extends Usuario{
        
        public function addCliente($nombre, $email, $password, $telefono) {
        parent::add($nombre, $email, $password); 
        
        $sql = "INSERT INTO cliente (idUsuario, telefono) VALUES (:idUsuario, :telefono)";
        $stmt = $this->db->prepare($sql);

        $idUsuario = $this->db->lastInsertId();
        $stmt->execute([':idUsuario' => $idUsuario, ':telefono' => $telefono]);
        }

     }

?>