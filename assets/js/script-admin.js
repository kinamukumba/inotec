const button_menu = document.querySelector('.header-dash .header-nav-bar>:last-child');
button_menu.onclick = () => {
    document.querySelector('.header-dash .header-nav-bar>:last-child').classList.toggle('fa-times')
    document.querySelector('.aside-nav').classList.toggle('active')
}



//FORM COURSE
const showPainelAddCourse = document.querySelectorAll('.add-button button');
const formAddCourse = document.querySelector('.subscribe-course');
const formUpCourse = document.querySelector('.updata-course');
const mask = document.querySelector('.mask');
if (formAddCourse && showPainelAddCourse[0] && showPainelAddCourse[1] && mask) {
    showPainelAddCourse[1].onclick = () => {
        mask.classList.add('ok')
        mask.append(formAddCourse)
        formAddCourse.classList.add('ok')
    }

    document.querySelector('.subscribe-course>:first-child').onclick = () => {
        mask.classList.remove('ok')
        mask.removeChild(formAddCourse)
        formAddCourse.classList.remove('ok')
    }


    showPainelAddCourse[0].onclick = () => {
        mask.classList.add('ok')
        mask.append(formUpCourse)
        formUpCourse.classList.add('ok')
    }

    document.querySelector('.updata-course>:first-child').onclick = () => {
        mask.classList.remove('ok')
        mask.removeChild(formUpCourse)
        formUpCourse.classList.remove('ok')
    }


    //SUBMIT
    document.addEventListener("DOMContentLoaded", () => {
        const form = document.getElementById("subscribe-form");
        const submitButton = form.querySelector(".button-sub");

        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            // Cria um FormData para enviar os dados, incluindo o arquivo
            const formData = new FormData(form);

            try {
                const response = await fetch("../assets/function/submit-course.php", {
                    method: "POST",
                    body: formData,
                });

                const result = await response.json();

                if (result.success) {
                    createAlert(result.message, 'success');
                    form.reset(); // Limpa o formulário após o sucesso
                } else {
                    createAlert(result.message, 'warrir');
                }
            } catch (error) {
                createAlert("Erro ao processar a solicitação. Tente novamente.", 'error');
            }
        });

        // Ativa o botão de envio quando os campos estão preenchidos
        form.addEventListener("input", () => {
            let isValid = true;
            form.querySelectorAll("input, select").forEach((input) => {
                if (input.hasAttribute("required") && !input.value.trim()) {
                    isValid = false;
                }
            });
            submitButton.disabled = !isValid;
        });
    });


    //EDIT
    document.addEventListener("DOMContentLoaded", () => {
        const form = document.getElementById("updata-form");
        const submitButton = form.querySelector(".button-sub");

        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            // Cria um FormData para enviar os dados, incluindo o arquivo
            const formData = new FormData(form);

            try {
                const response = await fetch("../assets/function/edit-course.php", {
                    method: "POST",
                    body: formData,
                });

                const result = await response.json();

                if (result.success) {
                    createAlert(result.message, 'success');
                    form.reset(); // Limpa o formulário após o sucesso
                } else {
                    createAlert(result.message, 'warrir');
                }
            } catch (error) {
                createAlert("Erro ao processar a solicitação. Tente novamente.", 'error');
            }
        });

        // Ativa o botão de envio quando os campos estão preenchidos
        form.addEventListener("input", () => {
            let isValid = true;
            form.querySelectorAll("input, select").forEach((input) => {
                if (input.hasAttribute("required") && !input.value.trim()) {
                    isValid = false;
                }
            });
            submitButton.disabled = !isValid;
        });
    });


}

//FORM NOTIFICATION
const formNotify = document.querySelector('.notify');
if(formNotify){
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('#notification-form');
    
        form.addEventListener('submit', async (event) => {
            event.preventDefault(); // Evita o envio padrão do formulário
    
            const formData = new FormData(form);
    
            try {
                const response = await fetch('../assets/function/submit-notification.php', {
                    method: 'POST',
                    body: formData,
                });
    
                const result = await response.json();
    
                if (response.ok) {
                    createAlert('Notificação cadastrada com sucesso!', 'success');
                    form.reset(); // Reseta o formulário
                } else {
                    createAlert(`Erro: ${result.message}`, 'warrir');
                }
            } catch (error) {
                console.error('Erro na requisição:', error);
                createAlert('Erro ao processar o pedido. Tente novamente.', 'error');
            }
        });
    });
    
}




//LINKS 
const uxLi = document.querySelectorAll('.itens.i');
uxLi[0].onclick = () => {
    window.location.href = 'index.php';
}
uxLi[1].onclick = () => {
    window.location.href = 'course.php';
}
uxLi[2].onclick = () => {
    window.location.href = '#';
}
uxLi[3].onclick = () => {
    window.location.href = 'sms.php';
}
uxLi[4].onclick = () => {
    window.location.href = 'notification.php';
}
