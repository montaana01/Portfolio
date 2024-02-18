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

document.querySelector('form').addEventListener('submit', (e) => {
			e.preventDefault();

			let tk = '';

			grecaptcha.ready(function() {
          grecaptcha.execute('6LdN6m4pAAAAAJF__ahXHRFOe1CJt12CxXBN5Yyh', {action: 'homepage'}).then(function(g-recaptcha) {
            tk = g-recaptcha;
						document.getElementById('g-recaptcha').value = g-recaptcha;

						const data = new URLSearchParams();
						for (const pair of new FormData(document.querySelector('form'))) {
								data.append(pair[0], pair[1]);
						}

						fetch('send.php', {
							method: 'post',
							body: (g-recaptcha: tk),
						})
						.then(response => response.json())
						.then(result => {
							if (result['om_score'] >= 0.5) {
								console.log('Человек')
								// отправка данных на почту
							} else {
								console.log('Бот')
							}
						});
          });
        });
		});