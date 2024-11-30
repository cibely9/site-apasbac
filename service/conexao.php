<?php

php_info();


$servername = "localhost";
$username = "root";  // Altere conforme necessário
$password = "";      // Altere conforme necessário
$dbname = "apasbac"; // Nome do seu banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}



?>