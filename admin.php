<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['senha']) || $_SESSION['senha'] != "yohannalinda") {
    header("Location: login.php"); // Redireciona para o login
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - APASBAC</title>
    <link rel="stylesheet" href="style.css"> <!-- Link para o seu CSS, se necessário -->
</head>
<body>
    <div class="container">
        <h1>Painel Administrativo</h1>
        <a href="lista.php" class="button">Lista de Pets</a>
        <a href="respostas.php" class="button">Adoção Responsável</a>
    </div>
</body>
</html>
