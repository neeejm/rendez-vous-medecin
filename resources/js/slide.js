//Get the buttons
let upBtn = document.getElementById("up-btn");
let aboutBtn = document.getElementById("about-btn");
let contactBtn = document.getElementById("contact-btn");
let servicesBtn = document.getElementById("services-btn");
let faboutBtn = document.getElementById("fabout-btn");
let fcontactBtn = document.getElementById("fcontact-btn");
let fservicesBtn = document.getElementById("fservices-btn");
let about = document.getElementById("about").getBoundingClientRect();
let contact = document.getElementById("contact").getBoundingClientRect();
let services = document.getElementById("services").getBoundingClientRect();
// var upBtn = $("#up-btn");
console.log("test");

// When the user scrolls down 100px from the top of the document, show the button
window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        upBtn.style.display = "block";
    } else {
        upBtn.style.display = "none";
    }
}

// upBtn.style.display = "block";
// When the user clicks on the button, scroll to the section 
upBtn.addEventListener('click', () => $('html, body').animate({ scrollTop: 0 }, 'slow'));
aboutBtn.addEventListener('click', () => $('html, body').animate({ scrollTop: about.top }, 'slow'));
contactBtn.addEventListener('click', () => $('html, body').animate({ scrollTop: contact.top }, 'slow'));
servicesBtn.addEventListener('click', () => $('html, body').animate({ scrollTop: services.top }, 'slow'));
faboutBtn.addEventListener('click', () => $('html, body').animate({ scrollTop: about.top }, 'slow'));
fcontactBtn.addEventListener('click', () => $('html, body').animate({ scrollTop: contact.top }, 'slow'));
fservicesBtn.addEventListener('click', () => $('html, body').animate({ scrollTop: services.top }, 'slow'));