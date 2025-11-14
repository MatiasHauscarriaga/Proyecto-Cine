<?php
require_once "../Clases/Pelicula.php";
session_start();

if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'client') {
    header("Location: ../index.php");
    exit;
}

$pelicula=new Pelicula();
$pelis = $pelicula->getAll();
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
</head>
<body class="bg-[#5b5b5b]">
    <div class="w-full">
        <img src="../images/banner.png" alt="Banner CineVibes" class="w-full h-64 object-cover">
    </div>
    <nav class="bg-gray-800 text-white flex justify-center space-x-6 py-4 shadow-md">
        <a href="home-client.php" class="hover:bg-gray-700 px-3 py-2 rounded">Home</a>
        <a href="perfil.php" class="hover:bg-gray-700 px-3 py-2 rounded">Perfil</a>
        <a href="../logout.php" class="hover:bg-red-600 px-3 py-2 rounded bg-red-500">Logout</a>
    </nav>
    <main class="flex flex-row items-center ">
       <?php foreach($pelis as $p):?>
          <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden w-72 m-4">
            <img src="<?= $p['imagen'] ?>" class="w-full h-full object-cover">
            <div class="p-4">
                <h2 class="text-xl text-red-500 font-bold mb-2"><?= $p['namePelicula'] ?></h2>
                <p class="text-white text-sm mb-4"><?= $p['genero'] ?></p>
                <form action="../Grilla-reservas/grilla.php" method="post">
                    <input type="hidden" name="idPelicula" value="<?=$p['idPelicula']?>">
                    <a href="../Grilla-reservas/grilla.php"><button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition">Reservar</button></a>
                </form>
            </div>
        </div>  
       <?php endforeach; ?> 
    </main>
</body>
</html>