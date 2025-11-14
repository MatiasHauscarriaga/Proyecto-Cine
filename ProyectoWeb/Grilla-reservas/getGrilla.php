<?php
require_once "../BD/database.php";
require_once "../Clases/Reserva.php";
require_once "../Clases/Asientos.php";

$idFuncion = $_GET['idFuncion']; 
$idPelicula = $_GET['idPelicula']; 

if (!$idFuncion) {
    exit("Error: no se recibió el id de la función");
}

 $asientos=new Asientos;
 $asientos=$asientos->getAll();
 $reservas=new Reserva;
 $reservas=$reservas->getAll();

 $reservasFuncion = [];
 foreach ($reservas as $r) {
    if ($r['idFuncion'] == $idFuncion) {
        $reservasFuncion[] = $r;
    }
 }
 
 $asientosOcupados = array_column($reservasFuncion, 'idAsiento');

?>

<h2 class=" font-serif text-3xl font-bold mb-4  justify-center">Seleccione su asiento</h2>
<div class="bg-black w-4/5 h-16 grid place-content-center rounded-lg text-white font-bold border-2 border-white text-3xl">Pantalla</div>

<div class="grid grid-cols-3 gap-7">
    <?php for ($i = 1; $i < 36; $i++): ?>
        <?php if (in_array($i, $asientosOcupados)): ?>
            <div class="bg-red-600 w-24 h-24 grid place-content-center rounded-lg text-white font-bold border-2 border-red-700 hover:bg-red-500 text-4xl"><?= $i ?></div>
        <?php else: ?>
            <form action="reservacion.php" method="post">
                <input type="hidden" name="idFuncion" value="<?= $idFuncion ?>">
                <input type="hidden" name="nroAsiento" value="<?= $i ?>">
                <input type="hidden" name="idPelicula" value="<?= $idPelicula ?>"> 
                <button type="submit"><div class="bg-green-600 w-24 h-24 grid place-content-center rounded-lg text-white font-bold border-2 border-green-700 hover:bg-green-500 text-4xl"><?= $i ?></div></button>
            </form>
        <?php endif; ?>
    <?php endfor; ?>
</div>