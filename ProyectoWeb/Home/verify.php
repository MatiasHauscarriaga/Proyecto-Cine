<?php
session_start();
require_once "../BD/database.php";
require_once "../Clases/Usuario.php";

if (!isset($_POST['email'], $_POST['pass']) || empty($_POST['email']) || empty($_POST['pass'])) {
    die("Error: faltan datos en el formulario");
}

$email = $_POST['email'];
$password = $_POST['pass'];

try {
    $db = (new Database())->connect();

    $stmt = $db->prepare("SELECT * FROM usuario WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        die("Error: usuario no encontrado");
    }


    if (!password_verify($password, $usuario['password'])) {
        die(" Error: contraseña incorrecta");
    }

    $idUsuario = $usuario['idUsuario'];

    $stmtAdmin = $db->prepare("SELECT * FROM administrador WHERE idUsuario = ?");
    $stmtAdmin->execute([$idUsuario]);
    $admin = $stmtAdmin->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        $_SESSION['id'] = $idUsuario;
        $_SESSION['rol'] = 'admin';
        header("Location: home-admin.php");
        exit;
    }

    $stmtCliente = $db->prepare("SELECT * FROM cliente WHERE idUsuario = ?");
    $stmtCliente->execute([$idUsuario]);
    $cliente = $stmtCliente->fetch(PDO::FETCH_ASSOC);

    if ($cliente) {
        $_SESSION['id'] = $idUsuario;
        $_SESSION['rol'] = 'client';
        header("Location: home-client.php");
        exit;
    }

    die("Error: este usuario no tiene rol asignado");

} catch (PDOException $e) {
    die("Error en la base de datos: " . $e->getMessage());
}

?>