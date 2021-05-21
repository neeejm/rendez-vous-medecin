//Get the buttons
let upBtn = document.getElementById("up-btn");
let aboutBtn = document.getElementById("about-btn");
let contactBtn = document.getElementById("contact-btn");
let servicesBtn = document.getElementById("services-btn");
let about = document.getElementById("about").getBoundingClientRect();
let contact = document.getElementById("contact").getBoundingClientRect();
let services = document.getElementById("services").getBoundingClientRect();
// var upBtn = $("#up-btn");
console.log(contact);

// When the user scrolls down 100px from the top of the document, show the button
window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        upBtn.style.display = "block";
    } else {
        upBtn.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the section 
upBtn.addEventListener('click', () => $('html, body').animate({ scrollTop: 0 }, 'slow'));
aboutBtn.addEventListener('click', () => $('html, body').animate({ scrollTop: about.top }, 'slow'));
contactBtn.addEventListener('click', () => $('html, body').animate({ scrollTop: contact.top }, 'slow'));
servicesBtn.addEventListener('click', () => $('html, body').animate({ scrollTop: services.top }, 'slow'));