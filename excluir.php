<?php
// Conectar ao banco de dados
include_once("./services/conexao.php");

// Verifica se o parâmetro "id" foi passado na URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Preparar a consulta para excluir o registro
    $stmt = $conn->prepare("DELETE FROM adotantes WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    // Executar a consulta
    if ($stmt->execute()) {
        // Redirecionar para a página de respostas após exclusão
        header("Location: respostas.php?msg=excluido");
        exit();
    } else {
        // Caso ocorra um erro na exclusão
        echo "<p style='color: red; text-align: center;'>Erro ao excluir o registro. Tente novamente.</p>";
    }

    // Fechar a consulta e a conexão
    $stmt->close();
} else {
    echo "<p style='color: red; text-align: center;'>ID inválido. Não foi possível excluir o registro.</p>";
}

// Fechar a conexão
$conn->close();
?>
