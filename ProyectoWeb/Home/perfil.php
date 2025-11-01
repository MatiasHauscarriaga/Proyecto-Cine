<?php
//visualizar perfil.
session_start();
require_once "../BD/database.php";
//var_dump($_SESSION['id']);

$db = (new Database())->connect();
$stmt = $db->prepare("SELECT * FROM usuario WHERE idUsuario = ?");
$stmt->execute([$_SESSION['id']]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Mi Perfil</title>
</head>
<body class="bg-[#5b5b5b]">
    <div class="w-full">
        <img src="../images/banner.png" alt="Banner CineVibes" class="w-full h-64 object-cover">
    </div>
    <nav class="bg-gray-800 text-white flex justify-center space-x-6 py-4 shadow-md">
        <a href="home-client.php" class="hover:bg-gray-700 px-3 py-2 rounded">Home</a>
        <a href="../logout.php" class="hover:bg-red-600 px-3 py-2 rounded bg-red-500">Logout</a>
    </nav>
    <div class="min-h-screen flex items-center justify-center p-5">
        <div class="w-full max-w-sm bg-white rounded-2xl shadow-lg p-5">
            <h2 class="text-xl font-semibold mb-4">Perfil</h2>
            <div class="flex items-center justify-between">
                <span class="text-gray-600 font-medium">Nombre de usuario:</span>
                <span class="text-gray-800"><?=$usuario['name']?></span>
            </div>

            <div class="flex items-center justify-between">
                <span class="text-gray-600 font-medium">E-mail:</span>
                <span class="text-gray-800"><?=$usuario['email']?></span>
            </div>
        </div>
    </div>
</body>
</html>