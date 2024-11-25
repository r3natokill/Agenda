<?php
include 'conexao.php';


// Consulta para listar os contatos
$sql = "SELECT * FROM contato";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Lista de Contatos</title>
    <link rel="stylesheet" href="css/listar.css">
</head>
<body>

<div class="container">
<a href="index.php" class="button return">Voltar</a>
    <h1>Lista de Devedores</h1>

    <!-- Exibe a mensagem de sucesso, se houver -->
    <?php if (isset($_GET['mensagem'])): ?>
        <p class="message"><?php echo htmlspecialchars($_GET['mensagem']); ?> </p>
    <?php endif; ?>

    <table>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Divida</th>
            <th>Pago</th>
            <th>Data Emprestimo </th>
            <th>Ações</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['nome']}</td>
                        <td>{$row['telefone']}</td>
                        <td>{$row['endereco']}</td>
                        <td>" . number_format($row['valor'], 2, ',', '.') . "</td>
                        <td>{$row['situacao']}</td> 
                        <td>{$row['dataEmprestimo']}</td>                       
                        <td>
                            <a  href='alterarCtt.php?id={$row['id']}' onclick=\"return confirm('Tem certeza que este contato pagou a divida?');\">Pago?</a><br> <br>
                            <a href='excluirCtt.php?id={$row['id']}' onclick=\"return confirm('Tem certeza que deseja excluir este contato?');\">Excluir</a>
                        </td>

                    </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum contato encontrado.</td></tr>";
        }
        ?>
    </table>

   
</div>

</body>
</html>

<?php
// Fechar a conexão com o banco de dados
$conn->close();
?>
