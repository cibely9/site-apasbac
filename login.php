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