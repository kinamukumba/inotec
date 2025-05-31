document.getElementById('search-form').addEventListener('submit', async (e) => {
    e.preventDefault();

    const searchInput = document.getElementById('search-input');
    const searchTerm = searchInput.value.trim();

    if (searchTerm === '') {
        createAlert('Preencha o campo de pesquisa', 'error');
        return;
    }

    try {
        // Fazer requisição ao servidor
        const response = await fetch(`./assets/function/search.php?q=${encodeURIComponent(searchTerm)}`);
        const result = await response.json();

        const resultsList = document.getElementById('results-list');
        resultsList.innerHTML = '';

        if (result.success) {
            result.data.forEach((item) => {
                const div = document.createElement('div');
                div.classList.add('pacote-service')
                //div.innerHTML = `<strong>${item.nome}</strong> (${item.preco})<br>${item.conteudo}`;
                const p = document.createElement('p')
                p.classList.add('info-name');
                const span = document.createElement('span');
                const buttonAdd = document.createElement('button');
                buttonAdd.classList.add('btn-add-car');
                buttonAdd.innerText = 'Adicionar ao carrinho'
                p.innerText = `${item.nome}`;
                span.innerText = `${item.preco}`+ " AOA";
                div.append(p)
                div.append(span)
                div.append(buttonAdd)

                resultsList.appendChild(div);
            });
        } else {
            createAlert(result.message, 'error');
        }
    } catch (error) {
        console.error('Erro na requisição:', error);
        createAlert('Erro ao realizar a pesquisa. Tente novamente.', 'error');
    }
});
