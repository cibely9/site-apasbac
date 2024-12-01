<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include("./components/head.html"); ?>
    <?php include("./components/formulario.css.html"); ?>
    <style>
    /* Estilo da navbar */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #A9A9A9;
        padding: 10px 30px;
        color: white;
        height: 75px;
    }

    .navbar-left .logo {
        max-width: 180px; /* Aumentando o tamanho da logo */
        height: auto;
    }

    .navbar-right {
        display: flex;
        gap: 20px;
    }
    .logo {
    width: 180px; /* Aumentando o tamanho da logo */
    height: auto; /* Mantendo a proporção da imagem */
    margin-right: 10px; /* Espaço entre a logo e o título */
}

    .social-icon {
        color: white;
        font-size: 25px; /* Tamanho uniforme para os ícones */
        transition: transform 0.3s ease;
    }

    .social-icon:hover {
        transform: scale(1.1);
    }
        /* Estilo para centralizar o título do formulário */
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>

    <?php
    if (isset($_GET['nome'])) {
        $nome = $_GET['nome'];
        include_once('services/conexao.php');

        // Consulta SQL para buscar os dados do animal
        $stmt = $conn->prepare("SELECT nome, idade, pelagem, porte, sexo, foto FROM cachorros WHERE nome = ?");
        $stmt->bind_param("s", $nome);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nome = $row['nome'];
            $idade = $row['idade'];
            $pelagem = $row['pelagem'];
            $porte = $row['porte'];
            $sexo = $row['sexo'];
            $foto = $row['foto'];
        } else {
            echo "Nenhum cachorro encontrado com o nome '$nome'.";
            exit;
        }
    } else {
        echo "Parâmetro 'nome' não fornecido na URL.";
        exit;
    }
    ?>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-left">
            <img src="img/logo5.png" alt="Logo" class="logo" style="width: 120px; height: auto;">
        </div>
        <div class="navbar-right">
            <a href="https://wa.me/5544997063037" target="_blank" class="social-icon">
                <i class="fab fa-whatsapp"></i> <!-- Ícone do WhatsApp -->
            </a>
            <a href="https://www.instagram.com/apasbac" target="_blank" class="social-icon">
                <i class="fab fa-instagram"></i> <!-- Ícone do Instagram -->
            </a>
        </div>
    </nav>

    <div class="form-container">
        <h2>Formulário de Adoção de Animais</h2>
        <form method="POST" action="processa_formulario.php">

            <!-- Nome do animal exibido acima da foto -->
            <div id="animal-info-container">
                <h3 style="text-align:center;"><?php echo htmlspecialchars($nome); ?></h3>
                <div id="animal-image-container" style="display:<?php echo $foto ? 'block' : 'none'; ?>;">
                    <img id="animal-image" src="uploads/<?php echo $foto; ?>" alt="Foto do animal"
                        style="width: 100%; max-width: 300px; display: block; margin: 0 auto;">
                </div>
            </div>

            <!-- Campos do formulário -->
            <label for="nome">Qual é seu nome?</label>
            <input type="text" id="nome" name="nome" required>

            <label for="idade">Qual é sua idade?</label>
            <input type="number" id="idade" name="idade" required>

            <label for="contato">Qual é seu telefone para contato?</label>
            <input type="number" id="contato" name="contato" required>

            <label for="cidade">Qual o nome da cidade em que você mora?</label>
            <input type="text" id="cidade" name="cidade" required>

            <label for="estilo_vida">Qual é o seu estilo de vida?</label>
            <select id="estilo_vida" name="estilo_vida" required>
                <option value="">Selecione uma opção</option>
                <option value="ativo">Muito ativo</option>
                <option value="moderado">Moderadamente ativo</option>
                <option value="sedentario">Sedentário</option>
            </select>

            <label for="espaco">Você tem espaço em casa para um animal de estimação?</label>
            <select id="espaco" name="espaco" required>
                <option value="">Selecione uma opção</option>
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
                <option value="limitado">Espaço limitado</option>
            </select>

            <label for="alergias">Você tem alergias ou restrições de saúde que possam afetar a adoção de um animal de estimação?</label>
            <select id="alergias" name="alergias" required>
                <option value="">Selecione uma opção</option>
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
                <option value="nao_sei">Não tenho certeza</option>
            </select>

            <label for="custos">Você está preparado para os custos associados à adoção de um animal de estimação?</label>
            <select id="custos" name="custos" required>
                <option value="">Selecione uma opção</option>
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
                <option value="nao_sei">Não tenho certeza</option>
            </select>

            <label for="experiencia">Você tem experiência com animais de estimação?</label>
            <select id="experiencia" name="experiencia" required>
                <option value="">Selecione uma opção</option>
                <option value="muita">Muita experiência</option>
                <option value="alguma">Alguma experiência</option>
                <option value="nenhuma">Nenhuma experiência</option>
            </select>

            <label for="motivo">O que te motiva a fazer a adoção?</label>
            <input type="text" id="motivo" name="motivo" required>

            <label for="comportamento">Você está preparado para lidar com os comportamentos e necessidades de um animal de estimação?</label>
            <select id="comportamento" name="comportamento" required>
                <option value="">Selecione uma opção</option>
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
                <option value="nao_sei">Não tenho certeza</option>
            </select>

            <label for="plano_cuidado">Você está disposto a se comprometer com a adoção a longo prazo?</label>
            <select id="plano_cuidado" name="plano_cuidado" required>
                <option value="">Selecione uma opção</option>
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
                <option value="nao_sei">Não tenho certeza</option>
            </select>

            <button type="submit">Enviar Formulário</button>
        </form>
    </div>
</body>

</html>
