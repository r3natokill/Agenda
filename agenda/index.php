<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Tela Inicial</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div class="titulo" style="color:red; position:fixed; margin:0 0 35% 0; font-size:30px; text-align:center;"> </div>
<div class="titulo" style="color:blue; position:fixed; margin:0 0 28% 0; font-size:30px; text-align:center;"></div>

<div class="container">
    <!-- Exibe a mensagem de sucesso, se houver -->
   <div class= "mensagem">
    <?php if (isset($_GET['mensagem'])): ?>
        <p class="message"><?php echo htmlspecialchars($_GET['mensagem']); ?></p>
    <?php endif; ?>
   </div>
    <h1>Agenda de Devedores</h1>
    <a href="cadastrar.php" class="button">Adicionar Contato</a>
    <a href="listar.php" class="button ">Listar Contatos</a>

</div>

</body>
</html>
