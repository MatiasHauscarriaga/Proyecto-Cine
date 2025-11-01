
<?php
session_start();


if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'admin') {
    
    header("Location: ../index.php");
    exit;
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home Admin</title>
</head>
<body class="bg-[#5b5b5b]">
    <h1>Hola Admin 😎</h1>
    
</body>
</html>