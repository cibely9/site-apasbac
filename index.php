<!DOCTYPE html>
<html lang="en">

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
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <!-- Exemplo de slide fixo -->
            <div class="swiper-slide" data-index="0" data-category="macho">
                <div class="slide-content">
                    <h2 class="title">Cachorro</h2>
                    <div class="caption">Porte grande</div>
                    <img src="img/cachorro7.jpg" alt="Imagem de um cachorro">
                </div>
            </div>

            <?php
            include_once("./services/conexao.php");

            // Obtém os parâmetros via GET (caso existam)
            $animal_type = isset($_GET['animal-type']) ? $_GET['animal-type'] : '';
            $animal_sex = isset($_GET['animal-sex']) ? $_GET['animal-sex'] : '';
            $animal_size = isset($_GET['animal-size']) ? $_GET['animal-size'] : '';

            // Ajusta a consulta SQL com base nos parâmetros
            $sql = "SELECT * FROM cachorros WHERE 1=1"; 

            if ($animal_type && $animal_type != 'todos') {
                $sql .= " AND tipo = '$animal_type'"; 
            }

            if ($animal_sex && $animal_sex != 'todos') {
                $sql .= " AND sexo = '$animal_sex'"; 
            }

            if ($animal_size && $animal_size != 'todos') {
                $sql .= " AND porte = '$animal_size'"; 
            }
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                if (is_array($row) && ($row["nome"] != "")) {
                    echo '<div class="swiper-slide" data-index="' . $row['nome'] . '" data-category="cachorro">
                            <div class="slide-content">
                                <h2 class="title">' . $row['nome'] . '</h2>
                                <div class="caption">' . $row['porte'] . '</div>
                                <img src="uploads/' . $row['foto'] . '" width="100" height="100" alt="Imagem de um cachorro">
                                <button onclick="tenhointeresse(\'' . $row['nome'] . '\')" class="interest-btn">Tenho interesse</button>
                            </div>
                          </div>';
                }
            }
            ?>
        </div>

        <div class="swiper-pagination"></div>

        <div class="button-container">
            <div class="action-buttons">
                <button id="discard-button">Próximo</button>
            </div>
        </div>
    </div>
</div>

<script>
    function tenhointeresse(nomeanimal) {
        window.location.href = "formulario.php?nome=" + nomeanimal;
    }

    document.addEventListener("DOMContentLoaded", () => {
        const swiper = new Swiper('.swiper-container', {
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            loop: true,
        });

        const discardButton = document.getElementById("discard-button");
        discardButton.addEventListener("click", () => {
            swiper.slideNext();  
        });
    });
</script>

</body>
</html>
