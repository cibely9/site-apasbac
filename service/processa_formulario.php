<?php
// Configuração do banco de dados
$servername = "localhost"; // ou seu host
$username = "root"; // seu nome de usuário do banco
$password = ""; // sua senha do banco
$dbname = "nome_do_seu_banco"; // o nome do seu banco de dados

// Criação de conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Pegando os dados do formulário
$nome = $_POST['care_plan']; // Nome
$idade = $_POST['idade']; // Idade
$cidade = $_POST['cidade']; // Cidade
$estilo_vida = $_POST['lifestyle']; // Estilo de vida
$espaco = $_POST['space']; // Espaço
$alergias = $_POST['allergies']; // Alergias
$costos = $_POST['costs']; // Custos
$experiencia = $_POST['experience']; // Experiência
$tipo_animal = $_POST['pet_type']; // Tipo de animal
$filhos = isset($_POST['children']) ? 1 : 0; // Filhos
$outros_animais = isset($_POST['other_pets']) ? 1 : 0; // Outros animais
$nenhum = isset($_POST['none']) ? 1 : 0; // Nenhum
$comportamento = $_POST['behavior']; // Comportamento
$plano_cuidado = $_POST['care_plan']; // Plano de cuidado
$compromisso = $_POST['commitment']; // Compromisso

// Preparando a consulta SQL para inserção
$sql = "INSERT INTO adotantes (
    nome, idade, cidade, estilo_vida, espaco, alergias, custos, experiencia, tipo_animal, filhos, 
    outros_animais, nenhum, comportamento, plano_cuidado, compromisso
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Usando prepared statements para evitar SQL Injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("sisssssssssssss", $nome, $idade, $cidade, $estilo_vida, $espaco, $alergias, $costos, $experiencia, 
    $tipo_animal, $filhos, $outros_animais, $nenhum, $comportamento, $plano_cuidado, $compromisso);

// Executando a consulta
if ($stmt->execute()) {
    echo "Formulário enviado com sucesso!";
} else {
    echo "Erro ao enviar o formulário: " . $stmt->error;
}

// Fechando a conexão
$stmt->close();
$conn->close();
?>
