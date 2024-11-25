<?php
// Incluir a conexão com o banco de dados
include 'conexao.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $valor = $_POST['valor'];
    $dataEmprestimo = $_POST['dataEmprestimo'];
    // Preparar a instrução SQL para inserção de dados
    $sql = "INSERT INTO contato (nome, telefone, endereco, valor, dataEmprestimo, situacao) VALUES (?, ?, ?, ?, ?,'NAO')";
    $stmt = $conn->prepare($sql);

    // Verificar se a preparação da instrução foi bem-sucedida
    if ($stmt) {
        // Associar parâmetros e executar a instrução
        $stmt->bind_param("sssss", $nome, $telefone, $endereco, $valor,$dataEmprestimo);

        if ($stmt->execute()) {
             // Redireciona para a página inicial com uma mensagem de sucesso
             header("Location: index.php?mensagem=Contato+adicionado+com+sucesso!");
            exit();
            
        } else {
            echo "Erro ao adicionar contato: " . $stmt->error;
        }

        // Fechar a instrução
        $stmt->close();
    } else {
        echo "Erro na preparação da instrução: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>
