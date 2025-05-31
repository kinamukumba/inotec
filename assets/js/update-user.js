document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#updateForm');

    form.addEventListener('submit', async (event) => {
        event.preventDefault(); // Evita o comportamento padrão de envio do formulário

        const formData = new FormData(form); // Coleta os dados do formulário

        try {
            const response = await fetch('./assets/function/update_user.php', {
                method: 'POST',
                body: formData,
            });

            const result = await response.json();

            if (response.ok) {
                alert('Dados atualizados com sucesso!');
            } else {
                alert(`Erro ao atualizar: ${result.message}`);
            }
        } catch (error) {
            console.error('Erro na requisição:', error);
            alert('Erro ao processar o pedido. Tente novamente.');
        }
    });
});
