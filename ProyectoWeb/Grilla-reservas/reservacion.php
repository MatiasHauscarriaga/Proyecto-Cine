<?php 
 session_start();
 require_once "../BD/database.php";
 require_once "../Clases/Reserva.php";
 require_once "../Clases/Funciones.php";
 require_once "../Clases/Pelicula.php";
 require_once "../Clases/Asientos.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar'])) {
    $reserva = new Reserva();
    $reserva->crearReserva($_POST['idFuncion'], $_POST['idAsiento'],$_SESSION['id']);
    echo "<script>alert('Reserva creada con éxito'); window.location.href='../Home/home-client.php';</script>";
    exit;
}

 $idFuncion = $_POST['idFuncion'];
 $idAsiento = $_POST['nroAsiento'];
 $idCliente = $_SESSION['id'];  
 $idPelicula=$_POST['idPelicula'];

 $funcion = (new Funciones())->getById($idFuncion); 
 $pelicula = (new Pelicula())->getById($idPelicula);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Confirmar Reserva</title>
</head>
<body class="bg-[#5b5b5b] text-white font-sans p-8">
    <div class="max-w-2xl mx-auto bg-[#2f2f2f] rounded-xl p-6 shadow-lg">
        <h1 class="text-3xl font-bold mb-4 text-center">Confirmar Reserva</h1>

        <div class="space-y-3 text-lg">
            <p><strong>🎬 Película:</strong> <?=$pelicula['namePelicula'] ?></p>
            <p><strong>🕓 Horario:</strong> <?= ($funcion['horaInicio']) ?> hs</p>
            <p><strong>💺 Asiento:</strong> <?=($idAsiento) ?></p>
        </div>

        <form method="POST"  class="mt-8 text-center">
            <input type="hidden" name="idFuncion" value="<?= $idFuncion ?>">
            <input type="hidden" name="idAsiento" value="<?= $idAsiento ?>">
            <button type="submit" name="confirmar" class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
                Confirmar Reserva
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="javascript:history.back()" class="text-gray-300 hover:underline">⬅️ Volver</a>
        </div>
    </div>
</body>
</html>