<?php
include_once("./services/conexao.php");
include("./components/head.html");
// Consultar cachorros
$sqlDogs = "SELECT * FROM cachorros";
$resultDogs = mysqli_query($conn, $sqlDogs);

// Consultar gatos
$sqlCats = "SELECT * FROM gatos";
$resultCats = mysqli_query($conn, $sqlCats);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets Registrados</title>
    <link rel="stylesheet" href="styles/style.css">
    <head>
    <!-- Adicionando o CDN do Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>

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

</body>
<!-- Modal -->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
</div>



<script>
    // Abrir o modal quando a imagem for clicada
function openModal(imgSrc) {
    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("img01");
    modal.style.display = "flex"; // Exibe o modal
    modalImg.src = imgSrc;
}

// Fechar o modal
function closeModal() {
    var modal = document.getElementById('myModal');
    modal.style.display = "none"; // Esconde o modal
}

// Adicionar evento de clique nas imagens
var images = document.querySelectorAll('.card img');
images.forEach(function(image) {
    image.addEventListener('click', function() {
        openModal(image.src);
    });
});

// Evento de fechar o modal quando clicar no botão de fechar
var closeBtn = document.querySelector('.close');
closeBtn.addEventListener('click', closeModal);

// Fechar o modal quando clicar fora da imagem (na área escura)
var modal = document.getElementById('myModal');
modal.addEventListener('click', function(event) {
    // Verifica se o clique foi fora do conteúdo do modal (se não foi no .modal-content)
    if (event.target === modal) {
        closeModal();
    }
});

</script>


    <style>
/* Modal */
.modal {
    display: none; /* Oculto por padrão */
    position: fixed;
    z-index: 1000;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8); /* Fundo escuro */
    display: flex; /* Usando flexbox para centralizar */
    justify-content: center; /* Centraliza horizontalmente */
    align-items: center; /* Centraliza verticalmente */
}

/* Conteúdo do modal */
.modal-content {
    max-width: 90%; /* Ajusta a imagem para ter no máximo 90% da largura da tela */
    max-height: 90%; /* Ajusta a imagem para ter no máximo 90% da altura da tela */
    object-fit: contain; /* Mantém a proporção da imagem */
    border-radius: 8px; /* Bordas arredondadas */
}

/* Fechar botão */
.close {
    position: absolute;
    top: 10px;
    right: 10px;
    color: white;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
}


       body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}
.logo {
    width: 160px; /* Aumentando o tamanho da logo */
    height: auto; /* Mantendo a proporção da imagem */
    margin-right: 10px; /* Espaço entre a logo e o título */
}

