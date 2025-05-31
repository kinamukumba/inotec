function createAlert(sms, type, icon) {
    const div = document.createElement('div')
    const i = document.createElement('i')
    const p = document.createElement('p')

    if(type == 'error'){
        div.style.background = 'rgb(250, 62, 62)'
        icon = 'fa-times-circle'
    }
    if(type == 'success'){
        div.style.background = 'rgb(12, 134, 12)'
        icon = 'fa-check'
    }
    if(type == 'warrir'){
          div.style.background = 'rgb(231, 167, 48)'
          icon = 'fa-exclamation-triangle'
    }

    div.classList.add('alert-message')
    i.classList.add('fa');
    i.classList.add(icon)
    div.append(i)
    div.append(p)
    p.innerText = sms

    document.body.appendChild(div);
    div.classList.add('active')

    setTimeout(()=>{
        document.body.removeChild(div);
    }, 5000)
}