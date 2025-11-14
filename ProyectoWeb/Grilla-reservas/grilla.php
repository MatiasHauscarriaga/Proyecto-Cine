<?php
    session_start();
    require_once"../BD/database.php";
    require_once"../Clases/Reserva.php";
    require_once"../Clases/Pelicula.php";
    require_once"../Clases/Funciones.php";
    require_once"../Clases/Asientos.php";
    $asientos=new Asientos;
    $asientos=$asientos->getAll();
    
    $funciones=new Funciones;
    $funciones=$funciones->getAll();
    
    $idPelicula=$_POST['idPelicula'];

    $reservas=new Reserva;
    $reservas=$reservas->getAll();

    $funcionesPelicula=[];
    foreach ($funciones as $f) {
        if ($f['idPelicula'] == $idPelicula) {
            $funcionesPelicula[] = $f; 
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Seleccionar Asiento</title>
</head>
<body class=" bg-[#5b5b5b] p-4">
    
    <h2 class=" font-serif text-3xl font-bold mb-4  justify-center">Seleccione el horario de la funcion</h2>
    <input type="hidden" id="idPeliculaHidden" value="<?= $idPelicula ?>">
    <select id="selectFuncion">
        <option value="" disabled selected>Elegi un horario</option>
        <?php foreach($funcionesPelicula as $f):?>
            <option value="<?=$f['idFuncion']?>"><?=$f['horaInicio']?> hs</option>
        <?php endforeach;?>
    </select>
    <div id="grillaAsientos" class="flex flex-col items-center space-y-10"></div>
   <script>
     document.getElementById('selectFuncion').addEventListener('change', function() {
    const idFuncion = this.value;
    const idPelicula = document.getElementById('idPeliculaHidden').value;

    fetch('getGrilla.php?idFuncion=' + idFuncion + '&idPelicula=' + idPelicula)
        .then(res => res.text())
        .then(html => {
            document.getElementById('grillaAsientos').innerHTML = html;
        })
        .catch(err => console.error(err));
});
</script>
</body>
</html>