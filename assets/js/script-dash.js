const mask = document.querySelector('.mask');
const button_header = document.querySelector('.drop-data-user .top');

button_header.onclick = () => {
    document.querySelector('.element-drop').classList.toggle('ok');
    document.querySelector('.drop-data-user .top i').classList.toggle('fa-caret-up')
}
const button_menu = document.querySelector('.header-dash .header-nav-bar>:last-child');

button_menu.onclick = () => {
    document.querySelector('.header-dash .header-nav-bar>:last-child').classList.toggle('fa-times')
    document.querySelector('.aside-nav').classList.toggle('active')
}

const buttonEdit = document.querySelectorAll('.buttons-edit button');
if(buttonEdit[0] && buttonEdit[1]){
    buttonEdit[0].onclick = ()=>{
        window.location.href = 'configuration'
    }
    buttonEdit[1].onclick = ()=>{
        document.querySelector('.element-drop').classList.toggle('ok');
        document.querySelector('.drop-data-user .top i').classList.toggle('fa-caret-up')
    }
}

document.getElementById('logout-btn').addEventListener('click', async () => {
    const confirmLogout = confirm('Tem certeza de que deseja sair?');

    if (confirmLogout) {
        try {
            const response = await fetch('./assets/function/logout.php', {
                method: 'POST',
            });

            const result = await response.json();

            if (result.status === 'success') {
                createAlert('Logout realizado com sucesso!', 'success');
                setTimeout(()=>{
                    window.location.href = 'login';
                }, 5500) // Redireciona para a página de login
            } else {
                createAlert('Erro ao tentar sair. Tente novamente.', 'warrir');
            }
        } catch (error) {
            console.error('Erro na requisição:', error);
            createAlert('Erro ao processar o logout.', 'error');
        }
    }
});


//LINKS
const logo = document.querySelector('.logo')
const uxLi = document.querySelectorAll('.aside-nav-item .itens');
const uxdrop = document.querySelectorAll('.drop-item');

if (uxLi) {
    logo.onclick = () => {
        window.location.href = 'dash'
    }
    uxLi[0].onclick = () => {
        window.location.href = 'dash'
    }
    uxLi[1].onclick = () => {
        window.location.href = 'profiles'
    }
    uxLi[2].onclick = () => {
        createAlert('Nenhuma comunidade disponível', 'error')
    }
    uxLi[3].onclick = () => {
        window.location.href = 'courses'
    }
    uxLi[4].onclick = () => {
        createAlert('Desculpa, nenhuma conteúdo disponível para si', 'error')
    }
    uxLi[5].onclick = () => {
        window.location.href = 'configuration'
    }

    if (document.querySelector('.welcome-dash span button')) {
        document.querySelector('.welcome-dash span button').onclick = () => {
            window.location.href = 'courses'
        }
    }
}

if (uxdrop) {
    uxdrop[0].onclick = () => {
        window.location.href = 'profiles'
    }
    uxdrop[1].onclick = () => {
        window.location.href = 'courses'
    }
}

//LOAD DATA
const href_location = window.location.href.split('/');
const load = document.querySelector('.load');
if (load) {
    setInterval(() => {
        load.style.display = 'flex'
        setTimeout(() => {
            load.style.display = 'none';
            window.location.href = href_location[href_location.length - 1];
        }, 5000)
    }, 60000)
}
//FORM-PAGE-DATA
const button_to_save_data = document.querySelectorAll('.form-update-data .title button');
if (button_to_save_data) {
    const input_data_count = document.querySelectorAll('.form-update-data.cout input')
    const input_data_user = document.querySelectorAll('.form-update-data.user input')

    for (let i = 0; i < input_data_count.length; i++) {
        button_to_save_data[0].onclick = (e) => {
            e.preventDefault();
            if (validateEmail(input_data_count[0].value) && input_data_count[1].value == '') {
                createAlert('Edita um dos campos', 'warrir')
            } else {
                createAlert('Os dados estão sendo actualizados', 'success')
            }
        }
    }

    for (let i = 0; i < input_data_user.length; i++) {
        button_to_save_data[1].onclick = (e) => {
            e.preventDefault();
            if (input_data_user[0].value == '' && input_data_user[1].value == '') {
                createAlert('Edita um dos campos', 'warrir')
            } else {
                createAlert('Os dados estão sendo actualizados', 'success')
            }
        }
    }

    /* const open_dialog = document.querySelectorAll('.form-update-data .double-input .input');
     open_dialog[0].onclick = () => {
         input_data_user[2].click();
         open_dialog[0].querySelector('img').src = input_data_user[2].value
     }
     open_dialog[1].onclick = () => {
         input_data_user[3].click();
     }*/
}
//SHOW YOUR COURSE-PAINEL
const buttonShowCourse = document.querySelector('.button-fixed');
if (buttonShowCourse) {
    const painelUCourse = document.querySelector('.painel-your-course');
    buttonShowCourse.onclick = (e) => {
        e.preventDefault()
        mask.classList.add('ok')
        mask.append(painelUCourse);
        painelUCourse.classList.add('ok')
    }
    document.querySelector('.painel-your-course>:first-child').onclick = () => {
        mask.classList.remove('ok')
        mask.removeChild(painelUCourse);
        painelUCourse.classList.remove('ok')
    }
}



//SHOW AND SELECT CATEGORIA
var count = 0
const set_type_event = document.querySelector('.set-type-event');
const button_email_get = document.querySelector('.email-get-event .input-e button');
if (set_type_event && button_email_get) {
    const input_set_email = document.querySelector('.elem_email_event');

    input_set_email.oninput = () => {
        if (validateEmail(input_set_email.value)) {
            button_email_get.disabled = false;
            button_email_get.style.opacity = '1'
        } else {
            button_email_get.disabled = true;
            button_email_get.style.opacity = '.7'
        }
    }

    button_email_get.onclick = () => {
        mask.classList.add('ok');
        mask.append(set_type_event);
        set_type_event.classList.add('ok')
        document.querySelector('.get-email').value = input_set_email.value;
    }
    document.querySelector('.top-set i').onclick = () => {
        mask.classList.remove('ok');
        mask.removeChild(set_type_event);
        set_type_event.classList.remove('ok')
    }
}

const categoria_item = document.querySelectorAll('.categoria-event .cat p');
if (categoria_item) {
    for (let i = 0; i < categoria_item.length; i++) {
        categoria_item[i].onclick = () => {
            count++
            categoria_item[i].classList.toggle('ok')
            categoria_item[i].querySelector('i').classList.toggle('ok')
        }
    }
}
const button_set_cat = document.querySelector('.set-type-event button');
if (button_set_cat) {
    button_set_cat.onclick = (e) => {
        e.preventDefault();
        if (count == 0) {
            createAlert('Selecione ao menos uma categoria', 'warrir')
        } else {
            count = 0
            createAlert('Obrigado, agora receberás os seus eventos regularmente', 'success')
            setTimeout(() => {
                mask.classList.remove('ok');
                mask.removeChild(set_type_event);
                set_type_event.classList.remove('ok')
            }, 3000)
        }
    }
}


//VALIDATION
function validateEmail(email) {
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (regex.test(email)) return true; else return false;
}
function validatePhone(telephone) {
    if (telephone.length == 9 && telephone.charAt(0) == 9) return true;
    return false;
}
function validateBorn(date) {
    let d = date.split('-')
    if (date != '' && d[0] <= 2006 && d[0] > 1940) return true;
    return false;
}