main {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

header h1 {
    text-align: center;
    margin-bottom: 40px;
    color: #333;
}

section h2 {
    margin-top: 40px;
    color: #555;
    border-bottom: 2px solid #ccc;
    padding-bottom: 10px;
}

.card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    width: calc(33.333% - 20px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.card img {
    width: 100%;
    height: 250px; /* Aumenta a altura para preencher mais espaço */
    object-fit: contain; /* Exibe a imagem inteira */
    background-color: #f0f0f0; /* Adiciona um fundo cinza claro para contraste */
}


.card-content {
    padding: 15px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.card-content h3 {
    margin: 0;
    font-size: 1.5rem;
    color: #333;
}

.card-content p {
    margin: 0;
    font-size: 0.9rem;
    color: #666;
}

@media (max-width: 768px) {
    .card {
        width: calc(50% - 20px);
    }
}

@media (max-width: 480px) {
    .card {
        width: 100%;
    }
}

/* Navbar */
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

 



.interest-button {
    background-color: #4CAF50; /* Verde elegante */
    color: white;
    padding: 12px 20px;
    border: 1px solid #3e8e41; /* Borda para definição */
    border-radius: 6px; /* Bordas suaves */
    font-size: 1.1rem; /* Texto ligeiramente maior */
    font-weight: 500; /* Peso médio para destaque */
    cursor: pointer;
    text-align: center;
    text-decoration: none; /* Remove o sublinhado */
    display: inline-block; /* Mantém proporção adequada */
    transition: all 0.3s ease; /* Transição suave no hover */
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Sombra leve */
}

.interest-button:hover {
    background-color: #3e8e41; /* Cor de hover mais escura */
    color: #f9f9f9; /* Texto levemente acinzentado */
    box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.15); /* Sombra mais intensa */
    transform: translateY(-2px); /* Efeito de elevação */
}

.interest-button:active {
    background-color: #367a39; /* Cor de click */
    transform: translateY(0); /* Rebaixa ao clicar */
    box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2); /* Reduz a sombra */
}
.pet-details {
    padding: 15px;
    text-align: center; /* Centraliza conteúdo no container */
    display: flex;
    flex-direction: column; /* Organiza itens em coluna */
    align-items: center; /* Alinha horizontalmente ao centro */
    justify-content: center; /* Alinha verticalmente ao centro */
}

.interest-button {
    margin-top: 15px; /* Espaço acima do botão */
    width: 80%; /* Largura proporcional ao card */
    text-align: center;
}



        </style>
     <main>
        <header>
            <h1>Animais para Adoção</h1>
        </header>

        <!-- Exibição de Cachorros -->
        <section>
            <h2>Cachorros</h2>
            <div class="card-container">
                <?php while ($dog = mysqli_fetch_assoc($resultDogs)) : ?>
                    <div class="card">
                    <img 
                     src="uploads/<?php echo htmlspecialchars($dog['foto']); ?>" 
                     alt="Imagem de <?php echo htmlspecialchars($dog['nome']); ?>" 
                     onclick="openModal(this.src)" 
                     style="cursor: pointer;">

                        <div class="card-content">
                            <h3><?php echo htmlspecialchars($dog['nome']); ?></h3>
                            <p><strong>Idade:</strong> <?php echo htmlspecialchars($dog['idade']); ?></p>
                            <p><strong>Pelagem:</strong> <?php echo htmlspecialchars($dog['pelagem']); ?></p>
                            <p><strong>Porte:</strong> <?php echo htmlspecialchars($dog['porte']); ?></p>
                            <p><strong>Sexo:</strong> <?php echo htmlspecialchars($dog['sexo']); ?></p>
                            <p><strong>Descrição:</strong> <?php echo htmlspecialchars($dog['descricao']); ?></p>
                            <div class="card-buttons">
                                <a href="formulario.php?nome=<?php echo urlencode($dog['nome']); ?>" class="interest-button">Tenho Interesse</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>

        <!-- Exibição de Gatos -->
        <section>
            <h2>Gatos</h2>
            <div class="card-container">
                <?php while ($cat = mysqli_fetch_assoc($resultCats)) : ?>
                    <div class="card">
                        <img src="uploads/<?php echo htmlspecialchars($cat['foto']); ?>" alt="Imagem de <?php echo htmlspecialchars($cat['nome']); ?>">
                        <div class="card-content">
                            <h3><?php echo htmlspecialchars($cat['nome']); ?></h3>
                            <p><strong>Idade:</strong> <?php echo htmlspecialchars($cat['idade']); ?></p>
                            <p><strong>Pelagem:</strong> <?php echo htmlspecialchars($cat['pelagem']); ?></p>
                            <p><strong>Porte:</strong> <?php echo htmlspecialchars($cat['porte']); ?></p>
                            <p><strong>Sexo:</strong> <?php echo htmlspecialchars($cat['sexo']); ?></p>
                            <p><strong>Descrição:</strong> <?php echo htmlspecialchars($cat['descricao']); ?></p>
                            <div class="card-buttons">
                                <a href="formulario.php?nome=<?php echo urlencode($cat['nome']); ?>" class="interest-button">Tenho Interesse</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    </main>
    
</body>
</html>