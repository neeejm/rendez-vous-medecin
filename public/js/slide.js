/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/slide.js ***!
  \*******************************/
//Get the buttons
var upBtn = document.getElementById("up-btn");
var aboutBtn = document.getElementById("about-btn");
var contactBtn = document.getElementById("contact-btn");
var servicesBtn = document.getElementById("services-btn");
var about = document.getElementById("about").getBoundingClientRect();
var contact = document.getElementById("contact").getBoundingClientRect();
var services = document.getElementById("services").getBoundingClientRect(); // var upBtn = $("#up-btn");

console.log(contact); // When the user scrolls down 100px from the top of the document, show the button

window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    upBtn.style.display = "block";
  } else {
    upBtn.style.display = "none";
  }
} // When the user clicks on the button, scroll to the section 


upBtn.addEventListener('click', function () {
  return $('html, body').animate({
    scrollTop: 0
  }, 'slow');
});
aboutBtn.addEventListener('click', function () {
  return $('html, body').animate({
    scrollTop: about.top
  }, 'slow');
});
contactBtn.addEventListener('click', function () {
  return $('html, body').animate({
    scrollTop: contact.top
  }, 'slow');
});
servicesBtn.addEventListener('click', function () {
  return $('html, body').animate({
    scrollTop: services.top
  }, 'slow');
});
/******/ })()
;