<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil em Avaliação</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100vh;
            margin: 0;
            background-color: #f9f9f9;
            overflow: hidden; /* Garante que não haverá rolagem */
            position: relative; /* Define posição relativa para o container principal */
        }
        h1, p {
            position: relative;
            display: block; /* Alterado para block para alinhar uma frase abaixo da outra */
            background: rgba(255, 255, 255, 0.9); /* Fundo branco semitransparente */
            padding: 0.5rem 1rem;
            border-radius: 10px; /* Bordas arredondadas */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sutil sombra para destacar */
            margin-top: 10px; /* Espaço entre as frases */
        }
        h1 {
            color: #4CAF50;
            font-size: 2.5rem;
            margin: 0;
        }
        p {
            font-size: 1.2rem;
            color: #555;
        }
        .container {
            position: relative;
            z-index: 10; /* Garante que a mensagem fique na frente do canvas */
            padding: 0 1rem;
        }
        canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1; /* Confetes ficam atrás do texto */
        }
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem; /* Reduz o tamanho da fonte para dispositivos menores */
            }
            p {
                font-size: 1rem; /* Reduz o tamanho da fonte para o parágrafo */
            }
        }
        @media (max-width: 480px) {
            h1 {
                font-size: 1.8rem; /* Ajusta ainda mais o tamanho para telas pequenas */
            }
            p {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <canvas id="confetti"></canvas>
    <div class="container">
        <h1>🎉 Seu perfil será avaliado! 🎉</h1>
        <p>Aguarde o retorno. Entraremos em contato em breve.</p>
       
    <script>
        (function() {
            const canvas = document.getElementById('confetti');
            const ctx = canvas.getContext('2d');
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            const particles = [];
            const colors = ['#FF5733', '#FFC300', '#DAF7A6', '#C70039', '#581845'];

            function createParticle() {
                const x = Math.random() * canvas.width;
                const y = Math.random() * canvas.height - canvas.height;
                const size = Math.random() * 8 + 4; // Tamanho dos confetes
                const color = colors[Math.floor(Math.random() * colors.length)];
                const speed = Math.random() * 5 + 2; // Velocidade mais rápida
                particles.push({ x, y, size, color, speed });
            }

            function drawParticles() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                particles.forEach((p, index) => {
                    ctx.fillStyle = p.color;
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.size, 0, 2 * Math.PI);
                    ctx.fill();
                    p.y += p.speed; // Movimento dos confetes mais rápido
                    if (p.y > canvas.height) particles.splice(index, 1);
                });
                requestAnimationFrame(drawParticles);
            }

            setInterval(createParticle, 50); // Gera confetes mais rapidamente
            drawParticles();

            // Atualiza o tamanho do canvas ao redimensionar a janela
            window.addEventListener('resize', () => {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            });
        })();
    </script>
</body>
</html>
