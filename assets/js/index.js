const buttons_header = document.querySelectorAll('.header-container .buttons-header button');
const mask = document.querySelector('.mask');
const login = document.querySelector('.form-login');
if (buttons_header && login) {
    //LOGIN
    buttons_header[0].onclick = () => {
        mask.classList.add('ok');
        mask.append(login);
        login.classList.add('ok')
    }
    document.querySelector('.form-login>:first-child i').onclick = () => {
        mask.classList.remove('ok');
        mask.removeChild(login);
        login.classList.remove('ok')

    }

    //SIGN
    buttons_header[1].onclick = () => {
        window.location.href = 'sign.html';
    }
    document.querySelector('.last-elem>:last-child').onclick = () => {
        window.location.href = 'sign.html';
    }

}

const buttonsSigns = document.querySelectorAll('.menu-start.menu-sign-stack .buttons-header button');
if(buttonsSigns[0] && buttonsSigns[1]){
    buttonsSigns[0].onclick = () => {
        window.location.href = 'login.html';
    }
    buttonsSigns[1].onclick = () => {
        window.location.href = 'sign.html';
    }
}
const buttonUpPass = document.querySelector('.last-elem>:first-child');
if (buttonUpPass) {
    buttonUpPass.onclick = () => {
        window.location.href = 'update-pass.html'
    }
}

const buttons_menu = document.querySelectorAll('.buttons-menu-stack i');
//MENU-SIGN
buttons_menu[0].onclick = () => {
    document.querySelector('.buttons-menu-stack .sign-menu').classList.toggle('fa-times')
    document.querySelector('.menu-start.menu-sign-stack').classList.toggle('ok')
}
//MENU-ALL
buttons_menu[1].onclick = () => {
    document.querySelector('.buttons-menu-stack .all-menu').classList.toggle('fa-times')
    mask.classList.toggle('ok')
    document.querySelector('.menu-start.menu-all-stack').classList.toggle('ok')
    mask.onclick = () => {
        document.querySelector('.buttons-menu-stack .all-menu').classList.remove('fa-times')
        document.querySelector('.menu-start.menu-all-stack').classList.remove('ok')
        mask.classList.remove('ok')
    }
}

document.querySelector('.menu-start.menu-all-stack .menu-nav>:nth-child(3) i').onclick = () => {
    document.querySelector('.menu-start.menu-all-stack .menu-nav>:nth-child(3) .fa-sort-desc').classList.toggle('fa-sort-asc')
    document.querySelector('.menu-start.menu-all-stack .menu-nav .item-nav .drop-menu-stack').classList.toggle('ok')
}

window.onscroll = () => {
    if (scrollY > 0) {
        document.querySelector('.container-body .header-container').classList.add('active')
    } else {
        document.querySelector('.container-body .header-container').classList.remove('active')
    }
}

//MAKE HEADER-LINKS
const uxLi = document.querySelectorAll('.header-container .menu-nav .item-nav');
const logo = document.querySelector('.logo');
logo.onclick = () => {
    window.location.href = 'index.html'
}
uxLi[0].onclick = () => {
    window.location.href = 'index.html'
}
uxLi[1].onclick = () => {
    window.location.href = 'about.html'
}

const uxDrop = uxLi[2].querySelectorAll('.drop-menu .section-drop>:nth-child(2) .section-drop-item');
uxDrop[0].onclick = () => {
    window.location.href = 'web-site.html'
}
uxDrop[1].onclick = () => {
    window.location.href = 'design.html'
}
uxDrop[2].onclick = () => {
    window.location.href = 'marketing.html'
}
uxDrop[3].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDrop[4].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDrop[5].onclick = () => {
    window.location.href = 'course.php'
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
    window.location.href = 'project/angotransit'
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
    window.location.href = 'blog.php'
}
uxLi[4].onclick = () => {
    window.location.href = 'contact.html'
}


//MAKE LINK MENU
const uxMenu = document.querySelectorAll('.menu-start.menu-all-stack .menu-nav .item-nav')
const uxDropMenu = document.querySelectorAll('.drop-menu-stack .section-drop ul li')
uxMenu[0].onclick = () => {
    window.location.href = 'index.html'
}
uxMenu[1].onclick = () => {
    window.location.href = 'about.html'
}

