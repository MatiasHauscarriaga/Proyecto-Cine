<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Registrate</title>
</head>
<body class="bg-[url(../images/pochoclos.png)] bg-fixed bg-repeat-round">
    <div class="flex items-center justify-center">
    <form method="post" action="succesfully-register.php">
        <fieldset class="max-w-40 max-h-70 border-2 border-red-700 p-4 rounded-xl mb-4 mt-12">
            <legend class=" font-serif text-3xl font-bold text-black">Registrese</legend>
            <label>    
                <p class="font-serif font-bold mt-4">Ingrese su nombre de usuario: </p>   
                <input class="p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 transition delay-100 duration-150 ease-in-out hover:-translate-y-1 hover:scale-110" type="text" placeholder="nombre" name="nombreUsuario" required><br>
            </label>
            <label>    
                <p class="font-serif font-bold mt-4">Ingrese su email: </p>               
                <input class="p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 transition delay-100 duration-150 ease-in-out hover:-translate-y-1 hover:scale-110" type="text" placeholder="example@xmail.com" name="email" required><br>
            </label>
            <label>
                <p class="font-serif font-bold mt-4">Ingrese su contraseña: </p>   
                <input class="p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 transition delay-100 duration-150 ease-in-out hover:-translate-y-1 hover:scale-110" type="password" placeholder="contraseña" name="password" required><br>
            </label>
            <label>
                <p class="font-serif font-bold mt-4">Ingrese su Telefono: </p>   
                <input class="p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 transition delay-100 duration-150 ease-in-out hover:-translate-y-1 hover:scale-110" type="tel" placeholder="3446-XX-XXXX" name="tel" required><br>
                <br>
            </label>
        </fieldset> 
        <div class="flex justify-center">
            <button class=" bg-red-600 text-black font-bold w-32 py-3 rounded-lg hover:bg-red-400" type="sumbit">Registrarse</button>  
        </div>     
    </form>
    </div>
</body>
</html>