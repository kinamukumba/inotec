const uxCategirosCourse = document.querySelectorAll('.nav-course>:nth-child(2) .cat-item');
const uxCourse = document.querySelectorAll('.group-cart');

uxCategirosCourse[0].onclick = ()=>{
    uxCategirosCourse[0].classList.add('active')
    uxCategirosCourse[1].classList.remove('active')
    uxCategirosCourse[2].classList.remove('active')

   uxCourse[0].classList.add('active')
   uxCourse[1].classList.remove('active')
   uxCourse[2].classList.remove('active')

}
uxCategirosCourse[1].onclick = ()=>{
    uxCategirosCourse[1].classList.add('active')
    uxCategirosCourse[0].classList.remove('active')
    uxCategirosCourse[2].classList.remove('active')

   uxCourse[1].classList.add('active')
   uxCourse[0].classList.remove('active')
   uxCourse[2].classList.remove('active')
}
uxCategirosCourse[2].onclick = ()=>{
    uxCategirosCourse[2].classList.add('active')
    uxCategirosCourse[1].classList.remove('active')
    uxCategirosCourse[0].classList.remove('active')

    uxCourse[2].classList.add('active')
    uxCourse[1].classList.remove('active')
    uxCourse[0].classList.remove('active')
}

setTimeout(()=>{
    createAlert('Convidamos-te a inscrever-se um dos nossos cursos', 'warrir')
},5000)