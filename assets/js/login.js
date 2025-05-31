document.querySelector('.form-set-login').addEventListener('submit', async function (event) {
    event.preventDefault(); // Evita o envio padrão do formulário

    // Coletar os dados do formulário
    const formData = new FormData(event.target);

    try {
        // Enviar os dados para o servidor
        const response = await fetch('./assets/function/login.php', {
            method: 'POST',
            body: formData,
        });

        // Processar a resposta
        const result = await response.json();
        if (result.success) {
            const load = document.querySelector('.load');
            //alert('Login realizado com sucesso!');
            load.style.display = 'flex'
            setTimeout(() => {
                load.style.display = 'none';
                createAlert('Login realizado com sucesso!', 'success')
                // Redirecionar para o dashboard ou página inicial
                window.location.href = 'dash'; // Exemplo de redirecionamento
            }, 5000)
        } else {
            //alert('Erro: ' + result.message);
            createAlert(result.message, 'error')
        }
    } catch (error) {
        console.error('Erro na requisição:', error);
        //alert('Ocorreu um erro. Tente novamente mais tarde.');
        createAlert('Ocorreu um erro. Tente novamente mais tarde.', 'error')
    }
});
