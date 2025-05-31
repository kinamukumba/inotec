const arrayCar = [];
const cardCar = document.querySelectorAll('.pacote-service');
const shop_car = document.querySelector('.shop-car-m');
const shop_car_m = document.querySelector('.shop-car');
const button_check = document.querySelector('.shop-car button');
//document.querySelector('.data-itens>:last-child i').setAttribute('data-content', store_local.length)
const headerCar = document.querySelector('.header-container .your-car-shop');

headerCar.setAttribute('data-content', arrayCar.length)
headerCar.onclick = () => {
    if (arrayCar.length <= 0) {
        createAlert('O seu carrimho está vazio!.', 'error');
    } else {
        shop_car_m.classList.toggle('active')
    }
}


//GERAR CÓDICO DO CLINTE
function gerarCodigoCustomizado(tamanho, caracteres) {
    let codigo = '';
    for (let i = 0; i < tamanho; i++) {
        const indiceAleatorio = Math.floor(Math.random() * caracteres.length);
        codigo += caracteres[indiceAleatorio];
    }
    return codigo;
}
const codigoCustomizado = gerarCodigoCustomizado(8, 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789');

//Return all Cart
cardCar.forEach((elem) => {
    const buttonAddCar = elem.querySelector('.btn-add-car');
    var count = 0
    buttonAddCar.onclick = (e) => {
        e.preventDefault();
        count++;
        const price = elem.querySelector('.info-price').innerText;
        const name = elem.querySelector('.info-name').innerText;
        const obj = {
            client_id: codigoCustomizado,
            idProduct: arrayCar.length,
            priceProduct: price,
            nameProduct: name
        }
        arrayCar.push(obj);

        localStorage.setItem("INOTEC", JSON.stringify(arrayCar));
        const array_product = JSON.parse(localStorage.getItem('INOTEC'))
        headerCar.setAttribute('data-content', array_product.length)
        shop_car_m.classList.add('active')
        const show_product = array_product.map((product) => {
            return `
                
                    <div class="shop-item" id="${product.idProduct}">
                        <section>
                            <p>${product.nameProduct}</p>
                            <p>AOA ${product.priceProduct}</p>
                        </section>
                        <i id="${product.idProduct}" class="fa fa-times" aria-hidden="true"></i>
                    </div>
                
                `
        })
        shop_car.innerHTML = show_product.join('');
        createAlert('Adicionado com sucesso!', 'success');

        console.log(arrayCar);

        //REMOVE SERVICE
        const btnRemove = document.querySelectorAll('.shop-item>:last-child');
        btnRemove.forEach((btn) => {
            btn.onclick = () => {
                const idCarr = document.querySelectorAll('.shop-item');
                idCarr.forEach((car) => {
                    if (btn.id == car.id) {
                        var index = car.id;
                        console.log(index);

                        shop_car.removeChild(car);
                        arrayCar.splice(index, 1);
                        headerCar.setAttribute('data-content', arrayCar.length)
                    }
                })
            }
        })



        //ADD TO TABLE --- FINALIZAR

        const form = document.createElement('form')
        shop_car_m.append(form)
        form.style.width = '100%'
        form.append(button_check);

        button_check.onclick = (e) => {
            e.preventDefault();
            array_product.forEach((obj) => {
                fetch('./assets/function/add_car.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(obj)
                })
                    .then(response => response.json())
                    .then((response) => {

                        painel_load = document.querySelector('.load');
                        painel_load.style.display = 'flex';
                        setTimeout(() => {
                            painel_load.style.display = 'none';
                            shop_car_m.classList.remove('active')
                            createAlert('Aguarde a finalização do sua encomenda', 'warrir')
                            setTimeout(() => {
                                window.location.href = 'checkout'
                            }, 5500)
                        }, 2000)
                    })
                    .catch(error => {
                        console.error('Erro ao adicionar ao carrinho:', error);
                        createAlert(error, 'error')
                    });
            })
        }
    }

})

if (document.querySelector('.shop-car>:first-child')) {
    document.querySelector('.shop-car>:first-child').onclick = () => {
        shop_car_m.classList.remove('active')
    }


}




//SUMIT ENCOMENDA ---CHECK
var count = 0
const checkout = JSON.parse(localStorage.getItem('INOTEC'));
if (checkout) {
    window.onload = () => {
        checkout.forEach((check) => {
            const inputIdClient = document.getElementById('idCheck');
            if (inputIdClient) {
                inputIdClient.value = check.client_id;
                if (inputIdClient.value != '') {
                    const formCheck = document.querySelector('.ckeck-form');
                    painel_load = document.querySelector('.load');
                    painel_load.style.display = 'flex';
                    const time = setInterval(() => {
                        painel_load.style.display = 'none';
                        count++
                        console.log(count);
                        formCheck.submit();
                    }, 300000)
                    console.log(inputIdClient.value);
                }
            }
        })
    }
}