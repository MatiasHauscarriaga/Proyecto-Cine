<?php
    require_once "../BD/database.php";
    require_once "../Clases/Usuario.php";
    $db = (new Database())->connect();

    $name=$_POST['nombreUsuario'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $telefono=$_POST['tel'];
    $cliente = new Cliente();
    $cliente->addCliente($name, $email, $password, $telefono);


    header("Location: ../index.php?success=1");
    exit;



?>
