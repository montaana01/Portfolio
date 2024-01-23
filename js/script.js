const hamburger = document.querySelector('.hamburger'),
    menu = document.querySelector('.menu'),
    close = document.querySelector('.menu__close'),
    menuLink = document.querySelectorAll('.menu__link');

hamburger.addEventListener('click', () =>{
    menu.classList.add('active');
});

close.addEventListener('click', () =>{
    menu.classList.remove('active');
});

function closeTab() {
    menuLink.forEach((link)=>
    link.addEventListener('click',()=>{ 
        menu.classList.remove('active');
}));
};

setTimeout(closeTab, 1500);



const counters = document.querySelectorAll('.range'),
      lines = document.querySelectorAll('.skills__progress__scale span');

counters.forEach((item, i)=>{
    lines[i].style.width = item.innerHTML; 
});