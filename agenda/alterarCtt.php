<?php
include 'conexao.php';

// Verifica se um ID foi passado na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara a instrução SQL para alterar o contato
    $sql = "UPDATE contato SET situacao ='SIM' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    // Executa a exclusão e verifica o resultado
    if ($stmt->execute()) {
        // Redireciona para a lista de contatos com uma mensagem de sucesso
        header("Location: listar.php?mensagem=Situacao+alterada+com+sucesso!");
    } else {
        echo "Erro ao alterar contato: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID de contato não fornecido.";
}

// Fecha a conexão com o banco de dados
$conn->close();

?>
