<?php
include 'conexao.php';

// Verifica se um ID foi passado na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara a instrução SQL para excluir o contato
    $sql = "DELETE FROM contato WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    // Executa a exclusão e verifica o resultado
    if ($stmt->execute()) {
        // Redireciona para a lista de contatos com uma mensagem de sucesso
        header("Location: listar.php?mensagem=Contato+excluído+com+sucesso!");
    } else {
        echo "Erro ao excluir contato: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID de contato não fornecido.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