uxDropMenu[0].onclick = () => {
    window.location.href = 'web-site'
}
uxDropMenu[1].onclick = () => {
    window.location.href = 'desig.htmln'
}
uxDropMenu[2].onclick = () => {
    window.location.href = 'marketing.html'
}
uxDropMenu[3].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDropMenu[4].onclick = () => {
    createAlert('Desculpe, esta página está em carregamento...', 'warrir')
}
uxDropMenu[5].onclick = () => {
    window.location.href = 'course.php'
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
    window.location.href = 'project/angotransit.html'
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
    window.location.href = 'blog.php'
}
uxMenu[4].onclick = () => {
    window.location.href = 'contact.html'
}


const menuSign = document.querySelectorAll('.menu-start.menu-all-stack .buttons-header button');
if (menuSign[0] && menuSign[1]) {
    menuSign[0].onclick = () => {
        window.location.href = 'login.html'
    }
    menuSign[1].onclick = () => {
        window.location.href = 'sign.html'
    }
}


//MAKE LINK FOOTER
const uxFooter = document.querySelectorAll('footer section article ul li')
if (uxFooter[0] && uxFooter[1] && uxFooter[2] && uxFooter[5]) {
    uxFooter[0].onclick = () => {
        window.location.href = 'index.html'
    }
    uxFooter[1].onclick = () => {
        window.location.href = 'about.html'
    }
    uxFooter[2].onclick = () => {
        window.location.href = 'faqs.html'
    }
    uxFooter[5].onclick = () => {
        window.location.href = 'contact.html'
    }

}





//SEARCH HEADER
document.querySelector('.search-space form button').onclick = (e) => {
    e.preventDefault()
    const input_search_value = document.querySelector('.search-space form input')
    if (input_search_value.value == '') {
        createAlert('Preencha o campo de pesquisa', 'error')
    } else {
        window.location.href = 'search.html'
    }
}

document.querySelector('.menu-start.menu-sign-stack .search-space form button').onclick = (e) => {
    e.preventDefault();
    const input_search_value_menu = document.querySelector('.menu-start.menu-sign-stack .search-space form input')
    console.log(input_search_value_menu);

    if (input_search_value_menu.value == '') {
        createAlert('Preencha o campo de pesquisa', 'error')
    } else {
        window.location.href = 'search.html'
    }
}
document.querySelector('.menu-start.menu-all-stack .search-space form button').onclick = (e) => {
    e.preventDefault()
    const input_searchMenuAll = document.querySelector('.menu-start.menu-all-stack .search-space form input')
    if (input_searchMenuAll.value == '') {
        createAlert('Preencha o campo de pesquisa', 'error')
    } else {
        window.location.href = 'search.html'
    }
}




//ABOUT-PAGE
const uxPortfolio = document.querySelectorAll('.cart-people>:nth-child(4)');
if (uxPortfolio[0] && uxPortfolio[2]) {
    uxPortfolio[0].onclick = () => {
        //window.location.href = 'portfolio/serafim-pundo.html'
        window.open('portfolio/serafim-pundo.html', '_blank');
    }
    uxPortfolio[2].onclick = () => {
        //window.location.href = 'portfolio/moisés-kialanda.html'
        window.open('portfolio/moisés-kialanda.html', '_blank');
    }
}



//INDEX-PAGE
const cartService = document.querySelectorAll('.service-carts .select-cart .cart-item-more article');
if (cartService[0] && cartService[1] && cartService[2]) {
    cartService[0].onclick = () => {
        window.location.href = 'web-site.html'
    }
    cartService[1].onclick = () => {
        window.location.href = 'design.html'
    }
    cartService[2].onclick = () => {
        window.location.href = 'marketing.html'
    }
}
const buttonDepoim = document.querySelectorAll('.section-depoiment-client span button');
if (buttonDepoim[0]) {
    const formDepoim = document.querySelector('.depoiment')
    buttonDepoim[0].onclick = () => {
        mask.classList.add('ok')
        mask.append(formDepoim)
        formDepoim.classList.add('ok')
    }
    document.querySelector('.depoiment .top-form i').onclick = () => {
        mask.classList.remove('ok')
        mask.removeChild(formDepoim)
        formDepoim.classList.remove('ok')
    }
}


//SEARCH-PAGE
if (document.querySelector('.section-search .section-filter .button-filter')) {
    document.querySelector('.section-search .section-filter .button-filter').onclick = () => {
        document.querySelector('.main-container .option-filter').classList.toggle('ok')
    }
}

