document.getElementById('subscribe-form').addEventListener('submit', function (e) {
    e.preventDefault(); // Impede o envio do formulário tradicional

    const formData = new FormData(this); // Captura os dados do formulário

    fetch('./assets/function/subscribe.php', {
        method: 'POST',
        body: formData,  // Envia os dados do formulário
    })
        .then(response => response.text()) // Recebe a resposta do servidor
        .then(data => {
            // Exibe a resposta do servidor (mensagem de sucesso ou erro)
            //alert(data);
            if (data == 'Inscrição realizada com sucesso!') {
                const load = document.querySelector('.load');
                load.style.display = 'flex'
                setTimeout(() => {
                    load.style.display = 'none';
                    createAlert(data, 'success');
                }, 5000)
            } else {
                createAlert(data, 'warrir')
            }
            // Limpa os campos do formulário após sucesso (opcional)
            document.getElementById('subscribe-form').reset();
        })
        .catch(error => {
            // Exibe um erro caso algo dê errado
            //alert('Ocorreu um erro. Tente novamente!');
            createAlert('Ocorreu um erro. Tente novamente!', 'error')
            console.error('Erro ao enviar o formulário:', error);
        });
});
