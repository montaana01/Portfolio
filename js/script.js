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


function submitForm() {
    var formData = new FormData(document.getElementById("feedbackForm"));
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "post.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Response from send_feedback.php
            console.log(xhr.responseText);
            // Handle response as needed (e.g., display success message)
            // For example:
            document.getElementById("feedbackForm").reset(); // Clear form after successful submission
            alert("Thank you for your feedback!");
        } else {
            alert("Sorry, something went wrong. Please try again later.");
        }
    };
    xhr.send(formData);
}