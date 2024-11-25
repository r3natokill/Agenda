<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Formulário</title>
    <link rel="stylesheet" href="css/cadastrar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
</head>
</head>
<body>

<div class="form-container">
<a href="index.php" class="button return">Voltar</a>
    <h1>Agenda</h1>
    <form action="adicionarCtt.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" required pattern="\(\d{2}\) \d{5}-\d{4}">

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required>

        <label for="valor">Valor a pagar:</label>
        <input type="text" id="valor" name="valor" required>
        
        <label for="dataEmprestimo">Data do emprestimo:</label><br><br>
        <input type="date" id="dataEmprestimo" name="dataEmprestimo">
        <br><br><br><br>
        <button type="submit" class="btn-submit">Adicionar</button>
    </form>
    <script src="js/script.js"></script>
   
<script>
    var picker = new Pikaday({ 
        field: document.getElementById('dataEmprestimo'),
        format: 'DD/MM/YYYY',
        i18n: {
            previousMonth: 'Mês Anterior',
            nextMonth: 'Próximo Mês',
            months: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            weekdays: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            weekdaysShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb']
        }
    });
</script>
<script>
function converterData() {
    // Pega o valor da data no campo
    const dataCampo = document.getElementById("dataEmprestimo").value;

    // Verifica se a data foi preenchida
    if (!dataCampo) {
        alert("Por favor, selecione uma data.");
        return false;
    }

    // Converte para o formato MySQL (YYYY-MM-DD)
    const dataObj = new Date(dataCampo);
    const dataMySQL = dataObj.toISOString().split("T")[0];

    // Substitui o valor do campo de data para o formato MySQL
    document.getElementById("dataEmprestimo").value = dataMySQL;

    return true; // Permite o envio do formulário
}
</script>
</div>

</body>
</html>
