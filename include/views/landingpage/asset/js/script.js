// Navbar mobile slider
const menuToggle = document.querySelector(".check");
const nav = document.querySelector("nav ul");

menuToggle.addEventListener("click", function () {
  nav.classList.toggle("slide");
});

// Typing
var messages = ["Menyimpan file Dan", "Mengupload file anda."];
var rank = 0;

// Code for Chrome, Safari and Opera
document.getElementById("myTypewriter").addEventListener("webkitAnimationEnd", changeTxt);

// Standard syntax
document.getElementById("myTypewriter").addEventListener("animationend", changeTxt);

function changeTxt(e) {
  _h1 = this.getElementsByTagName("h3")[0];
  _h1.style.webkitAnimation = "none"; // set element animation to none
  setTimeout(function () {
    // you surely want a delay before the next message appears
    _h1.innerHTML = messages[rank];
    var speed = (3.5 * messages[rank].length) / 20; // adjust the speed (3.5 is the original speed, 20 is the original string length
    _h1.style.webkitAnimation = "typing " + speed + "s steps(40, end), blink-caret .75s step-end infinite"; //  switch to the original set of animation
    rank === messages.length - 1 ? (rank = 0) : rank++; // if you have displayed the last message from the array, go back to the first one, else go to next message
  }, 1000);
}

// Swipper
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  // spaceBetween: 30,
  grabCursor: true,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
