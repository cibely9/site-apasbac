<?php
// Conectar ao banco de dados
include_once("./services/conexao.php");

// Verificar se o ID foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar os dados do adotante com base no ID
    $sql = "SELECT * FROM adotantes WHERE id = $id";
    $result = $conn->query($sql);

    // Verificar se o adotante foi encontrado
    if ($result->num_rows > 0) {
        $adotante = $result->fetch_assoc();
    } else {
        echo "<p>Adotante não encontrado.</p>";
        exit;
    }
} else {
    echo "<p>ID não fornecido.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include("./components/head.html"); ?>
    <style>
        /* Adicionar o CSS direto aqui ou importar um arquivo CSS externo */
        <?php include("./components/formulario.css.html"); ?>
    </style>
</head>

<body>
    <!-- Navegação -->
    <nav class="menu">
        <div>
            <img src="img/logo2.jpg" alt="Logo" class="logo">
            <h1>APASBAC</h1>
        </div>
        <div class="nav-links">
            <a href="about.html">Sobre</a>
            <a href="https://wa.me/5544997063037" target="_blank">
                <img src="img/whatsapp10.png" alt="whatsapp" class="social-icon">
            </a>
            <a href="https://www.instagram.com/apasbac" target="_blank">
                <img src="img/instagram.png" alt="Instagram" class="social-icon">
            </a>
            <a href="logout.php" class="logout-link">Sair</a>
        </div>
    </nav>

    <!-- Detalhes do Adotante -->
    <div class="container">
        <h2>Detalhes do Adotante</h2>

        <div class="adotante-details">
            <p><strong>Nome:</strong> <?php echo $adotante['nome']; ?></p>
            <p><strong>Idade:</strong> <?php echo $adotante['idade']; ?> anos</p>
            <p><strong>Cidade:</strong> <?php echo $adotante['cidade']; ?></p>
            <p><strong>Estilo de Vida:</strong> <?php echo $adotante['estilo_vida']; ?></p>
            <p><strong>Espaço para Animal:</strong> <?php echo $adotante['espaco']; ?></p>
            <p><strong>Alergias:</strong> <?php echo $adotante['alergias']; ?></p>
            <p><strong>Custos:</strong> <?php echo $adotante['custos']; ?></p>
            <p><strong>Experiência com Animais:</strong> <?php echo $adotante['experiencia']; ?></p>
            <p><strong>Tipo de Animal Desejado:</strong> <?php echo $adotante['tipo_animal']; ?></p>
            <p><strong>Comportamento:</strong> <?php echo $adotante['comportamento']; ?></p>
            <p><strong>Plano de Cuidado:</strong> <?php echo $adotante['plano_cuidado']; ?></p>
            <p><strong>Compromisso:</strong> <?php echo $adotante['compromisso']; ?></p>
        </div>

        <a href="index.php" class="button">Voltar para a lista</a>
    </div>

</body>

</html>
