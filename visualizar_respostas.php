<?php
// Conectar ao banco de dados
include_once("./services/conexao.php");

// Preparar a consulta SQL para buscar os dados
$query = "SELECT * FROM adotantes";
$resultado = $conn->query($query);

if ($resultado->num_rows > 0) {
    echo "<h2>Respostas do Formulário de Adoção</h2>";
    echo "<table border='1'>";
    echo "<tr>
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
          </tr>";

    // Exibir as respostas
    while($row = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['nome'] . "</td>
                <td>" . $row['idade'] . "</td>
                <td>" . $row['cidade'] . "</td>
                <td>" . $row['estilo_vida'] . "</td>
                <td>" . $row['espaco'] . "</td>
                <td>" . $row['alergias'] . "</td>
                <td>" . $row['custos'] . "</td>
                <td>" . $row['experiencia'] . "</td>
                <td>" . $row['tipo_animal'] . "</td>
                <td>" . $row['comportamento'] . "</td>
                <td>" . $row['plano_cuidado'] . "</td>
                <td>" . $row['compromisso'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Não há respostas registradas.</p>";
}

// Fechar a conexão
$conn->close();
?>
