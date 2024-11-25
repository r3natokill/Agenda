document.addEventListener('DOMContentLoaded', function () {
    const telefoneInput = document.getElementById('telefone');

    telefoneInput.addEventListener('input', function () {
        let telefone = telefoneInput.value;

        // Remove caracteres que não são dígitos
        telefone = telefone.replace(/\D/g, '');

        // Aplica a máscara
        if (telefone.length > 10) {
            // Formato com DDD e 9 dígitos: (XX) XXXXX-XXXX
            telefone = telefone.replace(/^(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
        } else if (telefone.length > 6) {
            // Formato com DDD e 8 dígitos: (XX) XXXX-XXXX
            telefone = telefone.replace(/^(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
        } else if (telefone.length > 2) {
            // Formato com DDD: (XX) XXXX
            telefone = telefone.replace(/^(\d{2})(\d{0,5})/, '($1) $2');
        } else {
            // Apenas o DDD: (XX
            telefone = telefone.replace(/^(\d{0,2})/, '($1');
        }

        // Define o valor formatado
        telefoneInput.value = telefone;
    });
});
