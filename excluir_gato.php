<?php
session_start();

// Verifique se a sessão está ativa e a senha é correta
if (isset($_SESSION['senha']) && $_SESSION['senha'] == "yohannalinda") {
    if (isset($_POST['pet_id'])) {
        include_once("./services/conexao.php");

        $pet_id = $_POST['pet_id'];

        // Consultar o pet para pegar o nome da foto
        $stmt = $conn->prepare("SELECT foto FROM gatos WHERE id = ?");
        $stmt->bind_param("i", $pet_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $pet = $result->fetch_assoc();

        if ($pet) {
            // Deletar o arquivo de imagem
            $fotoPath = "uploads/" . $pet['foto'] . ".jpeg";
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }

            // Deletar o pet do banco de dados
            $deleteStmt = $conn->prepare("DELETE FROM gatos WHERE id = ?");
            $deleteStmt->bind_param("i", $pet_id);
            $deleteStmt->execute();

            // Redirecionar após a exclusão
            header("Location: lista.php");
            exit();
        } else {
            echo "Pet não encontrado.";
        }

        $stmt->close();
        $conn->close();
    }

}