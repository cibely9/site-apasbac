<?php
// Conectar ao banco de dados
include_once("./services/conexao.php");

// Consultar os dados do banco de dados
$sql = "SELECT * FROM adotantes";
$result = $conn->query($sql);
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
            <h1><a href="index.php" class="button">APASBAC</a></h1>
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

    <!-- Contêiner de Respostas -->
    <div class="container">
        <h2>Respostas do Formulário de Adoção</h2>

        <?php
        if ($result->num_rows > 0) {
            // Exibe os dados em uma tabela
            echo "<table class='result-table'>";
            echo "<thead><tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Cidade</th>
                    <th>Estilo de Vida</th>
                    <th>Espaço</th>
                    <th>Alergias</th>
                    <th>Custos</th>
                    <th>Experiência</th>
                    <th>Tipo de Animal</th>
                    <th>Comportamento</th>
                    <th>Plano de Cuidado</th>
                    <th>Compromisso</th>
                    <th>Ações</th>
                </tr></thead><tbody>";

            // Exibe as respostas de cada adotante
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["nome"] . "</td>
                        <td>" . $row["idade"] . "</td>
                        <td>" . $row["cidade"] . "</td>
                        <td>" . $row["estilo_vida"] . "</td>
                        <td>" . $row["espaco"] . "</td>
                        <td>" . $row["alergias"] . "</td>
                        <td>" . $row["custos"] . "</td>
                        <td>" . $row["experiencia"] . "</td>
                        <td>" . $row["tipo_animal"] . "</td>
                        <td>" . $row["comportamento"] . "</td>
                        <td>" . $row["plano_cuidado"] . "</td>
                        <td>" . $row["compromisso"] . "</td>
                        <td>
                            <a href='detalhes_adotante.php?id=" . $row["id"] . "' class='details-btn'>Detalhes</a> 
                            <a href='excluir.php?id=" . $row["id"] . "' class='delete-btn' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                        </td>
                    </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>Ainda não há respostas cadastradas.</p>";
        }

        // Fechar a conexão
        $conn->close();
        ?>
        
    </div>

</body>

</html>
