var count = 0;
const slide = document.querySelectorAll('.context-header .slide');
setInterval(() => {
    for (let index = 0; index < slide.length; index++) {
        slide[index].classList.remove('active');
    }
    count++
    
    if(count >= slide.length){
        slide[0].classList.add('active')
        count = 0;
    }else{
        slide[count].classList.add('active')
    }
   // const randomElement = slide[Math.floor(Math.random() * slide.length)];
    //randomElement.classList.add('active')


}, 15000)