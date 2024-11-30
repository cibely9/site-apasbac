<?php
$servername = "localhost";  // ou o IP do servidor MySQL
$username = "root";         // seu nome de usuário MySQL
$password = "";             // sua senha MySQL (em branco se não houver senha)
$dbname = "adocao_animais"; // nome do banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>

