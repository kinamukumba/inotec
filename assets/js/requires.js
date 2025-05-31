document.querySelector('.form-set-sign').addEventListener('submit', async function (event) {
    event.preventDefault();

    const formData = new FormData(event.target);

    try {
        const response = await fetch('./assets/function/sign.php', {
            method: 'POST',
            body: formData,
        });

        if (!response.ok) {
            throw new Error(`Erro HTTP: ${response.status}`);
        }

        const result = await response.json();

        if (result.success) {
            createAlert('Cadastro realizado com sucesso!', 'success');
            setTimeout(() => {
                window.location.href = 'login';
            }, 3000);
        } else {
            createAlert(result.message, 'error');
        }
    } catch (error) {
        console.error('Erro na requisição:', error);
        createAlert('Ocorreu um erro inesperado. Tente novamente mais tarde.', 'error');
    }
});
