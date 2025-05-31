const form_pass = document.querySelector('.container-pass .form-set-pass');
const load = document.querySelector('.load');
if (form_pass) {
    document.querySelector('.form-set-pass .logo').onclick = () => {
        window.location.href = 'home'
    }
    const input_get_email = form_pass.querySelector('input[name="email-update-pass"]');
    const input_new_pass = document.getElementById('new-pass');
    const button_get_pass = form_pass.querySelector('button');
    const message_area = document.querySelector('.set-pass');

    // Validar e-mail
    input_get_email.oninput = () => {
        if (validateEmail(input_get_email.value)) {
            button_get_pass.disabled = false;
            button_get_pass.style.opacity = '1';
        } else {
            button_get_pass.disabled = true;
            button_get_pass.style.opacity = '.7';
        }
    };

    // Gerar nova senha e enviar para o servidor
    button_get_pass.onclick = async (e) => {
        e.preventDefault();
        load.style.display = 'flex';

        setTimeout(async () => {
            load.style.display = 'none';
            const novaSenha = gerarSenhaSegura();
            input_new_pass.value = novaSenha;

            try {
                const formData = new FormData(form_pass);
                const response = await fetch('./assets/function/up-pass.php', {
                    method: 'POST',
                    body: formData,
                });

                const result = await response.json();
                if (result.success) {
                    message_area.classList.add('ok');
                    message_area.innerText = `Sua nova senha: ${novaSenha}`;
                    createAlert('Senha redefinida com sucesso!', 'success');
                } else {
                    createAlert(result.message, 'error');
                }
            } catch (error) {
                console.error('Erro na requisição:', error);
                createAlert('Ocorreu um erro ao redefinir a senha. Tente novamente mais tarde.', 'error');
            }
        }, 5000);
    };

    // Voltar para login
    document.querySelector('.option-red').onclick = () => {
        window.location.href = 'login';
    };
}


function validateEmail(email) {
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (regex.test(email)) return true; else return false;
}
function validatePhone(telephone) {
    if (telephone.length == 9 && telephone.charAt(0) == 9) return true;
    return false;
}
function updateClass(element, condition) {
    if (condition) {
        element.classList.add("check-pass");
    } else {
        element.classList.remove("check-pass");
    }
}


function gerarSenhaSegura(tamanho = 12) {
    // Caracteres disponíveis para cada categoria
    const letrasMinusculas = "abcdefghijklmnopqrstuvwxyz";
    const letrasMaiusculas = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const numeros = "0123456789";
    const caracteresEspeciais = "@#$%^&+=!";

    // Garantir que a senha tenha pelo menos um de cada tipo
    let senha = [
        letrasMinusculas.charAt(Math.floor(Math.random() * letrasMinusculas.length)),
        letrasMaiusculas.charAt(Math.floor(Math.random() * letrasMaiusculas.length)),
        numeros.charAt(Math.floor(Math.random() * numeros.length)),
        caracteresEspeciais.charAt(Math.floor(Math.random() * caracteresEspeciais.length))
    ];

    // Combina todos os caracteres disponíveis
    const todosCaracteres = letrasMinusculas + letrasMaiusculas + numeros + caracteresEspeciais;

    // Preenche o restante da senha com caracteres aleatórios
    for (let i = senha.length; i < tamanho; i++) {
        senha.push(todosCaracteres.charAt(Math.floor(Math.random() * todosCaracteres.length)));
    }

    // Embaralha a senha para distribuir os caracteres de forma aleatória
    senha = senha.sort(() => Math.random() - 0.5);

    // Retorna a senha como string
    return senha.join('');
}

