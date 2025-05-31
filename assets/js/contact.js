document.querySelector('.form-contact').addEventListener('submit', async function (event) {
    event.preventDefault(); // Evita o envio padrão do formulário

    const formData = new FormData(this);

    try {
        // Fazer a requisição POST para o servidor
        const response = await fetch('./assets/function/contact.php', {
            method: 'POST',
            body: formData,
        });

        const result = await response.json();

        if (result.success) {
            createAlert(result.message, 'success'); // Substitua por sua função de alerta personalizada
            this.reset(); // Limpa o formulário
        } else {
            createAlert(result.message, 'error'); // Substitua por sua função de alerta personalizada
        }
    } catch (error) {
        console.error('Erro na requisição:', error);
        createAlert('Erro ao enviar a mensagem. Tente novamente mais tarde.', 'error');
    }
});
