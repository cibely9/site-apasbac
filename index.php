<?php include("./components/head.html"); ?>

<body>

<nav class="menu">
    <div>
        <img src="img/logo2.jpg" alt="Logo" class="logo">
        <h1>APASBAC</h1>
    </div>
    <div class="nav-links">
        <a href="sobre.html">Sobre</a>
        <a href="https://wa.me/5544997063037" target="_blank">
            <img src="img/whatsapp10.png" alt="whatsapp" class="social-icon">
        </a>
        <a href="https://www.instagram.com/apasbac" target="_blank">
            <img src="img/instagram.png" alt="Instagram" class="social-icon">
        </a>
    </div>
</nav>

<?php include("./components/filtro.html"); ?>

<div id="container">
    <div class="pets-list">
        <?php
        include_once("./services/conexao.php");

        $sql = "SELECT * FROM cachorros";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            if (is_array($row) && ($row["nome"] != "")) {
                echo '<div class="pet-card">
                        <div class="pet-image">
                            <img src="uploads/' . $row['foto'] . '" alt="Imagem de ' . $row['nome'] . '" class="animal-img">
                        </div>
                        <div class="pet-details">
                            <h3>' . $row['nome'] . '</h3>
                            <p><strong>Sexo:</strong> ' . ucfirst($row['sexo']) . '</p>
                            <button class="details-button" onclick="showDetails(\'' . addslashes($row['nome']) . '\', \'' . $row['idade'] . '\', \'' . $row['pelagem'] . '\', \'' . $row['porte'] . '\')">
                                Detalhar
                            </button>
                            <a href="formulario.php?nome=' . urlencode($row['nome']) . '" class="interest-button">Tenho Interesse</a>
                        </div>
                    </div>';
            }
        }
        ?>        
    </div>
</div>

<!-- Modal para mostrar mais detalhes -->
<div id="detailsModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3 id="modalTitle"></h3>
        <p id="modalInfo"></p>
    </div>
</div>

<script>
function showDetails(petName, petIdade, petPelagem, petPorte) {
    const modal = document.getElementById("detailsModal");
    const modalTitle = document.getElementById("modalTitle");
    const modalInfo = document.getElementById("modalInfo");

    modalTitle.textContent = petName;
    modalInfo.innerHTML = `
        <p><strong>Idade:</strong> ${petIdade} anos</p>
        <p><strong>Pelagem:</strong> ${petPelagem}</p>
        <p><strong>Porte:</strong> ${petPorte}</p>
    `;

    modal.style.display = "block";
}

// Fechar o modal
document.querySelector(".close").addEventListener("click", () => {
    document.getElementById("detailsModal").style.display = "none";
});

// Fechar o modal ao clicar fora
window.onclick = function(event) {
    if (event.target == document.getElementById("detailsModal")) {
        document.getElementById("detailsModal").style.display = "none";
    }
};
</script>

<!-- Estilo CSS para as cards -->
<style>
    .pets-list {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        justify-content: center;
        padding: 20px;
    }

    .pet-card {
        width: 300px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s;
    }

    .pet-card:hover {
        transform: scale(1.05);
    }

    .pet-image img {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-bottom: 2px solid #eee;
    }

    .pet-details {
        padding: 15px;
        text-align: center;
    }

    .pet-details h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .pet-details p {
        font-size: 1rem;
        color: #555;
        margin-bottom: 8px;
    }

    .details-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        margin-top: 15px;
    }

    .details-button:hover {
        background-color: #45a049;
    }

    /* Estilo do modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
        padding-top: 60px;
    }

    .modal-content {
        background-color: #fff;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
        border-radius: 8px;
    }

    .close {
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        position: absolute;
        top: 10px;
        right: 25px;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .interest-button {
        background-color: #008000; /* Cor laranja */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        margin-top: 15px;
        display: inline-block;
        text-align: center;
        text-decoration: none; /* Remove o sublinhado do link */
    }

    .interest-button:hover {
        background-color: #228B22; /* Cor laranja mais escura */
    }
</style>

</body>
</html>
