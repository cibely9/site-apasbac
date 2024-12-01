<?php
session_start();

if (isset($_SESSION['senha'])) {
    if ($_SESSION['senha'] != "yohannalinda") {
        header("Location: /login.php");
        exit();
    }
} else {
    header("Location: /login.php");
    exit();
}

include_once("./services/conexao.php");

// Consultar os cachorros
$cachorrosQuery = "SELECT * FROM cachorros";
$cachorrosResult = $conn->query($cachorrosQuery);

// Consultar os gatos
$gatosQuery = "SELECT * FROM gatos";
$gatosResult = $conn->query($gatosQuery);
?>

<?php include("./components/head.html"); ?>

<head>
    <style>
        .container {
            display: table;
            margin: auto;
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
        }

        .pet-list {
            list-style-type: none;
            padding: 0;
        }

        .pet-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 1rem;
        }

        .pet-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 1rem;
        }

        .pet-item .info {
            flex-grow: 1;
        }

        .pet-item .info h3 {
            margin: 0;
            font-size: 1.2rem;
        }

        .pet-item .info p {
            margin: 0.2rem 0;
            font-size: 1rem;
        }

        .logout-link {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.75rem 1.5rem;
            background-color: #e74c3c;
            color: white;
            text-align: center;
            border-radius: 4px;
            text-decoration: none;
            font-size: 1rem;
            cursor: pointer;
            width: 100%;
        }

        .logout-link:hover {
            background-color: #c0392b;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
            font-size: 1rem;
            border-radius: 4px;
            margin-left: 1rem;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>

    <?php include("./components/navbar.html"); ?>

    <div class="container">
        <h1>Lista de Pets Cadastrados</h1>

        <h2>Cachorros</h2>
        <ul class="pet-list">
            <?php if ($cachorrosResult->num_rows > 0): ?>
                <?php while ($pet = $cachorrosResult->fetch_assoc()): ?>
                    <li class="pet-item">
                        <?php
                        if (file_exists("uploads/" . $pet['foto'] . ".jpeg")) { ?>
                            <img src="uploads/<?= $pet['foto'] ?>.jpeg" alt="Foto do Pet">
                        <?php } ?>

                        <div class="info">
                            <h3><?= $pet['nome'] ?></h3>
                            <p><strong>Sexo:</strong> <?= ucfirst($pet['sexo']) ?></p>
                            <p><strong>Porte:</strong> <?= ucfirst($pet['porte']) ?></p>
                            <p><strong>Pelagem:</strong> <?= ucfirst($pet['pelagem']) ?></p>
                        </div>

                        <!-- Botão de Excluir -->
                        <form method="POST" action="excluir_cachorro.php" style="display:inline;">
                        <input type="hidden" name="pet_id" value="<?= $pet['id'] ?>">
                            <button type="submit" class="delete-btn" onclick="return confirm('Tem certeza que deseja excluir este pet?');">Excluir</button>
                        </form>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Nenhum cachorro cadastrado.</p>
            <?php endif; ?>
        </ul>

        <h2>Gatos</h2>
        <ul class="pet-list">
            <?php if ($gatosResult->num_rows > 0): ?>
                <?php while ($pet = $gatosResult->fetch_assoc()): ?>
                    <li class="pet-item">
                        <?php
                        if (file_exists("uploads/" . $pet['foto'] . ".jpeg")) { ?>
                            <img src="uploads/<?= $pet['foto'] ?>.jpeg" alt="Foto do Pet">
                        <?php } ?>

                        <div class="info">
                            <h3><?= $pet['nome'] ?></h3>
                            <p><strong>Sexo:</strong> <?= ucfirst($pet['sexo']) ?></p>
                            <p><strong>Porte:</strong> <?= ucfirst($pet['porte']) ?></p>
                            <p><strong>Pelagem:</strong> <?= ucfirst($pet['pelagem']) ?></p>
                        </div>

                        <!-- Botão de Excluir -->
                        <form method="POST" action="excluir_gato.php" style="display:inline;">
                        <input type="hidden" name="pet_id" value="<?= $pet['id'] ?>">
                            <button type="submit" class="delete-btn" onclick="return confirm('Tem certeza que deseja excluir este pet?');">Excluir</button>
                        </form>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Nenhum gato cadastrado.</p>
            <?php endif; ?>
        </ul>

        <!-- Botão de Logout -->
       
    </div>

</body>

</html>

<?php
// Fechar conexão
$conn->close();
?>
