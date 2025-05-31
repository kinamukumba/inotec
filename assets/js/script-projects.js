const buttons_header = document.querySelectorAll('.header-container .buttons-header button');
const mask = document.querySelector('.mask');
const login = document.querySelector('.form-login');
if(buttons_header && login){
    //LOGIN
    buttons_header[0].onclick = ()=>{
        mask.classList.add('ok');
        mask.append(login);
        login.classList.add('ok')
    }
    document.querySelector('.form-login>:first-child i').onclick = ()=>{
        mask.classList.remove('ok');
        mask.removeChild(login);
        login.classList.remove('ok')
    }

    //SIGN
    buttons_header[1].onclick = ()=>{
        window.location.href = '../sign';
    }
    document.querySelector('.last-elem>:last-child').onclick = ()=>{
        window.location.href = '../sign';
    }

}

const buttons_menu = document.querySelectorAll('.buttons-menu-stack i');
//MENU-SIGN
buttons_menu[0].onclick = ()=>{
    document.querySelector('.buttons-menu-stack .sign-menu').classList.toggle('fa-times')
    document.querySelector('.menu-start.menu-sign-stack').classList.toggle('ok')
}
//MENU-ALL
buttons_menu[1].onclick = ()=>{
    document.querySelector('.buttons-menu-stack .all-menu').classList.toggle('fa-times')
    mask.classList.toggle('ok')
    document.querySelector('.menu-start.menu-all-stack').classList.toggle('ok')
    mask.onclick = ()=>{
        document.querySelector('.buttons-menu-stack .all-menu').classList.remove('fa-times')
        document.querySelector('.menu-start.menu-all-stack').classList.remove('ok')
        mask.classList.remove('ok')
    }
}

document.querySelector('.menu-start.menu-all-stack .menu-nav>:nth-child(3) i').onclick = ()=>{
    document.querySelector('.menu-start.menu-all-stack .menu-nav>:nth-child(3) .fa-sort-desc').classList.toggle('fa-sort-asc')
    document.querySelector('.menu-start.menu-all-stack .menu-nav .item-nav .drop-menu-stack').classList.toggle('ok')
}

window.onscroll = ()=>{
    if(scrollY > 0){
        document.querySelector('.container-body .header-container').classList.add('active')
    }else{
        document.querySelector('.container-body .header-container').classList.remove('active')
    }
}
//MAKE HEADER-LINKS
const uxLi = document.querySelectorAll('.header-container .menu-nav .item-nav');
const logo = document.querySelector('.logo');
logo.onclick = () => {
    window.location.href = '../home'
}
uxLi[0].onclick = () => {
    window.location.href = '../home'
}
uxLi[1].onclick = () => {
    window.location.href = '../about'
}

const uxDrop = uxLi[2].querySelectorAll('.drop-menu .section-drop>:nth-child(2) .section-drop-item');
uxDrop[0].onclick = () => {
    window.location.href = '../web-site'
}
uxDrop[1].onclick = () => {
    window.location.href = '../design'
}
uxDrop[2].onclick = () => {
    window.location.href = '../marketing'
}
uxDrop[3].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDrop[4].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDrop[5].onclick = () => {
    window.location.href = '../course'
}
uxDrop[6].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDrop[7].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDrop[8].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDrop[9].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDrop[10].onclick = () => {
    window.location.href = '../project/angotransit'
}
uxDrop[11].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDrop[12].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDrop[13].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDrop[14].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}


document.querySelector('.context-header button');
if (document.querySelector('.context-header button')) {
    document.querySelector('.context-header button').onclick = () => {
        window.location.href = '#get-service'
    }
}

uxLi[3].onclick = () => {
    window.location.href = '../blog'
}
uxLi[4].onclick = () => {
    window.location.href = '../contact'
}



//MAKE LINK MENU
const uxMenu = document.querySelectorAll('.menu-start.menu-all-stack .menu-nav .item-nav')
const uxDropMenu = document.querySelectorAll('.drop-menu-stack .section-drop ul li')
uxMenu[0].onclick = () => {
    window.location.href = '../home'
}
uxMenu[1].onclick = () => {
    window.location.href = '../about'
}

uxDropMenu[0].onclick = () => {
    window.location.href = '../web-site'
}
uxDropMenu[1].onclick = () => {
    window.location.href = '../design'
}
uxDropMenu[2].onclick = () => {
    window.location.href = '../marketing'
}
uxDropMenu[3].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDropMenu[4].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDropMenu[5].onclick = () => {
    window.location.href = '../course'
}
uxDropMenu[6].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDropMenu[7].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDropMenu[8].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDropMenu[9].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDropMenu[10].onclick = () => {
    window.location.href = '../project/angotransit'
}
uxDropMenu[11].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDropMenu[12].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDropMenu[13].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDropMenu[14].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}

uxMenu[3].onclick = () => {
    window.location.href = '../blog'
}
uxMenu[4].onclick = () => {
    window.location.href = '../contact'
}

//MAKE LINK FOOTER
const uxFooter = document.querySelectorAll('footer section article ul li')
if(uxFooter[0] && uxFooter[1] && uxFooter[2] && uxFooter[5]){
    uxFooter[0].onclick = () => {
        window.location.href = '../home'
    }
    uxFooter[1].onclick = () => {
        window.location.href = '../about'
    }
    uxFooter[2].onclick = () => {
        window.location.href = '../faqs'
    }
    uxFooter[5].onclick = () => {
        window.location.href = '../contact'
    }
    
}

//SEARCH HEADER
document.querySelector('.search-space form button').onclick = (e)=>{
    e.preventDefault()

    const input_search_value = document.querySelector('.search-space form input')

    if(input_search_value.value == ''){
        createAlert('Preencha o campo de pesquisa', 'error')
    }else{
        window.location.href = '../search'
    }

    
}

//MAKE SLIDE
const buttonChangeSlide = document.querySelectorAll('.section-slide-img-project>:nth-child(2) span');
if(buttonChangeSlide){
    const arrayImg = [
        'Página 1.jpg', 
        '3.jpg',
        '4.jpg',
        '5.jpg',
        '6.jpg',
        '7.jpg',
        '8.jpg',
        '9.jpg',
        '10.jpg',
        '11.jpg',
        '12.jpg',
        '13.jpg',
        '14.jpg',
        '15.jpg',
        '16.jpg',
        '17.jpg',
        '18.jpg',
        '19.jpg',
        '20.jpg',
        '21.jpg',
        '22.jpg',
        '23.jpg',
        '24.jpg',
        '25.jpg',
    ];
    
    
    const img = document.querySelector('.section-slide-img-project>:nth-child(2) img');
    var countArrayImg = 0;
    
    if(img && buttonChangeSlide[0] && buttonChangeSlide[1]){
        buttonChangeSlide[1].onclick = ()=>{
            countArrayImg++;
            if(countArrayImg <= 22){
                img.src = '../assets/img/project/angotransit/' + arrayImg[countArrayImg];
                img.classList.add('active')
            }else{
                countArrayImg = 0
            }
        }
        buttonChangeSlide[0].onclick = ()=>{
            countArrayImg--;
            if(countArrayImg >= 0 ){
                img.src = '../assets/img/project/angotransit/' + arrayImg[countArrayImg];
                img.classList.add('active')
            }else{
                countArrayImg = 0
            }
        }
        
        setInterval(()=>{
            countArrayImg++;
            if(countArrayImg <= 22){
                img.src = '../assets/img/project/angotransit/' + arrayImg[countArrayImg];
                img.classList.add('active')
            }else{
                countArrayImg = 0
            }
        }, 5000)
    }
}