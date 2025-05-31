const change_sign = document.querySelector('.text-normal.login i');
const change_login = document.querySelector('.text-normal.sign i');
const load = document.querySelector('.load');

if (change_sign) {
    change_sign.onclick = () => {
        window.location.href = 'sign'
    }
    document.querySelector('.form-set-login .logo').onclick = () => {
        window.location.href = 'home'
    }


    const ux_login = document.querySelectorAll('input,' + 'button');

    //LOOK PASS
    lookPassWord = document.querySelector('.main-inputs .input i');

    lookPassWord.onclick = () => {
        const type = ux_login[1].type === "password" ? "text" : "password"
        ux_login[1].type = type;
        lookPassWord.classList.toggle('fa-eye-slash')
        lookPassWord.classList.toggle('fa-eye')
    }

    // VALIDATION
    for (let i = 0; i < ux_login.length; i++) {
        ux_login[i].oninput = () => {
            if (validateEmail(ux_login[0].value) && ux_login[1].value.length > 1) {
                ux_login[3].style.opacity = '1';
                ux_login[3].disabled = false
            } else {
                ux_login[3].style.opacity = '.5';
                ux_login[3].disabled = true
            }
        }
    }

    document.querySelector('.option-red').onclick = () => {
        window.location.href = 'update-pass'
    }
}
if (change_login) {
    change_login.onclick = () => {
        window.location.href = 'login'
    }
    document.querySelector('.form-set-sign .logo').onclick = () => {
        window.location.href = 'home'
    }
    document.querySelector('.check p i').onclick = () => {
        window.open('term', '_blank');
    }


    const ux_sign = document.querySelectorAll('input,' + 'button');
    for (let i = 0; i < ux_sign.length; i++) {
        ux_sign[i].oninput = () => {
            if (ux_sign[0].value == ''
                && ux_sign[1].value == ''
                && ux_sign[2].value == ''
                && validatePhone(ux_sign[3].value)
                && validateEmail(ux_sign[4].value)) {
                ux_sign[ux_sign.length - 1].disabled = false;
                ux_sign[ux_sign.length - 1].style.opacity = '1';
            } else {
                ux_sign[ux_sign.length - 1].disabled = true;
                ux_sign[ux_sign.length - 1].style.opacity = '.5';
            }
        }
    }

    //LOOK PASS
    lookPassWord = document.querySelector('.main-inputs .input i');
    lookPassWord.onclick = () => {
        const type = ux_sign[5].type === "password" ? "text" : "password"
        ux_sign[5].type = type;
        lookPassWord.classList.toggle('fa-eye-slash')
        lookPassWord.classList.toggle('fa-eye')
    }


    // VALIDATION 
    const passwordInput = document.getElementById("password");
    const conditions = {
        length: document.querySelector(".length"),
        letter: document.querySelector(".letter"),
        number: document.querySelector(".number"),
        special: document.querySelector(".special")
    };

    passwordInput.addEventListener("input", () => {
        const password = passwordInput.value;

        // Condições
        const isLengthValid = password.length >= 8 && password.length <= 15;
        const hasLetter = /[a-zA-Z]/.test(password);
        const hasNumber = /\d/.test(password);
        const hasSpecial = /[@#$%^&+=!]/.test(password);

        // Atualizando as classes
        updateClass(conditions.length, isLengthValid);
        updateClass(conditions.letter, hasLetter);
        updateClass(conditions.number, hasNumber);
        updateClass(conditions.special, hasSpecial);


        const option_checked = document.querySelectorAll('.validation-pass p.check-pass');
        if (option_checked) {
            if (option_checked.length == 4) {
                ux_sign[ux_sign.length - 1].disabled = false;
                ux_sign[ux_sign.length - 1].style.opacity = '1';
            } else {
                ux_sign[ux_sign.length - 1].disabled = true;
                ux_sign[ux_sign.length - 1].style.opacity = '.5';
            }
        }
    });
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

