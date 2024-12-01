<!DOCTYPE html>
<html lang="en">

<?php

session_start();

$senha = "yohannalinda";
$taErrado = false;
if (isset($_POST['senha'])) {
    if ($_POST['senha'] == $senha) {
        $_SESSION['senha'] = $senha;
        header("Location: /registro.php");
    } else {
        $taErrado = true;
    }
}


?>

<?php include("./components/head.html"); ?>

<body>

<nav class="navbar">
    <div class="navbar-left">
    <img src="img/logo5.png" alt="Logo" class="logo" style="width: 160px; height: auto;">

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
<style>

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #A9A9A9; /* Azul claro vibrante */
    padding: 12px 25px;
    color: white;
    height: 75px;
}

/* Logo */
.navbar-left {
    display: flex;
    align-items: center;
    gap: 10px; /* Dá um espaço entre a logo e o título */
}

.logo {
    height: 50px; /* Ajuste o tamanho da logo conforme necessário */
    width: auto;
}

/* Título APASBAC */
.navbar-left h1 {
    font-size: 24px;
    margin: 0;
    font-family: Arial, sans-serif;
}

/* Ícones */
.navbar-right {
    display: flex;
    gap: 25px;
}

.social-icon {
    color: white;
    font-size: 30px;
    transition: transform 0.3s ease;
    text-decoration: none;
}

.social-icon:hover {
    transform: scale(1.1);
}

.social-icon i {
    color: white;
}
    </style>

    <div id="container" style="display: flex; flex-direction: column; gap: 1rem;">
        <?php if ($taErrado == true) {
            echo "<h1 style='color: red;'>Senha inválida</h1>";
        }
        ?>
        <form id="form" action="login.php" method="POST">
            <label for="senha">Digite a senha de acesso:</label>
            <input type="password" id="senha" name="senha" />
            <input type="submit" />
        </form>
    </div>

</body>

</html>