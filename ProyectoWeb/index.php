<?php
    require_once "BD/database.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Iniciar Sesion</title>
</head>
<body class="bg-[url(images/pochoclos.png)] bg-fixed bg-repeat-round "> 
    <?php if(isset($_GET['success'])): ?>
        <div id="toast" class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg opacity-0 transition-opacity duration-500">
            Usuario creado correctamente!
        </div>
        <script>
            const toast = document.getElementById('toast');
            toast.classList.remove('opacity-0'); // Aparece
            toast.classList.add('opacity-100');

            setTimeout(() => {
                toast.classList.remove('opacity-100');
                toast.classList.add('opacity-0');
            }, 3000);
        </script>
    <?php endif; ?>

    <br>
    <div class="flex flex-col items-center justify-center min-h-screen">    
    <h2 class=" font-serif text-3xl font-bold mb-4">Inicie Sesion</h2>
    <form method="post" action="Home/verify.php" class="flex flex-col space-y-4">
        <p class="font-serif font-bold mt-4 ">Correo Electronico</p> <input type="text" placeholder="example@xmail.com" name="email" required class="p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 transition delay-100 duration-150 ease-in-out hover:-translate-y-1 hover:scale-110"> <br>
        <p class="font-serif font-bold mt-4">Contraseña</p> <input type="password" placeholder="contraseña" name="pass" required class="p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 transition delay-100 duration-150 ease-in-out hover:-translate-y-1 hover:scale-110"> 
        <br>
        <div class="flex justify-center">
            <button class=" bg-red-600 text-black font-bold w-24 py-2 rounded-lg hover:bg-red-400" type="submit">Ingresar</button>
        </div>
    </form>
    <br>
    <h2 class="text-2xl font-bold mb-4">Eres nuevo aqui?</h2>
    <a href="Register/register.php"><button class=" bg-red-600 text-black font-bold w-24 py-1 rounded-lg hover:bg-red-400">Registrate</button></a>
    </div>    
</body>
</html>