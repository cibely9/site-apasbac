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
    <?php include("./components/formulario.css.html"); ?>
    <style>
        .details-btn, .delete-btn {
            display: block;
            margin: 5px 0;
            padding: 8px 15px;
            font-size: 14px;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }

        .details-btn {
            background-color: #007BFF; /* Azul */
        }

        .delete-btn {
            background-color: #DC3545; /* Vermelho */
        }

        .details-btn:hover {
            background-color: #0056b3;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .animal-image {
            width: 100%;
            max-width: 300px;
            margin-bottom: 10px;
        }

        /* Estilo para o botão de sair */
        .logout-btn {
            background-color: #f44336; /* Cor de fundo vermelha */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-left: 15px; /* Espaçamento ao lado dos ícones */
            font-size: 16px;
        }

        .logout-btn:hover {
            background-color: #e53935; /* Cor de fundo vermelha mais escura no hover */
        }
    </style>
</head>

<body>
<?php include("./components/navbar.html"); ?>

<div class="container">
    <h2>Respostas do Formulário de Adoção</h2>

    <?php if ($result->num_rows > 0): ?>
        <table class="result-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Contato</th>
                    <th>Cidade</th>
                    <th>Estilo de Vida</th>
                    <th>Espaço</th>
                    <th>Alergias</th>
                    <th>Custos</th>
                    <th>Experiência</th>
                    <th>Motivo</th>
                    <th>Comportamento</th>
                    <th>Plano de Cuidado</th>
                    <th>Compromisso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["nome"]; ?></td>
                        <td><?php echo $row["idade"]; ?></td>
                        <td><?php echo $row["contato"]; ?></td>
                        <td><?php echo $row["cidade"]; ?></td>
                        <td><?php echo $row["estilo_vida"]; ?></td>
                        <td><?php echo $row["espaco"]; ?></td>
                        <td><?php echo $row["alergias"]; ?></td>
                        <td><?php echo $row["custos"]; ?></td>
                        <td><?php echo $row["experiencia"]; ?></td>
                        <td><?php echo $row["motivo"] ; ?></td>
                        <td><?php echo $row["comportamento"]; ?></td>
                        <td><?php echo $row["plano_cuidado"]; ?></td>
                        <td><?php echo $row["compromisso"]; ?></td>
                        <td>
                            <button class="details-btn" onclick="openModal(<?php echo htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8'); ?>)">Detalhes</button>

                            <a href="excluir.php?id=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Ainda não há respostas cadastradas.</p>
    <?php endif; ?>

    <!-- Modal para os detalhes -->
    <div id="details-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img id="animal-image" class="animal-image" src="" alt="Foto do animal">
            <h3 id="animal-name"></h3>
        </div>
    </div>
</div>

<script>
    function openModal(data) {
        const modal = document.getElementById('details-modal');
        const image = document.getElementById('animal-image');
        const name = document.getElementById('animal-name');

        // Verificar se a foto existe
        if (data.foto && data.foto !== "") {
            image.src = "uploads/" + data.foto; // Ajuste conforme o caminho real
        } else {
            image.src = "uploads/default.jpg"; // Imagem padrão caso não tenha foto
        }

        // Setando os dados no modal
        name.textContent = data.nome;

        // Mostrando o modal
        modal.style.display = "block";
    }

    function closeModal() {
        const modal = document.getElementById('details-modal');
        modal.style.display = "none";
    }

    // Fechar modal ao clicar fora dele
    window.onclick = function (event) {
        const modal = document.getElementById('details-modal');
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };
</script>

</body>
</html>
