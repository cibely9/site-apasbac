<?php
include_once("./services/conexao.php");

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Receber os dados do formulário
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $contato = $_POST['contato'];
    $cidade = $_POST['cidade'];
    $estilo_vida = $_POST['estilo_vida'];
    $espaco = $_POST['espaco'];
    $alergias = $_POST['alergias'];
    $custos = $_POST['custos'];
    $experiencia = $_POST['experiencia'];
    $motivo = $_POST['motivo'];
    $comportamento = $_POST['comportamento'];
    $plano_cuidado = $_POST['plano_cuidado'];
    $compromisso = "Sim"; // Ajuste conforme necessário

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO adotantes (nome, idade, contato, cidade, estilo_vida, espaco, alergias, custos, experiencia, motivo, comportamento, plano_cuidado, compromisso)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssssssssss", $nome, $idade, $contato, $cidade, $estilo_vida, $espaco, $alergias, $custos, $experiencia, $motivo, $comportamento, $plano_cuidado, $compromisso);

    if ($stmt->execute()) {
        echo "Formulário enviado com sucesso!";
        header("Location: perfil_avalicao.php");
        exit;
        
        exit;
    } else {
        echo "Erro ao enviar o formulário: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    
}
?>
